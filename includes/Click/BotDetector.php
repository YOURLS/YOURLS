<?php
namespace YOURLS\Click;

class BotDetector {
    private const PATTERNS = [
        'googlebot'            => '/Googlebot/i',
        'bingbot'              => '/bingbot/i',
        'duckduckbot'          => '/DuckDuckBot/i',
        'yandexbot'            => '/YandexBot/i',
        'baiduspider'          => '/Baiduspider/i',
        'slurp'                => '/Slurp/i',
        'twitterbot'           => '/Twitterbot/i',
        'facebookexternalhit'  => '/facebookexternalhit/i',
        'linkedinbot'          => '/LinkedInBot/i',
        'slackbot'             => '/Slackbot/i',
        'telegrambot'          => '/TelegramBot/i',
        'discordbot'           => '/Discordbot/i',
        'whatsapp'             => '/WhatsApp/i',
        'curl'                 => '/^curl\//i',
        'wget'                 => '/^Wget\//i',
        'python-requests'      => '/python-requests/i',
        'go-http-client'       => '/Go-http-client/i',
        'httpclient'           => '/HttpClient/i',
        'ahrefsbot'            => '/AhrefsBot/i',
        'semrushbot'           => '/SemrushBot/i',
    ];

    public function __construct(
        private readonly string $userAgent,
        private readonly string $acceptHeader = ''
    ) {}

    public function isBot(): bool {
        if ( $this->userAgent === '' ) {
            return true;
        }
        $name = $this->botName();
        if ( $name !== null && $name !== 'unknown' ) {
            return true;
        }
        if ( $this->acceptHeader === '' ) {
            return true;
        }
        if ( stripos( $this->acceptHeader, 'text/html' ) === false
             && stripos( $this->acceptHeader, '*/*' ) === false ) {
            return true;
        }
        return false;
    }

    public function botName(): ?string {
        if ( $this->userAgent === '' ) {
            return 'unknown';
        }
        foreach ( self::PATTERNS as $name => $regex ) {
            if ( preg_match( $regex, $this->userAgent ) ) {
                return $name;
            }
        }
        if ( $this->acceptHeader === '' ) {
            return 'unknown';
        }
        return null;
    }
}
