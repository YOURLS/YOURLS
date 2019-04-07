<?php

namespace GeoIp2\Database;

use GeoIp2\Exception\AddressNotFoundException;
use GeoIp2\ProviderInterface;
use MaxMind\Db\Reader as DbReader;
use MaxMind\Db\Reader\InvalidDatabaseException;

/**
 * Instances of this class provide a reader for the GeoIP2 database format.
 * IP addresses can be looked up using the database specific methods.
 *
 * ## Usage ##
 *
 * The basic API for this class is the same for every database. First, you
 * create a reader object, specifying a file name. You then call the method
 * corresponding to the specific database, passing it the IP address you want
 * to look up.
 *
 * If the request succeeds, the method call will return a model class for
 * the method you called. This model in turn contains multiple record classes,
 * each of which represents part of the data returned by the database. If
 * the database does not contain the requested information, the attributes
 * on the record class will have a `null` value.
 *
 * If the address is not in the database, an
 * {@link \GeoIp2\Exception\AddressNotFoundException} exception will be
 * thrown. If an invalid IP address is passed to one of the methods, a
 * SPL {@link \InvalidArgumentException} will be thrown. If the database is
 * corrupt or invalid, a {@link \MaxMind\Db\Reader\InvalidDatabaseException}
 * will be thrown.
 */
class Reader implements ProviderInterface
{
    private $dbReader;
    private $locales;

    /**
     * Constructor.
     *
     * @param string $filename the path to the GeoIP2 database file
     * @param array  $locales  list of locale codes to use in name property
     *                         from most preferred to least preferred
     *
     * @throws \MaxMind\Db\Reader\InvalidDatabaseException if the database
     *                                                     is corrupt or invalid
     */
    public function __construct(
        $filename,
        $locales = ['en']
    ) {
        $this->dbReader = new DbReader($filename);
        $this->locales = $locales;
    }

    /**
     * This method returns a GeoIP2 City model.
     *
     * @param string $ipAddress an IPv4 or IPv6 address as a string
     *
     * @throws \GeoIp2\Exception\AddressNotFoundException  if the address is
     *                                                     not in the database
     * @throws \MaxMind\Db\Reader\InvalidDatabaseException if the database
     *                                                     is corrupt or invalid
     *
     * @return \GeoIp2\Model\City
     */
    public function city($ipAddress)
    {
        return $this->modelFor('City', 'City', $ipAddress);
    }

    /**
     * This method returns a GeoIP2 Country model.
     *
     * @param string $ipAddress an IPv4 or IPv6 address as a string
     *
     * @throws \GeoIp2\Exception\AddressNotFoundException  if the address is
     *                                                     not in the database
     * @throws \MaxMind\Db\Reader\InvalidDatabaseException if the database
     *                                                     is corrupt or invalid
     *
     * @return \GeoIp2\Model\Country
     */
    public function country($ipAddress)
    {
        return $this->modelFor('Country', 'Country', $ipAddress);
    }

    /**
     * This method returns a GeoIP2 Anonymous IP model.
     *
     * @param string $ipAddress an IPv4 or IPv6 address as a string
     *
     * @throws \GeoIp2\Exception\AddressNotFoundException  if the address is
     *                                                     not in the database
     * @throws \MaxMind\Db\Reader\InvalidDatabaseException if the database
     *                                                     is corrupt or invalid
     *
     * @return \GeoIp2\Model\AnonymousIp
     */
    public function anonymousIp($ipAddress)
    {
        return $this->flatModelFor(
            'AnonymousIp',
            'GeoIP2-Anonymous-IP',
            $ipAddress
        );
    }

    /**
     * This method returns a GeoLite2 ASN model.
     *
     * @param string $ipAddress an IPv4 or IPv6 address as a string
     *
     * @throws \GeoIp2\Exception\AddressNotFoundException  if the address is
     *                                                     not in the database
     * @throws \MaxMind\Db\Reader\InvalidDatabaseException if the database
     *                                                     is corrupt or invalid
     *
     * @return \GeoIp2\Model\Asn
     */
    public function asn($ipAddress)
    {
        return $this->flatModelFor(
            'Asn',
            'GeoLite2-ASN',
            $ipAddress
        );
    }

    /**
     * This method returns a GeoIP2 Connection Type model.
     *
     * @param string $ipAddress an IPv4 or IPv6 address as a string
     *
     * @throws \GeoIp2\Exception\AddressNotFoundException  if the address is
     *                                                     not in the database
     * @throws \MaxMind\Db\Reader\InvalidDatabaseException if the database
     *                                                     is corrupt or invalid
     *
     * @return \GeoIp2\Model\ConnectionType
     */
    public function connectionType($ipAddress)
    {
        return $this->flatModelFor(
            'ConnectionType',
            'GeoIP2-Connection-Type',
            $ipAddress
        );
    }

    /**
     * This method returns a GeoIP2 Domain model.
     *
     * @param string $ipAddress an IPv4 or IPv6 address as a string
     *
     * @throws \GeoIp2\Exception\AddressNotFoundException  if the address is
     *                                                     not in the database
     * @throws \MaxMind\Db\Reader\InvalidDatabaseException if the database
     *                                                     is corrupt or invalid
     *
     * @return \GeoIp2\Model\Domain
     */
    public function domain($ipAddress)
    {
        return $this->flatModelFor(
            'Domain',
            'GeoIP2-Domain',
            $ipAddress
        );
    }

    /**
     * This method returns a GeoIP2 Enterprise model.
     *
     * @param string $ipAddress an IPv4 or IPv6 address as a string
     *
     * @throws \GeoIp2\Exception\AddressNotFoundException  if the address is
     *                                                     not in the database
     * @throws \MaxMind\Db\Reader\InvalidDatabaseException if the database
     *                                                     is corrupt or invalid
     *
     * @return \GeoIp2\Model\Enterprise
     */
    public function enterprise($ipAddress)
    {
        return $this->modelFor('Enterprise', 'Enterprise', $ipAddress);
    }

    /**
     * This method returns a GeoIP2 ISP model.
     *
     * @param string $ipAddress an IPv4 or IPv6 address as a string
     *
     * @throws \GeoIp2\Exception\AddressNotFoundException  if the address is
     *                                                     not in the database
     * @throws \MaxMind\Db\Reader\InvalidDatabaseException if the database
     *                                                     is corrupt or invalid
     *
     * @return \GeoIp2\Model\Isp
     */
    public function isp($ipAddress)
    {
        return $this->flatModelFor(
            'Isp',
            'GeoIP2-ISP',
            $ipAddress
        );
    }

    private function modelFor($class, $type, $ipAddress)
    {
        $record = $this->getRecord($class, $type, $ipAddress);

        $record['traits']['ip_address'] = $ipAddress;
        $class = 'GeoIp2\\Model\\' . $class;

        return new $class($record, $this->locales);
    }

    private function flatModelFor($class, $type, $ipAddress)
    {
        $record = $this->getRecord($class, $type, $ipAddress);

        $record['ip_address'] = $ipAddress;
        $class = 'GeoIp2\\Model\\' . $class;

        return new $class($record);
    }

    private function getRecord($class, $type, $ipAddress)
    {
        if (strpos($this->metadata()->databaseType, $type) === false) {
            $method = lcfirst($class);
            throw new \BadMethodCallException(
                "The $method method cannot be used to open a "
                . $this->metadata()->databaseType . ' database'
            );
        }
        $record = $this->dbReader->get($ipAddress);
        if ($record === null) {
            throw new AddressNotFoundException(
                "The address $ipAddress is not in the database."
            );
        }
        if (!is_array($record)) {
            // This can happen on corrupt databases. Generally,
            // MaxMind\Db\Reader will throw a
            // MaxMind\Db\Reader\InvalidDatabaseException, but occasionally
            // the lookup may result in a record that looks valid but is not
            // an array. This mostly happens when the user is ignoring all
            // exceptions and the more frequent InvalidDatabaseException
            // exceptions go unnoticed.
            throw new InvalidDatabaseException(
                "Expected an array when looking up $ipAddress but received: "
                . gettype($record)
            );
        }

        return $record;
    }

    /**
     * @throws \InvalidArgumentException if arguments are passed to the method
     * @throws \BadMethodCallException   if the database has been closed
     *
     * @return \MaxMind\Db\Reader\Metadata object for the database
     */
    public function metadata()
    {
        return $this->dbReader->metadata();
    }

    /**
     * Closes the GeoIP2 database and returns the resources to the system.
     */
    public function close()
    {
        $this->dbReader->close();
    }
}
