@extends('admin', ['context' => 'tools', 'title' => function_exists('yourls__') ? yourls__('Cool YOURLS Tools') : 'Cool YOURLS Tools'])

@section('content')
    <main role="main" class="sub_wrap">
        <h2>@yourlsT('Bookmarklets')</h2>
        <p>{!! function_exists('yourls__') ? yourls__('YOURLS comes with handy <span>bookmarklets</span> for easier link shortening and sharing.') : '' !!}</p>

        <h3>@yourlsT('Standard or Instant, Simple or Custom')</h3>
        <ul class="list-disc pl-6 space-y-1">
            <li>{!! function_exists('yourls__') ? yourls__('The <span>Standard Bookmarklets</span> will take you to a page where you can easily edit or delete your brand new short URL.') : '' !!}</li>
            <li>{!! function_exists('yourls__') ? yourls__('The <span>Instant Bookmarklets</span> will pop the short URL without leaving the page you are viewing (depending on the page and server configuration, they may silently fail)') : '' !!}</li>
            <li>{!! function_exists('yourls__') ? yourls__('The <span>Simple Bookmarklets</span> will generate a short URL with a random or sequential keyword.') : '' !!}</li>
            <li>{!! function_exists('yourls__') ? yourls__('The <span>Custom Keyword Bookmarklets</span> will prompt you for a custom keyword first.') : '' !!}</li>
        </ul>

        <p>{!! function_exists('yourls__') ? yourls__("If you want to share a description along with the link you're shortening, simply <span>select text</span> on the page you're viewing before clicking on your bookmarklet link") : '' !!}</p>
        <p>{!! function_exists('yourls__') ? yourls__('<strong>Important Note:</strong> bookmarklets <span>may fail</span> on websites with <em>https</em>, especially the "Instant" bookrmarklets. There is nothing you can do about this.') : '' !!}</p>

        <h3>@yourlsT('The Bookmarklets')</h3>
        <p>@yourlsT('Click and drag links to your toolbar (or right-click and bookmark it)')</p>

        <table class="yourls-table tblSorter w-full text-sm" cellpadding="0" cellspacing="1">
            <thead>
                <tr>
                    <td>&nbsp;</td>
                    <th>@yourlsT('Standard (new page)')</th>
                    <th>@yourlsT('Instant (popup)')</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="header">@yourlsT('Simple')</th>
                    <td>{!! $bookmarkletStandardSimple !!}</td>
                    <td>{!! $bookmarkletPopupSimple !!}</td>
                </tr>
                <tr>
                    <th class="header">@yourlsT('Custom Keyword')</th>
                    <td>{!! $bookmarkletCustomStandard !!}</td>
                    <td>{!! $bookmarkletCustomPopup !!}</td>
                </tr>
            </tbody>
        </table>

        <h3>@yourlsT('Social Bookmarklets')</h3>
        <p>
            @yourlsT('Create a short URL and share it on social networks, all in one click!')
            @yourlsT('Click and drag links to your toolbar (or right-click and bookmark it)')
        </p>
        <p>@yourlsT('Shorten and share:')</p>
        <p>
            {!! $bookmarkletFacebook !!}
            {!! $bookmarkletTwitter !!}
            {!! $bookmarkletTumblr !!}
            @yourlsAction('social_bookmarklet_buttons_after')
        </p>

        <h2>@yourlsT('Prefix-n-Shorten')</h2>
        <p>
            {!! sprintf(function_exists('yourls__') ? yourls__("When viewing a page, you can also prefix its full URL: just head to your browser's address bar, add \"<span>%s</span>\" to the beginning of the current URL (right before its 'http://' part) and hit enter.") : 'Prefix: %s', $prefixHost) !!}
        </p>
        <p>
            @yourlsT('Note: this will probably not work if your web server is running on Windows')
            @if($isWindows) @yourlsT(' (which seems to be the case here)') @endif
            .
        </p>

        @if($isPrivate)
            <h2>@yourlsT('Secure passwordless API call')</h2>
            <p>{!! function_exists('yourls__') ? yourls__('YOURLS allows API calls the old fashioned way, using <tt>username</tt> and <tt>password</tt> parameters.') : '' !!}
                {!! function_exists('yourls__') ? yourls__("If you're worried about sending your credentials into the wild, you can also make API calls without using your login or your password, using a secret signature token.") : '' !!}
            </p>
            <p>{!! sprintf(function_exists('yourls__') ? yourls__('Your secret signature token: <strong><code>%s</code></strong>') : 'Token: %s', $authSignature) !!}
                @yourlsT("(It's a secret. Keep it secret) ")
            </p>
            <p>@yourlsT('This signature token can only be used with the API, not with the admin interface.')</p>
            <ul class="list-disc pl-6 space-y-3">
                <li>
                    <h3>@yourlsT('Usage of the signature token')</h3>
                    <p>@yourlsT('Simply use parameter <tt>signature</tt> in your API requests. Example:')</p>
                    <p><code>{{ $yourlsSite }}/yourls-api.php?signature={{ $authSignature }}&action=...</code></p>
                </li>
                <li>
                    <h3>@yourlsT('Usage of a time limited signature token')</h3>
                    <pre><code>&lt;?php
$timestamp = time();
<tt>// @yourlsT('actual value:') $time = {{ $sampleTime }}</tt>
$signature = md5( $timestamp . '{{ $authSignature }}' );
<tt>// @yourlsT('actual value:') $signature = "{{ $sampleSignature }}"</tt>
?&gt;
</code></pre>
                    <p>@yourlsT('Now use parameters <tt>signature</tt> and <tt>timestamp</tt> in your API requests. Example:')</p>
                    <p><code>{{ $yourlsSite }}/yourls-api.php?timestamp=<strong>$timestamp</strong>&signature=<strong>$signature</strong>&action=...</code></p>
                    <p>@yourlsT('Actual values:')<br/>
                        <tt>{{ $yourlsSite }}/yourls-api.php?timestamp={{ $sampleTime }}&signature={{ $sampleSignature }}&action=...</tt>
                    </p>
                    <p>{!! sprintf(function_exists('yourls__') ? yourls__('This URL would be valid for only %s seconds') : 'Valid %s seconds', $nonceLife) !!}</p>
                </li>
            </ul>
            <p>{!! function_exists('yourls__') ? yourls__('See the <a href="https://yourls.org/passwordlessapi">Passwordless API</a> page on the wiki.') : '' !!}
                {!! sprintf(function_exists('yourls__') ? yourls__('See the <a href="%s">API documentation</a> for more') : '%s', $yourlsSite . '/readme.html#API') !!}
            </p>
        @endif
    </main>
@endsection
