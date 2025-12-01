@props(['position' => 'bottom'])
@php
    $positionClasses = match ($position) {
        'top' => 'bottom-full mb-2 w-full',
        'bottom' => 'top-full mt-2 w-full',
        'left' => 'right-full mr-2',
        'right' => 'left-full ml-2',
        default => 'top-full mt-2',
    };
@endphp
<div x-data="{ open: false }" class="relative inline-block text-left {{ $attributes['class'] }}" {{ $attributes }}>
    <div @click="open = !open">
        {{ $trigger }}
    </div>
    <div x-show="open" @click.away="open = false" class="absolute {{ $positionClasses }}">
        {{ $slot }}
    </div>
</div>