<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', [MovieController::class, 'homepage'])->name('homepage');

// Authentication
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Movies
Route::middleware('auth')->group(function () {
    Route::get('/movies/create_movie', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
    Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('/movies/{movie}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');
});

Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');

// Route detail harus diletakkan PALING BAWAH untuk menghindari bentrok
Route::get('/movies/{id}/{slug}', [MovieController::class, 'detail'])->name('movies.detail');

// Categories
Route::resource('categories', CategoryController::class)->middleware('auth');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
