<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('SignUp_show', [UserController::class, 'SignUp_show'])->name('SignUp.show');
Route::post('signup', [UserController::class, 'Sign_up'])->name('SignUp.submit');

Route::get('login_show', [UserController::class, 'login_show'])->name('Login.show');
Route::post('login', [UserController::class, 'login'])->name('Login.submit');

Route::get('movies', [MovieController::class, 'showListMovies'])->name('ListMovies');
Route::get('CreateMovies_show', [MovieController::class, 'show_CreateMovies'])->name('CreateMovies.show');
Route::post('CreateMovies', [MovieController::class, 'store_CreateMovies'])->name('CreateMovies.submit');
Route::get('EditMovies_show/{id}', [MovieController::class, 'show_EditMovies'])->name('EditMovies.show');
Route::put('EditMovies/{id}', [MovieController::class, 'store_EditMovies'])->name('EditMovies.submit');
Route::delete('DeleteMovies/{id}', [MovieController::class, 'deleteMovie'])->name('DeleteMovies');
Route::get('/movies/{id}/reviews', [ReviewController::class, 'show_Review_page'])->name('reviews.page');
Route::post('/movies/{id}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
