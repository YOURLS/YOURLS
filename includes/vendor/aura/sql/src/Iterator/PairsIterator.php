<?php
/**
 *
 * This file is part of Aura for PHP.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 *
 */
namespace Aura\Sql\Iterator;

use PDO;
use PDOStatement;

/**
 *
 * The iterator equivalent of `fetchPairs()`.
 *
 * @package Aura.Sql
 *
 */
class PairsIterator extends AbstractIterator
{
    /**
     *
     * Constructor.
     *
     * @param PDOStatement $statement PDO statement.
     *
     */
    public function __construct(PDOStatement $statement)
    {
        $this->statement = $statement;
        $this->statement->setFetchMode(PDO::FETCH_NUM);
    }

    /**
     *
     * Fetches next row from statement.
     *
     */
    public function next()
    {
        $this->key = false;
        $this->row = $this->statement->fetch();
        if ($this->row !== false) {
            $this->key = $this->row[0];
            $this->row = $this->row[1];
        }
    }
}
