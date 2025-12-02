@props([
    'type' => 'text',
    'label' => null,
    'placeholder' => null,
    'icon' => null,
    'iconposition' => 'left',
    'disabled' => false,
    'required' => false,
])

@php
    $inputClasses = 'w-full px-3 py-2 bg-background-card text-text border border-border rounded-md focus:outline-none focus:ring-2 focus:ring-primary';

    if ($icon) {
        $inputClasses .= $iconposition === 'left' ? ' pl-10' : ' pr-10';
    }

    if ($disabled) {
        $inputClasses .= ' cursor-not-allowed opacity-60';
    }
@endphp

<div class="w-full">
    @if($label)
        <label class="block text-text text-sm font-medium mb-2">
            {{ $label }}
            @if($required)
                <span>*</span>
            @endif
        </label>
    @endif

    <div class="relative">
        @if($icon && $iconposition === 'left')
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <x-laracms::icon name="{{ $icon }}" class="text-text" />
            </div>
        @endif

        <input
            type="{{ $type }}"
            @if($placeholder) placeholder="{{ $placeholder }}" @endif
            @if($disabled) disabled @endif
            @if($required) required @endif
            {{ $attributes->merge(['class' => $inputClasses]) }}
        >

        @if($icon && $iconposition === 'right')
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <x-laracms::icon name="{{ $icon }}" class="text-text" />
            </div>
        @endif
    </div>

    @error($attributes->wire('model')->value())
        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
    @enderror
</div>
