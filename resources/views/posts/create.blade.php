@extends('layouts.app')

@section('content')
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="bg-zinc-900 p-6 rounded-lg shadow-md max-w-2xl mx-auto border border-zinc-700">
    @csrf

    <h3 class="text-white text-center font-bold text-2xl mb-10">Crear nuevo post</h3>

    <div class="mb-4">
        <label for="title" class="block text-gray-300 font-semibold mb-2">Título:</label>
        <input type="text" name="title" id="title"
            class="w-full bg-zinc-800 text-white border border-zinc-600 p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500">
    </div>

    <div class="mb-4">
        <label for="category_id" class="block text-gray-300 font-semibold mb-2">Categoría:</label>
        <select name="category_id" id="category_id"
            class="w-full bg-zinc-800 text-white border border-zinc-600 p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500">
            @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
            @endforeach
        </select>
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

    <div class="mb-4">
        <label for="content" class="block text-gray-300 font-semibold mb-2">Contenido:</label>
        <textarea
            name="content"
            id="content"
            rows="5"
            class="w-full bg-zinc-800 text-white border border-zinc-600 p-3 rounded-md resize-y focus:outline-none focus:ring-2 focus:ring-gray-500"></textarea>
    </div>

    <div class="flex justify-center gap-4 mt-6">
        <button type="submit"
            class="w-32 border border-gray-500 cursor-pointer hover:border-red-400 text-white font-semibold py-2 px-4 rounded shadow transition">
            Publicar
        </button>
        <a href="{{ url()->previous() }}"
            class="w-32 border border-gray-500 cursor-pointer hover:border-red-400  text-white font-semibold py-2 px-4 rounded shadow text-center transition">
            Cancelar
        </a>
    </div>
</form>
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