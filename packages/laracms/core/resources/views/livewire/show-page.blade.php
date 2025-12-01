<div>
    <div class="flex gap-2 text-sm mb-6">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!$loop->last)
                <a href="{{ $breadcrumb['url'] }}" class="text-blue-600 hover:underline" wire:navigate>{{ $breadcrumb['title'] }}</a>
                <span>/</span>
            @else
                <span class="text-gray-500">{{ $breadcrumb['title'] }}</span>
            @endif
        @endforeach
    </div>
    <h1 class="text-3xl font-bold mb-4">{{ $page->title }}</h1>
    @foreach($page->content as $component)
        @livewire('laracms-component-renderer', ['component' => $component], key($component['id']))
    @endforeach
</div>