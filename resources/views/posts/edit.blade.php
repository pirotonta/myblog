@extends('layouts.app')

@section('content')
    <h1>editando el post: {{ $post->title }}</h1>

    <form action="#" method="POST">
        @csrf
        @method('PUT')
        <label>titulo:</label><br>
        <input type="text" name="title" value="{{ $post->title }}"><br><br>

        <label>contenido:</label><br>
        <textarea name="content" rows="5" cols="50">{{ $post->content }}</textarea><br><br>

        <button type="submit">actualizar post</button>
    </form>
@endsection