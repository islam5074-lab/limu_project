@props([
    'type' => 'submit',
    'href' => null
])

@if ($type === 'link')
    <a href="{{ $href }}"
       {{ $attributes->merge(['class' => 'px-4 py-2 bg-blue-600 text-white rounded']) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}"
            {{ $attributes->merge(['class' => 'px-4 py-2 bg-blue-600 text-white rounded']) }}>
        {{ $slot }}
    </button>
@endif
