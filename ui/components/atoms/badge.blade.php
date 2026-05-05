@props([
    'tone' => 'neutral',
    'dot'  => false,
])
@php
    $tones = [
        'neutral' => 'bg-neutral-100 text-neutral-800 dark:bg-neutral-800 dark:text-neutral-200',
        'primary' => 'bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-200',
        'success' => 'bg-success-100 text-success-800 dark:bg-success-900 dark:text-success-200',
        'warning' => 'bg-warning-100 text-warning-800 dark:bg-warning-900 dark:text-warning-200',
        'danger'  => 'bg-danger-100 text-danger-800 dark:bg-danger-900 dark:text-danger-200',
        'info'    => 'bg-info-100 text-info-800 dark:bg-info-900 dark:text-info-200',
    ];
    $dotTones = [
        'neutral' => 'bg-neutral-500',
        'primary' => 'bg-primary-500',
        'success' => 'bg-success-500',
        'warning' => 'bg-warning-500',
        'danger'  => 'bg-danger-500',
        'info'    => 'bg-info-500',
    ];
    $classes = 'inline-flex items-center gap-1.5 rounded-full px-2.5 py-0.5 text-xs font-medium '
        . ($tones[$tone] ?? $tones['neutral']);
@endphp
<span {{ $attributes->merge(['class' => $classes]) }}>
    @if($dot)<span class="h-1.5 w-1.5 rounded-full {{ $dotTones[$tone] ?? $dotTones['neutral'] }}" aria-hidden="true"></span>@endif
    {{ $slot }}
</span>
