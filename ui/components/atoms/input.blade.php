@props([
    'type'        => 'text',
    'name'        => null,
    'id'          => null,
    'value'       => '',
    'placeholder' => null,
    'required'    => false,
    'disabled'    => false,
    'readonly'    => false,
    'invalid'     => false,
    'size'        => 'md',
])
@php
    $sizes = [
        'sm' => 'text-xs px-2.5 py-1.5',
        'md' => 'text-sm px-3 py-2',
        'lg' => 'text-base px-3.5 py-2.5',
    ];
    $base = 'block w-full rounded-md bg-white dark:bg-neutral-900 text-neutral-900 dark:text-neutral-100 placeholder:text-neutral-400 border focus-visible:outline-none focus-visible:ring transition-colors disabled:opacity-50 disabled:cursor-not-allowed';
    $border = $invalid ? 'border-danger-500 focus:border-danger-500' : 'border-neutral-300 dark:border-neutral-700 focus:border-primary-500';
    $classes = $base . ' ' . $border . ' ' . ($sizes[$size] ?? $sizes['md']);
@endphp
<input
    type="{{ $type }}"
    @if($name) name="{{ $name }}" @endif
    @if($id) id="{{ $id }}" @endif
    @if($placeholder) placeholder="{{ $placeholder }}" @endif
    @if($required) required aria-required="true" @endif
    @if($disabled) disabled @endif
    @if($readonly) readonly @endif
    @if($invalid) aria-invalid="true" @endif
    value="{{ $value }}"
    {{ $attributes->merge(['class' => $classes]) }}
/>
