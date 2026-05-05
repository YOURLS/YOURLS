@props(['legend' => null, 'description' => null])
<fieldset {{ $attributes->merge(['class' => 'space-y-3']) }}>
    @if($legend)
        <legend class="text-sm font-semibold text-neutral-900 dark:text-neutral-100">{{ $legend }}</legend>
    @endif
    @if($description)
        <p class="text-xs text-neutral-500 dark:text-neutral-400">{{ $description }}</p>
    @endif
    <div class="space-y-3">
        {{ $slot }}
    </div>
</fieldset>
