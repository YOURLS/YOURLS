@props(['title' => null, 'description' => null])
<section {{ $attributes->merge(['class' => 'yourls-card overflow-hidden']) }}>
    @if($title || $description)
        <header class="px-5 py-4 border-b border-neutral-200 dark:border-neutral-800">
            @if($title)<h2 class="text-base font-semibold text-neutral-900 dark:text-neutral-100">{{ $title }}</h2>@endif
            @if($description)<p class="text-xs text-neutral-500 dark:text-neutral-400 mt-1">{{ $description }}</p>@endif
        </header>
    @endif
    <div class="p-5">
        {{ $slot }}
    </div>
    @isset($footer)
        <footer class="px-5 py-3 border-t border-neutral-200 dark:border-neutral-800 bg-neutral-50 dark:bg-neutral-950/50">
            {{ $footer }}
        </footer>
    @endisset
</section>
