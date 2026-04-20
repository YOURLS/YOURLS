<?php

declare(strict_types=1);

namespace GeoIp2\Record;

/**
 * Contains data for the anonymizer record associated with an IP address.
 *
 * This record is returned by the GeoIP2 Insights web service.
 */
class Anonymizer implements \JsonSerializable
{
    /**
     * @var int|null A confidence score from 1-99 indicating our confidence that the IP
     *               address is a VPN. Currently, this is either 30 or 99. This attribute is
     *               only available from the GeoIP2 Insights web service.
     */
    public readonly ?int $confidence;

    /**
     * @var bool This is true if the IP address belongs to any sort of anonymous network.
     *           This attribute is only available from the GeoIP2 Insights web service.
     */
    public readonly bool $isAnonymous;

    /**
     * @var bool This is true if the IP address is registered to an anonymous VPN provider.
     *           If a VPN provider does not register subnets under names associated with them,
     *           we will likely only flag their IP ranges using the isHostingProvider property.
     *           This attribute is only available from the GeoIP2 Insights web service.
     */
    public readonly bool $isAnonymousVpn;

    /**
     * @var bool This is true if the IP address belongs to a hosting or VPN provider (see
     *           description of isAnonymousVpn property). This attribute is only available from
     *           the GeoIP2 Insights web service.
     */
    public readonly bool $isHostingProvider;

    /**
     * @var bool This is true if the IP address belongs to a public proxy. This attribute
     *           is only available from the GeoIP2 Insights web service.
     */
    public readonly bool $isPublicProxy;

    /**
     * @var bool This is true if the IP address is on a suspected anonymizing network and
     *           belongs to a residential ISP. This attribute is only available from the GeoIP2
     *           Insights web service.
     */
    public readonly bool $isResidentialProxy;

    /**
     * @var bool This is true if the IP address is a Tor exit node. This attribute is only
     *           available from the GeoIP2 Insights web service.
     */
    public readonly bool $isTorExitNode;

    /**
     * @var string|null The date the anonymizer network was last seen in YYYY-MM-DD format.
     *                  This attribute is only available from the GeoIP2 Insights web service.
     */
    public readonly ?string $networkLastSeen;

    /**
     * @var string|null The name of the VPN provider, for example, NordVPN or SurfShark.
     *                  This attribute is only available from the GeoIP2 Insights web service.
     */
    public readonly ?string $providerName;

    /**
     * @ignore
     *
     * @param array<string, mixed> $record
     */
    public function __construct(array $record)
    {
        $this->confidence = $record['confidence'] ?? null;
        $this->isAnonymous = $record['is_anonymous'] ?? false;
        $this->isAnonymousVpn = $record['is_anonymous_vpn'] ?? false;
        $this->isHostingProvider = $record['is_hosting_provider'] ?? false;
        $this->isPublicProxy = $record['is_public_proxy'] ?? false;
        $this->isResidentialProxy = $record['is_residential_proxy'] ?? false;
        $this->isTorExitNode = $record['is_tor_exit_node'] ?? false;
        $this->networkLastSeen = $record['network_last_seen'] ?? null;
        $this->providerName = $record['provider_name'] ?? null;
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $js = [];

        if ($this->confidence !== null) {
            $js['confidence'] = $this->confidence;
        }
        if ($this->isAnonymous !== false) {
            $js['is_anonymous'] = $this->isAnonymous;
        }
        if ($this->isAnonymousVpn !== false) {
            $js['is_anonymous_vpn'] = $this->isAnonymousVpn;
        }
        if ($this->isHostingProvider !== false) {
            $js['is_hosting_provider'] = $this->isHostingProvider;
        }
        if ($this->isPublicProxy !== false) {
            $js['is_public_proxy'] = $this->isPublicProxy;
        }
        if ($this->isResidentialProxy !== false) {
            $js['is_residential_proxy'] = $this->isResidentialProxy;
        }
        if ($this->isTorExitNode !== false) {
            $js['is_tor_exit_node'] = $this->isTorExitNode;
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
