@props([
    'value'        => '',
    'label'        => 'Copy',
    'copiedLabel'  => 'Copied',
    'size'         => 'sm',
])
<button
    type="button"
    x-data="{ copied: false, async copy(){ try { await navigator.clipboard.writeText(@js($value)); this.copied = true; setTimeout(() => this.copied = false, 1500); } catch(e){} } }"
    @click="copy()"
    :aria-label="copied ? @js($copiedLabel) : @js($label)"
    {{ $attributes->merge(['class' => 'inline-flex items-center gap-1.5 rounded-md border border-neutral-300 dark:border-neutral-700 bg-white dark:bg-neutral-900 px-2.5 py-1.5 text-xs font-medium hover:bg-neutral-50 dark:hover:bg-neutral-800 transition-colors']) }}
>
    <template x-if="!copied"><x-atoms::icon name="copy" size="sm" /></template>
    <template x-if="copied"><x-atoms::icon name="check" size="sm" class="text-success-600" /></template>
    <span x-text="copied ? @js($copiedLabel) : @js($label)">{{ $label }}</span>
</button>
