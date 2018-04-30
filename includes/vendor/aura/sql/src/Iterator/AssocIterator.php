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
 * The iterator equivalent of `fetchAssoc()`.
 *
 * @package Aura.Sql
 *
 */
class AssocIterator extends AbstractIterator
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
        $this->statement->setFetchMode(PDO::FETCH_ASSOC);
    }

    /**
     *
     * Fetches next row from statement.
     *
     */
    public function next()
    {
        $this->row = $this->statement->fetch();
        $this->key = false;
        if ($this->row !== false) {
            $this->key = current($this->row);
        }
    }
}
