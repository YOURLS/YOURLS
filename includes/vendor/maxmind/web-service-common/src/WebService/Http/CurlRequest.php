<?php

declare(strict_types=1);

namespace MaxMind\WebService\Http;

use MaxMind\Exception\HttpException;

/**
 * This class is for internal use only. Semantic versioning does not not apply.
 *
 * @internal
 */
class CurlRequest implements Request
{
    private readonly \CurlHandle $ch;
    private readonly string $url;

    /**
     * @var array{
     *     caBundle?: string,
     *     connectTimeout: float|int,
     *     curlHandle: \CurlHandle,
     *     headers: array<int, string>,
     *     proxy: string|null,
     *     timeout: float|int,
     *     userAgent: string
     * }
     */
    private readonly array $options;

    /**
     * @param array{
     *     caBundle?: string,
     *     connectTimeout: float|int,
     *     curlHandle: \CurlHandle,
     *     headers: array<int, string>,
     *     proxy: string|null,
     *     timeout: float|int,
     *     userAgent: string
     * } $options
     */
    public function __construct(string $url, array $options)
    {
        $this->url = $url;
        $this->options = $options;
        $this->ch = $options['curlHandle'];
    }

    /**
     * @throws HttpException
     *
     * @return array{0:int, 1:string|null, 2:string|null}
     */
    public function post(string $body): array
    {
        $curl = $this->createCurl();

        curl_setopt($curl, \CURLOPT_POST, true);
        curl_setopt($curl, \CURLOPT_POSTFIELDS, $body);

        return $this->execute($curl);
    }

    /**
     * @return array{0:int, 1:string|null, 2:string|null}
     */
    public function get(): array
    {
        $curl = $this->createCurl();

        curl_setopt($curl, \CURLOPT_HTTPGET, true);

        return $this->execute($curl);
    }

    private function createCurl(): \CurlHandle
    {
        curl_reset($this->ch);

        $opts = [];
        $opts[\CURLOPT_URL] = $this->url;

        if (!empty($this->options['caBundle'])) {
            $opts[\CURLOPT_CAINFO] = $this->options['caBundle'];
        }

        $opts[\CURLOPT_ENCODING] = '';
        $opts[\CURLOPT_SSL_VERIFYHOST] = 2;
        $opts[\CURLOPT_FOLLOWLOCATION] = false;
        $opts[\CURLOPT_SSL_VERIFYPEER] = true;
        $opts[\CURLOPT_RETURNTRANSFER] = true;

        $opts[\CURLOPT_HTTPHEADER] = $this->options['headers'];
        $opts[\CURLOPT_USERAGENT] = $this->options['userAgent'];
        if ($this->options['proxy'] !== null) {
            $opts[\CURLOPT_PROXY] = $this->options['proxy'];
        }

        $connectTimeout = $this->options['connectTimeout'];
        $opts[\CURLOPT_CONNECTTIMEOUT_MS] = (int) ceil($connectTimeout * 1000);

        $timeout = $this->options['timeout'];
        $opts[\CURLOPT_TIMEOUT_MS] = (int) ceil($timeout * 1000);

        // @phpstan-ignore argument.type (PHPStan's curl stubs require non-empty-string for URL/userAgent)
        curl_setopt_array($this->ch, $opts);

        return $this->ch;
    }

    /**
     * @throws HttpException
     *
     * @return array{0:int, 1:string|null, 2:string|null}
     */
    private function execute(\CurlHandle $curl): array
    {
        $body = curl_exec($curl);
        if ($errno = curl_errno($curl)) {
            $errorMessage = curl_error($curl);

            throw new HttpException(
                "cURL error ({$errno}): {$errorMessage}",
                0,
                $this->url
            );
        }

        $statusCode = curl_getinfo($curl, \CURLINFO_HTTP_CODE);
        $contentType = curl_getinfo($curl, \CURLINFO_CONTENT_TYPE);

        return [
            $statusCode,
            // The PHP docs say "Content-Type: of the requested document. NULL
            // indicates server did not send valid Content-Type: header" for
            // CURLINFO_CONTENT_TYPE. However, it will return FALSE if no header
            // is set. To keep our types simple, we return null in this case.
            $contentType === false ? null : $contentType,
            // curl_exec returns false on failure, but we've already checked
            // for errors above and thrown an exception. Cast to string to
            // satisfy PHPStan since curl_exec technically returns string|bool.
            $body === false ? null : (string) $body,
        ];
    }
}
