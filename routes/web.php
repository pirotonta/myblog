<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/signin', function () {
    return view('signin');
});

Route::get('posts', function () {
    return view('posts');
});

Route::get('posts/create', function () {
    return view('posts/create');
});

Route::get('/posts/{id}', function () {
    return view('/posts/{id}');
});

Route::get('/posts/{id}/edit', function () {
    return view('/posts/{id}/edit');
});

