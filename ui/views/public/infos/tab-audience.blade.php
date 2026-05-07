@php
    $devices  = function_exists( 'yourls_get_clicks_by_dimension' ) ? yourls_get_clicks_by_dimension( $keyword, 'device_type', 'all', 8 ) : [];
    $browsers = function_exists( 'yourls_get_clicks_by_dimension' ) ? yourls_get_clicks_by_dimension( $keyword, 'browser',     'all', 8 ) : [];
    $oses     = function_exists( 'yourls_get_clicks_by_dimension' ) ? yourls_get_clicks_by_dimension( $keyword, 'os',          'all', 6 ) : [];
    $hasData  = $devices || $browsers || $oses;

    $renderBars = function ( array $rows ): string {
        if ( ! $rows ) {
            return '<p class="text-sm text-neutral-500 dark:text-neutral-400">' . yourls_esc_html( yourls__( 'No data' ) ) . '</p>';
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
@endphp

@if ( ! $hasData )
    <x-organisms::empty-state
        :title="yourls__('No audience data')"
        :description="yourls__('Audience breakdown becomes available after the schema upgrade and once new clicks are recorded.')" />
@else
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <x-organisms::card :title="yourls__('Devices')">
            <div class="p-5">{!! $renderBars( $devices ) !!}</div>
        </x-organisms::card>
        <x-organisms::card :title="yourls__('Browsers')">
            <div class="p-5">{!! $renderBars( $browsers ) !!}</div>
        </x-organisms::card>
        <x-organisms::card :title="yourls__('Operating systems')">
            <div class="p-5">{!! $renderBars( $oses ) !!}</div>
        </x-organisms::card>
    </div>
@endif
