@extends('admin', ['context' => 'plugin_page_' . ($slug ?? ''), 'title' => $title ?? ''])

@section('content')
    @yourlsAction('load-' . ($slug ?? ''))
    {!! $body ?? '' !!}
@endsection
