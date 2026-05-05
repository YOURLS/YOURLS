@php
    $shunt = function_exists('yourls_apply_filter') ? yourls_apply_filter('shunt_html_favicon', null) : null;
@endphp
@if($shunt !== null)
    {!! $shunt !!}
@else
    @php $siteUrl = function_exists('yourls_site_url') ? rtrim((string) yourls_site_url(false), '/') : ''; @endphp
    <link rel="shortcut icon" href="{{ $siteUrl }}/images/favicon.gif" type="image/x-icon" />
@endif
