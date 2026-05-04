@php
    $context = $context ?? 'index';
    $title   = $title   ?? '';

    // Asset selectors mirror the legacy switch in yourls_html_head().
    $share = $insert = $tablesorter = $tabs = $cal = $charts = false;
    $titlePage = '';
    switch ($context) {
        case 'infos':                                  $share = $tabs = $charts = true; break;
        case 'bookmark':                               $share = $insert = $tablesorter = true; break;
        case 'index':                                  $insert = $tablesorter = $cal = $share = true; break;
        case 'plugins':
        case 'tools':                                  $tablesorter = true; break;
        case 'login':                                  $titlePage = 'Login'; break;
        case 'install':
        case 'new':
        case 'upgrade':                                                              break;
    }

    // Headers + admin context registration. Mirrors the legacy ordering exactly:
    // pre_html_head -> headers -> set_html_context -> html_head_content-type
    // -> admin_headers (admin-only).
    \YOURLS\UI\HookBridge::action('pre_html_head', $context, $title);

    if (function_exists('yourls_is_admin') && yourls_is_admin() && !headers_sent()) {
        if (function_exists('yourls_no_cache_headers'))   yourls_no_cache_headers();
        if (function_exists('yourls_no_frame_header'))    yourls_no_frame_header();
        $contentType = \YOURLS\UI\HookBridge::filter('html_head_content-type', 'text/html');
        if (function_exists('yourls_content_type_header')) yourls_content_type_header($contentType);
        \YOURLS\UI\HookBridge::action('admin_headers', $context, $title);
    }

    \YOURLS\UI\ContextRegistry::set($context);

    // Body class
    $bodyclass  = (string) \YOURLS\UI\HookBridge::filter('bodyclass', '');
    $bodyclass .= (function_exists('yourls_is_mobile_device') && yourls_is_mobile_device()) ? 'mobile' : 'desktop';

    // Page title
    $link = function_exists('yourls_link') ? yourls_link() : '';
    $base = 'YOURLS &mdash; Your Own URL Shortener | ' . $link;
    $base = $titlePage === '' ? $base : $titlePage . ' &mdash; ' . $base;
    $pageTitle = $title ? $title . ' &laquo; ' . $base : $base;
    $pageTitle = (string) \YOURLS\UI\HookBridge::filter('html_title', $pageTitle, $context);

    $version = defined('YOURLS_VERSION') ? (string) YOURLS_VERSION : '0';
    $siteUrl = function_exists('yourls_site_url') ? rtrim((string) yourls_site_url(false), '/') : '';
    $adminUrl = function_exists('yourls_admin_url') ? yourls_admin_url('admin-ajax.php') : '';
    $metaContentType = (string) \YOURLS\UI\HookBridge::filter('html_head_meta_content-type', 'text/html; charset=utf-8');
@endphp
<!DOCTYPE html>
<html @include('language-attributes')>
<head>
    <title>{!! $pageTitle !!}</title>
    <meta http-equiv="Content-Type" content="{{ $metaContentType }}" />
    <meta name="generator" content="YOURLS {{ $version }}" />
    <meta name="description" content="YOURLS &raquo; Your Own URL Shortener | {{ $siteUrl }}" />
    @yourlsAction('html_head_meta', $context)

    @include('favicon')

    @yourlsThemeBoot

    {{-- New asset bundle (Tailwind + Alpine), always loaded. --}}
    <link rel="stylesheet" href="{{ \YOURLS\UI\Asset::url('admin.css') }}" />
    <script src="{{ \YOURLS\UI\Asset::url('admin.js') }}" defer></script>

    {{-- Legacy assets, kept opt-in via context so plugins that call into
         common.js / share.js / tablesorter / cal / etc. keep working. --}}
    <script src="{{ $siteUrl }}/js/jquery-3.5.1.min.js?v={{ $version }}"></script>
    <script src="{{ $siteUrl }}/js/common.js?v={{ $version }}"></script>
    <script src="{{ $siteUrl }}/js/jquery.notifybar.js?v={{ $version }}"></script>
    <link rel="stylesheet" href="{{ $siteUrl }}/css/style.css?v={{ $version }}" />
    @if($tabs)
        <link rel="stylesheet" href="{{ $siteUrl }}/css/infos.css?v={{ $version }}" />
        <script src="{{ $siteUrl }}/js/infos.js?v={{ $version }}"></script>
    @endif
    @if($tablesorter)
        <link rel="stylesheet" href="{{ $siteUrl }}/css/tablesorter.css?v={{ $version }}" />
        <script src="{{ $siteUrl }}/js/jquery-3.tablesorter.min.js?v={{ $version }}"></script>
        <script src="{{ $siteUrl }}/js/tablesorte.js?v={{ $version }}"></script>
    @endif
    @if($insert)
        <script src="{{ $siteUrl }}/js/insert.js?v={{ $version }}"></script>
    @endif
    @if($share)
        <link rel="stylesheet" href="{{ $siteUrl }}/css/share.css?v={{ $version }}" />
        <script src="{{ $siteUrl }}/js/share.js?v={{ $version }}"></script>
        <script src="{{ $siteUrl }}/js/clipboard.min.js?v={{ $version }}"></script>
    @endif
    @if($cal)
        <link rel="stylesheet" href="{{ $siteUrl }}/css/cal.css?v={{ $version }}" />
        @php if (function_exists('yourls_l10n_calendar_strings')) yourls_l10n_calendar_strings(); @endphp
        <script src="{{ $siteUrl }}/js/jquery.cal.js?v={{ $version }}"></script>
    @endif
    @if($charts)
        <script src="https://www.google.com/jsapi"></script>
        <script>google.load('visualization', '1.0', {'packages':['corechart', 'geochart']});</script>
    @endif
    <script>
    //<![CDATA[
        var ajaxurl = '{{ $adminUrl }}';
    //]]>
    </script>
    @yourlsAction('html_head', $context)
</head>
<body class="{{ $context }} {{ $bodyclass }}">
<div id="wrap">
