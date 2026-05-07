<?php
namespace YOURLS\Click;

class ClickCollector {
    public function __construct(
        private readonly UserAgentParser $uaParser,
        private readonly GeoLookup $geo,
        private readonly VisitorHasher $hasher,
        private readonly bool $anonymizeIp = false
    ) {}

    public function collectFromServer(
        string $keyword,
        string $ip,
        string $ua,
        string $referrer,
        string $queryString,
        bool $isBot,
        ?string $botName,
        string $clickUid
    ): ClickPayload {
        $ipFinal = $this->anonymizeIp ? $this->anonymize( $ip ) : $ip;
        $parsed  = $this->uaParser->parse( $ua );
        $geo     = $this->geo->lookup( $ip );
        $utm     = $this->parseUtm( $queryString );
        $host    = $this->referrerHost( $referrer );

        $p = new ClickPayload();
        $p->keyword      = $keyword;
        $p->clickTime    = gmdate( 'Y-m-d H:i:s' );
        $p->referrer     = $referrer;
        $p->userAgent    = $ua;
        $p->ipAddress    = $ipFinal;
        $p->countryCode  = (string) ( $geo['country'] ?? '' );
        $p->deviceType   = $isBot ? 'bot' : $parsed['device_type'];
        $p->browser      = $parsed['browser'];
        $p->os           = $parsed['os'];
        $p->referrerHost = $host;
        $p->utmSource    = $utm['utm_source']    ?? null;
        $p->utmMedium    = $utm['utm_medium']    ?? null;
        $p->utmCampaign  = $utm['utm_campaign']  ?? null;
        $p->city         = $geo['city']   ?? null;
        $p->region       = $geo['region'] ?? null;
        $p->visitorHash  = $this->hasher->hash( $ipFinal, $ua );
        $p->clickUid     = $clickUid;
        $p->meta = [
            'country'  => $geo['country'] ?? null,
            'lat'      => $geo['lat'] ?? null,
            'lon'      => $geo['lon'] ?? null,
            'asn'      => $geo['asn'] ?? null,
            'isp'      => $geo['isp'] ?? null,
            'is_bot'   => $isBot,
            'bot_name' => $botName,
        ];
        return $p;
    }

    public function mergeBeacon( ClickPayload $p, array $beacon ): ClickPayload {
        $meta = $p->meta ?? [];
        if ( isset( $beacon['screen'] ) && is_array( $beacon['screen'] ) ) {
            $meta['screen_w'] = (int) ( $beacon['screen']['w'] ?? 0 );
            $meta['screen_h'] = (int) ( $beacon['screen']['h'] ?? 0 );
            $meta['dpr']      = (float) ( $beacon['screen']['dpr'] ?? 1 );
        }
        if ( isset( $beacon['viewport'] ) && is_array( $beacon['viewport'] ) ) {
            $meta['viewport_w'] = (int) ( $beacon['viewport']['w'] ?? 0 );
            $meta['viewport_h'] = (int) ( $beacon['viewport']['h'] ?? 0 );
        }
        foreach ( [ 'tz' => 'tz', 'lang' => 'lang', 'connection' => 'connection_type' ] as $src => $dst ) {
            if ( isset( $beacon[ $src ] ) && is_string( $beacon[ $src ] ) ) {
                $meta[ $dst ] = substr( $beacon[ $src ], 0, 64 );
            }
        }
        $p->meta = $meta;
        return $p;
    }

    public function persist( ClickPayload $p ): bool {
        $row = $p->toRow();
        $sql = 'INSERT INTO `' . YOURLS_DB_TABLE_LOG . '` (' .
            '`click_time`,`shorturl`,`referrer`,`user_agent`,`ip_address`,`country_code`,' .
            '`device_type`,`browser`,`os`,`referrer_host`,`utm_source`,`utm_medium`,`utm_campaign`,' .
            '`city`,`region`,`visitor_hash`,`click_uid`,`meta`) VALUES (' .
            ':click_time,:shorturl,:referrer,:user_agent,:ip_address,:country_code,' .
            ':device_type,:browser,:os,:referrer_host,:utm_source,:utm_medium,:utm_campaign,' .
            ':city,:region,:visitor_hash,:click_uid,:meta)';
        try {
            yourls_get_db( 'write-click_collector' )->fetchAffected( $sql, $row );
            return true;
        } catch ( \Throwable $e ) {
            if ( function_exists( 'yourls_debug_log' ) ) {
                yourls_debug_log( 'click insert failed: ' . $e->getMessage() );
            }
            return false;
        }
    }

    private function parseUtm( string $qs ): array {
        if ( $qs === '' ) return [];
        parse_str( $qs, $out );
        return [
            'utm_source'   => isset( $out['utm_source'] )   ? (string) $out['utm_source']   : null,
            'utm_medium'   => isset( $out['utm_medium'] )   ? (string) $out['utm_medium']   : null,
            'utm_campaign' => isset( $out['utm_campaign'] ) ? (string) $out['utm_campaign'] : null,
        ];
    }

    private function referrerHost( string $referrer ): ?string {
        if ( $referrer === '' ) return null;
        $host = parse_url( $referrer, PHP_URL_HOST );
        return $host ?: null;
    }

    private function anonymize( string $ip ): string {
        if ( filter_var( $ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {
            $parts = explode( '.', $ip );
            $parts[3] = '0';
            return implode( '.', $parts );
        }
        if ( filter_var( $ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6 ) ) {
            $bin = inet_pton( $ip );
            if ( $bin === false ) return $ip;
            $bin = substr( $bin, 0, 6 ) . str_repeat( "\0", 10 );
            return inet_ntop( $bin ) ?: $ip;
        }
        return $ip;
    }
}
