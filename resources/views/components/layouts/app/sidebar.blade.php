<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
        <script>
        window.deferLoadingAlpine = (cb) => document.addEventListener('livewire:init', cb);
        </script>
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">

        {{ $slot }}

        @fluxScripts
        @livewireScripts
    </body>
</html>
