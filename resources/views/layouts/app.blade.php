<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bloggit') }}</title>

    <!-- Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-sans antialiased bg-gray-800">

    <div class="min-h-screen">

        <!-- Header -->
        @include('layouts.partials.header')

        @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Contenido -->
        <main class="container mx-auto p-10 w-full">
            @yield('content')
            {{ $slot ?? '' }}
        </main>

        <!-- Footer -->
        @include('layouts.partials.footer')

    </div>
</body>
<script src="//unpkg.com/alpinejs" defer></script>

</html>