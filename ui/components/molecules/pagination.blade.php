@props([
    'current' => 1,
    'total'   => 1,
    'urlFor'  => null,
    'previousLabel' => 'Previous',
    'nextLabel'     => 'Next',
])
@php
    $current = max(1, (int) $current);
    $total   = max(1, (int) $total);

    $url = is_callable($urlFor)
        ? $urlFor
        : (is_string($urlFor) ? fn ($p) => str_replace('{page}', (string) $p, $urlFor) : fn ($p) => '?page=' . $p);

    $window = 1;
    $pages = [];
    for ($i = 1; $i <= $total; $i++) {
        if ($i === 1 || $i === $total || abs($i - $current) <= $window) {
            $pages[] = $i;
        } elseif (end($pages) !== '…') {
            $pages[] = '…';
        }
    }
@endphp
<nav role="navigation" aria-label="Pagination" {{ $attributes->merge(['class' => 'flex items-center gap-1']) }}>
    <a href="{{ $current > 1 ? $url($current - 1) : '#' }}"
       @if($current <= 1) aria-disabled="true" tabindex="-1" @endif
       class="inline-flex items-center gap-1 rounded-md border border-neutral-300 dark:border-neutral-700 px-2.5 py-1.5 text-sm hover:bg-neutral-50 dark:hover:bg-neutral-800 aria-disabled:opacity-50 aria-disabled:cursor-not-allowed">
        <x-atoms::icon name="chevron-left" size="sm" />
        <span class="sr-only sm:not-sr-only">{{ $previousLabel }}</span>
    </a>
    @foreach($pages as $p)
        @if($p === '…')
            <span class="px-2 text-neutral-400" aria-hidden="true">…</span>
        @elseif($p === $current)
            <span aria-current="page" class="inline-flex h-8 min-w-8 items-center justify-center rounded-md bg-primary-600 px-2 text-sm font-medium text-white">{{ $p }}</span>
        @else
            <a href="{{ $url($p) }}" class="inline-flex h-8 min-w-8 items-center justify-center rounded-md border border-neutral-300 dark:border-neutral-700 px-2 text-sm hover:bg-neutral-50 dark:hover:bg-neutral-800">{{ $p }}</a>
        @endif
    @endforeach
    <a href="{{ $current < $total ? $url($current + 1) : '#' }}"
       @if($current >= $total) aria-disabled="true" tabindex="-1" @endif
       class="inline-flex items-center gap-1 rounded-md border border-neutral-300 dark:border-neutral-700 px-2.5 py-1.5 text-sm hover:bg-neutral-50 dark:hover:bg-neutral-800 aria-disabled:opacity-50 aria-disabled:cursor-not-allowed">
        <span class="sr-only sm:not-sr-only">{{ $nextLabel }}</span>
        <x-atoms::icon name="chevron-right" size="sm" />
    </a>
</nav>
