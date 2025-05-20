<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Kernel;

// Auth routes - pindahkan di luar middleware auth
Route::get('/', [AuthController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Logout route
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Protected routes requiring authentication
Route::middleware('auth')->group(function () {
    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    
    // Books routes
    Route::get('/books', [BooksController::class, 'index'])->name('books.index');
    Route::get('/books/{books}', [BooksController::class, 'show'])->name('books.show'); // Show route should be placed here

    // // Admin-only routes
    // Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    //     Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');
    //     Route::post('/books', [BooksController::class, 'store'])->name('books.store');
    //     Route::get('/books/{books}/edit', [BooksController::class, 'edit'])->name('books.edit');
    //     Route::put('/books/{books}', [BooksController::class, 'update'])->name('books.update');
    //     Route::delete('/books/{books}', [BooksController::class, 'destroy'])->name('books.destroy');
    // });

       // Admin-only routes
   
        Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');
        Route::post('/books', [BooksController::class, 'store'])->name('books.store');
        Route::get('/books/{books}/edit', [BooksController::class, 'edit'])->name('books.edit');
        Route::put('/books/{books}', [BooksController::class, 'update'])->name('books.update');
        Route::delete('/books/{books}', [BooksController::class, 'destroy'])->name('books.destroy');
});

route::get('/user', function () {
    return view('user.user');
})->middleware('auth')->name('user');

route::get('/user.detail', function () {
    return view('user.users_detail');
})->middleware('auth')->name('user.detail');

// Fallback route for 404 errors
// Route::fallback(function () {
//     return view('errors.404');
// });