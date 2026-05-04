@props(['icon' => 'info', 'title' => '', 'description' => null])
<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center text-center p-8 gap-3']) }}>
    <x-atoms::icon :name="$icon" size="xl" class="text-neutral-400" />
    @if($title)<h3 class="text-base font-semibold text-neutral-900 dark:text-neutral-100">{{ $title }}</h3>@endif
    @if($description)<p class="text-sm text-neutral-500 dark:text-neutral-400 max-w-md">{{ $description }}</p>@endif
    @isset($action)<div>{{ $action }}</div>@endisset
</div>
