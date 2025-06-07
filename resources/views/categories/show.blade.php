@extends('layouts.app')
@php
$user = auth()->user();
@endphp

@section('content')
<h1 class="text-3xl font-bold mb-6 text-white">Posts en "{{ $category->name }}"</h1>

<x-filter :category="$category" />

<div class="max-w-4xl space-y-6">
    @foreach ($posts as $post)
    @php
    $userVote = $user ? $post->userVote($user) : null;
    @endphp
        <x-post-card :post="$post" :userVote="$userVote" />
    @endforeach

    <div class="mt-10">
        {{ $posts->links() }}
    </div>
</div>
@endsection