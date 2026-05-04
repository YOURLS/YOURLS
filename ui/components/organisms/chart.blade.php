@props(['id', 'title' => null, 'height' => '320px'])
{{-- Lightweight wrapper around an arbitrary chart canvas/iframe slot.
     Charts are rendered by page-level JS (Chart.js or similar) — this
     component only owns layout + a11y. --}}
<figure {{ $attributes->merge(['class' => 'yourls-card p-4']) }}>
    @if($title)<figcaption class="text-sm font-medium text-neutral-700 dark:text-neutral-200 mb-2">{{ $title }}</figcaption>@endif
    <div id="{{ $id }}" role="img" aria-label="{{ $title ?? 'Chart' }}" style="height: {{ $height }};" class="w-full">
        {{ $slot }}
    </div>
</figure>
