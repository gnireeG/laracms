@props(['variant' => 'default', 'icon' => null, 'iconposition' => 'left', 'disabled' => false])
@php
    $class = match ($variant) {
        'primary' => 'bg-primary text-white hover:bg-primary-dark',
        'secondary' => 'bg-secondary text-white hover:bg-secondary-dark',
        'danger' => 'bg-red-600 text-white hover:bg-red-700',
        'outline' => 'bg-transparent border border-border-secondary text-base hover:bg-background-hover',
        'ghost' => 'bg-transparent text-base hover:bg-button-bg-hover/10',
        default => 'bg-button-bg text-base hover:bg-button-bg-hover text-button-text',
    };
@endphp
<button class="px-3 py-1.5 rounded-md flex justify-center gap-2 items-center {{ $disabled ? 'cursor-not-allowed opacity-60' : 'cursor-pointer' }} {{ $class }} {{ $attributes['class'] ?? '' }}" {{ $attributes->except('class') }}>
    @if($icon && $iconposition === 'left')
        <x-laracms::icon name="{{ $icon }}" size="lg" />
    @endif
    {{ $slot }}
    @if($icon && $iconposition === 'right')
        <x-laracms::icon name="{{ $icon }}" size="lg" />
    @endif
</button>