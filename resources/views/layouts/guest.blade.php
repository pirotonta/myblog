<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bloggit') }}</title>

    <!-- Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-800">

    <!-- Header -->
    @include('layouts.partials.header')

    <!-- Contenido principal para páginas públicas -->
    <main class="container mx-auto p-10 w-full">
        {{ $slot }}
    </main>

    <!-- Footer -->
    @include('layouts.partials.footer')

</body>

</html>