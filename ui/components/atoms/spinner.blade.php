@props(['size' => 'md', 'label' => 'Loading'])
@php
    $sizes = ['sm' => 'h-4 w-4', 'md' => 'h-5 w-5', 'lg' => 'h-7 w-7'];
@endphp
<span role="status" {{ $attributes->merge(['class' => 'inline-block']) }}>
    <svg class="animate-spin {{ $sizes[$size] ?? $sizes['md'] }} text-current" viewBox="0 0 24 24" fill="none" aria-hidden="true">
        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-opacity="0.25" stroke-width="3"></circle>
        <path d="M22 12a10 10 0 0 1-10 10" stroke="currentColor" stroke-width="3" stroke-linecap="round"></path>
    </svg>
    <span class="sr-only">{{ $label }}</span>
</span>
