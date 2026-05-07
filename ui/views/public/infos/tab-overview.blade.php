@php
    $total     = function_exists( 'yourls_get_keyword_clicks' ) ? (int) yourls_get_keyword_clicks( $keyword ) : 0;
    $unique    = function_exists( 'yourls_get_unique_visitors' ) ? yourls_get_unique_visitors( $keyword, 'all' ) : 0;
    // Pull a few candidates so we can skip the "(unknown)" placeholder if the
    // top entry happens to be unparsed/null (common for bot-only or local IPs).
    $devices   = function_exists( 'yourls_get_clicks_by_dimension' ) ? yourls_get_clicks_by_dimension( $keyword, 'device_type', 'all', 5 ) : [];
    $countries = function_exists( 'yourls_get_clicks_by_dimension' ) ? yourls_get_clicks_by_dimension( $keyword, 'country_code', 'all', 5 ) : [];

    $firstReal = function ( array $rows ) {
        foreach ( $rows as $k => $_ ) {
            if ( $k !== '(unknown)' && $k !== '' ) return $k;
        }
        return $rows ? array_key_first( $rows ) : null;
    };
    $topDevice  = $firstReal( $devices )   ?? '—';
    $topCountry = $firstReal( $countries ) ?? '—';
@endphp

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-5">
    <x-organisms::stat :label="yourls__('Total clicks')"    :value="$total" />
    <x-organisms::stat :label="yourls__('Unique visitors')" :value="$unique" />
    <x-organisms::stat :label="yourls__('Top device')"      :value="$topDevice" />
    <x-organisms::stat :label="yourls__('Top country')"     :value="$topCountry" />
</div>

@if ( $total === 0 )
    <x-organisms::empty-state
        :title="yourls__('No clicks yet')"
        :description="yourls__('Stats appear here as soon as the short URL is visited.')" />
@endif
