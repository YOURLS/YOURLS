@props(['tone' => 'muted', 'id' => null])
@php
    $tones = [
        'muted'  => 'text-neutral-500 dark:text-neutral-400',
        'error'  => 'text-danger-600',
        'success'=> 'text-success-600',
    ];
@endphp
<p
    @if($id) id="{{ $id }}" @endif
    {{ $attributes->merge(['class' => 'text-xs ' . ($tones[$tone] ?? $tones['muted'])]) }}
>{{ $slot }}</p>
