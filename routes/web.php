<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome'); // Ensure you have a 'welcome' view
});

// // Untuk resource controller (rekomendasi)
// Route::resource('dashboard', DashboardController::class);

// // Atau secara manual
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// Route::get('/', function () {
//     return view('dashboard.index'); // Ensure you have a 'dashboard.index' view
// });
// Route::get('/', [BooksController::class, 'index'])->name('books.index');
// /**
//  * 
//  */

// // Define the login route
// Route::get('/login', function () {
//     return view('auth.login'); // Ensure you have a 'auth.login' view
// })->name('login');
// Route::resource('books', \App\Http\Controllers\BooksController::class);