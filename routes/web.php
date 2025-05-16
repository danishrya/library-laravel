<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('home');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Protected routes requiring authentication
Route::middleware('auth')->group(function () {
    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    
    // Books routes
    Route::get('/books', [BooksController::class, 'index'])->name('books.index');
    Route::get('/books/{books}', [BooksController::class, 'show'])->name('books.show'); // Show route should be placed here

    // Admin-only routes
    Route::middleware('admin')->group(function () {
    Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');
    Route::post('/books', [BooksController::class, 'store'])->name('books.store');
    Route::get('/books/{books}/edit', [BooksController::class, 'edit'])->name('books.edit');
    Route::put('/books/{books}', [BooksController::class, 'update'])->name('books.update');
    Route::delete('/books/{books}', [BooksController::class, 'destroy'])->name('books.destroy');
});
});

// Fallback route for 404 errors
Route::fallback(function () {
    return view('errors.404');
});
