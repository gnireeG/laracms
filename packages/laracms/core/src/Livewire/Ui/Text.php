<?php

namespace Laracms\Core\Livewire\Ui;

use Laracms\Core\UiComponent;

class Text extends UiComponent
{
    public function render()
    {
        return view('laracms::livewire.ui.text');
    }

    public static function getComponentName(): string
    {
        return 'Text';
    }

    public static function getComponentCategory(): string
    {
        return 'content';
    }

    public static function getComponentIcon(): string
    {
        return 'document-text';
    }

    public static function getSchema(): array
    {
        return [
            'content' => [
                'type' => 'textarea',
                'label' => 'Content',
                'default' => 'Your text here...',
            ],
        ];
    }
}