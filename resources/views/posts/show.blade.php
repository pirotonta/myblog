@extends('layouts.app')

@section('content')
<article class="max-w-3xl mx-auto bg-zinc-900 border border-zinc-700 p-8 rounded-md shadow-md text-gray-200">
    <h1 class="text-3xl font-bold mb-4 text-white">{{ $post->title }}</h1>

    <p class="text-sm text-gray-400 mb-6 border-b border-gray-300 pb-3">
        Publicado por <span class="font-semibold text-gray-200">{{ $post->user->username }}</span>
    </p>
    @if ($post->image_path)
    <div id="image-wrapper" class="mb-6 flex flex-col sm:flex-row gap-4 items-start whitespace-pre-line">
        <img id="post-image"
            src="{{ asset($post->image_path) }}"
            alt="imagen del post"
            class="max-w-full max-h-[200px] rounded shadow object-contain" />

        <p id="post-text" class="text-gray-700">{{ $post->content }}</p>
    </div>
    @else

    <p class="text-gray-300 mb-6 whitespace-pre-line leading-relaxed">{{ $post->content }}</p>
    @endif

    @can('update', $post)
    <a href="{{ url('/posts/' . $post->id . '/edit') }}"
        class="inline-block text-gray-400 hover:text-red-400 font-semibold transition mb-6">
        Editar post
    </a>
    @endcan

    @can('delete', $post)
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
    @endcan

    <section class="mt-4">
        <h3 class="text-xl text-gray-900 font-semibold my-4 border-b border-zinc-600 pb-2 text-white">Comentarios</h3>
        @auth
        <form action="{{ route('comments.store', ['post' => $post->id]) }}" method="POST" class="mt-6">
            @csrf
            <textarea name="content" rows="3" required
                class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Escribe tu comentario..."></textarea>
            <button type="submit"
                class="mt-3 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition">
                Comentar
            </button>
        </form>
        @else
        <p class="mt-6 text-center text-gray-600 mb-6">
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Inicia sesión</a> para participar en la discusión.
        </p>
        @endauth

        @forelse ($post->comments as $comment)
        <div class="mb-2 p-4 bg-zinc-900 rounded-md shadow-sm border border-zinc-700">
            <p class="text-sm font-semibold text-gray-100 mb-1">{{ $comment->user->username }}</p>
            <p class="text-gray-300 text-sm leading-relaxed">{{ $comment->content }}</p>
        </div>
        @can('delete', $comment)
        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
            @csrf
            @method('DELETE')
            <button class="text-red-400 text-sm">Eliminar</button>
        </form>
        @endcan
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


@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const img = document.getElementById('post-image');
        const div = document.getElementById('image-wrapper');

        if (img && div) {
            img.onload = function() {
                const vertical = img.naturalHeight > img.naturalWidth;

                if (vertical) {
                    div.classList.remove('flex-col');
                    div.classList.add('flex-row');
                } else {
                    div.classList.remove('flex-row');
                    div.classList.add('flex-col');
                }
            };
        }
    });
</script>
@endsection