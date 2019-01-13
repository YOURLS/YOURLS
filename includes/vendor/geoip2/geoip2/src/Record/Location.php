<?php

namespace GeoIp2\Record;

/**
 * Contains data for the location record associated with an IP address.
 *
 * This record is returned by all location services and databases besides
 * Country.
 *
 * @property-read int|null $averageIncome The average income in US dollars
 * associated with the requested IP address. This attribute is only available
 * from the Insights service.
 * @property-read int|null $accuracyRadius The approximate accuracy radius in
 * kilometers around the latitude and longitude for the IP address. This is
 * the radius where we have a 67% confidence that the device using the IP
 * address resides within the circle centered at the latitude and longitude
 * with the provided radius.
 * @property-read float|null $latitude The approximate latitude of the location
 * associated with the IP address. This value is not precise and should not be
 * used to identify a particular address or household.
 * @property-read float|null $longitude The approximate longitude of the location
 * associated with the IP address. This value is not precise and should not be
 * used to identify a particular address or household.
 * @property-read int|null $populationDensity The estimated population per square
 * kilometer associated with the IP address. This attribute is only available
 * from the Insights service.
 * @property-read int|null $metroCode The metro code of the location if the location
 * is in the US. MaxMind returns the same metro codes as the
 * {@link * https://developers.google.com/adwords/api/docs/appendix/cities-DMAregions
 * Google AdWords API}.
 * @property-read string|null $timeZone The time zone associated with location, as
 * specified by the {@link http://www.iana.org/time-zones IANA Time Zone
 * Database}, e.g., "America/New_York".
 */
class Location extends AbstractRecord
{
    /**
     * @ignore
     */
    protected $validAttributes = [
        'averageIncome',
        'accuracyRadius',
        'latitude',
        'longitude',
        'metroCode',
        'populationDensity',
        'postalCode',
        'postalConfidence',
        'timeZone',
    ];
}
