<?php

namespace Laracms\Core\Services;

use Illuminate\Support\Collection;
use Livewire\Livewire;

class ComponentRegistry
{
    protected Collection $components;

    public function __construct()
    {
        $this->components = collect();
    }

    /**
     * Register a component
     */
    public function register(string $alias, string $class): void
    {
        Livewire::component($alias, $class);
        
        $this->components->put($alias, [
            'alias' => $alias,
            'class' => $class,
            'metadata' => $class::getMetadata(),
        ]);
    }

    /**
     * Get all registered components
     */
    public function all(): Collection
    {
        return $this->components;
    }

    /**
     * Get components by category
     */
    public function byCategory(): Collection
    {
        return $this->components->groupBy(fn($component) => 
            $component['metadata']['category']
        );
    }

    /**
     * Get component metadata
     */
    public function getMetadata(string $alias): ?array
    {
        return $this->components->get($alias)['metadata'] ?? null;
    }
}