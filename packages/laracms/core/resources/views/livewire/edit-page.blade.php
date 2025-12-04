<div>
    @foreach($tempcontent as $component)
        @livewire('laracms-component-renderer', ['component' => $component, 'editMode' => true], key($component['id']))
    @endforeach
</div>