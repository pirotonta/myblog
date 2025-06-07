<?php

use App\Http\Controllers\{HomeController, PostController, UserController, CommentController, ProfileController, CategoryController, VoteController};
use Illuminate\Support\Facades\{Route};

Route::get('/', [HomeController::class, 'getHome'])->name('home');
Route::resource('posts', PostController::class);

Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/search', [\App\Http\Controllers\SearchController::class, 'search'])->name('search');

Route::middleware('auth')->group(function () {
    Route::post('/posts/{post}/vote', [VoteController::class, 'vote'])->name('posts.vote');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar');
});

Route::get('/profile/{username}', [ProfileController::class, 'showPublic'])->name('profile.public');

// rutas de autenticación de usuarios
require __DIR__ . '/auth.php';
