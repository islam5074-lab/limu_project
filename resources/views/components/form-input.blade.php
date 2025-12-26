@props([
    'label',
    'name',
    'type' => 'text',
    'value' => '',
    'placeholder' => ''
])

<div class="mb-4">
    <label class="block mb-1 font-semibold">
        {{ $label }}
    </label>

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'w-full border p-2 rounded']) }}
    >
</div>
