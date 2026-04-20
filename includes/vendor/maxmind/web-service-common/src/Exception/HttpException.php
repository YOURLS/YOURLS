<?php

declare(strict_types=1);

namespace MaxMind\Exception;

/**
 *  This class represents an HTTP transport error.
 */
class HttpException extends WebServiceException
{
    /**
     * The URI queried.
     */
    private readonly string $uri;

    /**
     * @param string     $message    a message describing the error
     * @param int        $httpStatus the HTTP status code of the response
     * @param string     $uri        the URI used in the request
     * @param \Throwable $previous   the previous exception, if any
     */
    public function __construct(
        string $message,
        int $httpStatus,
        string $uri,
        ?\Throwable $previous = null
    ) {
        $this->uri = $uri;
        parent::__construct($message, $httpStatus, $previous);
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getStatusCode(): int
    {
        return $this->getCode();
    }
}
