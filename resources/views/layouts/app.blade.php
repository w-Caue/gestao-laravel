<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ isDarkMode: localStorage.getItem('dark') === 'true', navBar: false }" x-init="$watch('isDarkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{ 'dark': isDarkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Bem vindo' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

    <style>
        body {
            /* background-image: url("../img/comercio.png"); */
            font-family: "Nunito", sans-serif;
            /* Nunito */
        }

        [x-cloak] {
            display: none;
        }
    </style>

    <tallstackui:script />

    @vite('resources/css/app.css')

    @livewireStyles
</head>

<body class="bg-zinc-200 dark:bg-gray-900">
    <div class="flex h-screen">

        @include('layouts.sidebar')

        <div class="flex flex-col flex-1 ">
            @include('layouts.navbar')
            <main class="h-full w-full pb-16 mt-4 overflow-y-auto">
                <div class="px-6 sm:mx-auto xl:mx-9">
                    {{ $slot }}
                </div>
            </main>
        </div>

    </div>

    @livewireScripts

    <script src=" {{ asset('js/main.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />
</body>

</html>
