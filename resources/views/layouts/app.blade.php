<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('flowbite.min.css') }}" rel="stylesheet"/>
    <script src="{{ asset('tailwind') }}"></script>
    <script src="{{ asset('flowbite.min.js') }}"></script>
    <title>TaskManager</title>
</head>
<body class="container max-w-2xl mx-auto mt-10 mb-10 px-5">
    <div class="text-3xl mb-5 font-bold">@yield('title')</div>
    <div class="mb-5">
        @if (session()->has('success'))
            <div class="max-w-min whitespace-nowrap bg-yellow-100 text-yellow-800 me-2 px-2.5 py-0.5 rounded border border-yellow-400">{{ session('success') }}</div>
        @endif
    </div>
    <div>
        @yield('content')
    </div>
</body>
</html>
