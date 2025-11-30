<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laracms\Core\Services\MenuService;

class SampleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(MenuService $menuService): void
    {
        $menuService->addMenuGroup(label: 'Shop', icon: 'bag', id: 'shop');
        $menuService->addMenuItem(label: 'Produkte', id: 'products', group_id: 'shop', href: '/admin/products');
        $menuService->addMenuItem(label: 'Bestellungen', id: 'orders', group_id: 'shop', href: '/admin/orders');
    }
}
