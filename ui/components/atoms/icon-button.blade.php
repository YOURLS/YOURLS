@props([
    'icon',
    'label',
    'variant' => 'ghost',
    'size'    => 'md',
    'type'    => 'button',
    'disabled'=> false,
])
@php
    $variants = [
        'primary' => 'bg-primary-600 hover:bg-primary-700 text-white',
        'ghost'   => 'bg-transparent hover:bg-neutral-100 dark:hover:bg-neutral-800 text-neutral-700 dark:text-neutral-200',
        'danger'  => 'bg-transparent hover:bg-danger-50 dark:hover:bg-danger-950 text-danger-600',
    ];
    $sizes = [
        'sm' => 'h-7 w-7',
        'md' => 'h-9 w-9',
        'lg' => 'h-11 w-11',
    ];
    $classes = 'inline-flex items-center justify-center rounded-md transition-colors duration-fast focus-visible:outline-none focus-visible:ring '
        . ($variants[$variant] ?? $variants['ghost']) . ' ' . ($sizes[$size] ?? $sizes['md']);
@endphp
<button
    type="{{ $type }}"
    aria-label="{{ $label }}"
    title="{{ $label }}"
    @if($disabled) disabled aria-disabled="true" @endif
    {{ $attributes->merge(['class' => $classes]) }}
>
    <x-atoms::icon :name="$icon" class="h-4 w-4" />
</button>
