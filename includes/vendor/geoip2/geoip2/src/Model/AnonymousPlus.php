<?php

declare(strict_types=1);

namespace GeoIp2\Model;

/**
 * This class provides the GeoIP Anonymous Plus model.
 */
class AnonymousPlus extends AnonymousIp
{
    /**
     * @var int|null a score ranging from 1 to 99 that is our percent
     *               confidence that the network is currently part of
     *               an actively used VPN service
     */
    public readonly ?int $anonymizerConfidence;

    /**
     * @var string|null The last day that the network was sighted in our
     *                  analysis of anonymized networks. This is in the ISO
     *                  8601 date format, e.g., "2025-04-21".
     */
    public readonly ?string $networkLastSeen;

    /**
     * @var string|null The name of the VPN provider (e.g., NordVPN,
     *                  SurfShark, etc.) associated with the network.
     */
    public readonly ?string $providerName;

    /**
     * @ignore
     *
     * @param array<string, mixed> $raw
     */
    public function __construct(array $raw)
    {
        parent::__construct($raw);
        $this->anonymizerConfidence = $raw['anonymizer_confidence'] ?? null;
        $this->networkLastSeen = $raw['network_last_seen'] ?? null;
        $this->providerName = $raw['provider_name'] ?? null;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function jsonSerialize(): ?array
    {
        $js = parent::jsonSerialize();

        if ($this->anonymizerConfidence !== null) {
            $js['anonymizer_confidence'] = $this->anonymizerConfidence;
        }

        if ($this->networkLastSeen !== null) {
            $js['network_last_seen'] = $this->networkLastSeen;
        }

        if ($this->providerName !== null) {
            $js['provider_name'] = $this->providerName;
        }

        return $js;
    }
}
