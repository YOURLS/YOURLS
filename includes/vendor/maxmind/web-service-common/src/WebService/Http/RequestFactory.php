<?php

namespace MaxMind\WebService\Http;

/**
 * Class RequestFactory.
 *
 * @internal
 */
class RequestFactory
{
    /**
     * Keep the cURL resource here, so that if there are multiple API requests
     * done the connection is kept alive, SSL resumption can be used
     * etcetera.
     *
     * @var resource
     */
    private $ch;

    public function __construct()
    {
        $this->ch = curl_init();
    }

    public function __destruct()
    {
        curl_close($this->ch);
    }

    /**
     * @param string $url
     * @param array  $options
     *
     * @return Request
     */
    public function request($url, $options)
    {
        $options['curlHandle'] = $this->ch;

        return new CurlRequest($url, $options);
    }
}
