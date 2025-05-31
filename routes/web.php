<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'getHome'])->name('home');

Route::get('/login', function () {
    return view('login');
});

Route::get('/signin', function () {
    return view('signin');
});

Route::resource('posts', PostController::class);

Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('categories/{category}/posts', [PostController::class, 'index'])
    ->name('categories.posts.index')
    ->where('category', '[0-9]+');

Route::middleware('auth')->group(function () {
    Route::post('/posts/{post}/vote', [PostController::class, 'vote'])->name('posts.vote');
});
