<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Inter:wght@400;600&display=swap" rel="stylesheet">
        @include('partials.head')
        <script>
        window.deferLoadingAlpine = (cb) => document.addEventListener('livewire:init', cb);
        </script>
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-gradient-to-br from-persian_indigo via-cornflower_blue to-periwinkle text-anti_flash_white font-sans">
        @auth
        <form method="POST" action="{{ route('logout') }}" class="fixed top-4 right-4">
            @csrf
            <button 
                type="submit" 
                class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg font-semibold">
                Log Out
            </button>
        </form>
        @endauth


        {{ $slot }}

        @fluxScripts
        @livewireScripts
    </body>
</html>
