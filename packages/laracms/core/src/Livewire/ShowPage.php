<?php

namespace Laracms\Core\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Laracms\Core\Models\Page;

#[Layout('layouts.app')]
class ShowPage extends Component
{

    public $page = null;

    public function mount($url)
    {
        $this->page = Page::where('url', '/' . $url)->where('is_published', true)->firstOrFail();
        
    }

    public function render()
    {
        return view('laracms::livewire.show-page')->title($this->page->title);
    }
}