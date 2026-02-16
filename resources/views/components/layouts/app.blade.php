<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100">
<div class="min-h-screen flex">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-white border-r hidden md:block">
        <div class="p-4 font-bold text-lg border-b">
            Laundry App
        </div>

        <nav class="p-4 space-y-2">
            <a href="/dashboard" class="block px-3 py-2 rounded hover:bg-gray-100">Dashboard</a>
            <a href="/customers" class="block px-3 py-2 rounded hover:bg-gray-100">Customer</a>
            <a href="/tagihan" class="block px-3 py-2 rounded hover:bg-gray-100">Tagihan</a>
        </nav>
    </aside>

    {{-- MAIN --}}
    <div class="flex-1 flex flex-col">

        {{-- HEADER --}}
        <header class="bg-white border-b px-6 py-3 flex justify-between">
            <div class="font-semibold">Dashboard</div>
            <div class="text-sm text-gray-600">{{ auth()->user()->name }}</div>
        </header>

        {{-- CONTENT --}}
        <main class="p-6">
            {{ $slot }}
        </main>

    </div>
</div>

@livewireScripts
</body>
</html>
