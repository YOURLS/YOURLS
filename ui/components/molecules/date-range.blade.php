@props([
    'nameFrom' => 'date_from',
    'nameTo'   => 'date_to',
    'valueFrom'=> '',
    'valueTo'  => '',
    'idPrefix' => 'daterange',
])
<div {{ $attributes->merge(['class' => 'inline-flex items-center gap-2']) }}>
    <label for="{{ $idPrefix }}-from" class="sr-only">From</label>
    <input
        type="date"
        name="{{ $nameFrom }}"
        id="{{ $idPrefix }}-from"
        value="{{ $valueFrom }}"
        class="rounded-md border border-neutral-300 dark:border-neutral-700 bg-white dark:bg-neutral-900 text-sm px-2.5 py-1.5 focus-visible:outline-none focus-visible:ring"
    />
    <span aria-hidden="true" class="text-neutral-400">→</span>
    <label for="{{ $idPrefix }}-to" class="sr-only">To</label>
    <input
        type="date"
        name="{{ $nameTo }}"
        id="{{ $idPrefix }}-to"
        value="{{ $valueTo }}"
        class="rounded-md border border-neutral-300 dark:border-neutral-700 bg-white dark:bg-neutral-900 text-sm px-2.5 py-1.5 focus-visible:outline-none focus-visible:ring"
    />
</div>
