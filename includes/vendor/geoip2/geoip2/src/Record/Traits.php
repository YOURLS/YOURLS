<?php

namespace GeoIp2\Record;

/**
 *
 * Contains data for the traits record associated with an IP address
 *
 * This record is returned by all location services and databases.
 *
 * @property-read int|null $autonomousSystemNumber The {@link
 * http://en.wikipedia.org/wiki/Autonomous_system_(Internet) autonomous
 * system number} associated with the IP address. This attribute is only
 * available from the City and Insights web service and the GeoIP2
 * Enterprise database.
 *
 * @property-read string|null $autonomousSystemOrganization The organization
 * associated with the registered {@link
 * http://en.wikipedia.org/wiki/Autonomous_system_(Internet) autonomous
 * system number} for the IP address. This attribute is only available from
 * the City and Insights web service and the GeoIP2 Enterprise
 * database.
 *
 * @property-read string|null $connectionType The connection type may take the
 * following  values: "Dialup", "Cable/DSL", "Corporate", "Cellular".
 * Additional values may be added in the future. This attribute is only
 * available in the GeoIP2 Enterprise database.
 *
 * @property-read string|null $domain The second level domain associated with the
 * IP address. This will be something like "example.com" or "example.co.uk",
 * not "foo.example.com". This attribute is only available from the
 * City and Insights web service and the GeoIP2 Enterprise
 * database.
 *
 * @property-read string $ipAddress The IP address that the data in the model
 * is for. If you performed a "me" lookup against the web service, this
 * will be the externally routable IP address for the system the code is
 * running on. If the system is behind a NAT, this may differ from the IP
 * address locally assigned to it. This attribute is returned by all end
 * points.
 *
 * @property-read boolean $isAnonymousProxy *Deprecated.* Please see our {@link
 * https://www.maxmind.com/en/geoip2-anonymous-ip-database GeoIP2
 * Anonymous IP database} to determine whether the IP address is used by an
 * anonymizing service.
 *
 * @property-read boolean $isLegitimateProxy This attribute is true if MaxMind
 * believes this IP address to be a legitimate proxy, such as an internal
 * VPN used by a corporation. This attribute is only available in the GeoIP2
 * Enterprise database.
 *
 * @property-read boolean $isSatelliteProvider *Deprecated.* Due to the
 * increased coverage by mobile carriers, very few satellite providers now
 * serve multiple countries. As a result, the output does not provide
 * sufficiently relevant data for us to maintain it.
 *
 * @property-read string|null $isp The name of the ISP associated with the IP
 * address. This attribute is only available from the City and Insights web
 * services and the GeoIP2 Enterprise database.
 *
 * @property-read string|null $organization The name of the organization associated
 * with the IP address. This attribute is only available from the City and
 * Insights web services and the GeoIP2 Enterprise database.
 *
 * @property-read string|null $userType <p>The user type associated with the IP
 *  address. This can be one of the following values:</p>
 *  <ul>
 *    <li>business
 *    <li>cafe
 *    <li>cellular
 *    <li>college
 *    <li>content_delivery_network
 *    <li>dialup
 *    <li>government
 *    <li>hosting
 *    <li>library
 *    <li>military
 *    <li>residential
 *    <li>router
 *    <li>school
 *    <li>search_engine_spider
 *    <li>traveler
 * </ul>
 * <p>
 *   This attribute is only available from the Insights web service and the
 *   GeoIP2 Enterprise database.
 * </p>
 */
class Traits extends AbstractRecord
{
    /**
     * @ignore
     */
    protected $validAttributes = array(
        'autonomousSystemNumber',
        'autonomousSystemOrganization',
        'connectionType',
        'domain',
        'isAnonymousProxy',
        'isLegitimateProxy',
        'isSatelliteProvider',
        'isp',
        'ipAddress',
        'organization',
        'userType'
    );
}
