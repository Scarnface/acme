@props(['name', 'value', 'type' => 'text'])

<x-form.field>
    <x-form.label name="{{ str_replace('_', ' ', $name) }}"/>

    <input class="border border-gray-400 p-2 w-full"
           type="{{ $type }}"
           name="{{ $name }}"
           id="{{ $name }}"
           value="{{ old($value) ? old($value) : $value}}"
           required
    >
</x-form.field>
