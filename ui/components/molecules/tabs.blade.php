@props([
    'tabs'   => [],
    'active' => null,
    'idPrefix' => 'tabs',
])
@php
    $active = $active ?? (array_key_first($tabs) ?? null);
@endphp
@php
    $tabKeys = array_keys($tabs);
    $tabKeysJs = json_encode($tabKeys);
@endphp
<div
    x-data="{
        active: @js($active),
        keys: {{ $tabKeysJs }},
        focusTab(idx) {
            const key = this.keys[(idx + this.keys.length) % this.keys.length];
            this.active = key;
            this.$nextTick(() => this.$root.querySelector(`#${@js($idPrefix)}-tab-${key}`)?.focus());
        },
    }"
    {{ $attributes->merge(['class' => 'space-y-4']) }}
>
    <div role="tablist" aria-orientation="horizontal" class="flex items-center gap-1 border-b border-neutral-200 dark:border-neutral-800">
        @foreach($tabs as $key => $label)
            <button
                type="button"
                role="tab"
                id="{{ $idPrefix }}-tab-{{ $key }}"
                aria-controls="{{ $idPrefix }}-panel-{{ $key }}"
                :aria-selected="active === @js($key)"
                @click="active = @js($key)"
                @keydown.right.prevent="focusTab(keys.indexOf(active) + 1)"
                @keydown.left.prevent="focusTab(keys.indexOf(active) - 1)"
                @keydown.home.prevent="focusTab(0)"
                @keydown.end.prevent="focusTab(keys.length - 1)"
                :tabindex="active === @js($key) ? 0 : -1"
                :class="active === @js($key) ? 'border-primary-600 text-primary-700 dark:text-primary-300' : 'border-transparent text-neutral-600 dark:text-neutral-400 hover:text-neutral-900 dark:hover:text-neutral-100'"
                class="-mb-px px-3 py-2 text-sm font-medium border-b-2 transition-colors focus-visible:outline-none focus-visible:ring focus-visible:ring-primary-500"
            >
                {{ $label }}
            </button>
        @endforeach
    </div>
    <div>{{ $slot }}</div>
</div>
