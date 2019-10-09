<?php

namespace GeoIp2\Model;

/**
 * Model class for the data returned by GeoIP2 Country web service and database.
 *
 * The only difference between the City and Insights model classes is which
 * fields in each record may be populated. See
 * http://dev.maxmind.com/geoip/geoip2/web-services more details.
 *
 * @property-read \GeoIp2\Record\Continent $continent Continent data for the
 * requested IP address.
 * @property-read \GeoIp2\Record\Country $country Country data for the requested
 * IP address. This object represents the country where MaxMind believes the
 * end user is located.
 * @property-read \GeoIp2\Record\MaxMind $maxmind Data related to your MaxMind
 * account.
 * @property-read \GeoIp2\Record\Country $registeredCountry Registered country
 * data for the requested IP address. This record represents the country
 * where the ISP has registered a given IP block and may differ from the
 * user's country.
 * @property-read \GeoIp2\Record\RepresentedCountry $representedCountry
 * Represented country data for the requested IP address. The represented
 * country is used for things like military bases. It is only present when
 * the represented country differs from the country.
 * @property-read \GeoIp2\Record\Traits $traits Data for the traits of the
 * requested IP address.
 */
class Country extends AbstractModel
{
    protected $continent;
    protected $country;
    protected $locales;
    protected $maxmind;
    protected $registeredCountry;
    protected $representedCountry;
    protected $traits;

    /**
     * @ignore
     *
     * @param mixed $raw
     * @param mixed $locales
     */
    public function __construct($raw, $locales = ['en'])
    {
        parent::__construct($raw);

        $this->continent = new \GeoIp2\Record\Continent(
            $this->get('continent'),
            $locales
        );
        $this->country = new \GeoIp2\Record\Country(
            $this->get('country'),
            $locales
        );
        $this->maxmind = new \GeoIp2\Record\MaxMind($this->get('maxmind'));
        $this->registeredCountry = new \GeoIp2\Record\Country(
            $this->get('registered_country'),
            $locales
        );
        $this->representedCountry = new \GeoIp2\Record\RepresentedCountry(
            $this->get('represented_country'),
            $locales
        );
        $this->traits = new \GeoIp2\Record\Traits($this->get('traits'));

        $this->locales = $locales;
    }
}
