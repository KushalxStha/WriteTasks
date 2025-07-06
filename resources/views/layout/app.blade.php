<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WriteTasks</title>

    <script src="//unpkg.com/alpinejs" defer></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield("style")
</head>

<body class="container max-w-lg mx-auto mt-10 mb-10">
    <h1 class="text-2xl mb-4">@yield("title")</h1>

    @if (session()->has('success'))
        <div x-data="{ flash: true }">
            <div x-show ="flash"
                class="relative mb-4 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <div>
                    {{ session('success') }}
                </div>

                <span class="absolute top-0 right-0 px-4 py-3">
                    <svg xmlns="http://ww.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor"
                        class="h-6 w-6 cursor-pointer"
                        @click="flash=false">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
        </div>
    @endif

    <div>
        @yield("content")
    </div>
</body>

</html>
