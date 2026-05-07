@php
    // ── data ────────────────────────────────────────────────────────────
    $rollup     = function_exists( 'yourls_get_geography_rollup' )      ? yourls_get_geography_rollup( $keyword )       : null;
    $countries  = $rollup['countries']  ?? [];
    $cities     = $rollup['cities']     ?? [];
    $continents = $rollup['continents'] ?? [];
    $tiers      = $rollup['tiers']      ?? [ 1 => 0, 2 => 0, 3 => 0 ];
    $totalClicks  = $rollup['total_clicks']  ?? 0;
    $reached      = $rollup['reached']       ?? 0;
    $coveragePct  = $rollup['coverage_pct']  ?? 0.0;
    $hhi          = $rollup['hhi']           ?? 0.0;
    $top5Share    = $rollup['top5_share']    ?? 0.0;
    $topContinent = $rollup['top_continent'] ?? null;
    $tz           = function_exists( 'yourls_get_clicks_meta_aggregate' ) ? yourls_get_clicks_meta_aggregate( $keyword, '$.tz', 'all', 8 ) : [];
    $trend        = function_exists( 'yourls_get_top_countries_trend' )   ? yourls_get_top_countries_trend( $keyword, 5, 30 )              : [ 'labels' => [], 'series' => [] ];
    $table        = function_exists( 'yourls_get_geo_table' )             ? yourls_get_geo_table( $keyword, 30 )                          : [];

    $hasData = $totalClicks > 0;

    // ── helpers ─────────────────────────────────────────────────────────
    $firstReal = function ( array $rows ) {
        foreach ( $rows as $k => $_ ) if ( $k !== '(unknown)' && $k !== '' ) return $k;
        return $rows ? array_key_first( $rows ) : null;
    };

    $countriesReal = $countries;
    unset( $countriesReal['(unknown)'] );
    $totalReal = array_sum( $countriesReal );
    $topCountry = $firstReal( $countries ) ?? '—';
    $topCountryShare = ( $topCountry !== '—' && $totalReal > 0 && isset( $countriesReal[ $topCountry ] ) )
        ? round( $countriesReal[ $topCountry ] * 100 / $totalReal )
        : 0;
    $topCity = $firstReal( $cities ) ?? '—';
    $topTz   = $firstReal( $tz )     ?? '—';

    $tierTotal = array_sum( $tiers );
    $tier1Pct  = $tierTotal > 0 ? round( $tiers[1] * 100 / $tierTotal ) : 0;
    $tier23Pct = $tierTotal > 0 ? round( ( $tiers[2] + $tiers[3] ) * 100 / $tierTotal ) : 0;

    // HHI: 0 = perfect dispersion, 1 = monopoly. We bucket it into a label.
    $concentrationLabel = $hhi >= 0.5 ? yourls__( 'highly concentrated' )
                       : ( $hhi >= 0.25 ? yourls__( 'concentrated' )
                       : ( $hhi >= 0.10 ? yourls__( 'moderately concentrated' )
                       : yourls__( 'dispersed' ) ) );

    // ── h-bars renderer ────────────────────────────────────────────────
    $hBars = function ( array $rows, int $maxItems = 20, bool $showShare = true ) {
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
                  . ( $showShare ? '<span class="font-mono tabular-nums text-neutral-400 dark:text-neutral-500 w-10 text-right">' . $sharePct . '%</span>' : '' )
                  . '</li>';
        }
        return $out . '</ul>';
    };

    // ── donut multi ────────────────────────────────────────────────────
    $donutMulti = function ( array $rows, int $size = 140 ) {
        $total = array_sum( $rows );
        if ( $total === 0 ) return '';
        $palette = [ '#6366f1', '#22c55e', '#f97316', '#06b6d4', '#a855f7', '#ec4899', '#eab308', '#64748b' ];
        $r = $size / 2 - 8;
        $cx = $size / 2; $cy = $size / 2;
        $circ = 2 * M_PI * $r;
        $svg = '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 ' . $size . ' ' . $size . '" style="transform:rotate(-90deg)">';
        $offset = 0; $i = 0;
        foreach ( $rows as $_ => $v ) {
            $color = $palette[ $i % count( $palette ) ];
            $len = round( $circ * $v / $total, 2 );
            $gap = round( $circ - $len, 2 );
            $svg .= '<circle cx="' . $cx . '" cy="' . $cy . '" r="' . $r . '" fill="none" stroke="' . $color . '" stroke-width="14" stroke-dasharray="' . $len . ' ' . $gap . '" stroke-dashoffset="' . ( -$offset ) . '"/>';
            $offset += $len;
            $i++;
        }
        return $svg . '</svg>';
    };

    // ── world choropleth (continent blocks) ────────────────────────────
    // Stylised, not pixel-accurate: each continent is a rounded rect sized by
    // approximate landmass and tinted by its share of the click volume.
    $continentLayout = [
        // [ code, x, y, w, h ]
        [ 'NA', 30,  60,  220, 150, yourls__( 'North America' ) ],
        [ 'SA', 130, 230, 130, 200, yourls__( 'South America' ) ],
        [ 'EU', 290, 70,  120, 120, yourls__( 'Europe' ) ],
        [ 'AF', 290, 210, 150, 200, yourls__( 'Africa' ) ],
        [ 'AS', 430, 60,  300, 230, yourls__( 'Asia' ) ],
        [ 'OC', 560, 320, 180, 110, yourls__( 'Oceania' ) ],
        [ 'AN', 30,  450, 710, 30,  yourls__( 'Antarctica' ) ],
    ];
    $contMax = $continents ? max( $continents ) : 0;
    $contColor = function ( int $v ) use ( $contMax ) {
        if ( $contMax === 0 ) return '#1e293b';
        $intensity = $v / $contMax;
        $alpha = 0.15 + $intensity * 0.75;
        return 'rgba(99,102,241,' . round( $alpha, 3 ) . ')';
    };

    // ── continent name short alias ─────────────────────────────────────
    $continentName = fn( string $code ) => function_exists( 'yourls_continent_name' ) ? yourls_continent_name( $code ) : $code;
@endphp

@if ( ! $hasData )
    <x-organisms::empty-state
        :title="yourls__('No geography data')"
        :description="yourls__('Country and city breakdowns appear after new clicks are recorded.')" />
@else

{{-- ── KPI hero row ── --}}
<div class="mb-4" style="display:grid;gap:1rem;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));">
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Countries reached' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ number_format( $reached ) }}</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ $coveragePct }}% {{ yourls__( 'of 195 UN states' ) }}</div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Top country' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ $topCountry }}</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ $topCountryShare }}% {{ yourls__( 'of geocoded clicks' ) }}</div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Top city' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ $topCity }}</div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Top continent' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ $topContinent ? $continentName( $topContinent ) : '—' }}</div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Tier-1 share' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ $tier1Pct }}%</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ yourls__( 'tier-2/3:' ) }} {{ $tier23Pct }}%</div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Concentration' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ $top5Share }}%</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ yourls__( 'top-5 share · HHI' ) }} {{ $hhi }} · {{ $concentrationLabel }}</div>
    </div>
    <div class="yourls-card p-4">
        <div class="text-xs font-medium text-neutral-500 dark:text-neutral-400">{{ yourls__( 'Top timezone' ) }}</div>
        <div class="text-2xl font-semibold tabular-nums text-neutral-900 dark:text-neutral-100">{{ $topTz }}</div>
        <div class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-1">{{ yourls__( 'from JS beacon' ) }}</div>
    </div>
</div>

{{-- ── World choropleth (stylised continents) + Continent donut ── --}}
<div class="mb-4" style="display:grid;gap:1rem;grid-template-columns:repeat(auto-fit,minmax(360px,1fr));">

    <x-organisms::card :title="yourls__('World map (clicks by continent)')">
        <div class="p-5">
            @if ( $continents )
                <svg viewBox="0 0 770 490" width="100%" height="auto" preserveAspectRatio="xMidYMid meet" style="max-height:340px">
                    <rect x="0" y="0" width="770" height="490" fill="rgb(var(--color-neutral-900) / 0.04)" rx="8"/>
                    @foreach ( $continentLayout as [ $code, $x, $y, $w, $h, $name ] )
                        @php
                            $v = $continents[ $code ] ?? 0;
                            $share = $totalReal > 0 ? round( $v * 100 / $totalReal ) : 0;
                            $fill = $contColor( $v );
                        @endphp
                        <g>
                            <rect x="{{ $x }}" y="{{ $y }}" width="{{ $w }}" height="{{ $h }}" rx="6"
                                  fill="{{ $fill }}" stroke="rgb(var(--color-neutral-700))" stroke-width="1"
                                  style="cursor:default">
                                <title>{{ $name }} — {{ number_format( $v ) }} clicks ({{ $share }}%)</title>
                            </rect>
                            <text x="{{ $x + 8 }}" y="{{ $y + 18 }}" font-size="11" font-weight="600" fill="currentColor">{{ $name }}</text>
                            @if ( $v > 0 )
                                <text x="{{ $x + 8 }}" y="{{ $y + 34 }}" font-size="14" font-weight="700" font-family="monospace" fill="currentColor">{{ number_format( $v ) }}</text>
                                <text x="{{ $x + 8 }}" y="{{ $y + 48 }}" font-size="10" fill="currentColor" fill-opacity="0.7">{{ $share }}%</text>
                            @endif
                        </g>
                    @endforeach
                </svg>
                <p class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-2">{{ yourls__( 'Stylised layout — continent blocks tinted by share of total clicks.' ) }}</p>
            @else
                <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No geocoded clicks yet.' ) }}</p>
            @endif
        </div>
    </x-organisms::card>

    <x-organisms::card :title="yourls__('Distribution by continent')">
        <div class="p-5 flex items-center gap-5">
            @if ( $continents )
                @php $contRowsLabeled = []; foreach ( $continents as $c => $v ) $contRowsLabeled[ $continentName( $c ) ] = $v; @endphp
                <div class="text-neutral-700 dark:text-neutral-300 shrink-0">{!! $donutMulti( $contRowsLabeled, 160 ) !!}</div>
                <ul class="space-y-1.5 text-xs flex-1 min-w-0">
                    @php $i = 0; $palette = [ '#6366f1','#22c55e','#f97316','#06b6d4','#a855f7','#ec4899','#eab308','#64748b' ]; @endphp
                    @foreach ( $contRowsLabeled as $name => $v )
                        @php $col = $palette[ $i++ % 8 ]; $share = $totalReal > 0 ? round( $v * 100 / $totalReal ) : 0; @endphp
                        <li class="flex items-center gap-2">
                            <span class="inline-block w-3 h-3 rounded-sm shrink-0" style="background:{{ $col }}"></span>
                            <span class="text-neutral-700 dark:text-neutral-300 truncate">{{ $name }}</span>
                            <span class="font-mono tabular-nums text-neutral-500 dark:text-neutral-400 ml-auto">{{ number_format( $v ) }} ({{ $share }}%)</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No data' ) }}</p>
            @endif
        </div>
    </x-organisms::card>

</div>

{{-- ── Top countries / Top cities bar charts ── --}}
<div class="mb-4" style="display:grid;gap:1rem;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));">

    <x-organisms::card :title="yourls__('Top 20 countries')">
        <div class="p-5">{!! $hBars( $countriesReal, 20 ) !!}</div>
    </x-organisms::card>

    <x-organisms::card :title="yourls__('Top 20 cities')">
        <div class="p-5">{!! $hBars( $cities, 20 ) !!}</div>
    </x-organisms::card>

</div>

{{-- ── Multi-line trend top 5 countries ── --}}
<x-organisms::card :title="yourls__('Top 5 countries — daily trend (last 30 days)')" class="mb-4">
    <div class="p-5">
        @php
            $w = 760; $h = 220; $labels = $trend['labels']; $series = $trend['series'];
            $palette = [ '#6366f1', '#22c55e', '#f97316', '#06b6d4', '#a855f7' ];
            $globalMax = 0;
            foreach ( $series as $vals ) foreach ( $vals as $v ) if ( $v > $globalMax ) $globalMax = $v;
        @endphp
        @if ( $series && $globalMax > 0 )
            <svg viewBox="0 0 {{ $w }} {{ $h }}" width="100%" height="{{ $h }}" preserveAspectRatio="none" class="overflow-visible">
                <line x1="0" y1="{{ $h - 6 }}" x2="{{ $w }}" y2="{{ $h - 6 }}" stroke="currentColor" stroke-opacity="0.15"/>
                @php $i = 0; @endphp
                @foreach ( $series as $cc => $vals )
                    @php
                        $color = $palette[ $i % count( $palette ) ];
                        $n = count( $vals );
                        $points = [];
                        for ( $p = 0; $p < $n; $p++ ) {
                            $x = $n > 1 ? round( $p * $w / ( $n - 1 ), 2 ) : 0;
                            $y = round( $h - 6 - ( $vals[ $p ] / $globalMax ) * ( $h - 16 ), 2 );
                            $points[] = $x . ',' . $y;
                        }
                    @endphp
                    <polyline points="{{ implode( ' ', $points ) }}" fill="none" stroke="{{ $color }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" opacity="0.9"/>
                    @php $i++; @endphp
                @endforeach
            </svg>
            <div class="flex flex-wrap gap-3 mt-3 text-[11px] text-neutral-500 dark:text-neutral-400">
                @php $i = 0; @endphp
                @foreach ( $series as $cc => $vals )
                    @php $col = $palette[ $i++ % count( $palette ) ]; $sum = array_sum( $vals ); @endphp
                    <span class="flex items-center gap-1">
                        <span class="inline-block w-2.5 h-2.5 rounded-sm" style="background:{{ $col }}"></span>
                        <span class="font-mono">{{ $cc }}</span>
                        <span class="text-neutral-400 dark:text-neutral-500 font-mono">({{ number_format( $sum ) }})</span>
                    </span>
                @endforeach
                <span class="ml-auto font-mono">{{ yourls__( 'peak/day:' ) }} {{ number_format( $globalMax ) }}</span>
            </div>
        @else
            <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No country trend data yet.' ) }}</p>
        @endif
    </div>
</x-organisms::card>

{{-- ── Geo table: country, city, clicks, visitors, share, sparkline ── --}}
<x-organisms::card :title="yourls__('Country &amp; city breakdown')">
    <div class="p-5 overflow-x-auto">
        @if ( $table )
            <table class="w-full text-xs">
                <thead>
                    <tr class="text-left text-neutral-500 dark:text-neutral-400 border-b border-neutral-200 dark:border-neutral-800">
                        <th class="py-2 pr-4 font-medium">{{ yourls__( 'Country' ) }}</th>
                        <th class="py-2 pr-4 font-medium">{{ yourls__( 'Continent' ) }}</th>
                        <th class="py-2 pr-4 font-medium">{{ yourls__( 'City' ) }}</th>
                        <th class="py-2 pr-4 font-medium text-right">{{ yourls__( 'Clicks' ) }}</th>
                        <th class="py-2 pr-4 font-medium text-right">{{ yourls__( 'Visitors' ) }}</th>
                        <th class="py-2 font-medium text-right">{{ yourls__( 'Share' ) }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $table as $row )
                        @php
                            $share = $totalClicks > 0 ? round( $row['clicks'] * 100 / $totalClicks ) : 0;
                            $cont  = $row['country'] !== '' ? $continentName( yourls_country_to_continent( $row['country'] ) ) : '—';
                        @endphp
                        <tr class="border-b border-neutral-100 dark:border-neutral-900">
                            <td class="py-2 pr-4 font-mono text-neutral-700 dark:text-neutral-300">{{ $row['country'] !== '' ? $row['country'] : '(unknown)' }}</td>
                            <td class="py-2 pr-4 text-neutral-700 dark:text-neutral-300">{{ $cont }}</td>
                            <td class="py-2 pr-4 text-neutral-700 dark:text-neutral-300">{{ $row['city'] ?? '—' }}</td>
                            <td class="py-2 pr-4 text-right font-mono tabular-nums text-neutral-900 dark:text-neutral-100">{{ number_format( $row['clicks'] ) }}</td>
                            <td class="py-2 pr-4 text-right font-mono tabular-nums text-neutral-700 dark:text-neutral-300">{{ number_format( $row['visitors'] ) }}</td>
                            <td class="py-2 text-right font-mono tabular-nums text-neutral-500 dark:text-neutral-400">{{ $share }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ yourls__( 'No geographic data yet.' ) }}</p>
        @endif
    </div>
</x-organisms::card>

@endif
