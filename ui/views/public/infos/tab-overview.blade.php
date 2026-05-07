@php
    // ── data ────────────────────────────────────────────────────────────
    $total      = function_exists( 'yourls_get_keyword_clicks' ) ? (int) yourls_get_keyword_clicks( $keyword ) : 0;
    $unique     = function_exists( 'yourls_get_unique_visitors' ) ? yourls_get_unique_visitors( $keyword, 'all' ) : 0;
    $windows    = function_exists( 'yourls_get_click_windows' )   ? yourls_get_click_windows( $keyword )         : [ 'today' => 0, 'last7d' => 0, 'last30d' => 0 ];
    $byDay30    = function_exists( 'yourls_get_clicks_by_day' )   ? yourls_get_clicks_by_day( $keyword, 30 )      : [];
    $byDay7     = array_slice( $byDay30, -7, 7, true );
    $heatmap    = function_exists( 'yourls_get_clicks_heatmap' )  ? yourls_get_clicks_heatmap( $keyword, 30 )     : array_fill( 0, 7, array_fill( 0, 24, 0 ) );
    $ttfc       = function_exists( 'yourls_get_time_to_first_click' ) ? yourls_get_time_to_first_click( $keyword ) : null;
    $devices    = function_exists( 'yourls_get_clicks_by_dimension' ) ? yourls_get_clicks_by_dimension( $keyword, 'device_type', 'all', 5 ) : [];
    $countries  = function_exists( 'yourls_get_clicks_by_dimension' ) ? yourls_get_clicks_by_dimension( $keyword, 'country_code', 'all', 5 ) : [];

    // ── prior period for trend deltas (compare last 7d to the 7d before) ─
    $byDay30Vals = array_values( $byDay30 );
    $cur7  = array_sum( array_slice( $byDay30Vals, -7 ) );
    $prev7 = array_sum( array_slice( $byDay30Vals, -14, 7 ) );
    $delta7Pct = $prev7 > 0 ? round( ( $cur7 - $prev7 ) * 100 / $prev7 ) : ( $cur7 > 0 ? 100 : 0 );
    $cur30  = array_sum( array_slice( $byDay30Vals, -30 ) );
    $prev30 = array_sum( array_slice( $byDay30Vals, -60, 30 ) ); // empty if we only have 30 days; fine
    $delta30Pct = $prev30 > 0 ? round( ( $cur30 - $prev30 ) * 100 / $prev30 ) : ( $cur30 > 0 ? 100 : 0 );

    // ── inline sparkline renderer ───────────────────────────────────────
    $sparkline = function ( array $values, int $w = 120, int $h = 28, string $stroke = 'currentColor' ) {
        if ( ! $values ) return '';
        $values = array_values( $values );
        $n = count( $values );
        $max = max( $values );
        if ( $max === 0 ) {
            return '<svg viewBox="0 0 ' . $w . ' ' . $h . '" width="' . $w . '" height="' . $h . '" aria-hidden="true">'
                 . '<line x1="0" y1="' . ( $h - 1 ) . '" x2="' . $w . '" y2="' . ( $h - 1 ) . '" stroke="' . $stroke . '" stroke-opacity="0.3" stroke-width="1"/>'
                 . '</svg>';
        }
        $points = [];
        $area   = [];
        for ( $i = 0; $i < $n; $i++ ) {
            $x = $n > 1 ? round( $i * $w / ( $n - 1 ), 2 ) : 0;
            $y = round( $h - 2 - ( $values[ $i ] / $max ) * ( $h - 4 ), 2 );
            $points[] = $x . ',' . $y;
        }
        $area[] = '0,' . $h;
        foreach ( $points as $p ) $area[] = $p;
        $area[] = $w . ',' . $h;
        return '<svg viewBox="0 0 ' . $w . ' ' . $h . '" width="' . $w . '" height="' . $h . '" preserveAspectRatio="none" aria-hidden="true">'
             . '<polygon points="' . implode( ' ', $area ) . '" fill="' . $stroke . '" fill-opacity="0.12"/>'
             . '<polyline points="' . implode( ' ', $points ) . '" fill="none" stroke="' . $stroke . '" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>'
             . '</svg>';
    };

    // ── pick first non-(unknown) bucket ─────────────────────────────────
    $firstReal = function ( array $rows ) {
        foreach ( $rows as $k => $_ ) {
            if ( $k !== '(unknown)' && $k !== '' ) return $k;
        }
        return $rows ? array_key_first( $rows ) : null;
    };
    $topDevice  = $firstReal( $devices )   ?? '—';
    $topCountry = $firstReal( $countries ) ?? '—';

    // ── ttfc string ─────────────────────────────────────────────────────
    $ttfcLabel = $ttfc !== null ? yourls_format_duration( max( 0, $ttfc ) ) : '—';

    // ── heatmap helpers ─────────────────────────────────────────────────
    $heatMax = 0;
    foreach ( $heatmap as $row ) foreach ( $row as $v ) if ( $v > $heatMax ) $heatMax = $v;
    $heatColor = function ( int $v ) use ( $heatMax ) {
        if ( $heatMax === 0 ) return 'background:transparent';
        $intensity = $v / $heatMax;            // 0..1
        $alpha = 0.08 + $intensity * 0.82;     // 0.08..0.90
        return 'background:rgba(99,102,241,' . round( $alpha, 3 ) . ')';
    };
    $dows = [ yourls__( 'Mon' ), yourls__( 'Tue' ), yourls__( 'Wed' ), yourls__( 'Thu' ), yourls__( 'Fri' ), yourls__( 'Sat' ), yourls__( 'Sun' ) ];

    // ── delta badge helper ──────────────────────────────────────────────
    $delta = function ( int $pct ) {
        $tone = $pct > 0 ? 'text-success-600 dark:text-success-400' : ( $pct < 0 ? 'text-danger-600 dark:text-danger-400' : 'text-neutral-500 dark:text-neutral-400' );
        $arrow = $pct > 0 ? '▲' : ( $pct < 0 ? '▼' : '·' );
        return '<span class="text-xs font-medium tabular-nums ' . $tone . '">' . $arrow . ' ' . abs( $pct ) . '%</span>';
    };
@endphp

@if ( $total === 0 )
    <x-organisms::empty-state
        :title="yourls__('No clicks yet')"
        :description="yourls__('Stats appear here as soon as the short URL is visited.')" />
@else

{{-- ── KPI row 1: 4 main stats with sparkline + delta vs prior period ── --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
    <div class="yourls-card p-4">
        <div class="flex items-start justify-between gap-2">
            <div class="min-w-0">
                <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Total clicks' ) }}</div>
                <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ number_format( $total ) }}</div>
            </div>
            {!! $delta( $delta30Pct ) !!}
        </div>
        <div class="mt-2 text-primary-500 dark:text-primary-400">{!! $sparkline( $byDay30Vals ) !!}</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ yourls__( 'last 30 days vs previous 30' ) }}</div>
    </div>

    <div class="yourls-card p-4">
        <div class="flex items-start justify-between gap-2">
            <div class="min-w-0">
                <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Unique visitors' ) }}</div>
                <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ number_format( $unique ) }}</div>
            </div>
            <span class="text-xs font-mono text-neutral-400 dark:text-neutral-500">
                {{ $total > 0 ? round( $unique * 100 / $total ) : 0 }}%
            </span>
        </div>
        <div class="mt-2 text-emerald-500 dark:text-emerald-400">{!! $sparkline( array_values( $byDay7 ) ) !!}</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ yourls__( 'distinct visitors / total' ) }}</div>
    </div>

    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Top device' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100 capitalize">{{ $topDevice }}</div>
        @if ( $devices )
            @php $deviceTotal = array_sum( $devices ); @endphp
            <ul class="mt-2 space-y-1">
                @foreach ( $devices as $name => $n )
                    @php $pct = $deviceTotal > 0 ? round( $n * 100 / $deviceTotal ) : 0; @endphp
                    <li class="flex items-center gap-2 text-xs">
                        <span class="w-16 truncate text-neutral-700 dark:text-neutral-300 capitalize">{{ $name }}</span>
                        <span class="flex-1 h-1.5 rounded-full bg-neutral-200 dark:bg-neutral-800 overflow-hidden">
                            <span class="block h-full bg-primary-500" style="width:{{ $pct }}%"></span>
                        </span>
                        <span class="font-mono tabular-nums text-neutral-500 dark:text-neutral-400 w-9 text-right">{{ $pct }}%</span>
                    </li>
                @endforeach
            </ul>
        @endif
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ yourls__( 'split across devices' ) }}</div>
    </div>

    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Top country' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ $topCountry }}</div>
        @if ( $countries )
            <ul class="mt-2 space-y-1">
                @php $cMax = max( $countries ); @endphp
                @foreach ( array_slice( $countries, 0, 3 ) as $cc => $n )
                    <li class="flex items-center gap-2 text-xs">
                        <span class="w-8 font-mono text-neutral-700 dark:text-neutral-300">{{ $cc }}</span>
                        <span class="flex-1 h-1.5 rounded-full bg-neutral-200 dark:bg-neutral-800 overflow-hidden">
                            <span class="block h-full bg-primary-500" style="width:{{ $cMax > 0 ? round( $n * 100 / $cMax ) : 0 }}%"></span>
                        </span>
                        <span class="font-mono tabular-nums text-neutral-500 dark:text-neutral-400">{{ (int) $n }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>

{{-- ── KPI row 2: today / 7d / 30d / time-to-first-click ── --}}
<div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-5">
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Today' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ number_format( $windows['today'] ) }}</div>
    </div>
    <div class="yourls-card p-4">
        <div class="flex items-start justify-between gap-2">
            <div>
                <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Last 7 days' ) }}</div>
                <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ number_format( $windows['last7d'] ) }}</div>
            </div>
            {!! $delta( $delta7Pct ) !!}
        </div>
    </div>
    <div class="yourls-card p-4">
        <div class="flex items-start justify-between gap-2">
            <div>
                <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Last 30 days' ) }}</div>
                <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ number_format( $windows['last30d'] ) }}</div>
            </div>
            {!! $delta( $delta30Pct ) !!}
        </div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Time to first click' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ $ttfcLabel }}</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ yourls__( 'after the link was created' ) }}</div>
    </div>
</div>

{{-- ── 30d clicks line chart ── --}}
<x-organisms::card :title="yourls__('Clicks over time (last 30 days)')">
    <div class="p-5">
        @php
            $w = 720; $h = 200; $vals = $byDay30Vals; $n = count( $vals ); $max = $n ? max( $vals ) : 0;
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
            <div class="relative text-primary-500 dark:text-primary-400">
                <svg viewBox="0 0 {{ $w }} {{ $h }}" width="100%" height="{{ $h }}" preserveAspectRatio="none" class="overflow-visible">
                    <polygon points="{{ implode( ' ', $area ) }}" fill="currentColor" fill-opacity="0.10"/>
                    <polyline points="{{ implode( ' ', $points ) }}" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <div class="flex justify-between text-[11px] text-neutral-500 dark:text-neutral-400 mt-2 font-mono">
                    <span>{{ array_key_first( $byDay30 ) }}</span>
                    <span class="opacity-70">{{ yourls__( 'peak:' ) }} {{ number_format( $max ) }}</span>
                    <span>{{ array_key_last( $byDay30 ) }}</span>
                </div>
            </div>
        @else
            <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No clicks recorded in the last 30 days.' ) }}</p>
        @endif
    </div>
</x-organisms::card>

{{-- ── heatmap dow × hour ── --}}
<x-organisms::card :title="yourls__('When clicks happen (last 30 days, UTC)')" class="mt-4">
    <div class="p-5 overflow-x-auto">
        @if ( $heatMax > 0 )
            <table class="text-[10px] tabular-nums" style="border-collapse:separate;border-spacing:2px;">
                <thead>
                    <tr>
                        <th class="px-1 text-left text-neutral-500 dark:text-neutral-400 font-medium"></th>
                        @for ( $h = 0; $h < 24; $h++ )
                            <th class="px-0.5 font-medium text-neutral-500 dark:text-neutral-400 text-center" style="width:18px">{{ $h % 3 === 0 ? sprintf( '%02d', $h ) : '' }}</th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $dows as $i => $label )
                        <tr>
                            <td class="pr-2 text-right text-neutral-500 dark:text-neutral-400 font-medium">{{ $label }}</td>
                            @for ( $h = 0; $h < 24; $h++ )
                                @php $v = $heatmap[ $i ][ $h ] ?? 0; @endphp
                                <td class="rounded-sm" style="width:18px;height:18px;{{ $heatColor( $v ) }}" title="{{ $label }} {{ sprintf( '%02d:00', $h ) }} — {{ $v }}"></td>
                            @endfor
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex items-center gap-2 mt-3 text-[11px] text-neutral-500 dark:text-neutral-400">
                <span>{{ yourls__( 'fewer' ) }}</span>
                @for ( $i = 1; $i <= 5; $i++ )
                    <span class="inline-block w-3 h-3 rounded-sm" style="background:rgba(99,102,241,{{ round( 0.08 + ( $i / 5 ) * 0.82, 3 ) }})"></span>
                @endfor
                <span>{{ yourls__( 'more' ) }}</span>
                <span class="ml-auto font-mono">{{ yourls__( 'peak hour:' ) }} {{ number_format( $heatMax ) }}</span>
            </div>
        @else
            <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Not enough recent activity for the heatmap.' ) }}</p>
        @endif
    </div>
</x-organisms::card>

@endif
