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
 * The iterator equivalent of `fetchAll()`.
 *
 * @package Aura.Sql
 *
 */
class AllIterator extends AbstractIterator
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
        $this->key ++;
    }
}
