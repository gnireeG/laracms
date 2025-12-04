<?php

namespace Laracms\Core;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Laravel\Fortify\Fortify;
use Laracms\Core\Services\ComponentRegistry;

class CoreServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Services\MenuService::class, function ($app) {
            return new Services\MenuService();
        });

        $this->app->singleton(Services\ComponentRegistry::class, function ($app) {
            return new Services\ComponentRegistry();
        });
    }

    public function boot(): void
    {
        // Views laden
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laracms');

        // Routes mit web Middleware laden
        $this->app->make('router')->middleware('web')->group(__DIR__.'/../routes/web.php');

        // Migrations laden
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // Commands registrieren
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\Commands\SetupCommand::class,
                Console\Commands\MakeLivewireCommand::class,
                Console\Commands\LoadDemoDataCommand::class,
            ]);
        }
        
        // Fortify konfigurieren
        $this->configureFortify();

        // Components registrieren
        $this->registerComponents();
    }
    
    protected function configureFortify(): void
    {
        // LaraCMS Views für Fortify
        Fortify::loginView(function () {
            return view('laracms::auth.login');
        });
        
        // Später auch diese:
        // Fortify::registerView(fn () => view('laracms::auth.register'));
        // Fortify::requestPasswordResetLinkView(fn () => view('laracms::auth.forgot-password'));
        // Fortify::resetPasswordView(fn () => view('laracms::auth.reset-password'));
    }
    
    protected function registerComponents(): void
    {

        $registry = $this->app->make(ComponentRegistry::class);

        // Livewire Components registrieren
        Livewire::component('laracms-text', Components\Text::class);
        Livewire::component('laracms-login', \Laracms\Core\Livewire\Auth\Login::class);
        Livewire::component('laracms-navigation', \Laracms\Core\Livewire\Layout\Navigation::class);
        Livewire::component('laracms-theme-toggle', \Laracms\Core\Livewire\Components\ThemeToggle::class);
        Livewire::component('laracms-show-page', \Laracms\Core\Livewire\ShowPage::class);
        Livewire::component('laracms-component-renderer', \Laracms\Core\Livewire\Components\ComponentRenderer::class);
        Livewire::component('laracms-notification', \Laracms\Core\Livewire\Components\Notification::class);

        // UI Components (for use in the site builder)
        $registry->register('laracms-ui-text', \Laracms\Core\Livewire\Ui\Text::class);
        $registry->register('laracms-ui-grid', \Laracms\Core\Livewire\Ui\Grid::class);
        $registry->register('laracms-ui-card', \Laracms\Core\Livewire\Ui\Card::class);
        $registry->register('laracms-ui-container', \Laracms\Core\Livewire\Ui\Container::class);
    }
}