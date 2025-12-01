<?php

namespace Laracms\Core\Livewire\Layout;

use Livewire\Component;
use Laracms\Core\Services\MenuService;

class Navigation extends Component
{
    public $menu = null;

    public function mount(MenuService $menuService): void
    {
        $this->menu = $this->processMenu($menuService->getMenu());
    }

    protected function processMenu(array $menu): array
    {
        $currentUrl = request()->url();

        foreach ($menu as &$item) {
            if ($item['type'] === 'group') {
                // Mark subitems as active
                foreach ($item['items'] as &$subitem) {
                    $subitem['active'] = $this->isActive($subitem['href'], $currentUrl);
                }
                unset($subitem);

                // Check if any subitem is active to open the group
                $item['isOpen'] = collect($item['items'])->contains('active', true);
            } else {
                // Mark single items as active
                $item['active'] = $this->isActive($item['href'], $currentUrl);
            }
        }
        unset($item);

        return $menu;
    }

    protected function isActive(string $href, string $currentUrl): bool
    {
        return $href === $currentUrl || request()->is(trim($href, '/'));
    }

    public function render()
    {
        return view('laracms::livewire.layout.navigation');
    }
}