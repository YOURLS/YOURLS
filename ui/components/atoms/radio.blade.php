@props([
    'name',
    'options' => [],
    'selected'=> null,
    'inline'  => false,
])
<div class="{{ $inline ? 'inline-flex gap-4' : 'flex flex-col gap-2' }}" role="radiogroup">
    @foreach($options as $value => $display)
        <label class="inline-flex items-center gap-2 text-sm text-neutral-800 dark:text-neutral-200">
            <input
                type="radio"
                name="{{ $name }}"
                value="{{ $value }}"
                @checked((string) $selected === (string) $value)
                class="h-4 w-4 border-neutral-300 text-primary-600 focus-visible:ring-primary-500"
            />
            {{ $display }}
        </label>
    @endforeach
</div>
