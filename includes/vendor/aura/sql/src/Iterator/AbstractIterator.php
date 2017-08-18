<?php
/**
 *
 * This file is part of Aura for PHP.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 *
 */
namespace Aura\Sql\Iterator;

use Iterator;
use PDOStatement;

/**
 *
 * A base class for iterators.
 *
 * @package Aura.Sql
 *
 */
abstract class AbstractIterator implements Iterator
{
    /**
     *
     * PDO statement.
     *
     * @var PDOStatement
     *
     */
    protected $statement;

    /**
     *
     * Current row value.
     *
     * @var mixed
     *
     */
    protected $row;

    /**
     *
     * Current key.
     *
     * @var mixed
     *
     */
    protected $key = -1;

    /**
     *
     * Frees memory when object is destroyed.
     *
     */
    public function __destruct()
    {
        $this->statement->closeCursor();
        unset($this->statement);
    }

    /**
     *
     * Moves row set pointer to first element.
     *
     */
    public function rewind()
    {
        $this->key = -1;
        $this->next();
    }

    /**
     *
     * Returns value at current position.
     *
     * @return mixed
     *
     */
    public function current()
    {
        return $this->row;
    }

    /**
     *
     * Returns key at current position.
     *
     * @return mixed
     *
     */
    public function key()
    {
        return $this->key;
    }

    /**
     *
     * Fetches next row from statement.
     *
     */
    abstract public function next();

    /**
     *
     * Detects if iterator state is valid.
     *
     * @return bool
     *
     */
    public function valid()
    {
        return $this->row !== false;
    }
}
