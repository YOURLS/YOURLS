@php
    $countries = function_exists( 'yourls_get_clicks_by_dimension' ) ? yourls_get_clicks_by_dimension( $keyword, 'country_code', 'all', 50 ) : [];
    $cities    = function_exists( 'yourls_get_clicks_by_dimension' ) ? yourls_get_clicks_by_dimension( $keyword, 'city',         'all', 20 ) : [];
@endphp

@if ( ! $countries && ! $cities )
    <x-organisms::empty-state
        :title="yourls__('No geography data')"
        :description="yourls__('Country and city breakdowns appear after new clicks are recorded.')" />
@else
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <x-organisms::card :title="yourls__('Top countries')">
            <div class="p-5">
                @if ( $countries )
                    @php $maxC = max( $countries ); @endphp
                    <ul class="space-y-2">
                        @foreach ( $countries as $cc => $n )
                            <li class="flex items-center gap-3 text-sm">
                                <span class="min-w-0 flex-1 truncate text-neutral-700 dark:text-neutral-300">{{ $cc }}</span>
                                <span class="relative inline-block h-2 w-32 rounded-full bg-neutral-200 dark:bg-neutral-800 overflow-hidden">
                                    <span class="absolute inset-y-0 left-0 bg-primary-500" style="width:{{ $maxC > 0 ? round( $n * 100 / $maxC ) : 0 }}%"></span>
                                </span>
                                <span class="font-mono text-xs tabular-nums text-neutral-600 dark:text-neutral-400">{{ (int) $n }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No data' ) }}</p>
                @endif
            </div>
        </x-organisms::card>
        <x-organisms::card :title="yourls__('Top cities')">
            <div class="p-5">
                @if ( $cities )
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-left text-neutral-500 dark:text-neutral-400 border-b border-neutral-200 dark:border-neutral-800">
                                <th class="py-2 pr-4 font-medium">{{ yourls__( 'City' ) }}</th>
                                <th class="py-2 font-medium text-right">{{ yourls__( 'Clicks' ) }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $cities as $city => $n )
                                <tr class="border-b border-neutral-100 dark:border-neutral-900">
                                    <td class="py-2 pr-4 text-neutral-700 dark:text-neutral-300">{{ $city }}</td>
                                    <td class="py-2 text-right font-mono tabular-nums text-neutral-900 dark:text-neutral-100">{{ (int) $n }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No city data yet' ) }}</p>
                @endif
            </div>
        </x-organisms::card>
    </div>
@endif
