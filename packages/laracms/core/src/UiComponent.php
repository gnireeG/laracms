<?php

namespace Laracms\Core;

use Livewire\Component;

abstract class UiComponent extends Component
{
    public array $data = [];
    public array $children = [];
    public bool $editMode = false;
    public string $id = '';

    public function tempSave(){
        $this->dispatch('componentDataUpdated', [
            'id' => $this->id,
            'data' => $this->data,
            'children' => $this->children,
        ]);
    }

    public function mount(array $data = [], array $children = [], bool $editMode = false, string $id = ''): void
    {
        $this->data = $data;
        $this->children = $children;
        $this->editMode = $editMode;
        $this->id = $id;
    }

    /**
     * Get a data value with optional default
     * If no default is provided, it will use the default from the schema
     */
    protected function getData(string $key, mixed $default = null): mixed
    {
        // If value exists in data, return it
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }

        // If explicit default provided, use it
        if ($default !== null) {
            return $default;
        }

        // Otherwise, try to get default from schema
        $schema = static::getSchema();
        if (isset($schema[$key]['default'])) {
            return $schema[$key]['default'];
        }

        return null;
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

    /**
     * ID of the component
     */
    public function getId(): string
    {
        return $this->id;
    }
}