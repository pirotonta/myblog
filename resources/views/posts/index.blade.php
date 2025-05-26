@extends('layouts.app')

@section('content')
    <h1>todos los posts</h1>
    <a href="{{ url('/posts/create') }}">Create New Post</a>

    @foreach ($posts as $post)
        <div style="margin-top: 20px;">
            <h2><a href="{{ url('/posts/' . $post->id) }}">{{ $post->title }}</a></h2>
            <p>{{ Str::limit($post->content, 150) }}</p>
            <p><small>By: {{ $post->user->name }}</small></p>
        </div>
    @endforeach
@endsection