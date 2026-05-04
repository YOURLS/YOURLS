@props([
    'src'      => null,
    'alt'      => '',
    'initials' => null,
    'size'     => 'md',
])
@php
    $sizes = [
        'sm' => 'h-7 w-7 text-xs',
        'md' => 'h-9 w-9 text-sm',
        'lg' => 'h-12 w-12 text-base',
    ];
    $classes = 'inline-flex items-center justify-center rounded-full bg-neutral-200 text-neutral-700 dark:bg-neutral-700 dark:text-neutral-200 font-medium overflow-hidden '
        . ($sizes[$size] ?? $sizes['md']);
@endphp
<span {{ $attributes->merge(['class' => $classes]) }}>
    @if($src)
        <img src="{{ $src }}" alt="{{ $alt }}" class="h-full w-full object-cover" />
    @elseif($initials)
        <span aria-hidden="true">{{ $initials }}</span>
        <span class="sr-only">{{ $alt ?: $initials }}</span>
    @else
        <svg class="h-1/2 w-1/2" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M12 12c2.5 0 4.5-2 4.5-4.5S14.5 3 12 3 7.5 5 7.5 7.5 9.5 12 12 12zm0 1.5c-3 0-9 1.5-9 4.5V21h18v-3c0-3-6-4.5-9-4.5z"/>
        </svg>
    @endif
</span>
