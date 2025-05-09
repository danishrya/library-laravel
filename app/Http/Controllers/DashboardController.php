<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $totalBooks = Book::count();
        $totalUsers = User::where('role', 'user')->count();
        $latestBooks = Book::latest()->take(5)->get();

        return view('dashboard', [
            'totalBooks' => $totalBooks,
            'totalUsers' => $totalUsers,
            'latestBooks' => $latestBooks,
        ]);
    }
}
