<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <!-- Styles -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.ts')
    @stack('scripts-header')
</head>

<body class="antialiased bg-[#fafafa]">
    @yield('main')

    @stack('scripts-footer')
</body>

</html>
