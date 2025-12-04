<?php

namespace Laracms\Core\Livewire\Components;

use Livewire\Component;
use Livewire\Attributes\On;

class Notification extends Component
{

    public $notifications = [];

    #[On('notification')]
    public function showNotification($notification)
    {
        $this->js('Alpine.store("notifications").addNotification("'.$notification['message'].'", "'.$notification['type'].'");');
    }

    public function render()
    {
        return view('laracms::livewire.components.notification');
    }
}