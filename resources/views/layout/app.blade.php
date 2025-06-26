<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo-Info</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
    @yield("style")
</head>
<body>
    <h1>@yield("title")</h1>

    @if (session()->has('success'))
        <div>{{ session('success') }}</div>
    @endif

    <div>
        @yield("content")
    </div>
</body>
</html>
