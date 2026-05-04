@props(['tone' => 'info', 'dismissible' => false])
@php
    $tones = [
        'info'    => ['bg' => 'bg-info-50 dark:bg-info-950',       'border' => 'border-info-200 dark:border-info-800',       'text' => 'text-info-800 dark:text-info-200',       'icon' => 'info'],
        'success' => ['bg' => 'bg-success-50 dark:bg-success-950', 'border' => 'border-success-200 dark:border-success-800', 'text' => 'text-success-800 dark:text-success-200', 'icon' => 'check'],
        'warning' => ['bg' => 'bg-warning-50 dark:bg-warning-950', 'border' => 'border-warning-200 dark:border-warning-800', 'text' => 'text-warning-800 dark:text-warning-200', 'icon' => 'alert'],
        'danger'  => ['bg' => 'bg-danger-50 dark:bg-danger-950',   'border' => 'border-danger-200 dark:border-danger-800',   'text' => 'text-danger-800 dark:text-danger-200',   'icon' => 'alert'],
        'notice'  => ['bg' => 'bg-neutral-50 dark:bg-neutral-900', 'border' => 'border-neutral-200 dark:border-neutral-800', 'text' => 'text-neutral-800 dark:text-neutral-100', 'icon' => 'info'],
    ];
    $t = $tones[$tone] ?? $tones['info'];
@endphp
<div role="status" {{ $attributes->merge(['class' => 'flex items-start gap-3 rounded-md border ' . $t['bg'] . ' ' . $t['border'] . ' ' . $t['text'] . ' p-3 text-sm']) }}>
    <x-atoms::icon :name="$t['icon']" size="md" class="mt-0.5 shrink-0" />
    <div class="flex-1 min-w-0">{{ $slot }}</div>
    @if($dismissible)
        <button type="button" aria-label="Dismiss" onclick="this.parentElement.remove()" class="shrink-0 inline-flex h-6 w-6 items-center justify-center rounded hover:bg-black/5 dark:hover:bg-white/5">
            <x-atoms::icon name="x" size="sm" />
        </button>
    @endif
</div>
