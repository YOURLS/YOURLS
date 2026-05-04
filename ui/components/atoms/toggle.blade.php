@props([
    'name'    => null,
    'id'      => null,
    'value'   => '1',
    'checked' => false,
    'disabled'=> false,
    'label'   => null,
])
<label class="inline-flex items-center gap-3 cursor-pointer">
    <span class="relative">
        <input
            type="checkbox"
            class="peer sr-only"
            @if($name) name="{{ $name }}" @endif
            @if($id) id="{{ $id }}" @endif
            value="{{ $value }}"
            @if($checked) checked @endif
            @if($disabled) disabled @endif
        />
        <span class="block h-5 w-9 rounded-full bg-neutral-300 dark:bg-neutral-700 peer-checked:bg-primary-600 transition-colors duration-fast"></span>
        <span class="absolute top-0.5 left-0.5 h-4 w-4 rounded-full bg-white shadow-sm transition-transform duration-fast peer-checked:translate-x-4"></span>
    </span>
    @if($label)<span class="text-sm text-neutral-800 dark:text-neutral-200">{{ $label }}</span>@elseif(trim($slot) !== '')<span class="text-sm text-neutral-800 dark:text-neutral-200">{{ $slot }}</span>@endif
</label>
