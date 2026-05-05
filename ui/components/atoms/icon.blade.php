@props(['name', 'size' => 'md'])
@php
    $sizes = ['sm' => 'h-3.5 w-3.5', 'md' => 'h-4 w-4', 'lg' => 'h-5 w-5', 'xl' => 'h-6 w-6'];
    // Minimal inline icon set covering the common YOURLS admin needs.
    // Plugins can render arbitrary SVGs by writing directly instead of using this atom.
    $icons = [
        'plus'    => '<path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>',
        'check'   => '<path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>',
        'x'       => '<path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>',
        'trash'   => '<path d="M5 7h14M10 11v6M14 11v6M6 7l1 13a2 2 0 002 2h6a2 2 0 002-2l1-13M9 7V4h6v3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>',
        'pencil'  => '<path d="M4 20h4l10-10-4-4L4 16v4z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>',
        'copy'    => '<rect x="9" y="9" width="11" height="11" rx="2" stroke="currentColor" stroke-width="2" fill="none"/><path d="M5 15V5a2 2 0 012-2h10" stroke="currentColor" stroke-width="2" stroke-linecap="round" fill="none"/>',
        'search'  => '<circle cx="11" cy="11" r="6" stroke="currentColor" stroke-width="2" fill="none"/><path d="M20 20l-3.5-3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>',
        'chevron-down' => '<path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>',
        'chevron-up'   => '<path d="M6 15l6-6 6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>',
        'chevron-left'  => '<path d="M15 6l-6 6 6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>',
        'chevron-right' => '<path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>',
        'sun'    => '<circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="2" fill="none"/><path d="M12 2v2M12 20v2M2 12h2M20 12h2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>',
        'moon'   => '<path d="M21 12.8A9 9 0 1111.2 3a7 7 0 009.8 9.8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round" fill="none"/>',
        'menu'   => '<path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>',
        'external'=> '<path d="M14 4h6v6M20 4L10 14M18 12v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2h6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>',
        'info'   => '<circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" fill="none"/><path d="M12 8h.01M11 11h1v5h1" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>',
        'alert'  => '<path d="M12 3l10 18H2L12 3z" stroke="currentColor" stroke-width="2" stroke-linejoin="round" fill="none"/><path d="M12 9v5M12 17v.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>',
        'link'   => '<path d="M10 14a4 4 0 010-6l2-2a4 4 0 016 6l-1 1M14 10a4 4 0 010 6l-2 2a4 4 0 01-6-6l1-1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>',
        'chart'  => '<path d="M4 20V10M10 20V4M16 20v-8M22 20H2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>',
    ];
    $body = $icons[$name] ?? $icons['info'];
    $classes = ($sizes[$size] ?? $sizes['md']) . ' shrink-0';
@endphp
<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" {{ $attributes->merge(['class' => $classes]) }}>
    {!! $body !!}
</svg>
