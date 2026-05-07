@php
    $page    = max( 1, (int) ( $_GET['page'] ?? 1 ) );
    $perPage = 50;
    $rows    = function_exists( 'yourls_get_recent_clicks' ) ? yourls_get_recent_clicks( $keyword, $page, $perPage ) : [];
@endphp

@if ( count( $rows ) === 0 )
    <x-organisms::empty-state
        :title="yourls__('No clicks yet')"
        :description="yourls__('The activity log fills as soon as visitors hit this short URL.')" />
@else
    <x-organisms::card :title="yourls__('Recent clicks')">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left text-neutral-500 dark:text-neutral-400 border-b border-neutral-200 dark:border-neutral-800">
                        <th class="px-4 py-2 font-medium">{{ yourls__( 'Time' ) }}</th>
                        <th class="px-4 py-2 font-medium">{{ yourls__( 'Country' ) }}</th>
                        <th class="px-4 py-2 font-medium">{{ yourls__( 'City' ) }}</th>
                        <th class="px-4 py-2 font-medium">{{ yourls__( 'Device' ) }}</th>
                        <th class="px-4 py-2 font-medium">{{ yourls__( 'Browser' ) }}</th>
                        <th class="px-4 py-2 font-medium">{{ yourls__( 'OS' ) }}</th>
                        <th class="px-4 py-2 font-medium">{{ yourls__( 'Referrer' ) }}</th>
                        <th class="px-4 py-2 font-medium">{{ yourls__( 'UTM source' ) }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $rows as $r )
                        @php $row = (array) $r; @endphp
                        <tr class="border-b border-neutral-100 dark:border-neutral-900">
                            <td class="px-4 py-2 font-mono text-xs text-neutral-600 dark:text-neutral-400">{{ $row['click_time'] ?? '' }}</td>
                            <td class="px-4 py-2 text-neutral-700 dark:text-neutral-300">{{ $row['country_code'] ?? '' }}</td>
                            <td class="px-4 py-2 text-neutral-700 dark:text-neutral-300">{{ $row['city'] ?? '' }}</td>
                            <td class="px-4 py-2"><x-atoms::badge>{{ $row['device_type'] ?? '—' }}</x-atoms::badge></td>
                            <td class="px-4 py-2 text-neutral-700 dark:text-neutral-300">{{ $row['browser'] ?? '' }}</td>
                            <td class="px-4 py-2 text-neutral-700 dark:text-neutral-300">{{ $row['os'] ?? '' }}</td>
                            <td class="px-4 py-2 text-neutral-700 dark:text-neutral-300">{{ $row['referrer_host'] ?? '' }}</td>
                            <td class="px-4 py-2 text-neutral-700 dark:text-neutral-300">{{ $row['utm_source'] ?? '' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-organisms::card>

    <div class="flex justify-end gap-2 mt-3 text-sm">
        @if ( $page > 1 )
            <a class="text-primary-600 dark:text-primary-400 hover:underline" href="?id={{ urlencode( $keyword ) }}&page={{ $page - 1 }}">&larr; {{ yourls__( 'Previous' ) }}</a>
        @endif
        @if ( count( $rows ) === $perPage )
            <a class="text-primary-600 dark:text-primary-400 hover:underline" href="?id={{ urlencode( $keyword ) }}&page={{ $page + 1 }}">{{ yourls__( 'Next' ) }} &rarr;</a>
        @endif
    </div>
@endif
