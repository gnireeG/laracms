@php
    $shadowClass = $this->getData('shadow', true) ? 'shadow-md' : 'shadow-none';
@endphp
<div class="bg-white rounded-lg {{ $shadowClass }} p-6">
    <h3 class="text-xl font-bold mb-2">{{ $this->getData('heading', 'Card') }}</h3>
    <p class="text-gray-600">{{ $this->getData('text', '') }}</p>
    <div>{!! $this->getData('content', '') !!}</div>
    @if($this->hasChildren())
    <div class="mt-4 space-y-4">
        @foreach($children as $child)
            @livewire('laracms-component-renderer', ['component' => $child, 'editMode' => $editMode], key($child['id']))
        @endforeach
    </div>
    @endif
    @include('laracms::editor')
</div>