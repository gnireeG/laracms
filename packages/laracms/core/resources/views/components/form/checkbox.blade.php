@props([
    'label' => null,
    'disabled' => false,
])

@php
    $checkboxClasses = 'w-5 h-5 rounded-md border-2 border-border bg-background-card text-primary focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all duration-150 cursor-pointer';

    if ($disabled) {
        $checkboxClasses .= ' cursor-not-allowed opacity-60';
    }

    $id = $attributes->get('id', 'checkbox-' . uniqid());
@endphp

<div class="flex items-center gap-2.5">
    <input
        type="checkbox"
        id="{{ $id }}"
        @if($disabled) disabled @endif
        {{ $attributes->merge(['class' => $checkboxClasses]) }}
    >

    @if($label)
        <label for="{{ $id }}" class="text-sm font-medium text-text cursor-pointer select-none">
            {{ $label }}
        </label>
    @endif
</div>
