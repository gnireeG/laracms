<?php

namespace Laracms\Core\Livewire\Layout;

use Livewire\Component;
use Laracms\Core\Services\MenuService;

class Navigation extends Component
{

    public $menu = null;

    public function mount(MenuService $menuService)
    {
        $this->menu = $menuService->getMenu();
    }
    public function render()
    {
        return view('laracms::livewire.layout.navigation');
    }
}