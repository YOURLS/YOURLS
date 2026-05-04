@props(['orientation' => 'horizontal', 'label' => null])
@if($label)
    <div class="relative my-4" role="separator" aria-orientation="{{ $orientation }}">
        <div class="absolute inset-0 flex items-center" aria-hidden="true">
            <span class="w-full border-t border-neutral-200 dark:border-neutral-800"></span>
        </div>
        <div class="relative flex justify-center text-xs">
            <span class="bg-white dark:bg-neutral-900 px-2 text-neutral-500">{{ $label }}</span>
        </div>
    </div>
@elseif($orientation === 'vertical')
    <span class="inline-block self-stretch w-px bg-neutral-200 dark:bg-neutral-800" role="separator" aria-orientation="vertical"></span>
@else
    <hr {{ $attributes->merge(['class' => 'my-4 border-t border-neutral-200 dark:border-neutral-800']) }} />
@endif
