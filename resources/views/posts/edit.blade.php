@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto bg-zinc-900 p-6 rounded-md shadow-md border border-zinc-700">
    <h1 class="text-3xl font-bold mb-6 text-white">Editando el post: {{ $post->title }}</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-sm font-semibold text-gray-300 mb-2">Título:</label>
            <input
                type="text"
                name="title"
                id="title"
                value="{{ $post->title }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div class="mb-4">
        <label class="block text-gray-300 font-semibold mb-2" for="image">Subir imagen:</label>

        <div class="relative w-full">
            <input type="file" name="image" id="image" accept="image/*"
                class="peer absolute inset-0 opacity-0 z-50 cursor-pointer w-full h-full" />

            <div class="bg-zinc-800 w-full border border-zinc-600 rounded-md text-white px-5 py-2 text-center peer-hover:border-blue-500 peer-hover:ring-2 peer-hover:ring-blue-500 transition">
                Seleccionar archivo
            </div>
        </div>

        <p id="file-name" class="mt-2 text-sm text-gray-400">Ningún archivo seleccionado</p>
    </div>

        <div>
            <label for="content" class="block text-sm font-semibold text-gray-300 mb-2">Contenido:</label>
            <textarea
                name="content"
                id="content"
                rows="5"
                class="w-full px-4 py-2 border border-zinc-700 bg-zinc-800 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none">{{ $post->content }}</textarea>
        </div>

        <div class="text-center space-x-2">
            <button
                type="submit"
                class="border border-gray-500 cursor-pointer hover:border-red-400 text-white font-semibold py-2 px-4 rounded shadow text-center transition">
                Actualizar post
            </button>
            <a
                href="{{ url('/posts/' . $post->id) }}"
                class="inline-block border border-gray-500 cursor-pointer hover:border-red-400 text-white font-semibold py-2 px-4 rounded shadow text-center transition">
                Cancelar
            </a>
        </div>

    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const input = document.getElementById('image');
        const fileNameDisplay = document.getElementById('file-name');

        if (input) {
            input.addEventListener('change', () => {
                const file = input.files[0];

                if (file) {
                    fileNameDisplay.textContent = file.name;
                } else {
                    fileNameDisplay.textContent = 'Ningún archivo seleccionado';
                }
            });
        }
    });
</script>
@endsection