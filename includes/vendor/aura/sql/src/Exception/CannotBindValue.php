<?php
/**
 *
 * This file is part of Aura for PHP.
 *
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
namespace Aura\Sql\Exception;

use Aura\Sql\Exception;

/**
 *
 * Could not bind a value to a placeholder in a statement, generally because
 * the value is an array, object, or resource.
 *
 * @package Aura.Sql
 *
 */
class CannotBindValue extends Exception
{
}
