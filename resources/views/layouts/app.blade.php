<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@400;500;700&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    <!-- ここが超重要！必ずviteの上にこれを書く -->
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])

    <!-- SCC -->
    @stack('styles')
</head>

<body class="font-sans antialiased min-h-screen">
    <div class="flex flex-col min-h-screen dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="flex-1">
            {{ $slot }}
        </main>

        <!-- Back to Top Button -->
        <a href="#" class="back-to-top">
            <div class="back-to-top__image">▲</div>
        </a>

        <!-- Page Footer -->
        <footer class="bg-[#FFFFFF] w-full mt-16 p-4 text-ms text-center text-[#777777]">
            {{ __('© 2026 Portfolio Demo') }}
        </footer>
    </div>
</body>

</html>
