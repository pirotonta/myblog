@extends('layouts.app')

@section('content')
    <h1>crear post</h1>

    <form action="#" method="POST">
        @csrf
        <label>titulo:</label><br>
        <input type="text" name="title"><br><br>

        <label>contenido:</label><br>
        <textarea name="content" rows="5" cols="50"></textarea><br><br>

        <button type="submit">subirlo</button>
    </form>
@endsection