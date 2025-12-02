<?php

namespace Laracms\Core\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Laracms\Core\Models\Page;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;;
use Livewire\Attributes\Locked;

#[Layout('laracms::layouts.admin')]
#[Title('Edit page')]
class Edit extends Component
{

    public Page $page;

    #[Rule('required|string|max:255|min:3')]
    public $title = '';
    #[Rule('required|string|max:255')]
    public $slug = '';
    #[Rule('json|nullable')]
    public $content = '';
    #[Rule('boolean')]
    public $is_published = false;
    #[Locked]
    public $url = '';

    #[Computed]
    public function breadcrumbs(): array
    {
        $breadcrumbs = $this->page->breadcrumbs();

        // Remove last item (current page)
        array_pop($breadcrumbs);

        $crumbs = [];
        foreach ($breadcrumbs as $crumb) {
            $crumbs[] = [
                'label' => $crumb['title'],
                'url' => route('admin.pages.edit', $crumb['id']),
            ];
        }
        return $crumbs;
    }

    public function save()
    {
        sleep(1);
        $validated = $this->validate();
        $this->page->title = $validated['title'];
        $this->page->slug = $validated['slug'];
        $this->page->is_published = $validated['is_published'];
        $this->page->content = json_decode($validated['content'], true);
        $this->page->save();
        $this->page = $this->page->fresh();
        $this->fillForm();
        session()->flash('message', 'Page saved successfully.');
    }

    public function mount(){
        $this->fillForm();
    }

    public function fillForm()
    {
        $this->title = $this->page->title;
        $this->is_published = $this->page->is_published;
        $this->slug = $this->page->slug;
        $this->url = $this->page->url;
        $this->content = json_encode($this->page->content, JSON_PRETTY_PRINT);
    }

    public function render()
    {
        return view('laracms::livewire.pages.edit');
    }
}