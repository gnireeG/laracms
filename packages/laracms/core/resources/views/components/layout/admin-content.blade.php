@props(['title', 'breadcrumbs' => []])
<div class="p-2 sm:p-4 md:p-8">
    <div class="mb-4 text-sm flex gap-2">
        @foreach($breadcrumbs as $breadcrumb)
            <a href="{{ $breadcrumb['url'] }}" class="hover:underline" wire:navigate>{{ $breadcrumb['label'] }}</a>&nbsp;/&nbsp;
        @endforeach
        <p class="opacity-60">{{ $title }}</p>
    </div>
    <x-laracms::heading>{{ $title }}</x-laracms::heading>
    <x-laracms::separator class="my-8" />
    <main>{{ $slot }}</main>
</div>