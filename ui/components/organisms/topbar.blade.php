@props(['siteUrl' => '', 'logoutUrl' => '', 'username' => null])
<header class="sticky top-0 z-sticky bg-white/80 dark:bg-neutral-950/80 backdrop-blur border-b border-neutral-200 dark:border-neutral-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 h-14 flex items-center gap-4">
        <a href="{{ $siteUrl }}" class="flex items-center gap-2 font-semibold text-neutral-900 dark:text-neutral-100" aria-label="YOURLS">
            <x-atoms::icon name="link" size="lg" class="text-primary-600" />
            <span>YOURLS</span>
        </a>
        <div class="flex-1">{{ $slot }}</div>
        <button
            type="button"
            x-data
            @click="$store.theme.toggle()"
            :aria-label="$store.theme.current === 'dark' ? 'Switch to light theme' : 'Switch to dark theme'"
            class="inline-flex h-9 w-9 items-center justify-center rounded-md hover:bg-neutral-100 dark:hover:bg-neutral-800"
        >
            <x-atoms::icon name="sun" x-show="$store.theme.current === 'dark'" />
            <x-atoms::icon name="moon" x-show="$store.theme.current !== 'dark'" />
        </button>
        @if($username)
            <x-molecules::dropdown :label="$username" align="right">
                @if($logoutUrl)<a href="{{ $logoutUrl }}" class="block px-3 py-1.5 text-sm hover:bg-neutral-50 dark:hover:bg-neutral-800">@yourlsT('Logout')</a>@endif
            </x-molecules::dropdown>
        @elseif($logoutUrl)
            <a href="{{ $logoutUrl }}" class="text-sm text-neutral-600 dark:text-neutral-300 hover:underline">@yourlsT('Logout')</a>
        @endif
    </div>
</header>
