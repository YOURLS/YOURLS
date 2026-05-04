@props([
    'label'    => null,
    'for'      => null,
    'help'     => null,
    'error'    => null,
    'required' => false,
])
<div {{ $attributes->merge(['class' => 'space-y-1.5']) }}>
    @if($label)
        <x-atoms::label :for="$for" :required="$required">{{ $label }}</x-atoms::label>
    @endif
    {{ $slot }}
    @if($error)
        <x-atoms::help-text tone="error" :id="$for ? $for . '-error' : null">{{ $error }}</x-atoms::help-text>
    @elseif($help)
        <x-atoms::help-text :id="$for ? $for . '-help' : null">{{ $help }}</x-atoms::help-text>
    @endif
</div>
