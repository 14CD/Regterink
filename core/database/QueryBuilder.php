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
            //SQL query being executed
            $statement = $this->pdo->prepare("SELECT email, password, role, active FROM users  WHERE email = '$values[0]' ");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_NUM);

            //Hashed password from database
            $hash = $result[0][1];
            //Check if user exists
            if (isset($result[0])) {

                if (password_verify(trim($_POST['password']), $hash)) {
                    // Correcte inlog

                    //$result[0][2] = Check 'Role' field from users table
                    if($result[0][2] == "Administrator") {
                        $_SESSION['AdminLogin'] = $result;
                        header('Location: /dashboard');
                    }
                    elseif($result[0][2] == "Verzorgende"){
                        $_SESSION['VerzorgendeLogin'] = $result;
                        header('Location: /dashboard');
                    }
                    elseif($result[0][2] == "Ouder"){
                        $_SESSION['OuderLogin'] = $result;
                        header('Location: /dashboard');
                    }
                    elseif($result[0][2] == "Kind"){
                        $_SESSION['KindLogin'] = $result;
                        header('Location: /dashboard');
                    }


                } else {
                    // Vekeerd wachtwoord of gebruikersnaam
                    echo " <script type=\"text/javascript\"> setTimeout(function(){ swal(\"Fout\", \"Gegevens niet gevonden, Probeer nogmaals.\", \"error\"); }, 500); </script>";
                }

            }
            }
            catch(PDOException $e)
            {
                echo "Error: " . $e->getMessage();
            }

        return $result;
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