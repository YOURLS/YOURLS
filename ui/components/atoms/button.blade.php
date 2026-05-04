@props([
    'variant' => 'primary',
    'size'    => 'md',
    'type'    => 'button',
    'loading' => false,
    'disabled'=> false,
    'icon'    => null,
])
@php
    $base = 'inline-flex items-center justify-center gap-2 font-medium rounded-md transition-colors duration-fast disabled:opacity-50 disabled:cursor-not-allowed focus-visible:outline-none focus-visible:ring focus-visible:ring-offset-1';

    $variants = [
        'primary'   => 'bg-primary-600 hover:bg-primary-700 text-white border border-transparent',
        'secondary' => 'bg-white hover:bg-neutral-50 text-neutral-800 border border-neutral-300 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-100 dark:border-neutral-700',
        'ghost'     => 'bg-transparent hover:bg-neutral-100 text-neutral-800 dark:text-neutral-100 dark:hover:bg-neutral-800 border border-transparent',
        'danger'    => 'bg-danger-600 hover:bg-danger-700 text-white border border-transparent',
        'success'   => 'bg-success-600 hover:bg-success-700 text-white border border-transparent',
    ];

    $sizes = [
        'sm' => 'text-xs px-2.5 py-1.5',
        'md' => 'text-sm px-3.5 py-2',
        'lg' => 'text-base px-5 py-2.5',
    ];

    $classes = trim($base . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . ($sizes[$size] ?? $sizes['md']));
@endphp
<button
    type="{{ $type }}"
    @if($disabled || $loading) disabled aria-disabled="true" @endif
    {{ $attributes->merge(['class' => $classes]) }}
>
    @if($loading)
        <svg class="animate-spin h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-opacity="0.25" stroke-width="3"></circle>
            <path d="M22 12a10 10 0 0 1-10 10" stroke="currentColor" stroke-width="3" stroke-linecap="round"></path>
        </svg>
    @elseif($icon)
        <x-atoms::icon :name="$icon" class="h-4 w-4" />
    @endif
    <span>{{ $slot }}</span>
</button>
