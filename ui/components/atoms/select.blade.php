@props([
    'name'     => null,
    'id'       => null,
    'options'  => [],
    'selected' => null,
    'label'    => null,
    'required' => false,
    'disabled' => false,
    'size'     => 'md',
])
@php
    $sizes = [
        'sm' => 'text-xs px-2.5 py-1.5',
        'md' => 'text-sm px-3 py-2',
        'lg' => 'text-base px-3.5 py-2.5',
    ];
    $classes = 'block w-full rounded-md bg-white dark:bg-neutral-900 text-neutral-900 dark:text-neutral-100 border border-neutral-300 dark:border-neutral-700 focus:border-primary-500 focus-visible:outline-none focus-visible:ring '
        . ($sizes[$size] ?? $sizes['md']);
@endphp
<select
    @if($name) name="{{ $name }}" @endif
    @if($id) id="{{ $id }}" @endif
    @if($label) aria-label="{{ $label }}" @endif
    @if($required) required aria-required="true" @endif
    @if($disabled) disabled @endif
    {{ $attributes->merge(['class' => $classes]) }}
>
    @foreach($options as $value => $display)
        <option value="{{ $value }}" @selected((string) $selected === (string) $value)>{{ $display }}</option>
    @endforeach
</select>
