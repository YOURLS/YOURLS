@props(['links' => [], 'sublinks' => []])
{{-- Renders the admin nav from the filtered admin_links/admin_sublinks
     arrays. Preserves the legacy ID #admin_menu and per-link IDs so
     plugins that target them still match. --}}
<nav role="navigation" {{ $attributes->merge(['class' => 'flex items-center gap-1']) }}>
    <ul id="admin_menu" class="flex items-center gap-1 list-none p-0">
        @foreach($links as $key => $link)
            <li id="admin_menu_{{ $key }}" class="relative">
                <a
                    href="{{ $link['url'] ?? '#' }}"
                    @if(!empty($link['title'])) title="{{ $link['title'] }}" @endif
                    @if(!empty($link['active'])) aria-current="page" @endif
                    class="inline-flex items-center gap-1.5 px-3 py-2 rounded-md text-sm font-medium {{ !empty($link['active']) ? 'bg-primary-50 text-primary-700 dark:bg-primary-950 dark:text-primary-300' : 'text-neutral-700 dark:text-neutral-200 hover:bg-neutral-100 dark:hover:bg-neutral-800' }}"
                >
                    @if(!empty($link['icon']))<x-atoms::icon :name="$link['icon']" />@endif
                    <span>{{ $link['anchor'] ?? $key }}</span>
                </a>
                @if(!empty($sublinks[$key]))
                    <ul class="absolute left-0 top-full mt-1 min-w-40 bg-white dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-800 rounded-md shadow-md py-1">
                        @foreach($sublinks[$key] as $subKey => $sub)
                            <li><a href="{{ $sub['url'] ?? '#' }}" class="block px-3 py-1.5 text-sm hover:bg-neutral-50 dark:hover:bg-neutral-800">{{ $sub['anchor'] ?? $subKey }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
    @yourlsAction('admin_menu')
</nav>
