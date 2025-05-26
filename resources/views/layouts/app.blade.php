<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>myblogdelaravel</title>
</head>
<body style="font-family: sans-serif; margin: 40px;">
    <nav>
        <a href="{{ url('/') }}">landing</a> |
        <a href="{{ url('/posts') }}">posts</a>
    </nav>
    <hr>
    @yield('content')
</body>
</html>