@extends('auth', ['context' => 'install', 'title' => function_exists('yourls__') ? yourls__('Install YOURLS') : 'Install YOURLS'])

@section('content')
    <div class="space-y-4">
        @foreach(($errors ?? []) as $msg)
            <x-organisms::banner tone="danger">{!! $msg !!}</x-organisms::banner>
        @endforeach
        @foreach(($warnings ?? []) as $msg)
            <x-organisms::banner tone="warning">{!! $msg !!}</x-organisms::banner>
        @endforeach
        @foreach(($success ?? []) as $msg)
            <x-organisms::banner tone="success">{!! $msg !!}</x-organisms::banner>
        @endforeach

        @if(!($installed ?? false))
            <x-organisms::card :title="function_exists('yourls__') ? yourls__('Install YOURLS') : 'Install YOURLS'">
                <form id="install" method="post" action="install.php">
                    <x-atoms::button type="submit" variant="primary">@yourlsT('Install YOURLS')</x-atoms::button>
                </form>
            </x-organisms::card>
        @else
            <x-organisms::banner tone="success">
                {!! sprintf(function_exists('yourls__') ? yourls__('YOURLS is now installed. <a href="%s">Go to the admin interface</a>.') : 'YOURLS is now installed. <a href="%s">Go to the admin interface</a>.', $adminUrl) !!}
            </x-organisms::banner>
        @endif
    </div>
@endsection
