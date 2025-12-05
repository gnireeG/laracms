@props(['variant' => 'default', 'icon' => null, 'iconposition' => 'left', 'disabled' => false, 'size' => 'md'])
@php
    $class = match ($variant) {
        'primary' => 'bg-primary text-white hover:bg-primary/80 rounded-md',
        'secondary' => 'bg-secondary text-white hover:bg-secondary-dark rounded-md',
        'danger' => 'bg-red-600 text-white hover:bg-red-700 rounded-md',
        'outline' => 'bg-transparent border border-border-secondary text-base hover:bg-background-hover rounded-md',
        'ghost' => 'bg-transparent text-base hover:bg-button-bg-hover/10 rounded-md',
        'trix' => 'laracms-button-trix first:rounded-l-md last:rounded-r-md',
        default => 'bg-button-bg text-base hover:bg-button-bg-hover text-button-text rounded-md',
    };

    if(!$slot->isEmpty() && $icon) {
        $class .= match ($size) {
            'sm' => ' text-sm py-1 px-3',
            'md' => ' text-base py-1.5 px-4',
            'lg' => ' text-lg py-2 px-5'
        };

    }

    if($slot->isEmpty() && $icon) {
        $class .= match ($size) {
            'sm' => ' text-sm pl-1 pt-1 pb-1',
            'md' => ' text-base pl-2 pt-2 pb-2 pr-1',
            'lg' => ' text-lg pl-3 pt-3 pb-3 pr-2'
        };
    }

    if(!$slot->isEmpty() && !$icon) {
        $class .= match ($size) {
            'sm' => ' py-1 px-3',
            'md' => ' py-1.5 px-4',
            'lg' => ' py-2 px-5'
        };
    }

    $iconSize = match ($size) {
        'sm' => '4',
        'md' => '5',
        'lg' => '6',
    };

@endphp
<button
    {{ $attributes->merge(['class' => "relative flex justify-center items-center {$class} " . ($disabled ? 'cursor-not-allowed opacity-60' : 'cursor-pointer')]) }}
    x-data="{}"
    :disabled="{{ $disabled ? 'true' : 'false' }}"
    wire:loading.class="opacity-60 cursor-not-allowed"
    wire:loading.class.remove="cursor-pointer"
    wire:loading.attr="disabled">
    <span class="inline-flex gap-1.5 items-center {{ $iconposition === 'right' ? 'flex-row-reverse' : 'flex-row' }}">
        @if($icon)
            <span class="relative w-{{ $iconSize }}">
                <x-laracms::spinner :size="$size" class="absolute opacity-0 top-1/6" wire:loading.class.remove="opacity-0" />
                <x-laracms::icon name="{{ $icon }}" :size="$iconSize" wire:loading.class="opacity-0" />
            </span>
            <span>{{ $slot }}</span>
        @else
            <span class="relative">
                <x-laracms::spinner :size="$size" class="absolute opacity-0 top-1/6 left-1/2 -translate-x-1/2" wire:loading.class.remove="opacity-0" />
                <span wire:loading.class="opacity-0">{{ $slot }}</span>
            </span>
        @endif
    </span>
</button>