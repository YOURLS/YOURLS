@php
    $doctype = function_exists('yourls_apply_filter') ? yourls_apply_filter('html_language_attributes_doctype', 'html') : 'html';
    $locale  = function_exists('yourls_get_locale') ? yourls_get_locale() : 'en_US';
    $attrs   = ' lang="' . str_replace('_', '-', $locale) . '"';
    $attrs   = function_exists('yourls_apply_filter') ? yourls_apply_filter('html_language_attributes', $attrs, $doctype, $locale) : $attrs;
@endphp
{!! $attrs !!}
