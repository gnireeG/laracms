<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('laracms::layouts.head')
</head>
<body class="admin flex {{ session('theme', 'light') }}" :class="$store.nav ? 'overflow-y-hidden' : ''" x-data="{}">
    <!-- Admin Navigation -->
    <x-laracms::sidebar />
    <div class="lg:hidden fixed top-2 right-2 z-30">
        <x-laracms::button icon="list" size="lg" variant="ghost" @click="$store.nav = !$store.nav" />
    </div>
    <!-- Page Content -->
    <main class="ml-0 lg:ml-64 transition-all grow" @click="$store.nav = false">
        {{ $slot }}
    </main>
    @persist('notifications')
    <div class="fixed bottom-4 right-4 z-40">
        <livewire:laracms-notification />
    </div>
    @endpersist
    @livewireScripts
</body>
</html>
