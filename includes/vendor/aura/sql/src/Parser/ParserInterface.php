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
 * Interface for query parsing/rebuilding functionality.
 *
 * @package Aura.Sql
 *
 */
interface ParserInterface
{
    /**
     *
     * Rebuilds a query and its parameters to adapt it to PDO's limitations,
     * and returns a list of queries.
     *
     * @param string $string The query statement string.
     *
     * @param array $parameters Bind these values into the query.
     *
     * @return array An array where element 0 is the rebuilt statement and
     * element 1 is the rebuilt array of values.
     *
     */
    public function rebuild(string $string, array $parameters = []): array;
}
