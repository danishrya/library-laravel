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
    
    // Books routes - URUTAN PENTING
    Route::get('/books', [BooksController::class, 'index'])->name('books.index');
    
    // Rute create HARUS sebelum rute show yang menggunakan parameter {books}
    Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');
    Route::post('/books', [BooksController::class, 'store'])->name('books.store');
    
    // Rute edit juga harus sebelum show
    Route::get('/books/{books}/edit', [BooksController::class, 'edit'])->name('books.edit');
    Route::put('/books/{books}', [BooksController::class, 'update'])->name('books.update');
    Route::delete('/books/{books}', [BooksController::class, 'destroy'])->name('books.destroy');
    
    // Rute show harus di AKHIR karena pattern-nya lebih umum
    Route::get('/books/{books}', [BooksController::class, 'show'])->name('books.show');
});

Route::get('/user', function () {
    return view('user.user');
})->middleware('auth')->name('user');

Route::get('/user.detail', function () {
    return view('user.users_detail');
})->middleware('auth')->name('user.detail');

// Uncomment ini jika diperlukan
// Route::fallback(function () {
//     return view('errors.404');
// });