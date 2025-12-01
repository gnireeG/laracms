<?php

namespace Laracms\Core\Livewire\Components;

use Livewire\Component;

class ComponentRenderer extends Component
{
    public array $component;
    public bool $editMode = false;

    public function mount(array $component, bool $editMode = false)
    {
        $this->component = $component;
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('laracms::livewire.components.component-renderer');
    }
}