<?php

namespace Laracms\Core\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Laracms\Core\Models\Page;

#[Layout('laracms::layouts.admin')]
#[Title('All Pages')]
class Allpages extends Component
{

    public $rootpages = [];

    public function mount(){
        $this->rootpages = Page::whereNull('parent_id')->get();
    }

    public function render()
    {
        return view('laracms::livewire.pages.allpages');
    }
}