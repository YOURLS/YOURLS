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
 * The iterator equivalent of `fetchObjects()`.
 *
 * @package Aura.Sql
 *
 */
class ObjectsIterator extends AbstractIterator
{
    /**
     *
     * Constructor.
     *
     * @param PDOStatement $statement PDO statement.
     *
     * @param string $class_name The name of the class to create.
     *
     * @param array $ctor_args Arguments to pass to the object constructor.
     *
     */
    public function __construct(
        PDOStatement $statement,
        $class_name = 'StdClass',
        array $ctor_args = array()
    ) {
        $this->statement = $statement;
        $this->statement->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if ($ctor_args) {
            $this->statement->setFetchMode(
                PDO::FETCH_CLASS,
                $class_name,
                $ctor_args
            );
        }
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
