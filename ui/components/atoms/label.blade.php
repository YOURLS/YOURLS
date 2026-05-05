@props([
    'for'      => null,
    'required' => false,
])
<label
    @if($for) for="{{ $for }}" @endif
    {{ $attributes->merge(['class' => 'block text-sm font-medium text-neutral-800 dark:text-neutral-200']) }}
>
    {{ $slot }}
    @if($required)<span class="text-danger-600 ml-0.5" aria-hidden="true">*</span>@endif
</label>
