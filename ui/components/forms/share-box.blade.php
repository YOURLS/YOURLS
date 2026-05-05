@props([
    'longurl',
    'shorturl',
    'title'           => '',
    'text'            => '',
    'shortlinkTitle'  => null,
    'shareTitle'      => null,
    'share'           => '',
    'count'           => 280,
    'hidden'          => false,
    'logRedirect'     => false,
])
{{-- Preserves legacy DOM hooks (#shareboxes, #copybox, #copylink,
     #origlink, #statlink, #titlelink, #sharebox, #tweet, #charcount,
     #tweet_body, #share_links, #share_tw, #share_fb). --}}
@php
    $shortlinkLabel = function_exists('yourls__') ? yourls__('Your short link') : 'Your short link';
    $shareLabel     = function_exists('yourls__') ? yourls__('Quick Share')     : 'Quick Share';
    $shortlinkHtml  = $shortlinkTitle ?? ('<h2 class="text-sm font-semibold tracking-tight text-neutral-900 dark:text-neutral-100">' . $shortlinkLabel . '</h2>');
    $shareTitleHtml = $shareTitle     ?? ('<h2 class="text-sm font-semibold tracking-tight text-neutral-900 dark:text-neutral-100">' . $shareLabel     . '</h2>');
    $tweetUrl = 'https://twitter.com/intent/tweet?text=' . rawurlencode($share);
    $fbUrl    = 'https://www.facebook.com/share.php?u=' . rawurlencode($shorturl);
@endphp
<section
    id="shareboxes"
    @if($hidden) style="display:none;" @endif
    aria-label="{{ function_exists('yourls__') ? yourls__('Share this link') : 'Share this link' }}"
    class="yourls-card mt-6 mx-auto max-w-5xl overflow-hidden"
>
    <header class="flex items-center gap-2 px-5 py-3 border-b border-neutral-200 dark:border-neutral-800 bg-neutral-50/60 dark:bg-neutral-900/40">
        <span aria-hidden="true" class="inline-block h-1.5 w-1.5 rounded-full bg-primary-500"></span>
        <h2 class="text-[11px] font-semibold uppercase tracking-[0.14em] text-neutral-500 dark:text-neutral-400">
            @yourlsT('Share')
        </h2>
    </header>

    <div class="grid gap-px bg-neutral-200 dark:bg-neutral-800 sm:grid-cols-2">
        @yourlsAction('shareboxes_before', $longurl, $shorturl, $title, $text)

        <div id="copybox" class="share group relative bg-white dark:bg-neutral-950 p-5 transition-colors focus-within:bg-primary-50/30 dark:focus-within:bg-primary-950/20">
            <span aria-hidden="true" class="pointer-events-none absolute left-0 top-0 h-full w-0.5 bg-primary-500 scale-y-0 origin-top transition-transform duration-200 group-focus-within:scale-y-100"></span>
            {!! $shortlinkHtml !!}
            <p class="mt-3">
                <x-atoms::input id="copylink" :value="$shorturl" readonly class="font-mono text-[13px]" />
            </p>
            <dl class="mt-3 space-y-1 text-xs text-neutral-500 dark:text-neutral-400">
                <div class="flex items-baseline gap-2">
                    <dt class="shrink-0 font-medium text-neutral-600 dark:text-neutral-300">@yourlsT('Long link'):</dt>
                    <dd class="min-w-0 truncate">
                        <a id="origlink" href="{{ $longurl }}" class="text-primary-600 dark:text-primary-400 hover:underline">{{ $longurl }}</a>
                    </dd>
                </div>
                @if($logRedirect)
                    <div class="flex items-baseline gap-2">
                        <dt class="shrink-0 font-medium text-neutral-600 dark:text-neutral-300">@yourlsT('Stats'):</dt>
                        <dd class="min-w-0 truncate">
                            <a id="statlink" href="{{ $shorturl }}+" class="text-primary-600 dark:text-primary-400 hover:underline">{{ $shorturl }}+</a>
                            <input type="hidden" id="titlelink" value="{{ $title }}" />
                        </dd>
                    </div>
                @endif
            </dl>
        </div>

        @yourlsAction('shareboxes_middle', $longurl, $shorturl, $title, $text)

        <div id="sharebox" class="share group relative bg-white dark:bg-neutral-950 p-5 transition-colors focus-within:bg-primary-50/30 dark:focus-within:bg-primary-950/20">
            <span aria-hidden="true" class="pointer-events-none absolute left-0 top-0 h-full w-0.5 bg-primary-500 scale-y-0 origin-top transition-transform duration-200 group-focus-within:scale-y-100"></span>
            <div class="flex items-baseline justify-between gap-2">
                {!! $shareTitleHtml !!}
                <span id="charcount" class="hide-if-no-js shrink-0 text-[11px] font-mono tabular-nums text-neutral-400 dark:text-neutral-500">{{ $count }}</span>
            </div>
            <div id="tweet" class="mt-3">
                <textarea
                    id="tweet_body"
                    rows="3"
                    class="block w-full resize-none rounded-md border border-neutral-300 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-2.5 text-sm leading-snug text-neutral-900 dark:text-neutral-100 placeholder:text-neutral-400 focus-visible:outline-none focus-visible:border-primary-500 focus-visible:ring focus-visible:ring-primary-500/20 transition-colors"
                >{{ $share }}</textarea>
            </div>
            <p id="share_links" class="mt-3 flex flex-wrap items-center gap-x-3 gap-y-1 text-xs">
                <span class="text-neutral-500 dark:text-neutral-400">@yourlsT('Share with')</span>
                <a id="share_tw"
                   href="{{ $tweetUrl }}"
                   title="@yourlsT('Tweet this!')"
                   onclick="share('tw');return false"
                   class="inline-flex items-center gap-1 rounded-md px-2 py-1 font-medium text-primary-700 dark:text-primary-300 hover:bg-primary-50 dark:hover:bg-primary-950/40 transition-colors">
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="h-3.5 w-3.5" fill="currentColor"><path d="M18.244 2H21l-6.52 7.45L22 22h-6.828l-4.77-6.24L4.8 22H2.04l6.99-7.99L2 2h6.91l4.34 5.74L18.244 2zm-1.2 18h1.65L7.05 4H5.32l11.724 16z"/></svg>
                    Twitter
                </a>
                <a id="share_fb"
                   href="{{ $fbUrl }}"
                   title="@yourlsT('Share on Facebook')"
                   onclick="share('fb');return false"
                   class="inline-flex items-center gap-1 rounded-md px-2 py-1 font-medium text-primary-700 dark:text-primary-300 hover:bg-primary-50 dark:hover:bg-primary-950/40 transition-colors">
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="h-3.5 w-3.5" fill="currentColor"><path d="M13.5 21v-7.5h2.5l.4-3h-2.9V8.6c0-.87.24-1.46 1.49-1.46H16.5V4.45A21.4 21.4 0 0 0 14.32 4.3c-2.16 0-3.64 1.32-3.64 3.74V10.5H8v3h2.68V21h2.82z"/></svg>
                    Facebook
                </a>
                @yourlsAction('share_links', $longurl, $shorturl, $title, $text)
            </p>
        </div>

        @yourlsAction('shareboxes_after', $longurl, $shorturl, $title, $text)
    </div>
</section>
