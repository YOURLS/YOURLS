@props([
    'name'         => null,
    'id'           => null,
    'value'        => '1',
    'checked'      => false,
    'indeterminate'=> false,
    'disabled'     => false,
    'label'        => null,
])
<label class="inline-flex items-center gap-2 text-sm text-neutral-800 dark:text-neutral-200">
    <input
        type="checkbox"
        @if($name) name="{{ $name }}" @endif
        @if($id) id="{{ $id }}" @endif
        value="{{ $value }}"
        @if($checked) checked @endif
        @if($disabled) disabled @endif
        @if($indeterminate)
            x-data="{init(){ $el.indeterminate = true; }}"
            x-init="init()"
        @endif
        {{ $attributes->merge(['class' => 'h-4 w-4 rounded border-neutral-300 text-primary-600 focus-visible:ring-primary-500']) }}
    />
    @if($label){{ $label }}@else{{ $slot }}@endif
</label>
