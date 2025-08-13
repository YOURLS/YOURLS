<?php
/**
 *
 * This file is part of Aura for PHP.
 *
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
namespace Aura\Sql\Parser;

/**
 *
 * A parser/rebuilder that does nothing at all; use this when your placeholders
 * and bound-values are already perfectly matched.
 *
 * @package Aura.Sql
 *
 */
class NullParser implements ParserInterface
{
    /**
     *
     * Leaves the query and parameters alone.
     *
     * @param string $string The query statement string.
     *
     * @param array $parameters Bind these values into the query.
     *
     * @return array
     *
     */
    public function rebuild(string $string, array $parameters = []): array
    {
        return [$string, $parameters];
    }
}
