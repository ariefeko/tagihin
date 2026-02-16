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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100">
        {{-- Navigation Breeze --}}
        @include('layouts.navigation')
        <div class="min-h-screen flex">

            {{-- SIDEBAR --}}
            <aside class="w-64 bg-white border-r">
                <div class="p-4 font-bold text-lg border-b">
                    Laundry App
                </div>

                <nav class="p-4 space-y-2">
                    <a href="/dashboard" class="block px-3 py-2 rounded hover:bg-gray-100">
                        Dashboard
                    </a>

                    <a href="/customers" class="block px-3 py-2 rounded hover:bg-gray-100">
                        Customer
                    </a>

                    <a href="/tagihan" class="block px-3 py-2 rounded hover:bg-gray-100">
                        Tagihan
                    </a>
                </nav>
            </aside>

            {{-- MAIN AREA --}}
            <div class="flex-1 flex flex-col">

                {{-- CONTENT --}}
                <main class="p-6">
                    {{ $slot }}
                </main>

            </div>
        </div>
        @livewireScripts
    </body>
</html>
