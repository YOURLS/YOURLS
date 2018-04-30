<?php
/**
 *
 * This file is part of Aura for PHP.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 *
 */
namespace Aura\Sql;

use Aura\Sql\Exception\MissingParameter;

/**
 *
 * This support class for ExtendedPdo rebuilds an SQL statement for automatic
 * binding of values.
 *
 * @package Aura.Sql
 *
 */
class Rebuilder
{
    /**
     *
     * The calling ExtendedPdo object.
     *
     * @var ExtendedPdo
     *
     */
    protected $xpdo;

    /**
     *
     * How many numbered placeholders in the original statement.
     *
     * @var int
     *
     */
    protected $num = 0;

    /**
     *
     * How many numbered placeholders to actually be bound; this may
     * differ from 'num' in that some numbered placeholders may get
     * replaced with quoted CSV strings
     *
     * @var int
     *
     */
    protected $count = 0;

    /**
     *
     * The initial values to be bound.
     *
     * @var array
     *
     */
    protected $values = array();

    /**
     *
     * Named and numbered placeholders to bind at the end.
     *
     * @var array
     *
     */
    protected $final_values = array();

    /**
     *
     * Constructor.
     *
     * @param ExtendedPdo $xpdo The calling ExtendedPdo object.
     *
     */
    public function __construct(ExtendedPdo $xpdo)
    {
        $this->xpdo = $xpdo;
    }

    /**
     *
     * Rebuilds a statement with array values replaced into placeholders.
     *
     * @param string $statement The statement to rebuild.
     *
     * @param array $values The values to bind and/or replace into a statement.
     *
     * @return array An array where element 0 is the rebuilt statement and
     * element 1 is the rebuilt array of values.
     *
     */
    public function __invoke($statement, $values)
    {
        // match standard PDO execute() behavior of zero-indexed arrays
        if (array_key_exists(0, $values)) {
            array_unshift($values, null);
        }

        $this->values = $values;
        $statement = $this->rebuildStatement($statement);
        return array($statement, $this->final_values);
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
        // find all parts not inside quotes or backslashed-quotes
        $apos = "'";
        $quot = '"';
        $parts = preg_split(
            "/(($apos+|$quot+|\\$apos+|\\$quot+).*?)\\2/m",
            $statement,
            -1,
            PREG_SPLIT_DELIM_CAPTURE
        );
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
    protected function rebuildParts($parts)
    {
        // loop through the non-quoted parts (0, 3, 6, 9, etc.)
        $k = count($parts);
        for ($i = 0; $i <= $k; $i += 3) {
            $parts[$i] = $this->rebuildPart($parts[$i]);
        }
        return implode('', $parts);
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
        // split into subparts by ":name" and "?"
        $subs = preg_split(
            "/(:[a-zA-Z_][a-zA-Z0-9_]*)|(\?)/m",
            $part,
            -1,
            PREG_SPLIT_DELIM_CAPTURE
        );

        // check subparts to convert bound arrays to quoted CSV strings
        $subs = $this->prepareValuePlaceholders($subs);

        // reassemble
        return implode('', $subs);
    }

    /**
     *
     * Prepares the sub-parts of a query with placeholders.
     *
     * @param array $subs The query subparts.
     *
     * @return array The prepared subparts.
     *
     */
    protected function prepareValuePlaceholders(array $subs)
    {
        foreach ($subs as $i => $sub) {
            $char = substr($sub, 0, 1);
            if ($char == '?') {
                $subs[$i] = $this->prepareNumberedPlaceholder($sub);
            }

            if ($char == ':') {
                $subs[$i] = $this->prepareNamedPlaceholder($sub);
            }
        }

        return $subs;
    }

    /**
     *
     * Bind or quote a numbered placeholder in a query subpart.
     *
     * @param string $sub The query subpart.
     *
     * @return string The prepared query subpart.
     *
     * @throws MissingParameter
     */
    protected function prepareNumberedPlaceholder($sub)
    {
        // what numbered placeholder is this in the original statement?
        $this->num ++;

        // is the corresponding data element an array?
        $bind_array = isset($this->values[$this->num])
                   && is_array($this->values[$this->num]);
        if ($bind_array) {
            // PDO won't bind an array; quote and replace directly
            $sub = $this->xpdo->quote($this->values[$this->num]);
        } else {
            // increase the count of numbered placeholders to be bound
            $this->count ++;
            if (array_key_exists($this->num, $this->values) === false) {
                throw new MissingParameter('Parameter ' . $this->num . ' is missing from the bound values');
            }
            $this->final_values[$this->count] = $this->values[$this->num];
        }

        return $sub;
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
        $name = substr($sub, 1);

        // is the corresponding data element an array?
        $bind_array = isset($this->values[$name])
                   && is_array($this->values[$name]);
        if ($bind_array) {
            // PDO won't bind an array; quote and replace directly
            $sub = $this->xpdo->quote($this->values[$name]);
        } else {
            // not an array, retain the placeholder for later
            $this->final_values[$name] = $this->values[$name];
        }

        return $sub;
    }
}