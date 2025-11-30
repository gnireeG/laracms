<?php

namespace Laracms\Core\Livewire\Components;

use Livewire\Component;

class ThemeToggle extends Component
{

    public function toggle(){
        $currentTheme = session('theme', 'light');
        $newTheme = $currentTheme === 'light' ? 'dark' : 'light';
        session(['theme' => $newTheme]);
    }

    public function render()
    {
        return view('laracms::livewire.components.theme-toggle');
    }
}