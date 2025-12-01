<div>
    @if($editMode)
        {{-- Edit Mode: Wrapper mit Toolbar --}}
        <div class="relative group border-2 border-dashed border-transparent hover:border-blue-300 p-2">
            <div class="absolute -top-8 right-0 hidden group-hover:flex gap-1 bg-white shadow-lg rounded p-1">
                <button class="px-2 py-1 text-xs bg-blue-500 text-white rounded">Edit</button>
                <button class="px-2 py-1 text-xs bg-red-500 text-white rounded">Delete</button>
            </div>
            
            @livewire($component['type'], ['data' => $component['data'], 'children' => $component['children'] ?? [], 'editMode' => true], key($component['id']))
        </div>
    @else
        {{-- Frontend: Nur Component --}}
        @livewire($component['type'], ['data' => $component['data'], 'children' => $component['children'] ?? []], key($component['id']))
    @endif
</div>