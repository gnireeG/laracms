<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <title>{{ $title ?? 'Admin' }} - {{ config('app.name', 'LaraCMS') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'packages/laracms/core/resources/css/laracms.scss'])
    @livewireStyles
</head>
<body class="admin flex {{ session('theme', 'light') }}">
    <!-- Admin Navigation -->
    <x-laracms::sidebar />

    <!-- Page Content -->
    <main class="ml-64 grow">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>
