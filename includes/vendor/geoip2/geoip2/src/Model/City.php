<?php

namespace GeoIp2\Model;

/**
 * Model class for the data returned by GeoIP2 City web service and database.
 *
 * The only difference between the City and Insights model classes is which
 * fields in each record may be populated. See
 * https://dev.maxmind.com/geoip/geoip2/web-services for more details.
 *
 * @property-read \GeoIp2\Record\City $city City data for the requested IP
 * address.
 * @property-read \GeoIp2\Record\Location $location Location data for the
 * requested IP address.
 * @property-read \GeoIp2\Record\Postal $postal Postal data for the
 * requested IP address.
 * @property-read array $subdivisions An array \GeoIp2\Record\Subdivision
 * objects representing the country subdivisions for the requested IP
 * address. The number and type of subdivisions varies by country, but a
 * subdivision is typically a state, province, county, etc. Subdivisions
 * are ordered from most general (largest) to most specific (smallest).
 * If the response did not contain any subdivisions, this method returns
 * an empty array.
 * @property-read \GeoIp2\Record\Subdivision $mostSpecificSubdivision An object
 * representing the most specific subdivision returned. If the response
 * did not contain any subdivisions, this method returns an empty
 * \GeoIp2\Record\Subdivision object.
 */
class City extends Country
{
    /**
     * @ignore
     */
    protected $city;
    /**
     * @ignore
     */
    protected $location;
    /**
     * @ignore
     */
    protected $postal;
    /**
     * @ignore
     */
    protected $subdivisions = [];

    /**
     * @ignore
     *
     * @param mixed $raw
     * @param mixed $locales
     */
    public function __construct($raw, $locales = ['en'])
    {
        parent::__construct($raw, $locales);

        $this->city = new \GeoIp2\Record\City($this->get('city'), $locales);
        $this->location = new \GeoIp2\Record\Location($this->get('location'));
        $this->postal = new \GeoIp2\Record\Postal($this->get('postal'));

        $this->createSubdivisions($raw, $locales);
    }

    private function createSubdivisions($raw, $locales)
    {
        if (!isset($raw['subdivisions'])) {
            return;
        }

        foreach ($raw['subdivisions'] as $sub) {
            array_push(
                $this->subdivisions,
                new \GeoIp2\Record\Subdivision($sub, $locales)
            );
        }
    }

    /**
     * @ignore
     *
     * @param mixed $attr
     */
    public function __get($attr)
    {
        if ($attr === 'mostSpecificSubdivision') {
            return $this->$attr();
        }

        return parent::__get($attr);
    }

    /**
     * @ignore
     *
     * @param mixed $attr
     */
    public function __isset($attr)
    {
        if ($attr === 'mostSpecificSubdivision') {
            // We always return a mostSpecificSubdivision, even if it is the
            // empty subdivision
            return true;
        }

        return parent::__isset($attr);
    }

    private function mostSpecificSubdivision()
    {
        return empty($this->subdivisions) ?
            new \GeoIp2\Record\Subdivision([], $this->locales) :
            end($this->subdivisions);
    }
}
