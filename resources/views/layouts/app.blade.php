<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloggit</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- header -->
    @include('layouts.partials.header')

    <div class="container mx-auto p-10 w-full">
        <!-- contenido -->
        @yield('content')

    </div>

    <!-- footer -->
    @include('layouts.partials.footer')
</body>

</html>