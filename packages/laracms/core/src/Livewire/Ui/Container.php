<?php

namespace Laracms\Core\Livewire\Ui;

use Laracms\Core\UiComponent;

class Container extends UiComponent
{
    public function render()
    {
        return view('laracms::livewire.ui.container');
    }

    public static function getComponentName(): string
    {
        return 'Container';
    }

    public static function getComponentCategory(): string
    {
        return 'layout';
    }

    public static function getComponentIcon(): string
    {
        return 'box';
    }

    public static function getSchema(): array
    {
        return [
            'border' => [
                'type' => 'select',
                'label' => 'Border',
                'default' => 'none',
                'options' => [
                    'none' => 'None',
                    'thin' => 'Thin',
                    'thick' => 'Thick',
                ]
            ],
            'background' => [
                'type' => 'select',
                'label' => 'Background color',
                'options' => [
                    'ui-bg-card' => 'Background Card',
                    'ui-bg' => 'Background',
                    'ui-bg-alt' => 'Background Alt',
                    'primary' => 'Primary',
                    'secondary' => 'Secondary',
                ],
                'default' => 'ui-bg-card',
            ],
        ];
    }
}