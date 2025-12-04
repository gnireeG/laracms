<div class="bg-white rounded-lg shadow-md p-6">
    <h3 class="text-xl font-bold mb-2">{{ $this->getData('heading', 'Card') }}</h3>
    <p class="text-gray-600">{!! $this->getData('text', '') !!}</p>
    @include('laracms::editor')
    @if($this->hasChildren())
        <div class="mt-4 space-y-4">
            @foreach($children as $child)
                @livewire('laracms-component-renderer', ['component' => $child, 'editMode' => $editMode], key($child['id']))
            @endforeach
        </div>
    @endif
</div>