<?php

declare(strict_types=1);

namespace MaxMind\Exception;

/**
 * Thrown when the IP address is not found in the database.
 */
class IpAddressNotFoundException extends InvalidRequestException
{
}
