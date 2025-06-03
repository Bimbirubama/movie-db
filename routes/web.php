<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'homepage']);

Route::resource('categories', CategoryController::class);
Route::get('/create-movie', [MovieController::class,'create'])->name ('createMovie');
Route::get('/movies/{id}/{slug}', [MovieController::class, 'detail']);
Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');

Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
