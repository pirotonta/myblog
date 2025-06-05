@extends('layouts.app')

@section('content')
<article class="max-w-3xl mx-auto bg-zinc-900 border border-zinc-700 p-8 rounded-md shadow-md text-gray-200">
    <h1 class="text-3xl font-bold mb-4 text-white">{{ $post->title }}</h1>

    <p class="text-sm text-gray-400 mb-6">
        Publicado por <span class="font-semibold text-gray-200">{{ $post->user->username }}</span>
    </p>

    <p class="text-gray-300 mb-6 whitespace-pre-line leading-relaxed">{{ $post->content }}</p>

    <a href="{{ url('/posts/' . $post->id . '/edit') }}"
        class="inline-block text-gray-400 hover:text-red-400 font-semibold transition mb-6">
        Editar post
    </a>

    <section class="mt-4">
        <h3 class="text-xl font-semibold mb-4 border-b border-zinc-600 pb-2 text-white">Comentarios:</h3>

        @forelse ($post->comments as $comment)
        <div class="mb-2 p-4 bg-zinc-900 rounded-md shadow-sm border border-zinc-700">
            <p class="text-sm font-semibold text-gray-100 mb-1">{{ $comment->user->username }}</p>
            <p class="text-gray-300 text-sm leading-relaxed">{{ $comment->content }}</p>
        </div>

        @empty
        <p class="text-gray-500 italic ml-4">Este post aún no tiene comentarios.</p>
        @endforelse

        <div class="text-center mt-8">
            <a href="{{ route('posts.index') }}"
                class="w-32 border border-gray-500 cursor-pointer hover:border-red-400  text-white font-semibold py-2 px-4 rounded shadow text-center transition">
                Volver
            </a>
        </div>
    </section>
</article>
@endsection