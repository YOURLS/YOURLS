@props([
    'id',
    'title'        => '',
    'cancelLabel'  => null,
    'confirmLabel' => null,
    'confirmTone'  => 'primary',
    'onConfirm'    => null,
    'onCancel'     => null,
])
{{-- Native <dialog> wrapper. Preserves the legacy id attribute, e.g.
     #delete-confirm-dialog, so plugins that toggle visibility via
     .show()/.close() keep working. --}}
@php
    $cancelLabel  = $cancelLabel  ?? (function_exists('yourls__') ? yourls__('Cancel')  : 'Cancel');
    $confirmLabel = $confirmLabel ?? (function_exists('yourls__') ? yourls__('Confirm') : 'Confirm');
@endphp
<dialog id="{{ $id }}" aria-labelledby="{{ $id }}-title" {{ $attributes->merge(['class' => 'rounded-lg p-0 backdrop:bg-black/40 backdrop:backdrop-blur-sm w-full max-w-md border border-neutral-200 dark:border-neutral-800']) }}>
    <div class="bg-white dark:bg-neutral-900 rounded-lg shadow-xl">
        <header class="px-5 py-4 border-b border-neutral-200 dark:border-neutral-800">
            <h2 id="{{ $id }}-title" class="text-base font-semibold text-neutral-900 dark:text-neutral-100">{{ $title }}</h2>
        </header>
        <div class="p-5 text-sm text-neutral-700 dark:text-neutral-300">
            {{ $slot }}
        </div>
        <footer class="px-5 py-3 border-t border-neutral-200 dark:border-neutral-800 flex items-center justify-end gap-2">
            <x-atoms::button
                type="reset"
                variant="secondary"
                :onclick="$onCancel"
            >{{ $cancelLabel }}</x-atoms::button>
            <x-atoms::button
                type="button"
                :variant="$confirmTone"
                :onclick="$onConfirm"
            >{{ $confirmLabel }}</x-atoms::button>
        </footer>
    </div>
</dialog>
