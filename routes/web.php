<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'homepage']);

Route::resource('categories', CategoryController::class);
Route::resource('movies', MovieController::class);
Route::get('/movies/{id}/{slug}', [MovieController::class, 'detailmovie']);
