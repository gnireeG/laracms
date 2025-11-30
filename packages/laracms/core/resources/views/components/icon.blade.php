@props([
    'name',
    'size' => 'md',
    ])

{{-- Possible text sizes for Tailwind CSS compilation:
text-xs text-sm text-base text-lg text-xl text-2xl text-3xl text-4xl text-5xl text-6xl text-7xl text-8xl text-9xl --}}

<i class="bi bi-{{ $name }} text-{{ $size }}" {{ $attributes }}></i>