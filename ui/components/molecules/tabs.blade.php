@props([
    'tabs'   => [],
    'active' => null,
    'idPrefix' => 'tabs',
])
@php
    $active = $active ?? (array_key_first($tabs) ?? null);
@endphp
<div x-data="{ active: @js($active) }" {{ $attributes->merge(['class' => 'space-y-4']) }}>
    <div role="tablist" class="flex items-center gap-1 border-b border-neutral-200 dark:border-neutral-800">
        @foreach($tabs as $key => $label)
            <button
                type="button"
                role="tab"
                id="{{ $idPrefix }}-tab-{{ $key }}"
                aria-controls="{{ $idPrefix }}-panel-{{ $key }}"
                :aria-selected="active === @js($key)"
                @click="active = @js($key)"
                :tabindex="active === @js($key) ? 0 : -1"
                :class="active === @js($key) ? 'border-primary-600 text-primary-700 dark:text-primary-300' : 'border-transparent text-neutral-600 dark:text-neutral-400 hover:text-neutral-900 dark:hover:text-neutral-100'"
                class="-mb-px px-3 py-2 text-sm font-medium border-b-2 transition-colors"
            >
                {{ $label }}
            </button>
        @endforeach
    </div>
    <div>{{ $slot }}</div>
</div>
