@extends('layouts.app')

@section('content')
<article class="max-w-3xl mx-auto bg-white p-6 rounded-md shadow-md">
    <h1 class="text-3xl font-bold mb-4 text-gray-900">{{ $post->title }}</h1>
    <p class="text-sm text-gray-500 mb-6">Publicado por <span class="font-semibold">{{ $post->user->name }}</span></p>
    <p class="text-gray-700 mb-6 whitespace-pre-line">{{ $post->content }}</p>

    <a href="{{ url('/posts/' . $post->id . '/edit') }}"
        class="inline-block mb-6 text-blue-600 hover:text-blue-800 transition">
        Editar post
    </a>

    <section>
        <h3 class="text-xl font-semibold mb-4 border-b border-gray-300 pb-2">Comentarios:</h3>
        @foreach ($post->comments as $comment)
        <div class="ml-4 mb-4 p-3 bg-gray-50 rounded-md shadow-sm">
            <strong class="text-gray-800">{{ $comment->user->name }}</strong>:
            <span class="text-gray-700">{{ $comment->content }}</span>
        </div>
        @endforeach
        <div class="text-center mt-8">
            <a
                class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-3 rounded-md transition"
                href="{{ route('posts.index') }}">
                Volver
            </a>
        </div>
    </section>
</article>
@endsection