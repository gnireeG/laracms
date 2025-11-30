<?php

namespace Laracms\Core\Components;

use Livewire\Component;

class Text extends Component
{
    public string $content = 'Hello from LaraCMS Core!';
    
    public function render()
    {
        return view('laracms::components.text');
    }
}