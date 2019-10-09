<?php

namespace GeoIp2\Model;

/**
 * This class provides the GeoIP2 Anonymous IP model.
 *
 * @property-read bool $isAnonymous This is true if the IP address belongs to
 *     any sort of anonymous network.
 * @property-read bool $isAnonymousVpn This is true if the IP address belongs to
 *     an anonymous VPN system.
 * @property-read bool $isHostingProvider This is true if the IP address belongs
 *     to a hosting provider.
 * @property-read bool $isPublicProxy This is true if the IP address belongs to
 *     a public proxy.
 * @property-read bool $isTorExitNode This is true if the IP address is a Tor
 *     exit node.
 * @property-read string $ipAddress The IP address that the data in the model is
 *     for.
 */
class AnonymousIp extends AbstractModel
{
    protected $isAnonymous;
    protected $isAnonymousVpn;
    protected $isHostingProvider;
    protected $isPublicProxy;
    protected $isTorExitNode;
    protected $ipAddress;

    /**
     * @ignore
     *
     * @param mixed $raw
     */
    public function __construct($raw)
    {
        parent::__construct($raw);

        $this->isAnonymous = $this->get('is_anonymous');
        $this->isAnonymousVpn = $this->get('is_anonymous_vpn');
        $this->isHostingProvider = $this->get('is_hosting_provider');
        $this->isPublicProxy = $this->get('is_public_proxy');
        $this->isTorExitNode = $this->get('is_tor_exit_node');
        $this->ipAddress = $this->get('ip_address');
    }
}
