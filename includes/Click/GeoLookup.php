<?php
namespace YOURLS\Click;

class GeoLookup {
    public function __construct( private readonly ?string $dbPath = null ) {}

    /**
     * @return array{country:?string,city:?string,region:?string,lat:?float,lon:?float,asn:?int,isp:?string}
     */
    public function lookup( string $ip ): array {
        $empty = [ 'country' => null, 'city' => null, 'region' => null, 'lat' => null, 'lon' => null, 'asn' => null, 'isp' => null ];

        $db = $this->dbPath ?? ( defined( 'YOURLS_INC' ) ? YOURLS_INC . '/geo/GeoLite2-City.mmdb' : '' );
        if ( ! $db || ! is_readable( $db ) ) {
            if ( function_exists( 'yourls_geo_ip_to_countrycode' ) ) {
                $cc = yourls_geo_ip_to_countrycode( $ip, '' );
                $empty['country'] = $cc !== '' ? $cc : null;
            }
            return $empty;
        }

        try {
            $reader = new \GeoIp2\Database\Reader( $db );
            $rec    = $reader->city( $ip );
            return [
                'country' => $rec->country->isoCode ?? null,
                'city'    => $rec->city->name ?? null,
                'region'  => $rec->mostSpecificSubdivision->name ?? null,
                'lat'     => $rec->location->latitude ?? null,
                'lon'     => $rec->location->longitude ?? null,
                'asn'     => null,
                'isp'     => null,
            ];
        } catch ( \Throwable $e ) {
            return $empty;
        }
    }
}
