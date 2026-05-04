@props([
    'label'    => null,
    'align'    => 'left',
    'width'    => 'w-48',
])
<div x-data="{ open: false }" @keydown.escape.window="open = false" @click.outside="open = false" {{ $attributes->merge(['class' => 'relative inline-block']) }}>
    <button
        type="button"
        @click="open = !open"
        :aria-expanded="open.toString()"
        aria-haspopup="menu"
        class="inline-flex items-center gap-1.5 rounded-md border border-neutral-300 dark:border-neutral-700 bg-white dark:bg-neutral-900 px-3 py-2 text-sm font-medium hover:bg-neutral-50 dark:hover:bg-neutral-800"
    >
        <span>{{ $label }}</span>
        <x-atoms::icon name="chevron-down" size="sm" />
    </button>
    <div
        x-show="open"
        x-transition.opacity
        x-cloak
        role="menu"
        class="absolute z-dropdown mt-1 {{ $width }} {{ $align === 'right' ? 'right-0' : 'left-0' }} rounded-md border border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-900 shadow-md py-1"
    >
        {{ $slot }}
    </div>
</div>
