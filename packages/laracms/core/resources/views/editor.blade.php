<dialog id="component-modal-{{ $this->getId() }}" class="modal top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 p-4 w-2xl">
    <div class="flex justify-end">
        <x-laracms::button size="sm" variant="ghost" @click="document.getElementById('component-modal-{{ $this->getId() }}').close()">x</x-laracms::button>
    </div>
    <h3 class="font-bold text-lg mb-4">Edit Component {{ $this->getComponentName() }}</h3>
    @foreach($this->getSchema() as $field => $value)
        @switch($value['type'])
            @case('textarea')
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">{{ $value['label'] }}</label>
                    <textarea
                        class="w-full border border-ui-border rounded p-2"
                        wire:model="data.{{ $field }}"
                        rows="4"></textarea>
                </div>
                @break
            @case('text')
                <div class="mb-4">
                    <x-laracms::form.input label="{{ $value['label'] }}" wire:model="data.{{ $field }}" />
                </div>
                @break
            @case('select')
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">{{ $value['label'] }}</label>
                    <select
                        class="w-full border border-ui-border rounded p-2"
                        wire:model="data.{{ $field }}"
                    >
                    
                        @foreach($value['options'] as $optionValue => $optionLabel)
                            <option value="{{ $optionValue }}">{{ $optionLabel }}</option>
                        @endforeach
                    </select>
                </div>
                @break
            @case('checkbox')
                <div class="mb-4">
                    <x-laracms::form.checkbox label="{{ $value['label'] }}" wire:model="data.{{ $field }}" />
                </div>
                @break
        @endswitch
    @endforeach
    <div class="mt-4 flex justify-end">
        <x-laracms::button variant="primary" wire:click="tempSave" @click="document.getElementById('component-modal-{{ $this->getId() }}').close()">Save</x-laracms::button>
    </div>
</dialog>