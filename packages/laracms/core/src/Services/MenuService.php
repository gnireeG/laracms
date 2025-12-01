<?php

namespace Laracms\Core\Services;

class MenuService
{

    private array $menuItems = [
        [
            'type' => 'item',
            'label' => 'Dashboard',
            'id' => 'dashboard',
            'href' => '/admin',
            'icon' => 'house'
        ],
        [
            'type' => 'group',
            'label' => 'Pages',
            'icon' => 'journal-text',
            'id' => 'pages',
            'items' => [
                [
                    'type' => 'item',
                    'label' => 'All Pages',
                    'id' => 'all_pages',
                    'href' => '/admin/pages',
                    'icon' => null
                ],
                [
                    'type' => 'item',
                    'label' => 'Create new Page',
                    'id' => 'create_new_page',
                    'href' => '/admin/pages/create',
                    'icon' => null
                ]
            ]
        ],
        [
            'type' => 'group',
            'label' => 'Settings',
            'icon' => 'gear',
            'id' => 'settings',
            'items' => [
                [
                    'type' => 'item',
                    'label' => 'Theme',
                    'id' => 'theme_settings',
                    'href' => '/admin/settings/theme',
                    'icon' => null
                ],
                [
                    'type' => 'item',
                    'label' => 'Security',
                    'id' => 'security_settings',
                    'href' => '/admin/settings/security',
                    'icon' => null
                ],
                [
                    'type' => 'item',
                    'label' => 'Languages',
                    'id' => 'language_settings',
                    'href' => '/admin/settings/languages',
                    'icon' => null
                ]
            ]
        ]
    ];

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
