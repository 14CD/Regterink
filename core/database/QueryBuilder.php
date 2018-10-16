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

    public function selectAll($table)
    {
        /**
         * @var $statement all data for given table
         * @var $intoClass define class for output
         */
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertInto($table, $conditions, $values)
    {
        $conditionsArray = implode(", ", array_map(function ($str) {
            return sprintf("`%s`", $str);
        }, $conditions));

        $valuesArray = implode(", ", array_map(function ($value) {
            return sprintf("'%s'", $value);
        }, $values));

        $statement = $this->pdo->prepare("INSERT INTO {$table} ($conditionsArray) VALUES ($valuesArray)");
        $statement->execute();
    }

    public function LoginAs($values)
    {   try{

            $valuesArray = implode(", ", array_map(function ($value) {
                return sprintf("'%s'", $value);
            }, $values));

            print_r($valuesArray);
            //$statement = $this->pdo->prepare("SELECT email, password, role, active FROM users  WHERE email = ".$valuesArray['email']." ");
            //$statement->execute();
            //$result = $statement->fetchAll(PDO::FETCH_NUM);
            //return $result;
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }

    }

    public function removeFromUsersTable($table, $id)
    {
        $sql = "DELETE FROM {$table} WHERE id={$id}";
        $this->pdo->exec($sql);
    }

    public function numberOfRows()
    {
        //retrieve amount of rows from users db
        $result = $this->pdo->prepare("SELECT * FROM users");
        return $result = $result->execute();
    }
}