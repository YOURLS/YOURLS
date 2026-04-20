<?php

declare(strict_types=1);

namespace GeoIp2\Model;

use GeoIp2\Record\Anonymizer;

/**
 * Model class for the data returned by GeoIP2 Insights web service.
 *
 * See https://dev.maxmind.com/geoip/docs/web-services?lang=en for
 * more details.
 */
class Insights extends City
{
    /**
     * @var Anonymizer Anonymizer data for the requested IP address. This
     *                 includes information about whether the IP belongs to an anonymous
     *                 network, VPN provider details, and confidence scores.
     */
    public readonly Anonymizer $anonymizer;

    /**
     * @ignore
     *
     * @param array<string, mixed> $raw
     * @param list<string>         $locales
     */
    public function __construct(array $raw, array $locales = ['en'])
    {
        parent::__construct($raw, $locales);

        $this->anonymizer = new Anonymizer($raw['anonymizer'] ?? []);
    }

    /**
     * @return array<string, mixed>|null
     */
    public function jsonSerialize(): ?array
    {
        $js = parent::jsonSerialize();

        $anonymizer = $this->anonymizer->jsonSerialize();
        if (!empty($anonymizer)) {
            $js['anonymizer'] = $anonymizer;
        }

        return $js;
    }
}
