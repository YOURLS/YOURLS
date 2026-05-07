<?php
namespace YOURLS\Click;

class ClickPayload {
    public string  $keyword       = '';
    public string  $clickTime     = '';
    public string  $referrer      = '';
    public string  $userAgent     = '';
    public string  $ipAddress     = '';
    public string  $countryCode   = '';
    public ?string $deviceType    = null;
    public ?string $browser       = null;
    public ?string $os            = null;
    public ?string $referrerHost  = null;
    public ?string $utmSource     = null;
    public ?string $utmMedium     = null;
    public ?string $utmCampaign   = null;
    public ?string $city          = null;
    public ?string $region        = null;
    public ?string $visitorHash   = null;
    public ?string $clickUid      = null;
    public ?array  $meta          = null;

    public function toRow(): array {
        return [
            'click_time'    => $this->clickTime !== '' ? $this->clickTime : gmdate( 'Y-m-d H:i:s' ),
            'shorturl'      => $this->keyword,
            'referrer'      => substr( $this->referrer,    0, 200 ),
            'user_agent'    => substr( $this->userAgent,   0, 255 ),
            'ip_address'    => substr( $this->ipAddress,   0, 41 ),
            'country_code'  => substr( $this->countryCode, 0, 2 ),
            'device_type'   => $this->trimOrNull( $this->deviceType,   16 ),
            'browser'       => $this->trimOrNull( $this->browser,      32 ),
            'os'            => $this->trimOrNull( $this->os,           32 ),
            'referrer_host' => $this->trimOrNull( $this->referrerHost, 100 ),
            'utm_source'    => $this->trimOrNull( $this->utmSource,    100 ),
            'utm_medium'    => $this->trimOrNull( $this->utmMedium,    100 ),
            'utm_campaign'  => $this->trimOrNull( $this->utmCampaign,  100 ),
            'city'          => $this->trimOrNull( $this->city,         100 ),
            'region'        => $this->trimOrNull( $this->region,       100 ),
            'visitor_hash'  => $this->trimOrNull( $this->visitorHash,  16 ),
            'click_uid'     => $this->trimOrNull( $this->clickUid,     16 ),
            'meta'          => $this->meta === null ? null : json_encode( $this->meta, JSON_UNESCAPED_UNICODE ),
        ];
    }

    private function trimOrNull( ?string $v, int $max ): ?string {
        if ( $v === null || $v === '' ) return null;
        return substr( $v, 0, $max );
    }
}
