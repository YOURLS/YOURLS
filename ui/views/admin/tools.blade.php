@extends('admin', ['context' => 'tools', 'title' => function_exists('yourls__') ? yourls__('Cool YOURLS Tools') : 'Cool YOURLS Tools'])

@section('content')
    {{-- Bookmarklets are <a> tags with javascript: hrefs that must be draggable.
         We can't replace the anchor with a <button>, so we style its existing
         class .bookmarklet to match the design-system secondary button. --}}
    <style>
        .yourls-tools .bookmarklet {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-weight: 500;
            border-radius: 0.375rem;
            padding: 0.375rem 0.75rem;
            font-size: 0.75rem;
            line-height: 1rem;
            border: 1px solid rgb(212 212 216);
            background: rgb(255 255 255);
            color: rgb(38 38 38);
            text-decoration: none;
            cursor: grab;
            transition: background-color .15s ease, border-color .15s ease;
        }
        .yourls-tools .bookmarklet:hover {
            background: rgb(245 245 245);
            border-color: rgb(161 161 170);
        }
        .yourls-tools .bookmarklet:active { cursor: grabbing; }
        :root[data-theme="dark"] .yourls-tools .bookmarklet,
        .dark .yourls-tools .bookmarklet {
            background: rgb(38 38 38);
            border-color: rgb(64 64 64);
            color: rgb(229 229 229);
        }
        :root[data-theme="dark"] .yourls-tools .bookmarklet:hover,
        .dark .yourls-tools .bookmarklet:hover {
            background: rgb(64 64 64);
            border-color: rgb(115 115 115);
        }
        .yourls-tools .bookmarklet::before {
            content: "⋮⋮";
            opacity: .55;
            letter-spacing: -1px;
        }
    </style>

    <div class="yourls-tools space-y-4">
        <x-organisms::card :title="function_exists('yourls__') ? yourls__('Bookmarklets') : 'Bookmarklets'">
            <p class="text-sm text-neutral-700 dark:text-neutral-300">
                {!! function_exists('yourls__') ? yourls__('YOURLS comes with handy <strong>bookmarklets</strong> for easier link shortening and sharing.') : '' !!}
            </p>

            <h3 class="mt-4 mb-2 text-sm font-semibold text-neutral-800 dark:text-neutral-200">@yourlsT('Standard or Instant, Simple or Custom')</h3>
            <ul class="list-disc pl-6 space-y-1 text-sm text-neutral-700 dark:text-neutral-300">
                <li>{!! function_exists('yourls__') ? yourls__('The <strong>Standard Bookmarklets</strong> will take you to a page where you can easily edit or delete your brand new short URL.') : '' !!}</li>
                <li>{!! function_exists('yourls__') ? yourls__('The <strong>Instant Bookmarklets</strong> will pop the short URL without leaving the page you are viewing (depending on the page and server configuration, they may silently fail).') : '' !!}</li>
                <li>{!! function_exists('yourls__') ? yourls__('The <strong>Simple Bookmarklets</strong> will generate a short URL with a random or sequential keyword.') : '' !!}</li>
                <li>{!! function_exists('yourls__') ? yourls__('The <strong>Custom Keyword Bookmarklets</strong> will prompt you for a custom keyword first.') : '' !!}</li>
            </ul>

            <p class="mt-3 text-sm text-neutral-700 dark:text-neutral-300">
                {!! function_exists('yourls__') ? yourls__("If you want to share a description along with the link you're shortening, simply <strong>select text</strong> on the page you're viewing before clicking on your bookmarklet link.") : '' !!}
            </p>

            <x-organisms::banner tone="warning" class="mt-3">
                {!! function_exists('yourls__') ? yourls__('<strong>Important:</strong> bookmarklets <em>may fail</em> on websites with HTTPS, especially the &ldquo;Instant&rdquo; variants. There is nothing you can do about this.') : '' !!}
            </x-organisms::banner>

            <h3 class="mt-6 mb-2 text-sm font-semibold text-neutral-800 dark:text-neutral-200">@yourlsT('The Bookmarklets')</h3>
            <p class="text-xs text-neutral-600 dark:text-neutral-400 mb-3">@yourlsT('Click and drag links to your toolbar (or right-click and bookmark them).')</p>

            <x-organisms::table id="bookmarklets_table">
                <x-organisms::table.head :cells="[
                    'kind'     => '',
                    'standard' => yourls__('Standard (new page)'),
                    'instant'  => yourls__('Instant (popup)'),
                ]" />
                <x-organisms::table.tbody>
                    <tr>
                        <td class="px-3 py-2 align-middle border-b border-neutral-100 dark:border-neutral-800 font-semibold">@yourlsT('Simple')</td>
                        <td class="px-3 py-2 align-middle border-b border-neutral-100 dark:border-neutral-800">{!! $bookmarkletStandardSimple !!}</td>
                        <td class="px-3 py-2 align-middle border-b border-neutral-100 dark:border-neutral-800">{!! $bookmarkletPopupSimple !!}</td>
                    </tr>
                    <tr>
                        <td class="px-3 py-2 align-middle border-b border-neutral-100 dark:border-neutral-800 font-semibold">@yourlsT('Custom Keyword')</td>
                        <td class="px-3 py-2 align-middle border-b border-neutral-100 dark:border-neutral-800">{!! $bookmarkletCustomStandard !!}</td>
                        <td class="px-3 py-2 align-middle border-b border-neutral-100 dark:border-neutral-800">{!! $bookmarkletCustomPopup !!}</td>
                    </tr>
                </x-organisms::table.tbody>
            </x-organisms::table>
        </x-organisms::card>

        <x-organisms::card :title="function_exists('yourls__') ? yourls__('Social Bookmarklets') : 'Social Bookmarklets'">
            <p class="text-sm text-neutral-700 dark:text-neutral-300 mb-3">
                @yourlsT('Create a short URL and share it on social networks, all in one click. Click and drag the links to your toolbar.')
            </p>
            <div class="flex flex-wrap items-center gap-2">
                {!! $bookmarkletFacebook !!}
                {!! $bookmarkletTwitter !!}
                {!! $bookmarkletTumblr !!}
                @yourlsAction('social_bookmarklet_buttons_after')
            </div>
        </x-organisms::card>

        <x-organisms::card :title="function_exists('yourls__') ? yourls__('Prefix-n-Shorten') : 'Prefix-n-Shorten'">
            <p class="text-sm text-neutral-700 dark:text-neutral-300">
                {!! sprintf(function_exists('yourls__') ? yourls__("When viewing a page, prefix its full URL: in your browser's address bar, prepend %s to the current URL (right before the <code>http://</code> part) and press Enter.") : 'Prefix: %s', '<code class="rounded bg-neutral-100 dark:bg-neutral-800 px-1.5 py-0.5 text-xs">'.$prefixHost.'</code>') !!}
            </p>
            @if($isWindows)
                <x-organisms::banner tone="warning" class="mt-3">
                    @yourlsT('Note: this will probably not work because your web server is running on Windows.')
                </x-organisms::banner>
            @else
                <p class="mt-2 text-xs text-neutral-500 dark:text-neutral-400">
                    @yourlsT('Note: this will not work if your web server is running on Windows.')
                </p>
            @endif
        </x-organisms::card>

        @if($isPrivate)
            <x-organisms::card :title="function_exists('yourls__') ? yourls__('Secure passwordless API call') : 'Secure passwordless API call'">
                <p class="text-sm text-neutral-700 dark:text-neutral-300">
                    {!! function_exists('yourls__') ? yourls__('YOURLS allows API calls the old fashioned way, using <code>username</code> and <code>password</code> parameters.') : '' !!}
                    {!! function_exists('yourls__') ? yourls__("If you're worried about sending your credentials into the wild, you can also make API calls without using your login or your password, using a secret signature token.") : '' !!}
                </p>

                <div class="mt-4 rounded-md border border-warning-300 bg-warning-50 dark:bg-warning-900/30 dark:border-warning-700 p-3">
                    <div class="flex items-start gap-3">
                        <div class="flex-1 min-w-0">
                            <p class="text-xs font-semibold text-warning-800 dark:text-warning-200 uppercase tracking-wide">
                                @yourlsT('Your secret signature token')
                            </p>
                            <p class="mt-1">
                                <code class="font-mono text-sm break-all">{{ $authSignature }}</code>
                            </p>
                            <p class="mt-1 text-xs text-warning-800 dark:text-warning-200">
                                @yourlsT("Keep it secret. This token can only be used with the API, not the admin interface.")
                            </p>
                        </div>
                        <x-molecules::copy-button
                            :value="$authSignature"
                            :label="yourls__('Copy')"
                            :copiedLabel="yourls__('Copied')"
                        />
                    </div>
                </div>

                <h3 class="mt-6 mb-2 text-sm font-semibold text-neutral-800 dark:text-neutral-200">@yourlsT('Usage of the signature token')</h3>
                <p class="text-sm text-neutral-700 dark:text-neutral-300 mb-2">
                    {!! function_exists('yourls__') ? yourls__('Pass <code>signature</code> as a query-string parameter. Example:') : '' !!}
                </p>
                @php
                    $simpleSignatureUrl = $yourlsSite . '/yourls-api.php?signature=' . $authSignature . '&action=...';
                @endphp
                <div class="flex items-start gap-2">
                    <pre class="flex-1 min-w-0 overflow-x-auto rounded-md bg-neutral-900 text-neutral-100 dark:bg-neutral-950 p-3 text-xs"><code>{{ $simpleSignatureUrl }}</code></pre>
                    <x-molecules::copy-button
                        :value="$simpleSignatureUrl"
                        :label="yourls__('Copy')"
                        :copiedLabel="yourls__('Copied')"
                    />
                </div>

                <h3 class="mt-6 mb-2 text-sm font-semibold text-neutral-800 dark:text-neutral-200">@yourlsT('Usage of a time-limited signature token')</h3>
                <p class="text-sm text-neutral-700 dark:text-neutral-300 mb-2">
                    @yourlsT('Generate a short-lived signature on the client side:')
                </p>
                @php
                    $phpSnippet = "<?php\n\$timestamp = time();\n// actual value: \$time = {$sampleTime}\n\$signature = md5( \$timestamp . '{$authSignature}' );\n// actual value: \$signature = \"{$sampleSignature}\"\n?>";
                    $sampleUrl  = $yourlsSite . '/yourls-api.php?timestamp=' . $sampleTime . '&signature=' . $sampleSignature . '&action=...';
                @endphp
                <div class="flex items-start gap-2 mb-3">
                    <pre class="flex-1 min-w-0 overflow-x-auto rounded-md bg-neutral-900 text-neutral-100 dark:bg-neutral-950 p-3 text-xs"><code>{{ $phpSnippet }}</code></pre>
                    <x-molecules::copy-button
                        :value="$phpSnippet"
                        :label="yourls__('Copy')"
                        :copiedLabel="yourls__('Copied')"
                    />
                </div>

                <p class="text-sm text-neutral-700 dark:text-neutral-300 mb-2">
                    @yourlsT('Then use it with the API:')
                </p>
                <div class="flex items-start gap-2">
                    <pre class="flex-1 min-w-0 overflow-x-auto rounded-md bg-neutral-900 text-neutral-100 dark:bg-neutral-950 p-3 text-xs"><code>{{ $sampleUrl }}</code></pre>
                    <x-molecules::copy-button
                        :value="$sampleUrl"
                        :label="yourls__('Copy')"
                        :copiedLabel="yourls__('Copied')"
                    />
                </div>

                <p class="mt-3 text-xs text-neutral-500 dark:text-neutral-400">
                    {!! sprintf(function_exists('yourls__') ? yourls__('This URL is valid for %s seconds.') : '%s s', '<strong>'.(int)$nonceLife.'</strong>') !!}
                </p>

                <p class="mt-4 text-sm text-neutral-700 dark:text-neutral-300">
                    {!! function_exists('yourls__') ? yourls__('See the <a class="text-primary-600 hover:underline" href="https://yourls.org/passwordlessapi">Passwordless API</a> wiki page.') : '' !!}
                    {!! sprintf(function_exists('yourls__') ? yourls__('See the <a class="text-primary-600 hover:underline" href="%s">API documentation</a> for more.') : '%s', $yourlsSite . '/readme.html#API') !!}
                </p>
            </x-organisms::card>
        @endif
    </div>
@endsection
