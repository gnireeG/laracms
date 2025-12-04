<div 
    class="grid" 
    style="
        grid-template-columns: repeat({{ $this->getData('columns', 3) }}, 1fr);
        gap: {{ $this->getData('gap', '1.5rem') }};
    "
>
    @foreach($children as $child)
        @livewire('laracms-component-renderer', ['component' => $child, 'editMode' => $editMode], key($child['id']))
        @include('laracms::editor')
    @endforeach
</div>