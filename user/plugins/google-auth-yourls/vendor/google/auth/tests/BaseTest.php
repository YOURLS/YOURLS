<?php

namespace Google\Auth\tests;

use GuzzleHttp\ClientInterface;

abstract class BaseTest extends \PHPUnit_Framework_TestCase
{
    public function onlyGuzzle6()
    {
        $version = ClientInterface::VERSION;
        if ('6' !== $version[0]) {
            $this->markTestSkipped('Guzzle 6 only');
        }
    }

    public function onlyGuzzle5()
    {
        $version = ClientInterface::VERSION;
        if ('5' !== $version[0]) {
            $this->markTestSkipped('Guzzle 5 only');
        }
    }

    /**
     * @see Google\Auth\$this->getValidKeyName
     */
    public function getValidKeyName($key)
    {
        return preg_replace('|[^a-zA-Z0-9_\.! ]|', '', $key);
    }
}
