<?php
namespace YOURLS\Click;

class Beacon {
    public static function handle( ?string $rawBody = null ): int {
        if ( ( $_SERVER['REQUEST_METHOD'] ?? 'GET' ) !== 'POST' ) {
            return self::reply( 204 );
        }

        $body = $rawBody ?? (string) file_get_contents( 'php://input' );
        if ( strlen( $body ) > 2048 ) {
            return self::reply( 204 );
        }

        $data = json_decode( $body, true );
        if ( ! is_array( $data ) ) {
            return self::reply( 204 );
        }

        $clickUid = is_string( $data['click_uid'] ?? null ) ? $data['click_uid'] : '';
        $keyword  = is_string( $data['keyword']   ?? null ) ? $data['keyword']   : '';
        if ( ! preg_match( '/^[a-f0-9]{16}$/', $clickUid ) ) {
            return self::reply( 204 );
        }
        $keyword = yourls_sanitize_keyword( $keyword );
        if ( $keyword === '' || ! yourls_keyword_is_taken( $keyword ) ) {
            return self::reply( 204 );
        }

        $ip       = yourls_get_IP();
        $ua       = yourls_get_user_agent();
        $accept   = $_SERVER['HTTP_ACCEPT'] ?? '';
        $referrer = is_string( $data['client_referrer'] ?? null ) ? $data['client_referrer'] : yourls_get_referrer();
        $qs       = is_string( $data['query_string']    ?? null ) ? $data['query_string']    : ( $_SERVER['QUERY_STRING'] ?? '' );

        $rate = new RateLimiter(
            (int) ( defined( 'YOURLS_CLICK_BEACON_RATELIMIT' ) ? YOURLS_CLICK_BEACON_RATELIMIT : 60 ),
            60,
            RateLimiter::defaultBackend()
        );
        if ( ! $rate->allow( $ip ) ) {
            return self::reply( 204 );
        }

        yourls_do_action( 'click_beacon_received', $data );

        $pepper = defined( 'YOURLS_CLICK_VISITOR_SALT' ) ? YOURLS_CLICK_VISITOR_SALT : ( defined( 'YOURLS_COOKIEKEY' ) ? YOURLS_COOKIEKEY : 'yourls' );
        $anon   = defined( 'YOURLS_CLICK_ANONYMIZE_IP' ) && YOURLS_CLICK_ANONYMIZE_IP === true;

        $collector = new ClickCollector(
            new UserAgentParser(),
            new GeoLookup(),
            VisitorHasher::today( $pepper ),
            anonymizeIp: $anon
        );

        $detector = new BotDetector( $ua, $accept );
        $payload  = $collector->collectFromServer(
            keyword: $keyword, ip: $ip, ua: $ua, referrer: $referrer, queryString: $qs,
            isBot: $detector->isBot(), botName: $detector->botName(), clickUid: $clickUid
        );
        $payload = $collector->mergeBeacon( $payload, $data );
        $payload = yourls_apply_filter( 'click_payload', $payload );

        $collector->persist( $payload );

        return self::reply( 204 );
    }

    private static function reply( int $status ): int {
        if ( ! headers_sent() ) {
            http_response_code( $status );
            header( 'Content-Length: 0' );
        }
        Connection::closeAndContinue();
        return $status;
    }
}
