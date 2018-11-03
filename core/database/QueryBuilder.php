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


    public function getDocumentNameById($id) {
        $stmt = $this->pdo->prepare("SELECT document_path FROM documents WHERE child_id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch()['document_path'];
    }

    public function listAllChildren() {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE role = :kind");
        $kind = "kind";
        $stmt->bindParam(":kind", $kind);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
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

    public function addNewDocument($user_id, $description, $date_added, $file, $child_id) {
        $stmt = $this->pdo->prepare("INSERT INTO `documents` (description, date_added, user_id, document_path, child_id) VALUES (:description, :date_added, :user_id, :document_path, :child_id)");
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":date_added", $date_added);
        $stmt->bindParam(":document_path", $file);
        $stmt->bindParam(":child_id", $child_id);
        $stmt->execute();
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
                        $fileName = "public/documents/" . $this->getDocumentNameById($result[0][0]);
                            if(!file_exists($fileName) || $result[0][9] <= 18) {
                                echo " <script type=\"text/javascript\"> setTimeout(function(){ swal(\"Fout\", \"Je hebt momenteel geen toegang tot dit document. Je bent misschien te jong...\", \"error\"); }, 500); </script>";
                            } else {
                                header("Location: {$fileName}");
                            }
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

    public function getChildrenByNurse($id) {

    }
    public function getChildNameById($id) {
        $stmt = $this->pdo->prepare("SELECT fname, lname FROM users WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch()['fname'];
    }

    public function insertNewUser($fname, $lname, $email, $mobile, $password, $role, $active, $age) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO users (fname, lname, email, mobile, password, role, active, age)
                                        VALUES (:fname, :lname, :email, :mobile, :password, :role, :active, TIMESTAMPDIFF(YEAR, :age, NOW()))");
            $stmt->bindParam(":fname", $fname);
            $stmt->bindParam(":lname", $lname);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":mobile", $mobile);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":role", $role);
            $stmt->bindParam(":active", $active);
            $date = str_replace('/', '-', $age);
            $date = date('Y-m-d', strtotime($date));
            $stmt->bindParam(":age", $date);
            $stmt->execute();
        } catch (PDOException $exception) {
            return die($exception->getMessage());
        }

    }

    public function numberOfRows()
    {
        //retrieve amount of rows from users db
        $result = $this->pdo->prepare("SELECT * FROM users");
        return $result = $result->execute();
    }

    public function changeDocument($user_id, $description, $file, $child_id) {
        try {
            $date = date("Y-m-d");
            $stmt = $this->pdo->prepare("UPDATE documents SET description = :description, date_added = :date, user_id = :user_id, document_path = :document_path WHERE child_id = :child_id");
            $stmt->bindParam(":user_id", $user_id);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":date", $date);
            $stmt->bindParam(":document_path", $file);
            $stmt->bindParam(":child_id", $child_id);
            $stmt->execute();
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    public function deleteDocument($id) {
        try {
            $stmt = $this->pdo->prepare("SELECT document_path FROM documents WHERE child_id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $fileName = $stmt->fetch()['document_path'];
            $stmt = $this->pdo->prepare("DELETE FROM documents WHERE document_path = :filename");
            $stmt->bindParam(":filename", $fileName);
            $stmt->execute();
            unlink("public/documents/" . $fileName);
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public function getChangeDocumentForm($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM documents WHERE child_id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();
    }
}