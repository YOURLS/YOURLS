@extends('auth', ['context' => 'upgrade', 'title' => function_exists('yourls__') ? yourls__('Upgrade YOURLS') : 'Upgrade YOURLS'])

@section('content')
    <div class="space-y-4">
        @if(!empty($logs ?? []))
            <pre class="text-xs bg-neutral-50 dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-800 rounded-md p-3 overflow-auto">@foreach($logs as $line){{ $line }}
@endforeach</pre>
        @endif

        @if(($step ?? 0) === 0)
            <x-organisms::banner tone="warning">
                @yourlsT('We highly recommend you backup your database before going any further.')
            </x-organisms::banner>
            <x-organisms::card :title="function_exists('yourls__') ? yourls__('Upgrade YOURLS') : 'Upgrade YOURLS'">
                <form method="post" action="upgrade.php">
                    <input type="hidden" name="step" value="1" />
                    <x-atoms::button type="submit" variant="primary">@yourlsT('Upgrade YOURLS')</x-atoms::button>
                </form>
            </x-organisms::card>
        @elseif($complete ?? false)
            <x-organisms::banner tone="success">
                {!! sprintf(function_exists('yourls__') ? yourls__('Upgrade complete! <a href="%s">Go to the admin interface</a>.') : 'Upgrade complete. <a href="%s">Admin</a>', $adminUrl) !!}
            </x-organisms::banner>
        @endif
    </div>
@endsection
