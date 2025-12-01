<div>
    @foreach($menu as $item)
        @if($item['type'] === 'group')
            <div x-data="{ open: {{ $item['isOpen'] ? 'true' : 'false' }} }" class="mb-2 rounded-md hover:bg-background" :class="open ? 'bg-background' : ''">
                <button @click="open = !open" class="w-full flex justify-between items-center cursor-pointer px-3 py-1.5">
                    <div>
                        @if($item['icon'])
                            <x-laracms::icon name="{{ $item['icon'] }}" class="inline-block mr-2" />
                        @endif
                        <span>{{ $item['label'] }}</span>
                    </div>
                    <div :class="open ? 'transform rotate-180 transition-transform duration-200' : 'transition-transform duration-200'">
                        <x-laracms::icon name="chevron-down" />
                    </div>
                </button>
                <div x-show="open" class="flex flex-col">
                    @foreach($item['items'] as $subitem)
                            <x-laracms::navlink
                                :href="$subitem['href']"
                                :label="$subitem['label']"
                                :icon="$subitem['icon']"
                                :active="$subitem['active'] ?? false" />
                    @endforeach
                </div>
            </div>
        @else
            <div class="mb-2">
                <x-laracms::navlink
                    :href="$item['href']"
                    :label="$item['label']"
                    :icon="$item['icon']"
                    :rounded="true"
                    :active="$item['active'] ?? false" />
            </div>
        @endif
    @endforeach
</div>