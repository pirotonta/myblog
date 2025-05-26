@extends('layouts.app')

@section('content')
    <h1>postinhos</h1>
    @foreach($posts as $post)
        <div>
            <h2><a href="{{ url('/posts/'.$post->id) }}">{{ $post->title }}</a></h2>
            <p>{{ $post->content }}</p>
        </div>
    @endforeach
@endsection

<!-- por ahora esto es literalmente lo mismo que index.blade.php -->