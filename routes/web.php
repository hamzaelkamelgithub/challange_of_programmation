<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfilController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts/create', [PostController::class, 'create'])->name('create');

Route::post('/posts', [PostController::class, 'store'])->name('store');

Route::post('/posts/{post}/like', [PostLikeController::class, 'like'])->name('like');

Route::delete('/posts/{post}/like', [PostLikeController::class, 'unlike'])->name('unlike');

Route::post('follow/{user}', [FollowController::class, 'follow'])->name('follow');

Route::post('unfollow/{user}', [FollowController::class, 'unfollow'])->name('unfollow');

Route::get('/profil/{id}', [FollowController::class, 'profil'])->name('profil');
