@props(['level' => '1'])
@php 
    $class = match($level) {
        '1' => 'text-2xl font-bold',
        '2' => 'text-xl font-semibold',
        '3' => 'text-lg font-semibold'
    };
@endphp
<h{{ $level }} class="{{ $class }} {{ $attributes->get('class') }}" {{ $attributes->except('class') }}>
    {{ $slot }}
</h{{ $level }}>