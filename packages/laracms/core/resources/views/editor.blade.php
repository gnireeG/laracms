<dialog id="component-modal-{{ $this->getId() }}" class="modal top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 p-4 w-3xl bg-background text-text">
    <div class="flex justify-between mb-4">
        <h3 class="font-bold text-lg">Edit Component {{ $this->getComponentName() }}</h3>
        <x-laracms::button size="sm" icon="x-lg" variant="ghost" @click="document.getElementById('component-modal-{{ $this->getId() }}').close()" />
    </div>
    @foreach($this->getSchema() as $field => $value)
        @switch($value['type'])
            @case('textarea')
                <div class="mb-4">
                    <x-laracms::form.input label="{{ $value['label'] }}" wire:model="data.{{ $field }}" type="textarea" />
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
            @case('richtext')
                <div class="mb-4" wire:ignore>
                    <label class="block text-sm font-medium mb-1" for="trix-{{ $field }}-{{ $this->getId() }}">{{ $value['label'] }}</label>
                    <input id="richtext-{{ $field }}-{{ $this->getId() }}" type="hidden" value="{{ $this->data[$field] ?? '' }}" data-field="{{ $field }}">
                    <trix-editor
                        id="trix-{{ $field }}-{{ $this->getId() }}"
                        class="laracms-trix-editor"
                        input="richtext-{{ $field }}-{{ $this->getId() }}"
                        @trix-initialize="
                            setTimeout(() => {
                                const input = document.getElementById('richtext-{{ $field }}-{{ $this->getId() }}');
                                if (input && input.value) {
                                    $event.target.editor.loadHTML(input.value);
                                }
                            }, 100);
                        "
                    ></trix-editor>
                </div>
        @endswitch
    @endforeach
    <div class="mt-4">
        <form method="dialog" class="flex justify-end">
            <div class="flex gap-2">
                <x-laracms::button variant="ghost">Cancel</x-laracms::button>
                <x-laracms::button
                    variant="primary"
                    @click="
                        const modal = document.getElementById('component-modal-{{ $this->getId() }}');
                        modal.querySelectorAll('input[data-field]').forEach(input => {
                            $wire.set('data.' + input.dataset.field, input.value);
                        });
                        $wire.tempSave();
                        {{-- modal.close(); --}}
                    "
                >Save</x-laracms::button>
            </div>
        </form>
    </div>
</dialog>