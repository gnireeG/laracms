<?php

namespace Laracms\Core;

use Livewire\Component;

abstract class UiComponent extends Component
{
    public array $data = [];
    public array $children = [];
    public bool $editMode = false;

    public function mount(array $data = [], array $children = [], bool $editMode = false): void
    {
        $this->data = $data;
        $this->children = $children;
        $this->editMode = $editMode;
    }

    /**
     * Get a data value with optional default
     */
    protected function getData(string $key, mixed $default = null): mixed
    {
        return $this->data[$key] ?? $default;
    }

    /**
     * Check if component has children
     */
    protected function hasChildren(): bool
    {
        return !empty($this->children);
    }

    /**
     * Get component schema for editor
     * Override this in child classes
     */
    public static function getSchema(): array
    {
        return [];
    }

    /**
     * Get component metadata
     */
    public static function getMetadata(): array
    {
        return [
            'name' => static::getComponentName(),
            'category' => static::getComponentCategory(),
            'icon' => static::getComponentIcon(),
            'schema' => static::getSchema(),
        ];
    }

    /**
     * Component name (override in child)
     */
    public static function getComponentName(): string
    {
        return 'Unnamed Component';
    }

    /**
     * Component category for editor
     */
    public static function getComponentCategory(): string
    {
        return 'general';
    }

    /**
     * Component icon
     */
    public static function getComponentIcon(): string
    {
        return 'cube';
    }
}