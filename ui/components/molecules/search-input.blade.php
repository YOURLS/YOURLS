@props([
    'name'        => 'q',
    'value'       => '',
    'placeholder' => 'Search…',
    'id'          => null,
    'clearLabel'  => 'Clear search',
])
<div {{ $attributes->merge(['class' => 'relative']) }} x-data="{ q: @js($value) }">
    <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-neutral-400">
        <x-atoms::icon name="search" />
    </span>
    <input
        type="search"
        name="{{ $name }}"
        @if($id) id="{{ $id }}" @endif
        placeholder="{{ $placeholder }}"
        x-model="q"
        class="block w-full rounded-md bg-white dark:bg-neutral-900 text-sm pl-9 pr-9 py-2 border border-neutral-300 dark:border-neutral-700 focus:border-primary-500 focus-visible:outline-none focus-visible:ring"
    />
    <button
        type="button"
        x-show="q.length > 0"
        @click="q = ''"
        aria-label="{{ $clearLabel }}"
        class="absolute inset-y-0 right-2 my-auto h-6 w-6 rounded hover:bg-neutral-100 dark:hover:bg-neutral-800 inline-flex items-center justify-center text-neutral-500"
    >
        <x-atoms::icon name="x" size="sm" />
    </button>
</div>
