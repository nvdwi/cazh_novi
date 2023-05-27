@props(['options' => []])

@php
    $options = array_merge([
        'dateFormat' => 'Y-m-d',
        'enableTime' => false,
        'altFormat' =>  'd/m/Y',
        'altInput' => true
    ], $options);
    $options = preg_replace('/"([^"]+)"\s*:\s*/', '$1:', json_encode($options));
@endphp

<div wire:ignore>
    <input
        x-data
        x-init="flatpickr($refs.input, {{ $options }} );"
        x-ref="input"
        type="text"
        data-input
        {{ $attributes->merge(['class' => 'form-control cursor-pointer']) }}
    />
</div>
