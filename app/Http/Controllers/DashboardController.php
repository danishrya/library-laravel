<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
      /**
     * Create a new controller instance
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the dashboard view.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalBooks = Books::count();
        $totalUsers = User::where('role', 'user')->count();
        $Books = Books::latest()->take(5)->get();

        return view('dashboard.index', compact('totalBooks', 'totalUsers', 'books'));
    }
}