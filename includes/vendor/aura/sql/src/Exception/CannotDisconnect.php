<?php
/**
 *
 * This file is part of Aura for PHP.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 *
 */
namespace Aura\Sql\Exception;

use Aura\Sql\Exception;

/**
 *
 * ExtendedPdo could not disconnect; e.g., because its PDO connection was
 * created externally and then injected.
 *
 * @package Aura.Sql
 *
 */
class CannotDisconnect extends Exception
{
}
