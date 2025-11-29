<?php

namespace LaraCms\Core;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Laravel\Fortify\Fortify;

class CoreServiceProvider extends ServiceProvider
{
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
        Livewire::component('laracms-text', Components\Text::class);
        Livewire::component('laracms-login', \LaraCms\Core\Livewire\Auth\Login::class);
    }
}