@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6 text-gray-800">Todos los posts</h1>
<a href="{{ url('/posts/create') }}"
    class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition mb-5">
    Crear post
</a>

<div class="max-w-4xl space-y-6">
    @foreach ($posts as $post)
    <article class="bg-white shadow-md rounded-md p-6 hover:shadow-lg transition-shadow duration-300">
        <h2 class="text-xl font-semibold text-blue-600 hover:text-blue-800 mb-2">
            <a href="{{ url('/posts/' . $post->id) }}">{{ $post->title }}</a>
        </h2>
        <p class="text-gray-700 mb-3">{{ Str::limit($post->content, 150, '...') }}</p>
        <p class="text-sm text-gray-500">By: {{ $post->user->name }}</p>
    </article>
    @endforeach
</div>
@endsection