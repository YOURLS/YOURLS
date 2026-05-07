@php
    $total     = function_exists( 'yourls_get_keyword_clicks' ) ? (int) yourls_get_keyword_clicks( $keyword ) : 0;
    $unique    = function_exists( 'yourls_get_unique_visitors' ) ? yourls_get_unique_visitors( $keyword, 'all' ) : 0;
    $devices   = function_exists( 'yourls_get_clicks_by_dimension' ) ? yourls_get_clicks_by_dimension( $keyword, 'device_type', 'all', 1 ) : [];
    $countries = function_exists( 'yourls_get_clicks_by_dimension' ) ? yourls_get_clicks_by_dimension( $keyword, 'country_code', 'all', 1 ) : [];
    $topDevice  = $devices  ? array_key_first( $devices )  : '—';
    $topCountry = $countries ? array_key_first( $countries ) : '—';
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
