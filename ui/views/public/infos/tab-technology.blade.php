@php
    $tz   = function_exists( 'yourls_get_clicks_meta_aggregate' ) ? yourls_get_clicks_meta_aggregate( $keyword, '$.tz',              'all', 10 ) : [];
    $lang = function_exists( 'yourls_get_clicks_meta_aggregate' ) ? yourls_get_clicks_meta_aggregate( $keyword, '$.lang',            'all', 10 ) : [];
    $conn = function_exists( 'yourls_get_clicks_meta_aggregate' ) ? yourls_get_clicks_meta_aggregate( $keyword, '$.connection_type', 'all', 10 ) : [];
    $any  = $tz || $lang || $conn;

    $renderBars = function ( array $rows ): string {
        if ( ! $rows ) {
            return '<p class="text-sm text-neutral-500 dark:text-neutral-400">' . yourls_esc_html( yourls__( 'No data' ) ) . '</p>';
        }
        $max = max( $rows );
        $out = '<ul class="space-y-2">';
        foreach ( $rows as $label => $count ) {
            $pct = $max > 0 ? round( $count * 100 / $max ) : 0;
            $out .= '<li class="flex items-center gap-3 text-sm">'
                  . '<span class="min-w-0 flex-1 truncate text-neutral-700 dark:text-neutral-300">' . yourls_esc_html( (string) $label ) . '</span>'
                  . '<span class="relative inline-block h-2 w-32 rounded-full bg-neutral-200 dark:bg-neutral-800 overflow-hidden">'
                  . '<span class="absolute inset-y-0 left-0 bg-primary-500" style="width:' . $pct . '%"></span>'
                  . '</span>'
                  . '<span class="font-mono text-xs tabular-nums text-neutral-600 dark:text-neutral-400">' . (int) $count . '</span>'
                  . '</li>';
        }
        return $out . '</ul>';
    };
@endphp

@if ( ! $any )
    <x-organisms::empty-state
        :title="yourls__('No client telemetry yet')"
        :description="yourls__('Technology stats are populated by the JS beacon. Enable YOURLS_CLICK_INTERSTITIAL to start collecting them.')" />
@else
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <x-organisms::card :title="yourls__('Timezones')">
            <div class="p-5">{!! $renderBars( $tz ) !!}</div>
        </x-organisms::card>
        <x-organisms::card :title="yourls__('Languages')">
            <div class="p-5">{!! $renderBars( $lang ) !!}</div>
        </x-organisms::card>
        <x-organisms::card :title="yourls__('Connection type')">
            <div class="p-5">{!! $renderBars( $conn ) !!}</div>
        </x-organisms::card>
    </div>
@endif
