<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'getHome'])->name('home');

Route::get('/login', function () {
    return view('login');
});

Route::get('/signin', function () {
    return view('signin');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');

Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');

