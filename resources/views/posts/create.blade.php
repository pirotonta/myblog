@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6 text-center">Crear nuevo post</h1>

<form action="{{ route('posts.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto">
    @csrf

    <div class="mb-4">
        <label for="title" class="block text-gray-700 font-semibold mb-2">Título:</label>
        <input type="text" name="title" id="title"
            class="w-full border border-gray-300 p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="mb-4">
        <label for="category_id">Categoria:</label>
        <select name="category_id" id="category_id">
            @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="content" class="block text-gray-700 font-semibold mb-2">Contenido:</label>
        <textarea
            name="content"
            id="content"
            rows="5"
            class="w-full border border-gray-300 p-3 rounded-md resize-y focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
    </div>

    <div class="text-center">
        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">
            Publicar
        </button>
        <a
            class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-3 rounded-md transition"
            href="{{ route('posts.index') }}">
            Cancelar
        </a>
    </div>
</form>

@endsection