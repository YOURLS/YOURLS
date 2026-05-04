@props(['label', 'value', 'icon' => null, 'tone' => 'neutral'])
@php
    $tones = [
        'neutral' => 'text-neutral-500',
        'primary' => 'text-primary-600',
        'success' => 'text-success-600',
        'warning' => 'text-warning-600',
        'danger'  => 'text-danger-600',
    ];
@endphp
<div {{ $attributes->merge(['class' => 'yourls-card p-4 flex items-start gap-3']) }}>
    @if($icon)<x-atoms::icon :name="$icon" size="lg" class="{{ $tones[$tone] ?? $tones['neutral'] }} mt-1" />@endif
    <div class="min-w-0">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ $label }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ $value }}</div>
    </div>
</div>
