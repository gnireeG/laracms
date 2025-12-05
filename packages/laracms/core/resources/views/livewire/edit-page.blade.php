<div class="mb-16">
    @foreach($tempcontent as $component)
        @livewire('laracms-component-renderer', ['component' => $component, 'editMode' => true], key($component['id']))
    @endforeach
    <div class="absolute bottom-2 right-2 bg-background-card border-border border rounded-lg p-4 flex justify-center">
        <x-laracms::button variant="primary" wire:click="save">Save page</x-laracms::button>
    </div>
</div>