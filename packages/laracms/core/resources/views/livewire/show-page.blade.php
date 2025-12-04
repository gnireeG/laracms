<div>
    @foreach($page->content as $component)
        @livewire('laracms-component-renderer', ['component' => $component], key($component['id']))
    @endforeach
</div>