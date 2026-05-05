@extends('error', ['context' => 'error', 'title' => $errTitle ?? ''])

@section('content')
    @php
        $titleHtml   = (string) \YOURLS\UI\HookBridge::filter('die_title',   '<h2>' . ($errTitle   ?? '') . '</h2>');
        $messageHtml = (string) \YOURLS\UI\HookBridge::filter('die_message', '<p>'  . ($errMessage ?? '') . '</p>');
    @endphp
    {!! $titleHtml !!}
    {!! $messageHtml !!}
    @yourlsAction('yourls_die')
@endsection
