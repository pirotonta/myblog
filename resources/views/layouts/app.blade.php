<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/icons/forum-icon.svg" type="image/x-icon">
    <title>@yield('title', 'Bloggit')</title>

    <!-- Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-sans antialiased bg-zinc-900 text-gray-200">

    <div class="min-h-screen">

        <!-- Header -->
        @include('layouts.partials.header')

        <!-- Contenido -->
        <main class="container mx-auto p-10 w-full bg-zinc-900">
            @yield('content')
            {{ $slot ?? '' }}
        </main>

        <!-- Footer -->
        @include('layouts.partials.footer')

    </div>
    @yield('scripts')
</body>
<script src="//unpkg.com/alpinejs" defer></script>

</html>