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
 * Parsing/rebuilding functionality for the pgsl driver.
 *
 * @package Aura.Sql
 *
 */
class PgsqlParser extends AbstractParser
{
    /**
     *
     * Split the query string on these regexes.
     *
     * @var array
     *
     */
    protected array $split = [
        // single-quoted string
        "'(?:[^'\\\\]|\\\\'?)*'",
        // double-quoted string
        '"(?:[^"\\\\]|\\\\"?)*"',
        // double-dollar string (empty dollar-tag)
        '\$\$(?:[^\$]?)*\$\$',
        // dollar-tag string -- DOES NOT match tags properly
        '\$[^\$]+\$.*\$[^\$]+\$',
    ];

    /**
     *
     * Skip query parts matching this regex.
     *
     * @var string
     *
     */
    protected string $skip = '/^(\'|\"|\$|\:[^a-zA-Z_])/um';
}
