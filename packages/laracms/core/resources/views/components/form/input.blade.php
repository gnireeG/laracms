@props([
    'type' => 'text',
    'label' => null,
    'placeholder' => null,
    'icon' => null,
    'iconposition' => 'left',
    'disabled' => false,
    'required' => false,
    'rows' => 4,
])

@php
    $inputClasses = 'w-full px-3 py-2 bg-background-card text-text border border-border rounded-md focus:outline-none focus:ring-2 focus:ring-primary';

    if ($icon && $type !== 'textarea') {
        $inputClasses .= $iconposition === 'left' ? ' pl-10' : ' pr-10';
    }

    if ($disabled) {
        $inputClasses .= ' cursor-not-allowed opacity-60';
    }

    $id = 'input_' . uniqid();
@endphp

<div class="w-full">
    @if($label)
        <label class="block text-text text-sm font-medium mb-2" for="{{ $id }}">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <div class="relative">
        @if($icon && $iconposition === 'left' && $type !== 'textarea')
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <x-laracms::icon name="{{ $icon }}" class="text-text" />
            </div>
        @endif

        @if($type === 'textarea')
            <textarea
                id="{{ $id }}"
                rows="{{ $rows }}"
                @if($placeholder) placeholder="{{ $placeholder }}" @endif
                @if($disabled) disabled @endif
                @if($required) required @endif
                {{ $attributes->merge(['class' => $inputClasses]) }}
            ></textarea>
        @else
            <input
                type="{{ $type }}"
                id="{{ $id }}"
                @if($placeholder) placeholder="{{ $placeholder }}" @endif
                @if($disabled) disabled @endif
                @if($required) required @endif
                {{ $attributes->merge(['class' => $inputClasses]) }}
            >
        @endif

        @if($icon && $iconposition === 'right' && $type !== 'textarea')
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <x-laracms::icon name="{{ $icon }}" class="text-text" />
            </div>
        @endif
    </div>

    @error($attributes->wire('model')->value())
        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
    @enderror
</div>
