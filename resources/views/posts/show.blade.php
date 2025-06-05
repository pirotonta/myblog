@extends('layouts.app')

@section('content')
<article class="max-w-3xl mx-auto bg-white p-6 rounded-md shadow-md">
    <h1 class="text-3xl font-bold mb-4 text-gray-900">{{ $post->title }}</h1>
    <p class="text-sm text-gray-500 mb-6 border-b border-gray-300 pb-3">Publicado por <span class="font-semibold">{{ $post->user->username }}</span></p>
    @if ($post->image_path)
    <div id="image-wrapper" class="mb-6 flex flex-col sm:flex-row gap-4 items-start whitespace-pre-line">
        <img id="post-image" 
             src="{{ $post->image_path }}" 
             alt="imagen del post" 
             class="max-w-full max-h-[200px] rounded shadow object-contain" />
        
        <p id="post-text" class="text-gray-700">{{ $post->content }}</p>
    </div>
    @else
    <p class="text-gray-700 mb-6 whitespace-pre-line">{{ $post->content }}</p>
    @endif

    <a href="{{ url('/posts/' . $post->id . '/edit') }}"
        class="inline-block mb-6 text-blue-600 hover:text-blue-800 transition">
        Editar post
    </a>

    <section>
        <h3 class="text-xl text-gray-900 font-semibold my-4 border-b border-gray-300 pb-2">Comentarios</h3>
        @auth
        <form action="{{ route('comments.store') }}" method="POST" class="mt-6">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
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
        @foreach ($post->comments as $comment)
        <div class="ml-4 mb-4 p-3 bg-gray-50 rounded-md shadow-sm">
            <strong class="text-gray-800">{{ $comment->user->username }}</strong>:
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


@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const img = document.getElementById('post-image');
    const div = document.getElementById('image-wrapper');

    if (img && div) {
        img.onload = function () {
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