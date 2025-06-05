@extends('layouts.app')
@php
$user = auth()->user();
@endphp

@section('content')
<h1 class="text-3xl font-bold mb-6">Posts recientes</h1>

<div class="max-w-4xl space-y-6">
    @foreach($posts as $post)
    @php
    $userVote = $user ? $post->userVote($user) : null;
    @endphp
    <article class="bg-zinc-900 border border-zinc-700 shadow-md rounded-md p-6 flex items-center gap-4">
        <div class="flex flex-col items-center justify-center">
            <form method="POST" action="{{ route('posts.vote', $post) }}">
                @csrf
                <input type="hidden" name="value" value="1">
                <button type="submit"
                    class="{{ $userVote && $userVote->value === 1 ? 'text-green-600 font-bold' : 'text-gray-400 hover:text-green-500' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-arrow-big-up-icon">
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
                <button type="submit"
                    class="{{ $userVote && $userVote->value === -1 ? 'text-red-700 font-bold' : 'text-gray-400 hover:text-red-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-arrow-big-down-icon">
                        <path d="M15 6v6h4l-7 7-7-7h4V6h6z" />
                    </svg>
                </button>
            </form>
        </div>

        <div class="flex-1">
            <div class="inline-flex items-center justify-between mb-2">
                <h2 class="text-xl font-semibold text-gray-300 hover:text-gray-100">
                    <a href="{{ url('/posts/' . $post->id) }}">{{ $post->title }}</a>
                </h2>
                <a href="{{ route('categories.show', $post->category->id) }}"
                    class="ml-2 px-2 py-0.5 inline-flex items-center justify-center rounded-full text-xs font-semibold text-white bg-red-500 hover:bg-red-400 transition">
                    {{ mb_strtoupper($post->category->name, 'UTF-8') }}
                    <img src="{{$post->category->icon}}"
                        alt="icon"
                        class="w-5 ml-2 rounded object-cover" />
                </a>
            </div>
            <p class="text-gray-500 mb-3">{{ Str::limit($post->content, 150, '...') }}</p>
            <p class="text-xs text-gray-300">
                By: {{ $post->user->username }}
            </p>
        </div>

        @if ($post->image_path != null)
        <img src="{{ $post->image_path }}"
            alt="imagen del post"
            class="w-25 h-25 rounded object-cover" />
        @endif
    </article>
    @endforeach
    <div class="mt-10">
        {{ $posts->links() }}
    </div>
</div>
@endsection