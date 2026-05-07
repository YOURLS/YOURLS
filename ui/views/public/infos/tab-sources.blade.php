@php
    // ── data ────────────────────────────────────────────────────────────
    $categories = function_exists( 'yourls_get_clicks_by_source_category' )    ? yourls_get_clicks_by_source_category( $keyword )       : [];
    $social     = function_exists( 'yourls_get_top_referrers_in_category' )    ? yourls_get_top_referrers_in_category( $keyword, 'social', 8 )  : [];
    $search     = function_exists( 'yourls_get_top_referrers_in_category' )    ? yourls_get_top_referrers_in_category( $keyword, 'search', 8 )  : [];
    $email      = function_exists( 'yourls_get_top_referrers_in_category' )    ? yourls_get_top_referrers_in_category( $keyword, 'email',  6 )  : [];
    $referral   = function_exists( 'yourls_get_top_referrers_in_category' )    ? yourls_get_top_referrers_in_category( $keyword, 'referral', 10 ) : [];
    $catTrend   = function_exists( 'yourls_get_source_categories_trend' )      ? yourls_get_source_categories_trend( $keyword, 30 )       : [ 'labels' => [], 'series' => [] ];
    $heatmap    = function_exists( 'yourls_get_source_dow_heatmap' )           ? yourls_get_source_dow_heatmap( $keyword, 30 )            : [];
    $utmRows    = function_exists( 'yourls_get_utm_matrix' )                   ? yourls_get_utm_matrix( $keyword, 50 )                   : [];
    $topRefs    = function_exists( 'yourls_get_top_referrers_with_trend' )     ? yourls_get_top_referrers_with_trend( $keyword, 20, 30 )  : [];

    $totalClicks = array_sum( $categories );
    $hasData     = $totalClicks > 0;

    // ── KPI math ────────────────────────────────────────────────────────
    $direct      = $categories['direct']   ?? 0;
    $referrals   = $totalClicks - $direct;
    $directPct   = $totalClicks > 0 ? round( $direct    * 100 / $totalClicks ) : 0;
    $refPct      = $totalClicks > 0 ? round( $referrals * 100 / $totalClicks ) : 0;
    $socialClicks = $categories['social'] ?? 0;
    $searchClicks = $categories['search'] ?? 0;
    $otherClicks  = $totalClicks - $direct - $socialClicks - $searchClicks;
    $socialPct    = $totalClicks > 0 ? round( $socialClicks * 100 / $totalClicks ) : 0;
    $searchPct    = $totalClicks > 0 ? round( $searchClicks * 100 / $totalClicks ) : 0;
    $otherPct     = $totalClicks > 0 ? round( $otherClicks  * 100 / $totalClicks ) : 0;

    $uniqueHosts = function () use ( $keyword ) {
        $sql = 'SELECT COUNT(DISTINCT referrer_host) FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = :k AND referrer_host IS NOT NULL AND referrer_host != ""';
        return (int) yourls_get_db( 'read-unique_hosts' )->fetchValue( $sql, [ 'k' => $keyword ] );
    };
    $uniqueSources = $uniqueHosts();

    $activeCampaigns = (int) yourls_get_db( 'read-active_campaigns' )->fetchValue(
        'SELECT COUNT(DISTINCT utm_campaign) FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = :k AND utm_campaign IS NOT NULL AND utm_campaign != ""',
        [ 'k' => $keyword ]
    );

    $topReferrer = '—';
    if ( $topRefs ) $topReferrer = $topRefs[0]['host'];

    $topSocial = $social ? array_key_first( $social ) : '—';
    $topSearch = $search ? array_key_first( $search ) : '—';
    $qrClicks  = $categories['qr'] ?? 0;

    // ── shared helpers ──────────────────────────────────────────────────
    $catLabels = [
        'direct'   => yourls__( 'Direct' ),
        'social'   => yourls__( 'Social' ),
        'search'   => yourls__( 'Search' ),
        'email'    => yourls__( 'Email' ),
        'qr'       => yourls__( 'QR code' ),
        'referral' => yourls__( 'Referral' ),
    ];
    $catColors = [
        'direct'   => '#94a3b8',
        'social'   => '#6366f1',
        'search'   => '#22c55e',
        'email'    => '#f97316',
        'qr'       => '#ec4899',
        'referral' => '#06b6d4',
    ];

    $hBars = function ( array $rows, int $maxItems = 20 ) {
        $rows = array_slice( $rows, 0, $maxItems, true );
        if ( ! $rows ) return '<p class="text-sm text-neutral-500 dark:text-neutral-400">' . yourls_esc_html( yourls__( 'No data' ) ) . '</p>';
        $total = array_sum( $rows );
        $max   = max( $rows );
        $out = '<ul class="space-y-2">';
        foreach ( $rows as $label => $v ) {
            $widthPct = $max > 0 ? round( $v * 100 / $max ) : 0;
            $sharePct = $total > 0 ? round( $v * 100 / $total ) : 0;
            $out .= '<li class="flex items-center gap-3 text-xs">'
                  . '<span class="w-32 truncate text-neutral-700 dark:text-neutral-300">' . yourls_esc_html( (string) $label ) . '</span>'
                  . '<span class="flex-1 h-2 rounded-full bg-neutral-200 dark:bg-neutral-800 overflow-hidden">'
                  . '<span class="block h-full bg-primary-500" style="width:' . $widthPct . '%"></span>'
                  . '</span>'
                  . '<span class="font-mono tabular-nums text-neutral-500 dark:text-neutral-400 w-12 text-right">' . (int) $v . '</span>'
                  . '<span class="font-mono tabular-nums text-neutral-400 dark:text-neutral-500 w-10 text-right">' . $sharePct . '%</span>'
                  . '</li>';
        }
        return $out . '</ul>';
    };

    $donutMulti = function ( array $rows, array $colorMap, int $size = 160 ) {
        $total = array_sum( $rows );
        if ( $total === 0 ) return '';
        $palette = [ '#6366f1','#22c55e','#f97316','#06b6d4','#a855f7','#ec4899','#eab308','#64748b' ];
        $r = $size / 2 - 8; $cx = $size / 2; $cy = $size / 2; $circ = 2 * M_PI * $r;
        $svg = '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 ' . $size . ' ' . $size . '" style="transform:rotate(-90deg)">';
        $offset = 0; $i = 0;
        foreach ( $rows as $label => $v ) {
            $color = $colorMap[ $label ] ?? $palette[ $i % count( $palette ) ];
            $len = round( $circ * $v / $total, 2 );
            $gap = round( $circ - $len, 2 );
            $svg .= '<circle cx="' . $cx . '" cy="' . $cy . '" r="' . $r . '" fill="none" stroke="' . $color . '" stroke-width="14" stroke-dasharray="' . $len . ' ' . $gap . '" stroke-dashoffset="' . ( -$offset ) . '"/>';
            $offset += $len; $i++;
        }
        return $svg . '</svg>';
    };

    $sparkline = function ( array $values, int $w = 100, int $h = 22, string $stroke = 'currentColor' ) {
        $values = array_values( $values ); $n = count( $values );
        if ( $n === 0 ) return '';
        $max = max( $values );
        if ( $max === 0 ) return '<svg viewBox="0 0 ' . $w . ' ' . $h . '" width="' . $w . '" height="' . $h . '" preserveAspectRatio="none" aria-hidden="true"><line x1="0" y1="' . ( $h - 1 ) . '" x2="' . $w . '" y2="' . ( $h - 1 ) . '" stroke="' . $stroke . '" stroke-opacity="0.3"/></svg>';
        $points = [];
        for ( $i = 0; $i < $n; $i++ ) {
            $x = $n > 1 ? round( $i * $w / ( $n - 1 ), 2 ) : 0;
            $y = round( $h - 2 - ( $values[ $i ] / $max ) * ( $h - 4 ), 2 );
            $points[] = $x . ',' . $y;
        }
        return '<svg viewBox="0 0 ' . $w . ' ' . $h . '" width="' . $w . '" height="' . $h . '" preserveAspectRatio="none" aria-hidden="true">'
             . '<polyline points="' . implode( ' ', $points ) . '" fill="none" stroke="' . $stroke . '" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>'
             . '</svg>';
    };
@endphp

@if ( ! $hasData )
    <x-organisms::empty-state
        :title="yourls__('No source data')"
        :description="yourls__('Referrer and UTM breakdowns appear after new clicks are recorded.')" />
@else

{{-- ── KPI hero row ── --}}
<div class="mb-4" style="display:grid;gap:1rem;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));">
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Unique sources' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ number_format( $uniqueSources ) }}</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ yourls__( 'distinct referrer hosts' ) }}</div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Top referrer' ) }}</div>
        <div class="text-lg font-semibold tabular-nums text-neutral-900 dark:text-neutral-100 truncate">{{ $topReferrer }}</div>
        @if ( $topRefs )
            <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ number_format( $topRefs[0]['clicks'] ) }} {{ yourls__( 'clicks' ) }}</div>
        @endif
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Direct vs referral' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ $directPct }}% / {{ $refPct }}%</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ number_format( $direct ) }} / {{ number_format( $referrals ) }}</div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Social / Search / Other' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ $socialPct }}/{{ $searchPct }}/{{ $otherPct }}%</div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Top social' ) }}</div>
        <div class="text-lg font-semibold tabular-nums text-neutral-900 dark:text-neutral-100 truncate">{{ $topSocial }}</div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Top search' ) }}</div>
        <div class="text-lg font-semibold tabular-nums text-neutral-900 dark:text-neutral-100 truncate">{{ $topSearch }}</div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Active UTM campaigns' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ number_format( $activeCampaigns ) }}</div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'QR clicks' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ number_format( $qrClicks ) }}</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ yourls__( 'tagged utm_medium=qr' ) }}</div>
    </div>
</div>

{{-- ── Category donut + Social/Search bars ── --}}
<div class="mb-4" style="display:grid;gap:1rem;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));">

    <x-organisms::card :title="yourls__('Traffic by source category')">
        <div class="p-5 flex items-center gap-5">
            @php $catLabeled = []; foreach ( $categories as $c => $v ) $catLabeled[ $catLabels[ $c ] ?? $c ] = $v; @endphp
            <div class="text-neutral-700 dark:text-neutral-300 shrink-0">{!! $donutMulti( $categories, $catColors, 160 ) !!}</div>
            <ul class="space-y-1.5 text-xs flex-1 min-w-0">
                @foreach ( $categories as $cat => $v )
                    @php $share = $totalClicks > 0 ? round( $v * 100 / $totalClicks ) : 0; @endphp
                    <li class="flex items-center gap-2">
                        <span class="inline-block w-3 h-3 rounded-sm shrink-0" style="background:{{ $catColors[ $cat ] ?? '#94a3b8' }}"></span>
                        <span class="text-neutral-700 dark:text-neutral-300">{{ $catLabels[ $cat ] ?? $cat }}</span>
                        <span class="font-mono tabular-nums text-neutral-500 dark:text-neutral-400 ml-auto">{{ number_format( $v ) }} ({{ $share }}%)</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </x-organisms::card>

    <x-organisms::card :title="yourls__('Top social platforms')">
        <div class="p-5">{!! $hBars( $social, 8 ) !!}</div>
    </x-organisms::card>

    <x-organisms::card :title="yourls__('Top search engines')">
        <div class="p-5">{!! $hBars( $search, 8 ) !!}</div>
    </x-organisms::card>

</div>

{{-- ── Stacked area / multi-line: source category trend ── --}}
<x-organisms::card :title="yourls__('Source category trend (last 30 days)')" class="mb-4">
    <div class="p-5">
        @php
            $w = 760; $h = 220; $labels = $catTrend['labels']; $series = $catTrend['series'];
            $globalMax = 0;
            $stacks = [];
            foreach ( array_keys( $labels ) as $idx ) {
                $colSum = 0;
                foreach ( $series as $vals ) $colSum += $vals[ $idx ] ?? 0;
                $stacks[ $idx ] = $colSum;
                if ( $colSum > $globalMax ) $globalMax = $colSum;
            }
        @endphp
        @if ( $series && $globalMax > 0 )
            <svg viewBox="0 0 {{ $w }} {{ $h }}" width="100%" height="{{ $h }}" preserveAspectRatio="none" class="overflow-visible">
                <line x1="0" y1="{{ $h - 6 }}" x2="{{ $w }}" y2="{{ $h - 6 }}" stroke="currentColor" stroke-opacity="0.15"/>
                @php
                    // build cumulative top-line per category for stacked area
                    $n = count( $labels );
                    $running = array_fill( 0, $n, 0 );
                @endphp
                @foreach ( $series as $cat => $vals )
                    @php
                        $color = $catColors[ $cat ] ?? '#94a3b8';
                        $points = [];
                        $bottom = [];
                        for ( $p = 0; $p < $n; $p++ ) {
                            $x = $n > 1 ? round( $p * $w / ( $n - 1 ), 2 ) : 0;
                            $base   = $running[ $p ];
                            $top    = $base + ( $vals[ $p ] ?? 0 );
                            $yTop   = round( $h - 6 - ( $top  / $globalMax ) * ( $h - 16 ), 2 );
                            $yBase  = round( $h - 6 - ( $base / $globalMax ) * ( $h - 16 ), 2 );
                            $points[] = $x . ',' . $yTop;
                            $bottom[] = $x . ',' . $yBase;
                            $running[ $p ] = $top;
                        }
                        $bottom = array_reverse( $bottom );
                        $area   = array_merge( $points, $bottom );
                    @endphp
                    <polygon points="{{ implode( ' ', $area ) }}" fill="{{ $color }}" fill-opacity="0.65" stroke="{{ $color }}" stroke-width="1"/>
                @endforeach
            </svg>
            <div class="flex flex-wrap gap-3 mt-3 text-[11px] text-neutral-500 dark:text-neutral-400">
                @foreach ( $series as $cat => $vals )
                    @php $sum = array_sum( $vals ); @endphp
                    <span class="flex items-center gap-1">
                        <span class="inline-block w-2.5 h-2.5 rounded-sm" style="background:{{ $catColors[ $cat ] ?? '#94a3b8' }}"></span>
                        <span class="text-neutral-700 dark:text-neutral-300">{{ $catLabels[ $cat ] ?? $cat }}</span>
                        <span class="font-mono">({{ number_format( $sum ) }})</span>
                    </span>
                @endforeach
                <span class="ml-auto font-mono">{{ yourls__( 'peak/day:' ) }} {{ number_format( $globalMax ) }}</span>
            </div>
        @else
            <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No trend data yet.' ) }}</p>
        @endif
    </div>
</x-organisms::card>

{{-- ── Heatmap source category × day-of-week ── --}}
<x-organisms::card :title="yourls__('When each source brings traffic (last 30 days)')" class="mb-4">
    <div class="p-5 overflow-x-auto">
        @if ( $heatmap )
            @php
                $dows = [ yourls__( 'Mon' ), yourls__( 'Tue' ), yourls__( 'Wed' ), yourls__( 'Thu' ), yourls__( 'Fri' ), yourls__( 'Sat' ), yourls__( 'Sun' ) ];
                $heatMax = 0;
                foreach ( $heatmap as $row ) foreach ( $row as $v ) if ( $v > $heatMax ) $heatMax = $v;
            @endphp
            <table class="text-xs tabular-nums" style="border-collapse:separate;border-spacing:3px;">
                <thead>
                    <tr>
                        <th class="px-2 text-left text-neutral-500 dark:text-neutral-400 font-medium">{{ yourls__( 'Source' ) }}</th>
                        @foreach ( $dows as $d ) <th class="px-2 font-medium text-neutral-500 dark:text-neutral-400 text-center">{{ $d }}</th> @endforeach
                        <th class="px-2 text-right font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Total' ) }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $heatmap as $cat => $row )
                        @php $rowTotal = array_sum( $row ); @endphp
                        <tr>
                            <td class="px-2 py-1 font-medium" style="color:{{ $catColors[ $cat ] ?? '#94a3b8' }}">{{ $catLabels[ $cat ] ?? $cat }}</td>
                            @for ( $d = 0; $d < 7; $d++ )
                                @php
                                    $v = $row[ $d ] ?? 0;
                                    $alpha = $heatMax > 0 ? round( 0.10 + ( $v / $heatMax ) * 0.80, 3 ) : 0;
                                    $bg    = $v > 0 ? 'rgba(99,102,241,' . $alpha . ')' : 'transparent';
                                @endphp
                                <td class="px-2 py-1 rounded-sm text-center" style="min-width:40px;background:{{ $bg }}" title="{{ $cat }} — {{ $dows[ $d ] }}: {{ $v }}">{{ $v > 0 ? $v : '' }}</td>
                            @endfor
                            <td class="px-2 py-1 text-right font-mono text-neutral-700 dark:text-neutral-300">{{ number_format( $rowTotal ) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Not enough recent activity.' ) }}</p>
        @endif
    </div>
</x-organisms::card>

{{-- ── UTM matrix table ── --}}
<x-organisms::card :title="yourls__('UTM matrix')" class="mb-4">
    <div class="p-5 overflow-x-auto">
        @if ( $utmRows )
            <table class="w-full text-xs">
                <thead>
                    <tr class="text-left text-neutral-500 dark:text-neutral-400 border-b border-neutral-200 dark:border-neutral-800">
                        <th class="py-2 pr-4 font-medium">{{ yourls__( 'Source' ) }}</th>
                        <th class="py-2 pr-4 font-medium">{{ yourls__( 'Medium' ) }}</th>
                        <th class="py-2 pr-4 font-medium">{{ yourls__( 'Campaign' ) }}</th>
                        <th class="py-2 pr-4 font-medium text-right">{{ yourls__( 'Clicks' ) }}</th>
                        <th class="py-2 pr-4 font-medium text-right">{{ yourls__( 'Visitors' ) }}</th>
                        <th class="py-2 font-medium text-right">{{ yourls__( 'Share' ) }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $utmRows as $r )
                        @php $share = $totalClicks > 0 ? round( $r['clicks'] * 100 / $totalClicks ) : 0; @endphp
                        <tr class="border-b border-neutral-100 dark:border-neutral-900">
                            <td class="py-2 pr-4 font-mono text-neutral-700 dark:text-neutral-300">{{ $r['source'] }}</td>
                            <td class="py-2 pr-4 font-mono text-neutral-700 dark:text-neutral-300">{{ $r['medium'] }}</td>
                            <td class="py-2 pr-4 font-mono text-neutral-700 dark:text-neutral-300">{{ $r['campaign'] }}</td>
                            <td class="py-2 pr-4 text-right font-mono tabular-nums text-neutral-900 dark:text-neutral-100">{{ number_format( $r['clicks'] ) }}</td>
                            <td class="py-2 pr-4 text-right font-mono tabular-nums text-neutral-700 dark:text-neutral-300">{{ number_format( $r['visitors'] ) }}</td>
                            <td class="py-2 text-right font-mono tabular-nums text-neutral-500 dark:text-neutral-400">{{ $share }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No UTM-tagged clicks yet.' ) }}</p>
        @endif
    </div>
</x-organisms::card>

{{-- ── Top referrers table with sparkline ── --}}
<x-organisms::card :title="yourls__('Top referrers')">
    <div class="p-5 overflow-x-auto">
        @if ( $topRefs )
            <table class="w-full text-xs">
                <thead>
                    <tr class="text-left text-neutral-500 dark:text-neutral-400 border-b border-neutral-200 dark:border-neutral-800">
                        <th class="py-2 pr-4 font-medium">{{ yourls__( 'Host' ) }}</th>
                        <th class="py-2 pr-4 font-medium">{{ yourls__( 'Category' ) }}</th>
                        <th class="py-2 pr-4 font-medium text-right">{{ yourls__( 'Clicks' ) }}</th>
                        <th class="py-2 pr-4 font-medium text-right">{{ yourls__( 'Visitors' ) }}</th>
                        <th class="py-2 pr-4 font-medium text-right">{{ yourls__( 'Share' ) }}</th>
                        <th class="py-2 font-medium text-center">{{ yourls__( '30-day trend' ) }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $topRefs as $r )
                        @php
                            $share = $totalClicks > 0 ? round( $r['clicks'] * 100 / $totalClicks ) : 0;
                            $catColor = $catColors[ $r['category'] ] ?? '#94a3b8';
                        @endphp
                        <tr class="border-b border-neutral-100 dark:border-neutral-900">
                            <td class="py-2 pr-4 font-mono text-neutral-700 dark:text-neutral-300 truncate max-w-xs">{{ $r['host'] }}</td>
                            <td class="py-2 pr-4">
                                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full text-[10px] font-medium" style="background:{{ $catColor }}20;color:{{ $catColor }}">
                                    {{ $catLabels[ $r['category'] ] ?? $r['category'] }}
                                </span>
                            </td>
                            <td class="py-2 pr-4 text-right font-mono tabular-nums text-neutral-900 dark:text-neutral-100">{{ number_format( $r['clicks'] ) }}</td>
                            <td class="py-2 pr-4 text-right font-mono tabular-nums text-neutral-700 dark:text-neutral-300">{{ number_format( $r['visitors'] ) }}</td>
                            <td class="py-2 pr-4 text-right font-mono tabular-nums text-neutral-500 dark:text-neutral-400">{{ $share }}%</td>
                            <td class="py-2 text-center" style="color:{{ $catColor }}">{!! $sparkline( $r['sparkline'], 100, 22, $catColor ) !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No referrer data yet.' ) }}</p>
        @endif
    </div>
</x-organisms::card>

@endif
