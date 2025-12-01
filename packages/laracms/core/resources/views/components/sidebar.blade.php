<nav class="fixed h-screen w-64 bg-background-card flex flex-col justify-between p-2 border-r border-border" x-data="{}">
    <div>
        <x-laracms::logo />
        <div class="mt-8">
            <livewire:laracms-navigation />
        </div>
    </div>
    <div>
        <livewire:laracms-theme-toggle />
        <div class="mt-4">
            <x-laracms::dropdown position="top" class="w-full">
                <x-slot name="trigger">
                    <button class="w-full flex justify-between cursor-pointer items-center hover:bg-background px-3 py-1.5 rounded-md">
                        <span>{{ auth()->user()->name }}</span>
                        <x-laracms::icon name="chevron-expand" />
                    </button>
                </x-slot>
                <div class="bg-background rounded-md flex flex-col p-2 border border-border">
                    <p class="text-lg font-bold px-3">{{ auth()->user()->name }}</p>
                    <p class="px-3 text-sm">{{ auth()->user()->email }}</p>
                    <x-laracms::separator class="my-2" />
                    <div class="flex flex-col gap-2">
                        <a class="w-full block"><x-laracms::button class="w-full" variant="ghost" icon="person">Profile</x-laracms::button></a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-laracms::button type="submit" variant="danger" class="block w-full" icon="box-arrow-left">Logout</x-laracms::button>
                        </form>
                    </div>
                </div>
            </x-laracms::dropdown>
        </div>
    </div>
</nav>