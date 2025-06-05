@extends('layouts.app')
@php
$user = auth()->user();
@endphp

<!-- dont know whether to keep this tbh -->

@section('content')
<h1 class="text-3xl font-bold mb-6">Todos los posts</h1>
<a href="{{ url('/posts/create') }}"
    class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition mb-5">
    Crear post
</a>

@foreach ($categories as $category)
<section class="mb-10">
    <h2 class="text-2xl font-semibold text-blue-700 mb-4">
        <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
    </h2>

    @if ($category->posts->count())
    <div class="max-w-4xl space-y-6">
        @foreach ($category->posts as $post)
        @php
        $userVote = $user ? $post->userVote($user) : null;
        @endphp
        <article class="bg-white shadow-md rounded-md p-6 hover:shadow-lg transition-shadow duration-300 flex items-center gap-4">
            <div class="flex flex-col items-center justify-center">
                <form method="POST" action="{{ route('posts.vote', $post) }}">
                    @csrf
                    <input type="hidden" name="value" value="1">
                    <button type="submit" class="{{ $userVote && $userVote->value === 1 ? 'text-green-600 font-bold' : 'text-gray-400 hover:text-green-500' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-big-up-icon lucide-arrow-big-up">
                            <path d="M9 18v-6H5l7-7 7 7h-4v6H9z" />
                        </svg>
                    </button>
                </form>

                <span class="{{ $post->rating() > 0 ? 'text-green-500' : ($post->rating() < 0 ? 'text-red-500' : 'text-gray-400') }}">
                    {{ $post->rating() }}
                </span>

                <form method="POST" action="{{ route('posts.vote', $post) }}">
                    @csrf
                    <input type="hidden" name="value" value="-1">
                    <button type="submit" class="{{ $userVote && $userVote->value === -1 ? 'text-red-700 font-bold' : 'text-gray-400 hover:text-red-600' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-big-down-icon lucide-arrow-big-down">
                            <path d="M15 6v6h4l-7 7-7-7h4V6h6z" />
                        </svg>
                    </button>
                </form>
            </div>

            <div class="flex-1">
                <h2 class="text-xl font-semibold text-blue-600 hover:text-blue-800 mb-2">
                    <a href="{{ url('/posts/' . $post->id) }}">{{ $post->title }}</a>
                </h2>
                <p class="text-gray-700 mb-3">{{ Str::limit($post->content, 150, '...') }}</p>
                <p class="text-sm text-gray-500">By: {{ $post->user->username }}</p>
            </div>


            <img
                src="{{ $post->category->icon }}"
                alt="icon"
                class="w-25 h-25 rounded object-cover" />
        </article>
        @endforeach
    </div>
    @else
    <p class="text-gray-500 italic">no hay nada x aqui (aun)</p>
    @endif
</section>
@endforeach
@endsection