@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p><small>Post de {{ $post->user->name }}</small></p>

    <!-- <a href="{{ url('/posts/' . $post->id . '/edit') }}">Editar post</a> -->
    <!-- esto deberia estar detras de un middleware que chequee que el usuario logueado es el autor -->

    <h3>Comments:</h3>
    @foreach ($post->comments as $comment)
        <div style="margin-left: 20px; margin-bottom: 10px;">
            <strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}
        </div>
    @endforeach
@endsection