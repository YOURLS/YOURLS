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
    $shortlinkHtml = $shortlinkTitle ?? '<h2 class="text-base font-semibold mb-2">' . (function_exists('yourls__') ? yourls__('Your short link') : 'Your short link') . '</h2>';
    $shareTitleHtml = $shareTitle ?? '<h2 class="text-base font-semibold mb-2">' . (function_exists('yourls__') ? yourls__('Quick Share') : 'Quick Share') . '</h2>';
    $tweetUrl = 'https://twitter.com/intent/tweet?text=' . rawurlencode($share);
    $fbUrl    = 'https://www.facebook.com/share.php?u=' . rawurlencode($shorturl);
@endphp
<div id="shareboxes" @if($hidden) style="display:none;" @endif class="yourls-card mt-4 p-4 grid gap-4 sm:grid-cols-2">
    @yourlsAction('shareboxes_before', $longurl, $shorturl, $title, $text)

    <div id="copybox" class="share">
        {!! $shortlinkHtml !!}
        <p class="mt-1"><x-atoms::input id="copylink" :value="$shorturl" readonly class="font-mono" /></p>
        <p class="mt-2 text-xs text-neutral-500 dark:text-neutral-400">
            @yourlsT('Long link'):
            <a id="origlink" href="{{ $longurl }}" class="underline">{{ $longurl }}</a>
            @if($logRedirect)
                <br>
                @yourlsT('Stats'):
                <a id="statlink" href="{{ $shorturl }}+" class="underline">{{ $shorturl }}+</a>
                <input type="hidden" id="titlelink" value="{{ $title }}" />
            @endif
        </p>
    </div>

    @yourlsAction('shareboxes_middle', $longurl, $shorturl, $title, $text)

    <div id="sharebox" class="share">
        {!! $shareTitleHtml !!}
        <div id="tweet">
            <span id="charcount" class="hide-if-no-js text-xs text-neutral-500">{{ $count }}</span>
            <textarea id="tweet_body" class="block w-full mt-1 rounded-md border border-neutral-300 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-2 text-sm">{{ $share }}</textarea>
        </div>
        <p id="share_links" class="mt-2 flex items-center gap-2 text-sm">
            @yourlsT('Share with')
            <a id="share_tw" href="{{ $tweetUrl }}" title="@yourlsT('Tweet this!')" onclick="share('tw');return false" class="text-primary-600 hover:underline">Twitter</a>
            <a id="share_fb" href="{{ $fbUrl }}" title="@yourlsT('Share on Facebook')" onclick="share('fb');return false" class="text-primary-600 hover:underline">Facebook</a>
            @yourlsAction('share_links', $longurl, $shorturl, $title, $text)
        </p>
    </div>

    @yourlsAction('shareboxes_after', $longurl, $shorturl, $title, $text)
</div>
