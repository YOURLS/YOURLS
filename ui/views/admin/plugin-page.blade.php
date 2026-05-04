@extends('admin', ['context' => 'plugin_page_' . ($slug ?? ''), 'title' => $title ?? ''])

@section('content')
    <main role="main">
        @yourlsAction('load-' . ($slug ?? ''))
        {!! $body ?? '' !!}
    </main>
@endsection
