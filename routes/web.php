<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'getHome'])->name('home');

Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth')->name('posts.create');

Route::resource('posts', PostController::class)->except(['create']);

Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('categories/{category}/posts', [PostController::class, 'index'])
    ->name('categories.posts.index')
    ->where('category', '[0-9]+');

Route::middleware('auth')->group(function () {
    Route::post('/posts/{post}/vote', [PostController::class, 'vote'])->name('posts.vote');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// rutas de autenticación de usuarios
require __DIR__ . '/auth.php';
