@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6 text-gray-800">Contenedor de inicio</h1>

<div class="max-w-4xl space-y-6">
    @foreach($posts as $post)
    <article class="bg-white shadow-md rounded-md p-6 hover:shadow-lg transition-shadow duration-300">
        <h2 class="text-xl font-semibold text-blue-600 hover:text-blue-800 mb-2">
            <a href="{{ url('/posts/'.$post->id) }}">{{ $post->title }}</a>
        </h2>
        <p class="text-gray-700">{{ Str::limit($post->content, 200, '...') }}</p>
    </article>
    @endforeach
</div>
@endsection