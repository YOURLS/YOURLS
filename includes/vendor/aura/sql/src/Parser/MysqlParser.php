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
 * Parsing/rebuilding functionality for the mysql driver.
 *
 * @package Aura.Sql
 *
 */
class MysqlParser extends AbstractParser
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
        // backtick-quoted string
        '`(?:[^`\\\\]|\\\\`?)*`',
    ];

    /**
     *
     * Skip query parts matching this regex.
     *
     * @var string
     *
     */
    protected string $skip = '/^(\'|\"|\`)/um';
}
