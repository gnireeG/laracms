<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <title>{{ $title ?? 'Admin' }} - {{ config('app.name', 'LaraCMS') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="flex">
    <!-- Admin Navigation -->
    <nav class="fixed h-screen w-64 bg-blue-100 flex flex-col justify-between p-6">
        <div>
            <div class="flex justify-between">
                <img src="laracms-logo.png" alt="LaraCMS Logo" class="h-10">
            </div>
            <div class="mt-8"><livewire:laracms-navigation /></div>
        </div>
        <div>
            <div>dm tog</div>
            <div class="mt-4">
                <button class="w-full flex justify-between cursor-pointer items-center">
                    <span>{{ auth()->user()->name }}</span>
                    <x-laracms::icon name="chevron-expand" />
                </button>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="ml-64 bg-red-100 grow">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>
