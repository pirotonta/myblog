@extends('layouts.app')
@php
$userActual = auth()->user();
@endphp

@section('content')
<div class="max-w-4xl mx-auto bg-zinc-900 p-6 rounded-md shadow-md border border-zinc-700 mt-8">
    <div class="flex items-center space-x-6">
        <img
            src="{{ asset($user->profile_picture ?? 'images/avatars/default.png') }}"
            alt="avatar de {{ $user->username }}"
            class="w-30 h-30 rounded-full border border-zinc-600 object-contain">
        <div>
            <h1 class="text-2xl font-bold text-white">{{ $user->username }}</h1>
            <p class="text-gray-400 text-sm">{{ $user->email }}</p>
            <p class="text-gray-500 text-sm">Se unió en {{ $user->created_at->format('M Y') }}</p>
        </div>
    </div>

    <hr class="my-6 border-zinc-700">

    <!-- seccion de posts -->
    <h2 class="text-xl font-semibold text-white mb-4">Posts de {{ $user->username }}</h2>
    @forelse ($posts as $post)
    @php
    $userVote = $userActual ? $post->votes->first() : null;
    @endphp
    <div class="mt-3">
        <x-post-card :post="$post" :userVote="$userVote"></x-post-card>
    </div>
    @empty
    <p class="text-gray-400">Este usuario no ha publicado nada aún.</p>
    @endforelse

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>
@endsection