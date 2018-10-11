<?php
/**
 * Created by: stephanhoeksema 2018
 * phpoop
 */

class QueryBuilder
{
    protected $pdo;
    /**
     * @inheritDoc
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table, $intoClass)
    {
        /**
         * @var $statement all data for given table
         * @var $intoClass define class for output
         */
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, $intoClass);
    }

    public function insertInto($table, $conditions, $values)
    {
        for ($i = 0; $i < count($conditions); $i++)
        {
            $statement = $this->pdo->prepare("INSERT INTO `{$table}` ({$conditions[$i]}) VALUES ({$values[$i]})");

            $statement->execute([
                $conditions[$i] => $values[$i]
            ]);
        }
    }
}