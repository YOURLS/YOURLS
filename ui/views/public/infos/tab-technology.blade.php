@php
    // ── data ────────────────────────────────────────────────────────────
    $tz       = function_exists( 'yourls_get_clicks_meta_aggregate' ) ? yourls_get_clicks_meta_aggregate( $keyword, '$.tz',              'all', 10 ) : [];
    $lang     = function_exists( 'yourls_get_clicks_meta_aggregate' ) ? yourls_get_clicks_meta_aggregate( $keyword, '$.lang',            'all', 10 ) : [];
    $conn     = function_exists( 'yourls_get_clicks_meta_aggregate' ) ? yourls_get_clicks_meta_aggregate( $keyword, '$.connection_type', 'all', 10 ) : [];
    $dprDist  = function_exists( 'yourls_get_dpr_distribution' )      ? yourls_get_dpr_distribution( $keyword )       : [];
    $vp       = function_exists( 'yourls_get_viewport_stats' )        ? yourls_get_viewport_stats( $keyword )         : [ 'avg_w'=>0,'avg_h'=>0,'med_w'=>0,'med_h'=>0,'samples'=>0 ];
    $avgDpr   = function_exists( 'yourls_get_avg_dpr' )               ? yourls_get_avg_dpr( $keyword )                : 0.0;
    $resos    = function_exists( 'yourls_get_top_resolutions' )       ? yourls_get_top_resolutions( $keyword, 10 )    : [];
    $orient   = function_exists( 'yourls_get_orientation_split' )     ? yourls_get_orientation_split( $keyword )      : [ 'portrait'=>0,'landscape'=>0,'square'=>0 ];
    $matrix   = function_exists( 'yourls_get_os_browser_matrix' )     ? yourls_get_os_browser_matrix( $keyword )      : [ 'rows'=>[],'browsers'=>[],'oses'=>[] ];
    $engines  = function_exists( 'yourls_get_engine_distribution' )   ? yourls_get_engine_distribution( $keyword )    : [];
    $stack    = function_exists( 'yourls_get_device_stack_table' )    ? yourls_get_device_stack_table( $keyword, 20 ) : [];

    $beaconHasData = $vp['samples'] > 0 || $dprDist || $tz || $lang || $conn || $resos;
    $serverHasData = $matrix['rows'] || $engines || $stack;
    $hasData       = $beaconHasData || $serverHasData;

    $orientTotal = array_sum( $orient );
    $portraitPct = $orientTotal > 0 ? round( $orient['portrait']  * 100 / $orientTotal ) : 0;
    $landscapePct= $orientTotal > 0 ? round( $orient['landscape'] * 100 / $orientTotal ) : 0;

    $topConn = '—';
    foreach ( $conn as $k => $_ ) if ( $k !== '(unknown)' && $k !== '' ) { $topConn = $k; break; }

    $topEngine = $engines ? array_key_first( $engines ) : '—';

    // ── shared helpers ──────────────────────────────────────────────────
    $hBars = function ( array $rows, int $maxItems = 10, string $palette = '#6366f1' ) {
        $rows = array_slice( $rows, 0, $maxItems, true );
        if ( ! $rows ) return '<p class="text-sm text-neutral-500 dark:text-neutral-400">' . yourls_esc_html( yourls__( 'No data' ) ) . '</p>';
        $total = array_sum( $rows ); $max = max( $rows );
        $out = '<ul class="space-y-2">';
        foreach ( $rows as $label => $v ) {
            $widthPct = $max > 0 ? round( $v * 100 / $max ) : 0;
            $sharePct = $total > 0 ? round( $v * 100 / $total ) : 0;
            $out .= '<li class="flex items-center gap-3 text-xs">'
                  . '<span class="w-24 truncate text-neutral-700 dark:text-neutral-300">' . yourls_esc_html( (string) $label ) . '</span>'
                  . '<span class="flex-1 h-2 rounded-full bg-neutral-200 dark:bg-neutral-800 overflow-hidden">'
                  . '<span class="block h-full" style="width:' . $widthPct . '%;background:' . $palette . '"></span>'
                  . '</span>'
                  . '<span class="font-mono tabular-nums text-neutral-500 dark:text-neutral-400 w-12 text-right">' . (int) $v . '</span>'
                  . '<span class="font-mono tabular-nums text-neutral-400 dark:text-neutral-500 w-10 text-right">' . $sharePct . '%</span>'
                  . '</li>';
        }
        return $out . '</ul>';
    };

    $donutMulti = function ( array $rows, int $size = 140 ) {
        $total = array_sum( $rows );
        if ( $total === 0 ) return '';
        $palette = [ '#6366f1', '#22c55e', '#f97316', '#06b6d4', '#a855f7', '#ec4899', '#eab308', '#64748b' ];
        $r = $size / 2 - 8; $cx = $size / 2; $cy = $size / 2; $circ = 2 * M_PI * $r;
        $svg = '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 ' . $size . ' ' . $size . '" style="transform:rotate(-90deg)">';
        $offset = 0; $i = 0;
        foreach ( $rows as $_ => $v ) {
            $color = $palette[ $i % count( $palette ) ];
            $len = round( $circ * $v / $total, 2 );
            $gap = round( $circ - $len, 2 );
            $svg .= '<circle cx="' . $cx . '" cy="' . $cy . '" r="' . $r . '" fill="none" stroke="' . $color . '" stroke-width="14" stroke-dasharray="' . $len . ' ' . $gap . '" stroke-dashoffset="' . ( -$offset ) . '"/>';
            $offset += $len; $i++;
        }
        return $svg . '</svg>';
    };
@endphp

@if ( ! $hasData )
    <x-organisms::empty-state
        :title="yourls__('No technology telemetry yet')"
        :description="yourls__('Most charts on this tab are populated by the JS beacon. Enable YOURLS_CLICK_INTERSTITIAL to start collecting screen, viewport, timezone, language and connection data from human visitors.')" />
@else

{{-- ── KPI hero row ── --}}
<div class="mb-4" style="display:grid;gap:1rem;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));">
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Average DPR' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ $avgDpr ? $avgDpr . '×' : '—' }}</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ yourls__( 'pixel density' ) }}</div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Median viewport' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ $vp['med_w'] ?: '—' }}{{ $vp['med_w'] ? '×' . $vp['med_h'] : '' }}</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">
            @if ( $vp['samples'] > 0 )
                {{ yourls_s( 'avg %dx%d · %d samples', $vp['avg_w'], $vp['avg_h'], $vp['samples'] ) }}
            @else
                {{ yourls__( 'no beacon samples yet' ) }}
            @endif
        </div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Portrait vs landscape' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ $portraitPct }}% / {{ $landscapePct }}%</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ number_format( $orient['portrait'] ) }} / {{ number_format( $orient['landscape'] ) }}</div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Top connection' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100 uppercase">{{ $topConn }}</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ yourls__( 'Network Information API' ) }}</div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Top engine' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ $topEngine }}</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ yourls__( 'derived from browser family' ) }}</div>
    </div>
</div>

{{-- ── Honest disclosure of what this tab does NOT show ── --}}
<div class="mb-4 yourls-card p-4">
    <div class="flex items-start gap-3">
        <span class="text-info-500 dark:text-info-400 text-lg leading-none mt-0.5" aria-hidden="true">ⓘ</span>
        <div class="text-xs text-neutral-600 dark:text-neutral-400">
            <strong class="text-neutral-700 dark:text-neutral-300">{{ yourls__( 'Not collected by YOURLS:' ) }}</strong>
            {{ yourls__( 'browser/OS version, touch capability, dark-mode preference, cookie/DNT state, page load time, RAM/CPU. These would require extending the beacon — none are currently captured. The KPIs and charts on this tab are derived only from data we already record.' ) }}
        </div>
    </div>
</div>

{{-- ── DPR + Orientation + Engine donuts ── --}}
<div class="mb-4" style="display:grid;gap:1rem;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));">

    <x-organisms::card :title="yourls__('Pixel density (DPR)')">
        <div class="p-5 flex items-center gap-5">
            @if ( $dprDist )
                <div class="text-neutral-700 dark:text-neutral-300 shrink-0">{!! $donutMulti( $dprDist, 140 ) !!}</div>
                <ul class="space-y-1.5 text-xs flex-1 min-w-0">
                    @php $i = 0; $palette = [ '#6366f1','#22c55e','#f97316','#06b6d4' ]; $totalDpr = array_sum( $dprDist ); @endphp
                    @foreach ( $dprDist as $bucket => $n )
                        @php $share = $totalDpr > 0 ? round( $n * 100 / $totalDpr ) : 0; $col = $palette[ $i++ % 4 ]; @endphp
                        <li class="flex items-center gap-2">
                            <span class="inline-block w-3 h-3 rounded-sm shrink-0" style="background:{{ $col }}"></span>
                            <span class="text-neutral-700 dark:text-neutral-300">{{ $bucket }}</span>
                            <span class="font-mono tabular-nums text-neutral-500 dark:text-neutral-400 ml-auto">{{ number_format( $n ) }} ({{ $share }}%)</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No DPR samples yet (collected by the JS beacon).' ) }}</p>
            @endif
        </div>
    </x-organisms::card>

    <x-organisms::card :title="yourls__('Screen orientation')">
        <div class="p-5 flex items-center gap-5">
            @if ( $orientTotal > 0 )
                @php $orientLabeled = [ yourls__( 'Portrait' ) => $orient['portrait'], yourls__( 'Landscape' ) => $orient['landscape'], yourls__( 'Square' ) => $orient['square'] ]; @endphp
                <div class="text-neutral-700 dark:text-neutral-300 shrink-0">{!! $donutMulti( array_filter( $orientLabeled ), 140 ) !!}</div>
                <ul class="space-y-1.5 text-xs flex-1 min-w-0">
                    @php $palette = [ '#6366f1','#22c55e','#f97316' ]; $i = 0; @endphp
                    @foreach ( $orientLabeled as $label => $n )
                        @if ( $n === 0 ) @continue @endif
                        @php $share = $orientTotal > 0 ? round( $n * 100 / $orientTotal ) : 0; $col = $palette[ $i++ % 3 ]; @endphp
                        <li class="flex items-center gap-2">
                            <span class="inline-block w-3 h-3 rounded-sm shrink-0" style="background:{{ $col }}"></span>
                            <span class="text-neutral-700 dark:text-neutral-300">{{ $label }}</span>
                            <span class="font-mono tabular-nums text-neutral-500 dark:text-neutral-400 ml-auto">{{ number_format( $n ) }} ({{ $share }}%)</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No viewport samples yet.' ) }}</p>
            @endif
        </div>
    </x-organisms::card>

    <x-organisms::card :title="yourls__('Rendering engine')">
        <div class="p-5 flex items-center gap-5">
            @if ( $engines )
                <div class="text-neutral-700 dark:text-neutral-300 shrink-0">{!! $donutMulti( $engines, 140 ) !!}</div>
                <ul class="space-y-1.5 text-xs flex-1 min-w-0">
                    @php $palette = [ '#6366f1','#22c55e','#f97316','#06b6d4','#a855f7' ]; $i = 0; $eTotal = array_sum( $engines ); @endphp
                    @foreach ( $engines as $eng => $n )
                        @php $share = $eTotal > 0 ? round( $n * 100 / $eTotal ) : 0; $col = $palette[ $i++ % 5 ]; @endphp
                        <li class="flex items-center gap-2">
                            <span class="inline-block w-3 h-3 rounded-sm shrink-0" style="background:{{ $col }}"></span>
                            <span class="text-neutral-700 dark:text-neutral-300">{{ $eng }}</span>
                            <span class="font-mono tabular-nums text-neutral-500 dark:text-neutral-400 ml-auto">{{ number_format( $n ) }} ({{ $share }}%)</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No engine data.' ) }}</p>
            @endif
        </div>
    </x-organisms::card>

</div>

{{-- ── Top resolutions + Connection types + Languages ── --}}
<div class="mb-4" style="display:grid;gap:1rem;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));">

    <x-organisms::card :title="yourls__('Top screen resolutions')">
        <div class="p-5">
            @if ( $resos )
                {!! $hBars( $resos, 10 ) !!}
            @else
                <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No resolution samples (collected by the JS beacon).' ) }}</p>
            @endif
        </div>
    </x-organisms::card>

    <x-organisms::card :title="yourls__('Connection types')">
        <div class="p-5">
            @if ( $conn )
                {!! $hBars( $conn, 6, '#22c55e' ) !!}
            @else
                <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No connection data (Network Information API).' ) }}</p>
            @endif
        </div>
    </x-organisms::card>

    <x-organisms::card :title="yourls__('Top languages')">
        <div class="p-5">
            @if ( $lang )
                {!! $hBars( $lang, 8, '#f97316' ) !!}
            @else
                <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No language data.' ) }}</p>
            @endif
        </div>
    </x-organisms::card>

</div>

{{-- ── OS × browser heatmap ── --}}
<x-organisms::card :title="yourls__('OS × browser heatmap')" class="mb-4">
    <div class="p-5 overflow-x-auto">
        @if ( $matrix['rows'] && $matrix['oses'] && $matrix['browsers'] )
            @php
                $heatMax = 0;
                foreach ( $matrix['rows'] as $row ) foreach ( $row as $v ) if ( $v > $heatMax ) $heatMax = $v;
            @endphp
            <table class="text-xs tabular-nums" style="border-collapse:separate;border-spacing:3px;">
                <thead>
                    <tr>
                        <th class="px-2 py-1 text-left text-neutral-500 dark:text-neutral-400 font-medium">{{ yourls__( 'OS \\ Browser' ) }}</th>
                        @foreach ( $matrix['browsers'] as $br )
                            <th class="px-2 py-1 font-medium text-neutral-500 dark:text-neutral-400 text-center capitalize">{{ $br }}</th>
                        @endforeach
                        <th class="px-2 py-1 text-right font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Total' ) }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $matrix['oses'] as $os )
                        @php $rowTotal = array_sum( $matrix['rows'][ $os ] ?? [] ); @endphp
                        <tr>
                            <td class="px-2 py-1 font-medium text-neutral-700 dark:text-neutral-300 capitalize">{{ $os }}</td>
                            @foreach ( $matrix['browsers'] as $br )
                                @php
                                    $v = $matrix['rows'][ $os ][ $br ] ?? 0;
                                    $alpha = $heatMax > 0 ? round( 0.10 + ( $v / $heatMax ) * 0.80, 3 ) : 0;
                                    $bg    = $v > 0 ? 'rgba(99,102,241,' . $alpha . ')' : 'transparent';
                                @endphp
                                <td class="px-2 py-1 rounded-sm text-center" style="min-width:48px;background:{{ $bg }}" title="{{ $os }} / {{ $br }}: {{ $v }}">{{ $v > 0 ? $v : '' }}</td>
                            @endforeach
                            <td class="px-2 py-1 text-right font-mono text-neutral-700 dark:text-neutral-300">{{ number_format( $rowTotal ) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Not enough OS/browser data yet.' ) }}</p>
        @endif
    </div>
</x-organisms::card>

{{-- ── Viewport scatter (size distribution) ── --}}
<x-organisms::card :title="yourls__('Viewport size distribution')" class="mb-4">
    <div class="p-5">
        @php
            $scatterSql = 'SELECT '
                        . 'CAST(JSON_UNQUOTE(JSON_EXTRACT(meta, "$.viewport_w")) AS UNSIGNED) AS w, '
                        . 'CAST(JSON_UNQUOTE(JSON_EXTRACT(meta, "$.viewport_h")) AS UNSIGNED) AS h, '
                        . 'COUNT(*) AS c '
                        . 'FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = :k AND meta IS NOT NULL '
                        . 'AND JSON_EXTRACT(meta, "$.viewport_w") IS NOT NULL '
                        . 'AND JSON_EXTRACT(meta, "$.viewport_w") != 0 '
                        . 'GROUP BY w, h ORDER BY c DESC LIMIT 200';
            $scatter = yourls_get_db( 'read-viewport_scatter' )->fetchAll( $scatterSql, [ 'k' => $keyword ] );

            $maxW = 0; $maxH = 0; $maxC = 0;
            foreach ( $scatter as $p ) {
                if ( (int) $p['w'] > $maxW ) $maxW = (int) $p['w'];
                if ( (int) $p['h'] > $maxH ) $maxH = (int) $p['h'];
                if ( (int) $p['c'] > $maxC ) $maxC = (int) $p['c'];
            }
            $maxW = max( $maxW, 1920 ); $maxH = max( $maxH, 1080 );
        @endphp
        @if ( $scatter )
            @php $w = 760; $h = 280; $padL = 30; $padB = 22; $padT = 6; $padR = 6; @endphp
            <svg viewBox="0 0 {{ $w }} {{ $h }}" width="100%" height="{{ $h }}" preserveAspectRatio="none" class="overflow-visible">
                <line x1="{{ $padL }}" y1="{{ $h - $padB }}" x2="{{ $w - $padR }}" y2="{{ $h - $padB }}" stroke="currentColor" stroke-opacity="0.25"/>
                <line x1="{{ $padL }}" y1="{{ $padT }}" x2="{{ $padL }}" y2="{{ $h - $padB }}" stroke="currentColor" stroke-opacity="0.25"/>
                @foreach ( [ 480, 768, 1024, 1280, 1920 ] as $bp )
                    @if ( $bp <= $maxW )
                        @php $x = round( $padL + ( $bp / $maxW ) * ( $w - $padL - $padR ), 2 ); @endphp
                        <line x1="{{ $x }}" y1="{{ $padT }}" x2="{{ $x }}" y2="{{ $h - $padB }}" stroke="currentColor" stroke-opacity="0.08" stroke-dasharray="2,3"/>
                        <text x="{{ $x }}" y="{{ $h - 6 }}" font-size="9" text-anchor="middle" fill="currentColor" fill-opacity="0.5">{{ $bp }}</text>
                    @endif
                @endforeach
                @foreach ( $scatter as $p )
                    @php
                        $px = round( $padL + ( (int) $p['w'] / $maxW ) * ( $w - $padL - $padR ), 2 );
                        $py = round( ( $h - $padB ) - ( (int) $p['h'] / $maxH ) * ( $h - $padT - $padB ), 2 );
                        $r  = $maxC > 0 ? round( 3 + sqrt( (int) $p['c'] / $maxC ) * 9, 2 ) : 4;
                    @endphp
                    <circle cx="{{ $px }}" cy="{{ $py }}" r="{{ $r }}" fill="#6366f1" fill-opacity="0.55" stroke="#6366f1" stroke-width="0.5">
                        <title>{{ (int) $p['w'] }}×{{ (int) $p['h'] }} — {{ (int) $p['c'] }} {{ yourls__( 'click(s)' ) }}</title>
                    </circle>
                @endforeach
                <text x="{{ $padL + 4 }}" y="{{ $padT + 12 }}" font-size="10" fill="currentColor" fill-opacity="0.5">{{ $maxH }}px</text>
                <text x="{{ $w - $padR - 4 }}" y="{{ $h - $padB + 14 }}" font-size="10" text-anchor="end" fill="currentColor" fill-opacity="0.5">{{ yourls__( 'width →' ) }}</text>
            </svg>
            <p class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-2">{{ yourls__( 'Each dot is one width×height pair; size scales with click count. Dashed lines mark common breakpoints.' ) }}</p>
        @else
            <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No viewport samples yet (collected by the JS beacon).' ) }}</p>
        @endif
    </div>
</x-organisms::card>

{{-- ── Combined device + OS + browser table ── --}}
<x-organisms::card :title="yourls__('Device · OS · Browser stack')">
    <div class="p-5 overflow-x-auto">
        @if ( $stack )
            @php $stackTotal = array_sum( array_column( $stack, 'clicks' ) ); @endphp
            <table class="w-full text-xs">
                <thead>
                    <tr class="text-left text-neutral-500 dark:text-neutral-400 border-b border-neutral-200 dark:border-neutral-800">
                        <th class="py-2 pr-4 font-medium">{{ yourls__( 'Device' ) }}</th>
                        <th class="py-2 pr-4 font-medium">{{ yourls__( 'OS' ) }}</th>
                        <th class="py-2 pr-4 font-medium">{{ yourls__( 'Browser' ) }}</th>
                        <th class="py-2 pr-4 font-medium">{{ yourls__( 'Engine' ) }}</th>
                        <th class="py-2 pr-4 font-medium text-right">{{ yourls__( 'Clicks' ) }}</th>
                        <th class="py-2 pr-4 font-medium text-right">{{ yourls__( 'Visitors' ) }}</th>
                        <th class="py-2 font-medium text-right">{{ yourls__( 'Share' ) }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $stack as $r )
                        @php
                            $share  = $stackTotal > 0 ? round( $r['clicks'] * 100 / $stackTotal ) : 0;
                            $engine = function_exists( 'yourls_browser_engine' ) ? yourls_browser_engine( $r['browser'] ) : '—';
                        @endphp
                        <tr class="border-b border-neutral-100 dark:border-neutral-900">
                            <td class="py-2 pr-4"><x-atoms::badge>{{ $r['device'] ?: '—' }}</x-atoms::badge></td>
                            <td class="py-2 pr-4 capitalize text-neutral-700 dark:text-neutral-300">{{ $r['os'] ?: '—' }}</td>
                            <td class="py-2 pr-4 capitalize text-neutral-700 dark:text-neutral-300">{{ $r['browser'] ?: '—' }}</td>
                            <td class="py-2 pr-4 text-neutral-500 dark:text-neutral-400">{{ $engine }}</td>
                            <td class="py-2 pr-4 text-right font-mono tabular-nums text-neutral-900 dark:text-neutral-100">{{ number_format( $r['clicks'] ) }}</td>
                            <td class="py-2 pr-4 text-right font-mono tabular-nums text-neutral-700 dark:text-neutral-300">{{ number_format( $r['visitors'] ) }}</td>
                            <td class="py-2 text-right font-mono tabular-nums text-neutral-500 dark:text-neutral-400">{{ $share }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No data' ) }}</p>
        @endif
    </div>
</x-organisms::card>

@endif
