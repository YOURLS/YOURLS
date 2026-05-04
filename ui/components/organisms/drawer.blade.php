@props(['name', 'side' => 'right', 'title' => ''])
<div
    x-data
    x-show="$store.modals.is(@js($name))"
    x-cloak
    @keydown.escape.window="$store.modals.hide()"
    class="fixed inset-0 z-modal flex {{ $side === 'left' ? 'justify-start' : 'justify-end' }}"
    role="dialog"
    aria-modal="true"
>
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" @click="$store.modals.hide()"></div>
    <div class="relative h-full w-full max-w-md bg-white dark:bg-neutral-900 shadow-xl flex flex-col"
         x-transition:enter="transition transform"
         x-transition:enter-start="{{ $side === 'left' ? '-translate-x-full' : 'translate-x-full' }}"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition transform"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="{{ $side === 'left' ? '-translate-x-full' : 'translate-x-full' }}"
    >
        <header class="px-5 py-4 border-b border-neutral-200 dark:border-neutral-800 flex items-center justify-between">
            <h2 class="text-base font-semibold">{{ $title }}</h2>
            <x-atoms::icon-button icon="x" label="Close" @click="$store.modals.hide()" />
        </header>
        <div class="flex-1 overflow-auto p-5">{{ $slot }}</div>
        @isset($footer)<footer class="px-5 py-3 border-t border-neutral-200 dark:border-neutral-800">{{ $footer }}</footer>@endisset
    </div>
</div>
