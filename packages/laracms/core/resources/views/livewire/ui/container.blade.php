@php
    $bgclass = match($this->getData('background', 'ui-card')) {
        'ui-bg' => 'bg-ui-bg',
        'ui-bg-alt' => 'bg-ui-bg-alt',
        'ui-bg-card' => 'bg-ui-bg-card',
        'primary' => 'bg-primary',
        'secondary' => 'bg-secondary',
        default => '',
    };
    $borderclass = match($this->getData('border', 'none')) {
        'none' => '',
        'thin' => 'border border-ui-border',
        'thick' => 'border-2 border-ui-border',
    };
@endphp
<div class="p-4 rounded-ui-md {{ $bgclass }} {{ $borderclass }}">
    @foreach($children as $child)
        @livewire('laracms-component-renderer', ['component' => $child, 'editMode' => $editMode], key($child['id']))
    @endforeach
</div>