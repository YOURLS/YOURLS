@extends('admin', ['context' => 'plugins', 'title' => function_exists('yourls__') ? yourls__('Manage Plugins') : 'Manage Plugins'])

@section('content')
    <div class="space-y-4">
        <x-organisms::card :title="function_exists('yourls__') ? yourls__('Plugins') : 'Plugins'">
            <div class="flex items-center justify-between mb-3 gap-3 flex-wrap">
                <p id="plugin_summary" class="text-sm text-neutral-700 dark:text-neutral-300">
                    {!! sprintf(
                        function_exists('yourls__') ? yourls__('You currently have <strong>%1$s</strong> installed, and <strong>%2$s</strong> activated') : 'You currently have %1$s installed, and %2$s activated',
                        $pluginsCount, $countActive
                    ) !!}
                </p>
                @if($countActive)
                    <button
                        type="button"
                        id="toggle_plugins"
                        class="inline-flex items-center gap-1.5 rounded-md border border-neutral-300 dark:border-neutral-700 bg-white dark:bg-neutral-900 px-2.5 py-1.5 text-xs font-medium hover:bg-neutral-50 dark:hover:bg-neutral-800 transition-colors"
                        title="{{ function_exists('yourls_esc_attr__') ? yourls_esc_attr__('Toggle active/inactive plugins') : 'Toggle active/inactive plugins' }}"
                    >
                        <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M4 5h16M7 12h10M10 19h4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        @yourlsT('Toggle inactive')
                    </button>
                @endif
            </div>

            <x-organisms::table id="main_table">
                <x-organisms::table.head :cells="[
                    'name'    => yourls__('Plugin Name'),
                    'version' => yourls__('Version'),
                    'desc'    => yourls__('Description'),
                    'author'  => yourls__('Author'),
                    'action'  => yourls__('Action'),
                ]" />
                <x-organisms::table.tbody>
                    @forelse($pluginRows as $row)
                        @php
                            $isActive   = !empty($row['class']) && strpos($row['class'], 'active') !== false && strpos($row['class'], 'inactive') === false;
                            $rowClass   = 'plugin ' . ($row['class'] ?? '');
                            $actionLbl  = strtolower(strip_tags((string) $row['action_anchor']));
                            $isDeactivate = str_contains($actionLbl, 'deactiv');
                        @endphp
                        <tr class="{{ $rowClass }}">
                            <td class="plugin_name px-3 py-2 align-top border-b border-neutral-100 dark:border-neutral-800">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <a href="{{ $row['uri'] }}" class="font-medium text-neutral-900 dark:text-neutral-100 hover:underline">{{ $row['name'] }}</a>
                                    @if($isActive)
                                        <x-atoms::badge tone="success" dot="true">@yourlsT('Active')</x-atoms::badge>
                                    @endif
                                </div>
                                @if(!empty($row['file']))
                                    <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400 font-mono break-all">{{ $row['file'] }}</p>
                                @endif
                            </td>
                            <td class="plugin_version px-3 py-2 align-top border-b border-neutral-100 dark:border-neutral-800 text-sm">
                                <code class="text-xs">{{ $row['version'] }}</code>
                            </td>
                            <td class="plugin_desc px-3 py-2 align-top border-b border-neutral-100 dark:border-neutral-800 text-sm text-neutral-700 dark:text-neutral-300">
                                {!! $row['desc'] !!}
                            </td>
                            <td class="plugin_author px-3 py-2 align-top border-b border-neutral-100 dark:border-neutral-800 text-sm">
                                @if(!empty($row['author_uri']))
                                    <a href="{{ $row['author_uri'] }}" class="text-primary-600 hover:underline">{{ $row['author'] }}</a>
                                @else
                                    {{ $row['author'] }}
                                @endif
                            </td>
                            <td class="plugin_actions actions px-3 py-2 align-top border-b border-neutral-100 dark:border-neutral-800">
                                <a href="{{ $row['action_url'] }}">
                                    <x-atoms::button
                                        type="button"
                                        :variant="$isDeactivate ? 'secondary' : 'primary'"
                                        size="sm"
                                        onclick="window.location='{{ $row['action_url'] }}'; return false;"
                                    >
                                        {{ $row['action_anchor'] }}
                                    </x-atoms::button>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <x-organisms::table.empty :colspan="5" :message="yourls__('No plugins found.')" />
                    @endforelse
                </x-organisms::table.tbody>
            </x-organisms::table>

            <script>
                yourls_defaultsort = 0;
                yourls_defaultorder = 0;
                @if($countActive)
                    document.getElementById('toggle_plugins')?.addEventListener('click', function () {
                        document.querySelectorAll('#main_table tr.inactive').forEach(function (tr) {
                            tr.style.display = (tr.style.display === 'none' ? '' : 'none');
                        });
                    });
                @endif
            </script>
        </x-organisms::card>

        <x-organisms::banner tone="warning">
            {!! function_exists('yourls__')
                ? yourls__('If something goes wrong after you activate a plugin and you cannot use YOURLS or access this page, rename or delete the plugin directory, or rename its <code>plugin.php</code> file to something else.')
                : 'If something goes wrong, rename the plugin file.' !!}
        </x-organisms::banner>

        <x-organisms::card :title="function_exists('yourls__') ? yourls__('More plugins') : 'More plugins'">
            <p class="text-sm text-neutral-700 dark:text-neutral-300">
                {!! function_exists('yourls__')
                    ? yourls__('For more plugins, head to the official <a class="text-primary-600 hover:underline" href="http://yourls.org/awesome">Plugin list</a>.')
                    : 'For more plugins, head to the official <a class="text-primary-600 hover:underline" href="http://yourls.org/awesome">Plugin list</a>.' !!}
            </p>
        </x-organisms::card>
    </div>
@endsection
