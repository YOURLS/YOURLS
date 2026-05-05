@php
    $canQuery = $canQuery ?? true;
    $debugMode = function_exists('yourls_get_debug_mode') ? yourls_get_debug_mode() : false;

    $numQueriesText = '';
    if ($canQuery && $debugMode && function_exists('yourls_get_num_queries') && function_exists('yourls_n')) {
        $n = yourls_get_num_queries();
        $numQueriesText = ' &ndash; ' . sprintf(yourls_n('1 query', '%s queries', $n), $n);
    }

    $version = defined('YOURLS_VERSION') ? (string) YOURLS_VERSION : '0';
    $footer = function_exists('yourls_s')
        ? yourls_s('Powered by %s', '<a href="http://yourls.org/" title="YOURLS">YOURLS</a> v ' . $version)
        : 'Powered by YOURLS v ' . $version;
    $footer .= $numQueriesText;
    $footer = (string) \YOURLS\UI\HookBridge::filter('html_footer_text', $footer);

    $debugLog = $debugMode && function_exists('yourls_get_debug_log') ? yourls_get_debug_log() : null;
    $context = \YOURLS\UI\ContextRegistry::get();
@endphp
</div>{{-- /#wrap --}}
<footer id="footer" role="contentinfo">
    <p>{!! $footer !!}</p>
</footer>
@if(!empty($debugLog))
    <div style="text-align:left"><pre>{{ implode("\n", $debugLog) }}</pre></div>
@endif
@yourlsAction('html_footer', $context)
</body>
</html>
