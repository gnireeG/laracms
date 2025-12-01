@props(['href', 'label', 'icon' => null, 'active' => false, 'rounded' => false])
<a href="{{ $href }}" class="block px-3 py-1.5 hover:bg-background-alt last:rounded-b-md {{ $active ? 'bg-background-alt shadow-inner font-bold' : '' }} {{ $rounded ? 'rounded-md' : '' }}" wire:navigate>
    @if($icon)
        <x-laracms::icon name="{{ $icon }}" class="inline-block mr-2 {{ $active ? 'font-black' : '' }}" />
    @endif
    {{ $label }}
</a>