@props(['id', 'value' => ''])

<div class="">
    <input class=""
        type="hidden"
        name="{{ $id }}"
        id="{{ $id }}"
        value="{{ $value }}"
    >
    <x-form.error name="{{ $id }}" />
</div>