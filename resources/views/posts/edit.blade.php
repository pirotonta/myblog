@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-6 rounded-md shadow-md">
    <h1 class="text-3xl font-bold mb-6 text-gray-900">Editando el post: {{ $post->title }}</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-gray-700 font-semibold mb-2">Título:</label>
            <input
                type="text"
                name="title"
                id="title"
                value="{{ $post->title }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label for="title" class="block text-gray-700 font-semibold mb-2">Título:</label>
            <input
                type="file"
                accept="image/*"
                name="image"
                id="image"
                value="{{ $post->image_path }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label for="content" class="block text-gray-700 font-semibold mb-2">Contenido:</label>
            <textarea
                name="content"
                id="content"
                rows="5"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none">{{ $post->content }}</textarea>
        </div>

        <div class="text-center">
            <button
                type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded-md transition">
                Actualizar post
            </button>
            <a
                class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-3 rounded-md transition"
                href="{{ url('/posts/' . $post->id) }}">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection