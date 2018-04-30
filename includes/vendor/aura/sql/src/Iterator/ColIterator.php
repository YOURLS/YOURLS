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
 * The iterator equivalent of `fetchCol()`.
 *
 * @package Aura.Sql
 *
 */
class ColIterator extends AbstractIterator
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
        $this->row = $this->statement->fetch();
        if ($this->row !== false) {
            $this->row = $this->row[0];
        }
        $this->key ++;
    }
}
