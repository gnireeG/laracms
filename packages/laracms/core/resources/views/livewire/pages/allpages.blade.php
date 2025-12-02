<div class="p-8">
    <h1>All pages</h1>
    <div class="mt-4">
        <x-laracms::table class="w-full">
            <x-laracms::table.head>
                <x-laracms::table.heading>Title</x-laracms::table.heading>
                <x-laracms::table.heading>Last Modified</x-laracms::table.heading>
                <x-laracms::table.heading align="center">Actions</x-laracms::table.heading>
            </x-laracms::table.head>
            <x-laracms::table.body>
                @foreach($rootpages as $page)
                    <x-laracms::table.row class="border-b border-ui-border">
                        <x-laracms::table.data><a href="{{ route('admin.pages.edit', $page) }}" wire:navigate class="text-primary hover:underline">{{ $page->title }}</a></x-laracms::table.data>
                        <x-laracms::table.data>{{ $page->updated_at->format('d.m.Y, H:i') }}</x-laracms::table.data>
                        <x-laracms::table.data align="center">
                            <x-laracms::button size="sm" icon="pencil" />
                        </x-laracms::table.data>
                    </x-laracms::table.row>
                @endforeach
            </x-laracms::table.body>
        </x-laracms::table>
    </div>
</div>