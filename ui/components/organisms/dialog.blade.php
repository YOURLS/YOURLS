@props(['id', 'title' => '', 'tone' => 'info'])
@php
    $tones = ['info' => 'info', 'success' => 'check', 'warning' => 'alert', 'danger' => 'alert'];
@endphp
<dialog id="{{ $id }}" @if($title) aria-labelledby="{{ $id }}-title" @endif {{ $attributes->merge(['class' => 'rounded-lg p-0 backdrop:bg-black/40 w-full max-w-sm border border-neutral-200 dark:border-neutral-800']) }}>
    <div class="bg-white dark:bg-neutral-900 rounded-lg shadow-xl p-5 flex items-start gap-3">
        <x-atoms::icon :name="$tones[$tone] ?? 'info'" size="lg" class="mt-0.5 text-{{ $tone === 'danger' ? 'danger' : ($tone === 'success' ? 'success' : 'primary') }}-600" />
        <div class="flex-1 min-w-0">
            @if($title)<h2 id="{{ $id }}-title" class="text-base font-semibold mb-1">{{ $title }}</h2>@endif
            <div class="text-sm text-neutral-700 dark:text-neutral-300">{{ $slot }}</div>
        </div>
    </div>
</dialog>
