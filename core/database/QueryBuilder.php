<?php
/**
 * Created by: stephanhoeksema 2018
 * phpoop
 */

class QueryBuilder
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;

        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectUsers($table)
    {
        $statement = $this->pdo->prepare("SELECT `id`, `fname`, `lname`, `role` FROM {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectNutures($table)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE role = 'Verzorgende'");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectWhere($table, $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = {$id}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectSpecificRules($table, $where)
    {
        $statement = $this->pdo->prepare("SELECT * FROM `{$table}` WHERE `role` = '{$where}'");
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

    public function addChildDetails($id, $table, $conditions, $values) {
        if(empty($this->selectWhere("profiles_kids", $id)) || $this->selectWhere("profiles_kids", $id) == NULL)
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
        else {
            $stmnt = $this->pdo->prepare("UPDATE $table SET reason = '$values[3]', comment = '$values[5]' WHERE `id` = $id;");
            $stmnt->execute();
        }
    }

    public function changeUser($table, $conditions, $values, $id) {
        $statement = $this->pdo->prepare("
          UPDATE `{$table}` SET
            `$conditions[0]` = '$values[0]',
            `$conditions[1]` = '$values[1]',
            `$conditions[2]` = '$values[2]',
            `$conditions[3]` = $values[3],
            `$conditions[4]` = $values[4]
            WHERE `id` = $id
        ");
        $statement->execute();
    }

    public function passwordChange($table, $password, $email)
    {
        $statement = $this->pdo->prepare("UPDATE `{$table}` SET `password` = '{$password}' WHERE `email` = '{$email}'");
        $statement->execute();
    }

    public function LoginAs($values)
    {
        try {
            //SQL query being executed
            $statement = $this->pdo->prepare("SELECT * FROM users WHERE email = '$values[0]' ");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_NUM);
            if ($result) {
                //Hashed password from database
                $hash = $result[0][5];
            }
            //Check if user exists
            if (isset($result[0])) {
                $_SESSION['id'] = $result[0][0];
                if (password_verify(trim($_POST['password']), $hash)) {
                    // Correcte inlog
                    //$result[0][6] = Check 'Role' field from users table
                    if ($result[0][6] == "Administrator") {
                        $_SESSION['AdminLogin'] = $result;
                        //print_r($_SESSION);
                        header('Location: /dashboard');
                    } elseif ($result[0][6] == "Verzorgende") {
                        $_SESSION['VerzorgendeLogin'] = $result;
                        header('Location: /dashboard');
                    } elseif ($result[0][6] == "Ouder") {
                        $_SESSION['OuderLogin'] = $result;
                        header('Location: /dashboard');
                    } elseif ($result[0][6] == "Kind") {
                        $_SESSION['KindLogin'] = $result;
                        header('Location: /dashboard');
                    }
                } else {
                    // Vekeerd wachtwoord of gebruikersnaam
                    echo " <script type=\"text/javascript\"> setTimeout(function(){ swal(\"Fout\", \"Gegevens niet gevonden, Probeer nogmaals.\", \"error\"); }, 500); </script>";
                }
            } else {
                echo " <script type=\"text/javascript\"> setTimeout(function(){ swal(\"Fout\", \"Gegevens niet gevonden, Probeer nogmaals.\", \"error\"); }, 500); </script>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $result;
    }

    public function Get_current_Account_info($values)
    {
        try {
            //SQL query being executed
            $statement = $this->pdo->prepare("SELECT * FROM users  WHERE id = $values ");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $json = json_encode($result);

            echo "<script>
        var json= $json;
        var id = json[0].id;
        var fname = json[0].fname;
        var lname = json[0].lname;
        var email = json[0].email;
        var mobile = json[0].mobile;
        var password = json[0].password;
        var role = json[0].role;
        var active = json[0].active;
        
        jQuery(document).ready(function($) {
        
        $('#fname').attr('value', fname);
        $('#lname').attr('value', lname);
        $('#email').attr('value', email);
        $('#mobiel').attr('value', mobile);
        $('#curr_select').attr('value', role);
        $('#curr_select').text(role);
        $('#id').attr('value', id);
        $('#active').attr('value', active);
        
        });
    </script>";

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    public function Account_info_change($values)
    {
        try {
            //SQL query being executed
            $statement = $this->pdo->prepare("UPDATE users SET fname = '$values[0]', lname = '$values[1]', email = '$values[2]', mobile= '$values[3]', role = '$values[4]', active = '$values[6]', file = '$values[7]'  WHERE id = '$values[5]'");
            $statement->execute();

            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
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