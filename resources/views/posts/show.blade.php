@extends('layouts.app')

@section('content')
<article class="max-w-3xl mx-auto bg-zinc-900 border border-zinc-700 p-8 rounded-md shadow-md text-gray-200">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-3xl font-bold text-white">{{ $post->title }}</h1>
        <div class="flex items-center space-x-4">
            <!-- botón de editar post -->
            @can('update', $post)
            <a href="{{ url('/posts/' . $post->id . '/edit') }}"
                class="inline-flex items-center justify-center w-6 h-6">
                <img src="/icons/edit.svg" class="w-6" />
            </a>
            @endcan

            <!-- botón de eliminar post -->
            @can('delete', $post)
            <form action="{{ route('posts.destroy', $post->id) }}"
                method="POST"
                class="inline-flex items-center justify-center w-6 h-6">
                @csrf
                @method('DELETE')
                <button class="p-0 m-0 border-none bg-transparent cursor-pointer" type="submit">
                    <img src="/icons/trash.svg" class="w-6" />
                </button>
            </form>
            @endcan
        </div>
    </div>

    <p class="text-xs text-gray-400 mb-6 border-b border-gray-700 pb-3">
        Publicado por <span class="font-semibold text-gray-200">{{ $post->user->username }}</span>
    </p>

    @if ($post->image_path)
    <div id="image-wrapper" class="mb-6 flex flex-col sm:flex-row gap-4 items-start whitespace-pre-line">
        <img id="post-image"
            src="{{ asset($post->image_path) }}"
            alt="imagen del post"
            class="max-w-full max-h-[200px] rounded shadow object-contain" />

        <p id="post-text" class="text-white">{{ $post->content }}</p>
    </div>
    @else

    <p class="text-gray-300 mb-6 whitespace-pre-line leading-relaxed">{{ $post->content }}</p>
    @endif

    <section class="mt-4">
        <h3 class="text-xl text-gray-900 font-semibold my-4 border-b border-gray-700 pb-2 text-white">Comentarios</h3>
        @auth
        <form action="{{ route('comments.store', ['post' => $post->id]) }}" method="POST" class="mt-3 mb-6">
            @csrf
            <textarea
                id="comment-textarea"
                name="content"
                rows="1"
                required
                class="w-full p-3 border border-gray-600 rounded-md"
                placeholder="Escribe tu comentario..."></textarea>
            <button
                id="comment-button"
                type="submit"
                class="w-32 mt-2 border border-gray-500 cursor-pointer hover:border-red-400 text-white font-semibold py-2 px-4 rounded shadow text-center transition hidden">
                Comentar
            </button>
        </form>
        @else
        <p class="mt-6 text-center text-gray-600 mb-6">
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Inicia sesión</a> para participar en la discusión.
        </p>
        @endauth

        @forelse ($post->comments as $comment)
        <div class="mb-8 bg-zinc-900 rounded-md flex gap-2">
            <div>
                <img src="{{ $comment->user->profile_picture }}" class="w-8 h-8 rounded-full" />
            </div>
            <div>
                <div class="flex gap-2">
                    <p class="text-sm font-semibold text-gray-100 mb-1">{{ $comment->user->username }}</p>

                    <!-- botón para eliminar comentario propio -->
                    @can('delete', $comment)
                    <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                        @csrf
                        @method('DELETE')
                        <div class="relative group inline-block">
                            <button class="text-red-400 text-sm cursor-pointer">
                                <img src="/icons/trash.svg" class="w-4.5" />
                            </button>
                            <div class="absolute bottom-full mb-2 left-1/2 transform -translate-x-1/2 
                    px-2 py-1 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition bg-zinc-900">
                                Eliminar comentario
                            </div>
                        </div>
                    </form>
                    @endcan

                </div>

                <p class="text-gray-300 text-sm leading-relaxed">{{ $comment->content }}</p>
            </div>
        </div>
        @empty
        <p class="text-gray-500 italic ml-4">Este post aún no tiene comentarios.</p>
        @endforelse

        <div class="text-center mt-8">
            <a href="{{ url()->previous() }}"
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

        const textarea = document.getElementById('comment-textarea');
        const button = document.getElementById('comment-button');

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

        textarea.addEventListener('input', function() {
            if (this.value.trim().length > 0) {
                button.classList.remove('hidden');
            } else {
                button.classList.add('hidden');
            }
        });
    });
</script>

@endsection