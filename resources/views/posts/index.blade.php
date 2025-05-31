@extends('layouts.app')
@php
    $user = auth()->user();
    $userVote = $user ? $post->userVote($user) : null;
@endphp

@section('content')
<h1 class="text-3xl font-bold mb-6 text-gray-800">Todos los posts</h1>
<a href="{{ url('/posts/create') }}"
    class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition mb-5">
    Crear post
</a>

<div class="max-w-4xl space-y-6">
    @foreach ($posts as $post)
    <article class="bg-white shadow-md rounded-md p-6 hover:shadow-lg transition-shadow duration-300">
        <form method="POST" action="{{ route('posts.vote', $post) }}">
            @csrf
            <input type="hidden" name="value" value="1">
                <button type="submit" class="{{ $userVote && $userVote->value === 1 ? 'text-green-700 font-bold' : 'text-green-500 hover:text-green-600' }}">
                    ▲
                </button>
        </form>

        <span class="{{ $post->rating() > 0 ? 'text-green-500' : ($post->rating() < 0 ? 'text-red-500' : 'text-gray-400') }}">
            {{ $post->rating() }}
        </span>

        <form method="POST" action="{{ route('posts.vote', $post) }}">
            @csrf
            <input type="hidden" name="value" value="-1">
            <button type="submit" class="{{ $userVote && $userVote->value === -1 ? 'text-red-700 font-bold' : 'text-red-500 hover:text-red-600' }}">
                ▼
            </button>
        </form>
        <h2 class="text-xl font-semibold text-blue-600 hover:text-blue-800 mb-2">
            <a href="{{ url('/posts/' . $post->id) }}">{{ $post->title }}</a>
        </h2>
        <p class="text-gray-700 mb-3">{{ Str::limit($post->content, 150, '...') }}</p>
        <p class="text-sm text-gray-500">By: {{ $post->user->name }}
            <small>Category:
                <a href="{{ route('categories.show', $post->category->id) }}">
                    {{ $post->category->name }}
                </a>
            </small>
        </p>
    </article>
    @endforeach
</div>
@endsection