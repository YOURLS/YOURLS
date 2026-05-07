@php
    // ── data ────────────────────────────────────────────────────────────
    $segments = function_exists( 'yourls_get_visitor_segments' )      ? yourls_get_visitor_segments( $keyword )       : [ 'new' => 0, 'returning' => 0, 'total_visitors' => 0, 'total_clicks' => 0 ];
    $bot      = function_exists( 'yourls_get_bot_split' )             ? yourls_get_bot_split( $keyword )              : [ 'bot' => 0, 'human' => 0 ];
    $devices  = function_exists( 'yourls_get_clicks_by_dimension' )   ? yourls_get_clicks_by_dimension( $keyword, 'device_type', 'all', 6 ) : [];
    $browsers = function_exists( 'yourls_get_clicks_by_dimension' )   ? yourls_get_clicks_by_dimension( $keyword, 'browser',     'all', 8 ) : [];
    $oses     = function_exists( 'yourls_get_clicks_by_dimension' )   ? yourls_get_clicks_by_dimension( $keyword, 'os',          'all', 6 ) : [];
    $langs    = function_exists( 'yourls_get_clicks_meta_aggregate' ) ? yourls_get_clicks_meta_aggregate( $keyword, '$.lang',     'all', 8 ) : [];
    $osByDev  = function_exists( 'yourls_get_os_by_device' )          ? yourls_get_os_by_device( $keyword, 6 )                              : [];
    $uniqueDay= function_exists( 'yourls_get_unique_visitors_by_day' )? yourls_get_unique_visitors_by_day( $keyword, 30 )                   : [];
    $topUAs   = function_exists( 'yourls_get_top_user_agents' )       ? yourls_get_top_user_agents( $keyword, 10 )                          : [];

    $hasData  = $segments['total_clicks'] > 0;

    // ── helpers ─────────────────────────────────────────────────────────
    $totalVisitors = $segments['total_visitors'];
    $totalClicks   = $segments['total_clicks'];
    $newPct        = $totalVisitors > 0 ? round( $segments['new']       * 100 / $totalVisitors ) : 0;
    $retPct        = $totalVisitors > 0 ? round( $segments['returning'] * 100 / $totalVisitors ) : 0;
    $sessionsAvg   = $totalVisitors > 0 ? round( $totalClicks / $totalVisitors, 2 ) : 0;
    $repeatRate    = $totalVisitors > 0 ? round( $segments['returning'] * 100 / $totalVisitors ) : 0;
    $firstReal = function ( array $rows ) {
        foreach ( $rows as $k => $_ ) if ( $k !== '(unknown)' && $k !== '' ) return $k;
        return $rows ? array_key_first( $rows ) : null;
    };
    $topLang       = $firstReal( $langs )   ?? '—';
    $topDevice     = $firstReal( $devices ) ?? '—';
    $devTotal      = array_sum( $devices );
    $mobilePct     = $devTotal > 0 ? round( ( ( $devices['mobile'] ?? 0 ) + ( $devices['tablet'] ?? 0 ) ) * 100 / $devTotal ) : 0;
    $desktopPct    = $devTotal > 0 ? round( ( $devices['desktop'] ?? 0 ) * 100 / $devTotal ) : 0;
    $botPct        = ( $bot['bot'] + $bot['human'] ) > 0 ? round( $bot['bot'] * 100 / ( $bot['bot'] + $bot['human'] ) ) : 0;

    // ── donut renderer (SVG, two slices) ───────────────────────────────
    $donut2 = function ( int $a, int $b, string $colorA = '#6366f1', string $colorB = '#94a3b8', int $size = 120 ) {
        $total = $a + $b;
        if ( $total === 0 ) return '';
        $r = $size / 2 - 8;
        $cx = $size / 2; $cy = $size / 2;
        $circ = 2 * M_PI * $r;
        $aLen = round( $circ * $a / $total, 2 );
        $bLen = round( $circ - $aLen, 2 );
        return '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 ' . $size . ' ' . $size . '" style="transform:rotate(-90deg)">'
             . '<circle cx="' . $cx . '" cy="' . $cy . '" r="' . $r . '" fill="none" stroke="' . $colorB . '" stroke-width="14"/>'
             . '<circle cx="' . $cx . '" cy="' . $cy . '" r="' . $r . '" fill="none" stroke="' . $colorA . '" stroke-width="14" stroke-dasharray="' . $aLen . ' ' . $bLen . '" stroke-linecap="butt"/>'
             . '</svg>';
    };

    // ── donut renderer (multi slice, takes [label => value]) ────────────
    $donutMulti = function ( array $rows, int $size = 140 ) {
        $total = array_sum( $rows );
        if ( $total === 0 ) return '';
        $palette = [ '#6366f1', '#22c55e', '#f97316', '#06b6d4', '#a855f7', '#ec4899', '#eab308', '#64748b' ];
        $r = $size / 2 - 8;
        $cx = $size / 2; $cy = $size / 2;
        $circ = 2 * M_PI * $r;
        $svg = '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 ' . $size . ' ' . $size . '" style="transform:rotate(-90deg)">';
        $offset = 0; $i = 0;
        foreach ( $rows as $label => $v ) {
            $color = $palette[ $i % count( $palette ) ];
            $len = round( $circ * $v / $total, 2 );
            $gap = round( $circ - $len, 2 );
            $svg .= '<circle cx="' . $cx . '" cy="' . $cy . '" r="' . $r . '" fill="none" stroke="' . $color . '" stroke-width="14" stroke-dasharray="' . $len . ' ' . $gap . '" stroke-dashoffset="' . ( -$offset ) . '"/>';
            $offset += $len;
            $i++;
        }
        $svg .= '</svg>';
        return $svg;
    };

    // ── horizontal bars renderer ────────────────────────────────────────
    $hBars = function ( array $rows, int $maxItems = 10 ) {
        $rows = array_slice( $rows, 0, $maxItems, true );
        if ( ! $rows ) return '<p class="text-sm text-neutral-500 dark:text-neutral-400">' . yourls_esc_html( yourls__( 'No data' ) ) . '</p>';
        $total = array_sum( $rows );
        $max   = max( $rows );
        $out   = '<ul class="space-y-2">';
        foreach ( $rows as $label => $v ) {
            $widthPct = $max > 0 ? round( $v * 100 / $max ) : 0;
            $sharePct = $total > 0 ? round( $v * 100 / $total ) : 0;
            $out .= '<li class="flex items-center gap-3 text-xs">'
                  . '<span class="w-24 truncate text-neutral-700 dark:text-neutral-300">' . yourls_esc_html( (string) $label ) . '</span>'
                  . '<span class="flex-1 h-2 rounded-full bg-neutral-200 dark:bg-neutral-800 overflow-hidden">'
                  . '<span class="block h-full bg-primary-500" style="width:' . $widthPct . '%"></span>'
                  . '</span>'
                  . '<span class="font-mono tabular-nums text-neutral-500 dark:text-neutral-400 w-12 text-right">' . (int) $v . '</span>'
                  . '<span class="font-mono tabular-nums text-neutral-400 dark:text-neutral-500 w-10 text-right">' . $sharePct . '%</span>'
                  . '</li>';
        }
        return $out . '</ul>';
    };

    // ── sparkline (re-used from Overview) ───────────────────────────────
    $sparkline = function ( array $values, int $w = 220, int $h = 36, string $stroke = 'currentColor' ) {
        $values = array_values( $values );
        $n = count( $values );
        if ( $n === 0 ) return '';
        $max = max( $values );
        if ( $max === 0 ) {
            return '<svg viewBox="0 0 ' . $w . ' ' . $h . '" width="100%" height="' . $h . '" preserveAspectRatio="none" aria-hidden="true">'
                 . '<line x1="0" y1="' . ( $h - 1 ) . '" x2="' . $w . '" y2="' . ( $h - 1 ) . '" stroke="' . $stroke . '" stroke-opacity="0.3" stroke-width="1"/>'
                 . '</svg>';
        }
        $points = []; $area = [];
        for ( $i = 0; $i < $n; $i++ ) {
            $x = $n > 1 ? round( $i * $w / ( $n - 1 ), 2 ) : 0;
            $y = round( $h - 2 - ( $values[ $i ] / $max ) * ( $h - 4 ), 2 );
            $points[] = $x . ',' . $y;
        }
        $area[] = '0,' . $h;
        foreach ( $points as $p ) $area[] = $p;
        $area[] = $w . ',' . $h;
        return '<svg viewBox="0 0 ' . $w . ' ' . $h . '" width="100%" height="' . $h . '" preserveAspectRatio="none" aria-hidden="true">'
             . '<polygon points="' . implode( ' ', $area ) . '" fill="' . $stroke . '" fill-opacity="0.12"/>'
             . '<polyline points="' . implode( ' ', $points ) . '" fill="none" stroke="' . $stroke . '" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>'
             . '</svg>';
    };

    // ── gauge (half donut) for bot % ────────────────────────────────────
    $gauge = function ( int $pct, int $size = 140 ) {
        $pct = max( 0, min( 100, $pct ) );
        $r = $size / 2 - 10;
        $cx = $size / 2; $cy = $size / 2;
        // Half-circle perimeter
        $half = M_PI * $r;
        $fill = round( $half * $pct / 100, 2 );
        $rest = round( $half - $fill, 2 );
        $tone = $pct < 30 ? '#22c55e' : ( $pct < 60 ? '#eab308' : '#ef4444' );
        return '<svg width="' . $size . '" height="' . ( $size / 2 + 10 ) . '" viewBox="0 0 ' . $size . ' ' . ( $size / 2 + 10 ) . '">'
             . '<path d="M ' . ( 10 ) . ' ' . $cy . ' A ' . $r . ' ' . $r . ' 0 0 1 ' . ( $size - 10 ) . ' ' . $cy . '" fill="none" stroke="#e5e7eb" stroke-width="14"/>'
             . '<path d="M ' . ( 10 ) . ' ' . $cy . ' A ' . $r . ' ' . $r . ' 0 0 1 ' . ( $size - 10 ) . ' ' . $cy . '" fill="none" stroke="' . $tone . '" stroke-width="14" stroke-dasharray="' . $fill . ' ' . $rest . '" stroke-linecap="round"/>'
             . '<text x="' . $cx . '" y="' . ( $cy - 6 ) . '" text-anchor="middle" font-size="22" font-weight="700" fill="currentColor">' . $pct . '%</text>'
             . '</svg>';
    };
@endphp

@if ( ! $hasData )
    <x-organisms::empty-state
        :title="yourls__('No audience data')"
        :description="yourls__('Audience breakdown becomes available after new clicks are recorded.')" />
@else

{{-- ── KPI hero row ── --}}
<div class="mb-4" style="display:grid;gap:1rem;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));">
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Unique visitors' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ number_format( $totalVisitors ) }}</div>
        <div class="mt-2 text-emerald-500 dark:text-emerald-400">{!! $sparkline( array_values( $uniqueDay ) ) !!}</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ yourls__( 'last 30 days' ) }}</div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Avg clicks per visitor' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ $sessionsAvg }}</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ $totalClicks }} / {{ $totalVisitors }}</div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Repeat rate' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ $repeatRate }}%</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ yourls__( 'visitors with ≥2 clicks' ) }}</div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Mobile vs desktop' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ $mobilePct }}% / {{ $desktopPct }}%</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ yourls__( 'mobile+tablet vs desktop' ) }}</div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Top language' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ $topLang }}</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ yourls__( 'from Accept-Language' ) }}</div>
    </div>
</div>

{{-- ── New vs Returning + Bot vs Human gauge + Devices donut ── --}}
<div class="mb-4" style="display:grid;gap:1rem;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));">

    <x-organisms::card :title="yourls__('New vs returning visitors')">
        <div class="p-5 flex items-center gap-5">
            <div class="text-primary-500 dark:text-primary-400">{!! $donut2( $segments['new'], $segments['returning'], '#6366f1', '#94a3b8', 130 ) !!}</div>
            <ul class="space-y-2 text-sm">
                <li class="flex items-center gap-2"><span class="inline-block w-3 h-3 rounded-sm" style="background:#6366f1"></span><span class="text-neutral-700 dark:text-neutral-300">{{ yourls__( 'New' ) }}</span><span class="font-mono tabular-nums text-neutral-500 dark:text-neutral-400">{{ number_format( $segments['new'] ) }} ({{ $newPct }}%)</span></li>
                <li class="flex items-center gap-2"><span class="inline-block w-3 h-3 rounded-sm" style="background:#94a3b8"></span><span class="text-neutral-700 dark:text-neutral-300">{{ yourls__( 'Returning' ) }}</span><span class="font-mono tabular-nums text-neutral-500 dark:text-neutral-400">{{ number_format( $segments['returning'] ) }} ({{ $retPct }}%)</span></li>
            </ul>
        </div>
    </x-organisms::card>

    <x-organisms::card :title="yourls__('Bot vs human traffic')">
        <div class="p-5 flex items-center gap-5">
            <div class="text-neutral-700 dark:text-neutral-300">{!! $gauge( $botPct ) !!}</div>
            <ul class="space-y-2 text-sm">
                <li class="text-neutral-700 dark:text-neutral-300">{{ yourls__( 'Bot clicks' ) }}: <span class="font-mono tabular-nums">{{ number_format( $bot['bot'] ) }}</span></li>
                <li class="text-neutral-700 dark:text-neutral-300">{{ yourls__( 'Human clicks' ) }}: <span class="font-mono tabular-nums">{{ number_format( $bot['human'] ) }}</span></li>
                <li class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ yourls__( 'green <30%, amber 30–60%, red >60%' ) }}</li>
            </ul>
        </div>
    </x-organisms::card>

    <x-organisms::card :title="yourls__('Device breakdown')">
        <div class="p-5 flex items-center gap-5">
            @php
                $devicePalette = [ 'desktop' => '#6366f1', 'mobile' => '#22c55e', 'tablet' => '#f97316', 'bot' => '#94a3b8' ];
                $orderedDev = [];
                foreach ( $devicePalette as $k => $_ ) if ( isset( $devices[ $k ] ) ) $orderedDev[ $k ] = $devices[ $k ];
                foreach ( $devices as $k => $v ) if ( ! isset( $orderedDev[ $k ] ) ) $orderedDev[ $k ] = $v;
            @endphp
            <div class="text-neutral-700 dark:text-neutral-300">{!! $donutMulti( $orderedDev, 140 ) !!}</div>
            <ul class="space-y-1.5 text-xs">
                @php $i = 0; @endphp
                @foreach ( $orderedDev as $name => $n )
                    @php $color = $devicePalette[ $name ] ?? [ '#6366f1', '#22c55e', '#f97316', '#06b6d4', '#a855f7', '#ec4899', '#eab308', '#64748b' ][ $i++ % 8 ]; @endphp
                    <li class="flex items-center gap-2">
                        <span class="inline-block w-3 h-3 rounded-sm" style="background:{{ $color }}"></span>
                        <span class="text-neutral-700 dark:text-neutral-300 capitalize">{{ $name }}</span>
                        <span class="font-mono tabular-nums text-neutral-500 dark:text-neutral-400 ml-auto">{{ $devTotal > 0 ? round( $n * 100 / $devTotal ) : 0 }}%</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </x-organisms::card>
</div>

{{-- ── Browsers + OS×Device stacked + Languages ── --}}
<div class="mb-4" style="display:grid;gap:1rem;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));">

    <x-organisms::card :title="yourls__('Top browsers')">
        <div class="p-5">{!! $hBars( $browsers, 8 ) !!}</div>
    </x-organisms::card>

    <x-organisms::card :title="yourls__('Top operating systems')">
        <div class="p-5">{!! $hBars( $oses, 6 ) !!}</div>
    </x-organisms::card>

    <x-organisms::card :title="yourls__('Top languages')">
        <div class="p-5">
            @if ( $langs )
                {!! $hBars( $langs, 8 ) !!}
            @else
                <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No language data yet (collected via the JS beacon).' ) }}</p>
            @endif
        </div>
    </x-organisms::card>
</div>

{{-- ── OS × device-type stacked bar ── --}}
<x-organisms::card :title="yourls__('OS by device type')" class="mb-4">
    <div class="p-5">
        @if ( $osByDev )
            @php
                $devColors = [ 'desktop' => '#6366f1', 'mobile' => '#22c55e', 'tablet' => '#f97316', 'bot' => '#94a3b8' ];
                $osMax = 0;
                foreach ( $osByDev as $row ) { $sum = array_sum( $row ); if ( $sum > $osMax ) $osMax = $sum; }
            @endphp
            <ul class="space-y-2">
                @foreach ( $osByDev as $os => $dist )
                    @php $sum = array_sum( $dist ); $widthPct = $osMax > 0 ? round( $sum * 100 / $osMax ) : 0; @endphp
                    <li class="text-xs">
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-neutral-700 dark:text-neutral-300 capitalize">{{ $os }}</span>
                            <span class="font-mono tabular-nums text-neutral-500 dark:text-neutral-400">{{ $sum }}</span>
                        </div>
                        <div class="flex h-3 rounded-full overflow-hidden bg-neutral-200 dark:bg-neutral-800" style="width:{{ $widthPct }}%">
                            @foreach ( $dist as $dev => $n )
                                @if ( $n > 0 )
                                    @php $segPct = $sum > 0 ? round( $n * 100 / $sum, 2 ) : 0; $col = $devColors[ $dev ] ?? '#cbd5e1'; @endphp
                                    <span class="block h-full" style="width:{{ $segPct }}%;background:{{ $col }}" title="{{ $dev }}: {{ $n }}"></span>
                                @endif
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="flex flex-wrap gap-3 mt-3 text-[11px] text-neutral-500 dark:text-neutral-400">
                @foreach ( $devColors as $name => $col )
                    <span class="flex items-center gap-1"><span class="inline-block w-2.5 h-2.5 rounded-sm" style="background:{{ $col }}"></span><span class="capitalize">{{ $name }}</span></span>
                @endforeach
            </div>
        @else
            <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No data' ) }}</p>
        @endif
    </div>
</x-organisms::card>

{{-- ── Unique visitors growth (line chart) ── --}}
<x-organisms::card :title="yourls__('Unique visitors over time (last 30 days)')" class="mb-4">
    <div class="p-5">
        @php
            $w = 720; $h = 200; $vals = array_values( $uniqueDay ); $n = count( $vals ); $max = $n ? max( $vals ) : 0;
            $points = []; $area = [];
            if ( $n > 0 && $max > 0 ) {
                for ( $i = 0; $i < $n; $i++ ) {
                    $x = $n > 1 ? round( $i * $w / ( $n - 1 ), 2 ) : 0;
                    $y = round( $h - 6 - ( $vals[ $i ] / $max ) * ( $h - 16 ), 2 );
                    $points[] = $x . ',' . $y;
                }
                $area[] = '0,' . $h;
                foreach ( $points as $p ) $area[] = $p;
                $area[] = $w . ',' . $h;
            }
        @endphp
        @if ( $max > 0 )
            <div class="text-emerald-500 dark:text-emerald-400">
                <svg viewBox="0 0 {{ $w }} {{ $h }}" width="100%" height="{{ $h }}" preserveAspectRatio="none" class="overflow-visible">
                    <polygon points="{{ implode( ' ', $area ) }}" fill="currentColor" fill-opacity="0.10"/>
                    <polyline points="{{ implode( ' ', $points ) }}" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <div class="flex justify-between text-[11px] text-neutral-500 dark:text-neutral-400 mt-2 font-mono">
                    <span>{{ array_key_first( $uniqueDay ) }}</span>
                    <span class="opacity-70">{{ yourls__( 'peak:' ) }} {{ number_format( $max ) }}</span>
                    <span>{{ array_key_last( $uniqueDay ) }}</span>
                </div>
            </div>
        @else
            <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No visitors recorded in the last 30 days.' ) }}</p>
        @endif
    </div>
</x-organisms::card>

{{-- ── Top user-agents ── --}}
<x-organisms::card :title="yourls__('Top user-agents')">
    <div class="p-5 overflow-x-auto">
        @if ( $topUAs )
            <table class="w-full text-xs">
                <thead>
                    <tr class="text-left text-neutral-500 dark:text-neutral-400 border-b border-neutral-200 dark:border-neutral-800">
                        <th class="py-2 pr-4 font-medium">{{ yourls__( 'User agent' ) }}</th>
                        <th class="py-2 font-medium text-right w-20">{{ yourls__( 'Clicks' ) }}</th>
                        <th class="py-2 font-medium text-right w-16">{{ yourls__( 'Share' ) }}</th>
                    </tr>
                </thead>
                <tbody>
                    @php $uaTotal = array_sum( $topUAs ); @endphp
                    @foreach ( $topUAs as $ua => $n )
                        <tr class="border-b border-neutral-100 dark:border-neutral-900">
                            <td class="py-2 pr-4 font-mono text-[11px] text-neutral-700 dark:text-neutral-300 break-all">{{ $ua }}</td>
                            <td class="py-2 text-right font-mono tabular-nums text-neutral-900 dark:text-neutral-100">{{ (int) $n }}</td>
                            <td class="py-2 text-right font-mono tabular-nums text-neutral-500 dark:text-neutral-400">{{ $uaTotal > 0 ? round( $n * 100 / $uaTotal ) : 0 }}%</td>
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
