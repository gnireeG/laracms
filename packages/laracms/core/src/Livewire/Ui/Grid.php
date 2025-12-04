<?php

namespace Laracms\Core\Livewire\Ui;

use Laracms\Core\UiComponent;

class Grid extends UiComponent
{
    public function render()
    {
        return view('laracms::livewire.ui.grid');
    }

    public static function getComponentName(): string
    {
        return 'Grid';
    }

    public static function getComponentCategory(): string
    {
        return 'layout';
    }

    public static function getComponentIcon(): string
    {
        return 'view-grid';
    }

    public static function getSchema(): array
    {
        return [
            'columns' => [
                'type' => 'number',
                'label' => 'Columns',
                'default' => 3,
                'min' => 1,
                'max' => 12,
            ],
            'gap' => [
                'type' => 'select',
                'label' => 'Gap',
                'options' => [
                    '0' => 'None',
                    '1rem' => 'Small',
                    '2rem' => 'Large',
                ],
                'default' => '1rem',
            ],
        ];
    }
}