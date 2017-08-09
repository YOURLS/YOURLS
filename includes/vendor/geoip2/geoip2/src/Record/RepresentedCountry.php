<?php

namespace GeoIp2\Record;

/**
 * Contains data for the represented country associated with an IP address
 *
 * This class contains the country-level data associated with an IP address
 * for the IP's represented country. The represented country is the country
 * represented by something like a military base.
 *
 * @property-read int|null $confidence A value from 0-100 indicating MaxMind's
 * confidence that the country is correct. This attribute is only available
 * from the Insights service and the GeoIP2 Enterprise database.
 *
 * @property-read int|null $geonameId The GeoName ID for the country.
 *
 * @property-read string|null $isoCode The {@link http://en.wikipedia.org/wiki/ISO_3166-1
 * two-character ISO 3166-1 alpha code} for the country.
 *
 * @property-read string|null $name The name of the country based on the locales list
 * passed to the constructor.
 *
 * @property-read array|null $names An array map where the keys are locale codes and
 * the values are names.
 *
 * @property-read string|null $type A string indicating the type of entity that is
 * representing the country. Currently we only return <code>military</code>
 * but this could expand to include other types in the future.
 */
class RepresentedCountry extends Country
{
    protected $validAttributes = array(
        'confidence',
        'geonameId',
        'isoCode',
        'names',
        'type'
    );
}
