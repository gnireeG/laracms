@props(['href', 'label', 'icon' => null, 'active' => false])
<a href="{{ $href }}" class="{{ $active ? 'active' : '' }}">
    @if($icon)
        <x-laracms::icon name="{{ $icon }}" class="inline-block mr-2" />
    @endif
    {{ $label }}
</a>