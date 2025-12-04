<?php

namespace Laracms\Core\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Laracms\Core\Models\Page;
use Livewire\Attributes\On;

#[Layout('layouts.app')]
class EditPage extends Component
{

    public $page = null;
    public $tempcontent = [];

    #[On('componentDataUpdated')]
    public function updateContent($payload)
    {
        $this->tempcontent = $this->updateComponentById($this->tempcontent, $payload['id'], $payload);
    }

    /**
     * Recursively search and update component by ID
     */
    private function updateComponentById(array $components, string $targetId, array $newData): array
    {
        foreach ($components as &$component) {
            // If this is the component we're looking for, update it
            if (isset($component['id']) && $component['id'] === $targetId) {
                $component['data'] = $newData['data'];
                $component['children'] = $newData['children'] ?? [];
                return $components;
            }

            // If this component has children, search recursively
            if (isset($component['children']) && is_array($component['children'])) {
                $component['children'] = $this->updateComponentById($component['children'], $targetId, $newData);
            }
        }

        return $components;
    }

    public function mount($url)
    {
        $this->page = Page::where('url', '/' . $url)->where('is_published', true)->firstOrFail();
        $this->tempcontent = $this->page->content;
        
    }
    public function render()
    {
        return view('laracms::livewire.edit-page')->title('Edit Page: ' . $this->page->title);
    }
}