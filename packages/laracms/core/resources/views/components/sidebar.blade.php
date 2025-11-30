<nav class="fixed h-screen w-64 bg-background-secondary flex flex-col justify-between p-6" x-data="{}">
    <div>
        <div class="flex justify-between">
            <img src="laracms-logo.png" alt="LaraCMS Logo" class="h-10">
        </div>
        <div class="mt-8">
            <livewire:laracms-navigation />
        </div>
    </div>
    <div>
        <livewire:laracms-theme-toggle />
        <div class="mt-4">
            <button class="w-full flex justify-between cursor-pointer items-center">
                <span>{{ auth()->user()->name }}</span>
                <x-laracms::icon name="chevron-expand" />
            </button>
        </div>
    </div>
</nav>