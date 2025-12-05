<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @include('laracms::layouts.laracms-head')
</head>
<body class="bg-ui-bg">
    <nav class="w-screen h-16 bg-gray-800 text-white flex items-center px-4 justify-between">
        <div>Navigation</div>
        <div><x-laracms::button icon="lightbulb" @click="document.querySelector('body').classList.toggle('dark')" /></div>
    </nav>
    <main>{{ $slot }}</main>

    @livewireScripts
</body>
</html>
