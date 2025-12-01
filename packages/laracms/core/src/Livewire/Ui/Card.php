<?php

namespace Laracms\Core\Livewire\Ui;

use Laracms\Core\UiComponent;

class Card extends UiComponent
{
    public function render()
    {
        return view('laracms::livewire.ui.card');
    }

    public static function getComponentName(): string
    {
        return 'Card';
    }

    public static function getComponentCategory(): string
    {
        return 'content';
    }

    public static function getComponentIcon(): string
    {
        return 'rectangle-stack';
    }

    public static function getSchema(): array
    {
        return [
            'heading' => [
                'type' => 'text',
                'label' => 'Heading',
                'default' => 'Card Title',
            ],
            'text' => [
                'type' => 'textarea',
                'label' => 'Text',
                'default' => 'Card content goes here...',
            ],
        ];
    }
}