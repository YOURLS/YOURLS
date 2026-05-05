{{-- Toast container; consumes the Alpine.store('notices') queue. --}}
<div
    x-data
    aria-live="polite"
    aria-atomic="true"
    {{ $attributes->merge(['class' => 'fixed bottom-4 right-4 z-toast flex flex-col gap-2 w-80 pointer-events-none']) }}
>
    <template x-for="n in $store.notices.items" :key="n.id">
        <div
            x-transition:enter="transition ease-out duration"
            x-transition:enter-start="opacity-0 translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-fast"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="pointer-events-auto rounded-md border bg-white dark:bg-neutral-900 shadow-md p-3 text-sm flex items-start gap-2"
            :class="{
                'border-info-200 text-info-800 dark:border-info-800 dark:text-info-200': n.tone === 'info',
                'border-success-200 text-success-800 dark:border-success-800 dark:text-success-200': n.tone === 'success',
                'border-warning-200 text-warning-800 dark:border-warning-800 dark:text-warning-200': n.tone === 'warning',
                'border-danger-200 text-danger-800 dark:border-danger-800 dark:text-danger-200': n.tone === 'danger',
            }"
        >
            <span class="flex-1 min-w-0" x-text="n.message"></span>
            <button type="button" @click="$store.notices.dismiss(n.id)" aria-label="Dismiss" class="shrink-0 inline-flex h-5 w-5 items-center justify-center rounded hover:bg-black/5 dark:hover:bg-white/5">
                <x-atoms::icon name="x" size="sm" />
            </button>
        </div>
    </template>
</div>
