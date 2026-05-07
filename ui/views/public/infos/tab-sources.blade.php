@php
    $hosts     = function_exists( 'yourls_get_clicks_by_dimension' ) ? yourls_get_clicks_by_dimension( $keyword, 'referrer_host', 'all', 10 ) : [];
    $sources   = function_exists( 'yourls_get_clicks_by_dimension' ) ? yourls_get_clicks_by_dimension( $keyword, 'utm_source',    'all', 10 ) : [];
    $mediums   = function_exists( 'yourls_get_clicks_by_dimension' ) ? yourls_get_clicks_by_dimension( $keyword, 'utm_medium',    'all', 10 ) : [];
    $campaigns = function_exists( 'yourls_get_clicks_by_dimension' ) ? yourls_get_clicks_by_dimension( $keyword, 'utm_campaign',  'all', 10 ) : [];
    $any = $hosts || $sources || $mediums || $campaigns;

    $renderBars = function ( array $rows, string $emptyMsg ): string {
        if ( ! $rows ) {
            return '<p class="text-sm text-neutral-500 dark:text-neutral-400">' . yourls_esc_html( $emptyMsg ) . '</p>';
        }
        $max = max( $rows );
        $out = '<ul class="space-y-2">';
        foreach ( $rows as $label => $count ) {
            $pct = $max > 0 ? round( $count * 100 / $max ) : 0;
            $out .= '<li class="flex items-center gap-3 text-sm">'
                  . '<span class="min-w-0 flex-1 truncate text-neutral-700 dark:text-neutral-300">' . yourls_esc_html( $label ) . '</span>'
                  . '<span class="relative inline-block h-2 w-32 rounded-full bg-neutral-200 dark:bg-neutral-800 overflow-hidden">'
                  . '<span class="absolute inset-y-0 left-0 bg-primary-500" style="width:' . $pct . '%"></span>'
                  . '</span>'
                  . '<span class="font-mono text-xs tabular-nums text-neutral-600 dark:text-neutral-400">' . (int) $count . '</span>'
                  . '</li>';
        }
        return $out . '</ul>';
    };
    $emptyMsg = yourls__( 'No data' );
@endphp

@if ( ! $any )
    <x-organisms::empty-state
        :title="yourls__('No source data')"
        :description="yourls__('Referrer and UTM breakdowns appear after new clicks are recorded.')" />
@else
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <x-organisms::card :title="yourls__('Referrer hosts')">
            <div class="p-5">{!! $renderBars( $hosts, $emptyMsg ) !!}</div>
        </x-organisms::card>
        <x-organisms::card :title="yourls__('UTM sources')">
            <div class="p-5">{!! $renderBars( $sources, $emptyMsg ) !!}</div>
        </x-organisms::card>
        <x-organisms::card :title="yourls__('UTM mediums')">
            <div class="p-5">{!! $renderBars( $mediums, $emptyMsg ) !!}</div>
        </x-organisms::card>
        <x-organisms::card :title="yourls__('UTM campaigns')">
            <div class="p-5">{!! $renderBars( $campaigns, $emptyMsg ) !!}</div>
        </x-organisms::card>
    </div>
@endif
