@props([
    'tone'      => 'neutral',
    'closable'  => false,
    'closeLabel'=> 'Remove',
])
@php
    $tones = [
        'neutral' => 'bg-neutral-100 text-neutral-800 dark:bg-neutral-800 dark:text-neutral-200',
        'primary' => 'bg-primary-50  text-primary-800 dark:bg-primary-950 dark:text-primary-200',
    ];
    $classes = 'inline-flex items-center gap-1.5 rounded-md px-2 py-0.5 text-xs font-medium border border-transparent '
        . ($tones[$tone] ?? $tones['neutral']);
@endphp
<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
    @if($closable)
        <button type="button" aria-label="{{ $closeLabel }}" class="ml-1 inline-flex h-3.5 w-3.5 items-center justify-center rounded-full hover:bg-black/10 dark:hover:bg-white/10">
            <svg class="h-2.5 w-2.5" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                <path d="M2 2l8 8M10 2l-8 8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>
    @endif
</span>
