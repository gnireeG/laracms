<div>
    @foreach($menu as $item)
        @if($item['type'] === 'group')
            <div x-data="{ open: true }" class="mb-4">
                <button @click="open = !open" class="w-full flex justify-between items-center cursor-pointer">
                    <div>
                        @if($item['icon'])
                            <x-laracms::icon name="{{ $item['icon'] }}" class="inline-block mr-2" />
                        @endif
                        <span>{{ $item['label'] }}</span>
                    </div>
                    <div :class="!open ? 'transform rotate-180 transition-transform duration-200' : 'transition-transform duration-200'">
                        <x-laracms::icon name="chevron-up" />
                    </div>
                </button>
                <div x-show="open">
                    @foreach($item['items'] as $subitem)
                        <div>{{ $subitem['label'] }}</div>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
</div>