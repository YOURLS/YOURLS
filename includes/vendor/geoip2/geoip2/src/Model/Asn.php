<?php

namespace GeoIp2\Model;

/**
 * This class provides the GeoLite2 ASN model.
 *
 * @property-read integer|null $autonomousSystemNumber The autonomous system number
 *     associated with the IP address.
 *
 * @property-read string|null $autonomousSystemOrganization The organization
 *     associated with the registered autonomous system number for the IP
 *     address.
 *
 * @property-read string $ipAddress The IP address that the data in the model is
 *     for.
 *
 */
class Asn extends AbstractModel
{
    protected $autonomousSystemNumber;
    protected $autonomousSystemOrganization;
    protected $ipAddress;

    /**
     * @ignore
     */
    public function __construct($raw)
    {
        parent::__construct($raw);
        $this->autonomousSystemNumber = $this->get('autonomous_system_number');
        $this->autonomousSystemOrganization =
            $this->get('autonomous_system_organization');
        $this->ipAddress = $this->get('ip_address');
    }
}
