<x-laracms::layout.admin-content class="p-8" :title="$page->title" :breadcrumbs="[
    ['label' => 'All Pages', 'url' => route('admin.pages')], ...$this->breadcrumbs]">
    <x-slot name="actions">
        <x-laracms::button icon="pencil" variant="primary" size="md" wire:navigate>Site builder</x-laracms::button>
    </x-slot>
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-4 xl:col-span-3 p-4 bg-background-card border border-border">
            <x-laracms::heading level="3" class="mb-4">Subpages</x-laracms::heading>
            <ul>
                @forelse($page->children as $child)
                    <li class="mb-2">
                        <x-laracms::icon name="chevron-right" size="sm" /><a href="{{ route('admin.pages.edit', $child->id) }}" class="text-primary hover:text-secondary" wire:navigate>{{ $child->title }}</a>
                    </li>
                @empty
                    <li>No subpages found.</li>
                @endforelse
            </ul>
        </div>
        <div class="col-span-12 md:col-span-8 xl:col-span-9">
            <x-laracms::form class="flex flex-col gap-4" wire:submit="save">
                <x-laracms::form.input label="Title" wire:model="title" required />
                <x-laracms::form.input label="Slug" wire:model="slug" required />
                <x-laracms::form.input label="URL" wire:model="url" disabled />
                <x-laracms::form.checkbox label="Published" wire:model="is_published" />
                <div class="flex justify-end"><x-laracms::button type="submit" icon="floppy" variant="primary" iconposition="left" size="md">Save</x-laracms::button></div>
            </x-laracms::form>
        </div>
    </div>
    <textarea wire:model="content" class="w-full h-96 border border-ui-border rounded-ui-md p-4 mt-8"></textarea>
</x-laracms::layout.admin-content>