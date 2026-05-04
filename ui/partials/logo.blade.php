@php
    $adminUrl = function_exists('yourls_admin_url') ? yourls_admin_url('index.php') : '#';
    $siteUrl  = function_exists('yourls_site_url') ? rtrim((string) yourls_site_url(false), '/') : '';
    $version  = defined('YOURLS_VERSION') ? (string) YOURLS_VERSION : '0';
@endphp
@yourlsAction('pre_html_logo')
<header role="banner">
    <h1>
        <a href="{{ $adminUrl }}" title="YOURLS"><span>YOURLS</span>: <span>Y</span>our <span>O</span>wn <span>URL</span> <span>S</span>hortener<br/>
            <img src="{{ $siteUrl }}/images/yourls-logo.svg?v={{ $version }}" id="yourls-logo" alt="YOURLS" title="YOURLS" />
        </a>
    </h1>
</header>
@yourlsAction('html_logo')
