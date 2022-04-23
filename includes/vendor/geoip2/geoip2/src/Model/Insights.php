<?php

declare(strict_types=1);

namespace GeoIp2\Model;

/**
 * Model class for the data returned by GeoIP2 Precision: Insights web service.
 *
 * The only difference between the City and Insights model classes is which
 * fields in each record may be populated. See
 * https://dev.maxmind.com/geoip/docs/web-services?lang=en for more details.
 */
class Insights extends City
{
}
