<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ isDarkMode: localStorage.getItem('dark') === 'true', navBar: false }" x-init="$watch('isDarkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{ 'dark': isDarkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Louja</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <link rel="icon" href="{{ asset('img/logo.png') }}">

    {{-- <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}"> --}}

    <style>
        * {
            font-family: "Nunito", sans-serif;
            /* Nunito */
        }
    </style>
    <tallstackui:script />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="font-sans antialiased selection:bg-purple-500 selection:text-white bg-stone-50 dark:bg-gray-900">

    @include('layouts.ecommerce.navbar')

    @yield('content')

    {{-- @include('layouts.footer') --}}

    @livewireScripts

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />

    {{-- <script src="{{ asset('js/swiper-bundle.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>

    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
