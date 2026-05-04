@extends('admin', ['context' => 'plugins', 'title' => function_exists('yourls__') ? yourls__('Manage Plugins') : 'Manage Plugins'])

@section('content')
    <main role="main">
        <h2>@yourlsT('Plugins')</h2>

        <p id="plugin_summary">
            {!! sprintf(
                function_exists('yourls__') ? yourls__('You currently have <strong>%1$s</strong> installed, and <strong>%2$s</strong> activated') : 'You currently have %1$s installed, and %2$s activated',
                $pluginsCount, $countActive
            ) !!}
        </p>

        <table id="main_table" class="yourls-table tblSorter w-full text-sm border-separate border-spacing-0" cellpadding="0" cellspacing="1">
            <thead>
                <tr>
                    <th class="text-left font-semibold text-xs uppercase tracking-wide text-neutral-600 dark:text-neutral-400 px-3 py-2 border-b border-neutral-200 dark:border-neutral-800">@yourlsT('Plugin Name')</th>
                    <th class="text-left font-semibold text-xs uppercase tracking-wide text-neutral-600 dark:text-neutral-400 px-3 py-2 border-b border-neutral-200 dark:border-neutral-800">@yourlsT('Version')</th>
                    <th class="text-left font-semibold text-xs uppercase tracking-wide text-neutral-600 dark:text-neutral-400 px-3 py-2 border-b border-neutral-200 dark:border-neutral-800">@yourlsT('Description')</th>
                    <th class="text-left font-semibold text-xs uppercase tracking-wide text-neutral-600 dark:text-neutral-400 px-3 py-2 border-b border-neutral-200 dark:border-neutral-800">@yourlsT('Author')</th>
                    <th class="text-left font-semibold text-xs uppercase tracking-wide text-neutral-600 dark:text-neutral-400 px-3 py-2 border-b border-neutral-200 dark:border-neutral-800">@yourlsT('Action')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pluginRows as $row)
                    <tr class="plugin {{ $row['class'] }}">
                        <td class="plugin_name px-3 py-2 align-top border-b border-neutral-100 dark:border-neutral-800"><a href="{{ $row['uri'] }}">{{ $row['name'] }}</a></td>
                        <td class="plugin_version px-3 py-2 align-top border-b border-neutral-100 dark:border-neutral-800">{{ $row['version'] }}</td>
                        <td class="plugin_desc px-3 py-2 align-top border-b border-neutral-100 dark:border-neutral-800">{!! $row['desc'] !!}</td>
                        <td class="plugin_author px-3 py-2 align-top border-b border-neutral-100 dark:border-neutral-800"><a href="{{ $row['author_uri'] }}">{{ $row['author'] }}</a></td>
                        <td class="plugin_actions actions px-3 py-2 align-top border-b border-neutral-100 dark:border-neutral-800"><a href="{{ $row['action_url'] }}">{{ $row['action_anchor'] }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script>
            yourls_defaultsort = 0;
            yourls_defaultorder = 0;
            @if($countActive)
                $('#plugin_summary').append('<span id="toggle_plugins">filter</span>');
                $('#toggle_plugins').css({'background':'transparent url("../images/filter.svg") top left no-repeat','display':'inline-block','text-indent':'-9999px','width':'16px','height':'16px','margin-left':'3px','cursor':'pointer'})
                    .attr('title', {!! json_encode(function_exists('yourls_esc_attr__') ? yourls_esc_attr__('Toggle active/inactive plugins') : 'Toggle active/inactive plugins') !!})
                    .click(function(){
                        $('#main_table tr.inactive').toggle();
                    });
            @endif
        </script>

        <p>@yourlsT('If something goes wrong after you activate a plugin and you cannot use YOURLS or access this page, simply rename or delete its directory, or rename the plugin file to something different than')
            <code>plugin.php</code>.</p>

        <h3>@yourlsT('More plugins')</h3>

        <p>
            {!! function_exists('yourls__') ? yourls__('For more plugins, head to the official <a href="http://yourls.org/awesome">Plugin list</a>.') : 'For more plugins, head to the official <a href="http://yourls.org/awesome">Plugin list</a>.' !!}
        </p>
    </main>
@endsection
