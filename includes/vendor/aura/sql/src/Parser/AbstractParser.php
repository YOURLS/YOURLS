<?php
/**
 *
 * This file is part of Aura for PHP.
 *
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
namespace Aura\Sql\Parser;

use Aura\Sql\Exception\MissingParameter;

/**
 *
 * Parsing/rebuilding functionality for all drivers.
 *
 * Note that this does not validate the syntax; it only replaces/rebuilds
 * placeholders in the query.
 *
 * @package Aura.Sql
 *
 */
abstract class AbstractParser implements ParserInterface
{
    /**
     *
     * Split the query string on these regexes.
     *
     * @var array
     *
     */
    protected $split = [
        // single-quoted string
        "'(?:[^'\\\\]|\\\\'?)*'",
        // double-quoted string
        '"(?:[^"\\\\]|\\\\"?)*"',
    ];

    /**
     *
     * Skip query parts matching this regex.
     *
     * @var string
     *
     */
    protected $skip = '/^(\'|\"|\:[^a-zA-Z_])/um';

    /**
     *
     * The current numbered-placeholder in the original statement.
     *
     * @var int
     *
     */
    protected $num = 0;

    /**
     *
     * How many times has a named placeholder been used?
     *
     * @var array
     *
     */
    protected $count = [
        '__' => null,
    ];

    /**
     *
     * The initial values to be bound.
     *
     * @var array
     *
     */
    protected $values = [];

    /**
     *
     * Final placeholders and values to bind.
     *
     * @var array
     *
     */
    protected $final_values = [];

    /**
     *
     * Rebuilds a statement with placeholders and bound values.
     *
     * @param string $statement The statement to rebuild.
     *
     * @param array $values The values to bind and/or replace into a statement.
     *
     * @return array An array where element 0 is the rebuilt statement and
     * element 1 is the rebuilt array of values.
     *
     */
    public function rebuild($statement, array $values = [])
    {
        // match standard PDO execute() behavior of zero-indexed arrays
        if (array_key_exists(0, $values)) {
            array_unshift($values, null);
        }

        $this->values = $values;
        $statement = $this->rebuildStatement($statement);
        return [$statement, $this->final_values];
    }

    /**
     *
     * Given a statement, rebuilds it with array values embedded.
     *
     * @param string $statement The SQL statement.
     *
     * @return string The rebuilt statement.
     *
     */
    protected function rebuildStatement($statement)
    {
        $parts = $this->getParts($statement);
        return $this->rebuildParts($parts);
    }

    /**
     *
     * Given an array of statement parts, rebuilds each part.
     *
     * @param array $parts The statement parts.
     *
     * @return string The rebuilt statement.
     *
     */
    protected function rebuildParts(array $parts)
    {
        $statement = '';
        foreach ($parts as $part) {
            $statement .= $this->rebuildPart($part);
        }
        return $statement;
    }

    /**
     *
     * Rebuilds a single statement part.
     *
     * @param string $part The statement part.
     *
     * @return string The rebuilt statement.
     *
     */
    protected function rebuildPart($part)
    {
        if (preg_match($this->skip, $part)) {
            return $part;
        }

        // split into subparts by ":name" and "?"
        $subs = preg_split(
            "/(?<!:)(:[a-zA-Z_][a-zA-Z0-9_]*)|(\?)/um",
            $part,
            -1,
            PREG_SPLIT_DELIM_CAPTURE
        );

        // check subparts to expand placeholders for bound arrays
        return $this->prepareValuePlaceholders($subs);
    }

    /**
     *
     * Prepares the sub-parts of a query with placeholders.
     *
     * @param array $subs The query subparts.
     *
     * @return string The prepared subparts.
     *
     */
    protected function prepareValuePlaceholders(array $subs)
    {
        $str = '';
        foreach ($subs as $i => $sub) {
            $char = substr($sub, 0, 1);
            if ($char == '?') {
                $str .= $this->prepareNumberedPlaceholder();
            } elseif ($char == ':') {
                $str .= $this->prepareNamedPlaceholder($sub);
            } else {
                $str .= $sub;
            }
        }
        return $str;
    }

    /**
     *
     * Bind or quote a numbered placeholder in a query subpart.
     *
     * @return string The prepared query subpart.
     *
     * @throws MissingParameter
     */
    protected function prepareNumberedPlaceholder()
    {
        $this->num ++;
        if (array_key_exists($this->num, $this->values) === false) {
            throw new MissingParameter("Parameter {$this->num} is missing from the bound values");
        }

        $expanded = [];
        $values = (array) $this->values[$this->num];
        if (is_null($this->values[$this->num])) {
            $values[] = null;
        }
        foreach ($values as $value) {
            $count = ++ $this->count['__'];
            $name = "__{$count}";
            $expanded[] = ":{$name}";
            $this->final_values[$name] = $value;
        }
        return implode(', ', $expanded);
    }

    /**
     *
     * Bind or quote a named placeholder in a query subpart.
     *
     * @param string $sub The query subpart.
     *
     * @return string The prepared query subpart.
     *
     */
    protected function prepareNamedPlaceholder($sub)
    {
        $orig = substr($sub, 1);
        if (array_key_exists($orig, $this->values) === false) {
            throw new MissingParameter("Parameter '{$orig}' is missing from the bound values");
        }

        $name = $this->getPlaceholderName($orig);

        // is the corresponding data element an array?
        $bind_array = is_array($this->values[$orig]);
        if ($bind_array) {
            // expand to multiple placeholders
            return $this->expandNamedPlaceholder($name, $this->values[$orig]);
        }

        // not an array, retain the placeholder for later
        $this->final_values[$name] = $this->values[$orig];
        return ":$name";
    }

    /**
     *
     * Given an original placeholder name, return a replacement name.
     *
     * @param string $orig The original placeholder name.
     *
     * @return string
     *
     */
    protected function getPlaceholderName($orig)
    {
        if (! isset($this->count[$orig])) {
            $this->count[$orig] = 0;
            return $orig;
        }

        $count = ++ $this->count[$orig];
        return "{$orig}__{$count}";
    }

    /**
     *
     * Given a named placeholder for an array, expand it for the array values,
     * and bind those values to the expanded names.
     *
     * @param string $prefix The named placeholder.
     *
     * @param array $values The array values to be bound.
     *
     * @return string
     *
     */
    protected function expandNamedPlaceholder($prefix, array $values)
    {
        $i = 0;
        $expanded = [];
        foreach ($values as $value) {
            $name = "{$prefix}_{$i}";
            $expanded[] = ":{$name}";
            $this->final_values[$name] = $value;
            $i ++;
        }
        return implode(', ', $expanded);
    }

    /**
     *
     * Given a query string, split it into parts.
     *
     * @param string $statement The query string.
     *
     * @return array
     *
     */
    protected function getParts($statement)
    {
        $split = implode('|', $this->split);
        return preg_split(
            "/($split)/um",
            $statement,
            -1,
            PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY
        );
    }
}
