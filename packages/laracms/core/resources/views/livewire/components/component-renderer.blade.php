<div class="relative">
    @if($editMode)
        {{-- Edit Mode: Wrapper mit Toolbar --}}
        <div
            class="border-2 border-dashed transition-colors component-wrapper absolute w-full h-full"
            :class="$store.componentHover.hoveredId === '{{ $this->component['id'] }}' ? 'border-blue-300' : 'border-transparent'"
            x-data="{ componentId: '{{ $this->component['id'] }}' }"
            x-init="$watch('$store.componentHover.hoveredId', () => {})"
            @mouseenter="$store.componentHover.setHovered(componentId)"
            @mouseleave.self="if ($store.componentHover.hoveredId === componentId) $store.componentHover.hoveredId = null"
            @mousemove="
                let target = $event.target;
                while (target && !target.classList.contains('component-wrapper')) {
                    target = target.parentElement;
                }
                if (target && target === $el) {
                    $store.componentHover.setHovered(componentId);
                }
            "
            wire:key="wrapper-{{ $this->component['id'] }}"
        >
            <div
                class="absolute -top-8 right-0 gap-1 bg-white shadow-lg rounded p-1 z-10 flex"
                x-show="$store.componentHover.hoveredId === '{{ $this->component['id'] }}'"
                style="display: none;"
            >
                <x-laracms::button icon="pencil" variant="primary" title="Edit Component" @click="document.getElementById('component-modal-{{ $this->component['id'] }}').showModal()" />
                <x-laracms::button icon="trash" variant="danger" title="Delete Component"  />
            </div>

        </div>
        @livewire($this->component['type'], ['data' => $this->component['data'], 'children' => $this->component['children'] ?? [], 'id' => $this->component['id'], 'editMode' => true], key($this->component['id']))
    @else
        {{-- Frontend: Nur Component --}}
        @livewire($this->component['type'], ['data' => $this->component['data'], 'children' => $this->component['children'] ?? [], 'id' => $this->component['id']], key($this->component['id']))
    @endif
</div>