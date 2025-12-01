<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('laracms::layouts.head')
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
