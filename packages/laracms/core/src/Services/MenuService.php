<?php

namespace Laracms\Core\Services;

class MenuService
{

    private array $menuItems = [];

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getMenu(): array {
        return $this->menuItems;
    }

    public function addMenuItem(
        string $label,
        string $href,
        string $id,
        string|null $icon = null,
        string|null $group_id = null): void{
        $item = [
            'type' => 'item',
            'label' => $label,
            'icon' => $icon,
            'id' => $id,
            'href' => $href
        ];

        if ($group_id) {
            // Find the group and add the item to it
            foreach ($this->menuItems as &$menuItem) {
                if ($menuItem['type'] === 'group' && $menuItem['id'] === $group_id) {
                    $menuItem['items'][] = $item;
                    return;
                }
            }
        } else {
            // Add as a top-level item
            $this->menuItems[] = $item;
        }
    }

    public function addMenuGroup(
        string $label,
        string $id,
        string|null $icon = null
        ): void {

        $this->menuItems[] = [
            'type' => 'group',
            'label' => $label,
            'icon' => $icon,
            'id' => $id,
            'items' => []
        ];
    }
}
