@props([
    'name'        => null,
    'id'          => null,
    'value'       => '',
    'rows'        => 4,
    'placeholder' => null,
    'required'    => false,
    'disabled'    => false,
    'readonly'    => false,
    'invalid'     => false,
])
@php
    $base = 'block w-full rounded-md bg-white dark:bg-neutral-900 text-neutral-900 dark:text-neutral-100 placeholder:text-neutral-400 border text-sm px-3 py-2 focus-visible:outline-none focus-visible:ring transition-colors disabled:opacity-50';
    $border = $invalid ? 'border-danger-500 focus:border-danger-500' : 'border-neutral-300 dark:border-neutral-700 focus:border-primary-500';
@endphp
<textarea
    @if($name) name="{{ $name }}" @endif
    @if($id) id="{{ $id }}" @endif
    rows="{{ $rows }}"
    @if($placeholder) placeholder="{{ $placeholder }}" @endif
    @if($required) required aria-required="true" @endif
    @if($disabled) disabled @endif
    @if($readonly) readonly @endif
    @if($invalid) aria-invalid="true" @endif
    {{ $attributes->merge(['class' => $base . ' ' . $border]) }}
>{{ $value }}</textarea>
