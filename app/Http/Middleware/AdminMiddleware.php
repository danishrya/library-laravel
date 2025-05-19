<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
  public function handle(Request $request, Closure $next): mixed
  {
    // Middleware auth seharusnya sudah menangani ini, tapi untuk kehati-hatian
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    
    // Log the user's role for debugging
    Log::info('User role: ' . Auth::user()->role);

    // Cek role user
    if (Auth::user()->role === 'admin') {
        return $next($request);
    }
    
    // Untuk request AJAX/API, return status 403
    if ($request->ajax() || $request->wantsJson()) {
        return response()->json(['message' => 'Anda tidak memiliki akses untuk operasi ini.'], 403);
    }
    
    // Redirect dengan pesan error
    return redirect()->route('dashboard.index')
        ->with('error', 'Anda tidak memiliki akses untuk halaman ini.');
  }
}