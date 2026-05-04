@props([
    'name'    => null,
    'id'      => null,
    'accept'  => null,
    'multiple'=> false,
    'label'   => 'Choose a file or drop it here',
])
<label
    {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center gap-2 rounded-md border-2 border-dashed border-neutral-300 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-900 p-6 text-sm text-neutral-600 dark:text-neutral-300 cursor-pointer hover:border-primary-400']) }}
>
    <x-atoms::icon name="external" size="lg" class="text-neutral-400" />
    <span>{{ $label }}</span>
    <input
        type="file"
        @if($name) name="{{ $name }}" @endif
        @if($id) id="{{ $id }}" @endif
        @if($accept) accept="{{ $accept }}" @endif
        @if($multiple) multiple @endif
        class="sr-only"
    />
</label>
