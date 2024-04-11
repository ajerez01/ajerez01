<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'C:/xampp/htdocs/POS/logs/php_log_error.txt');

require_once "dbconnection.php";

class usermodel{

    public static function getuserbyId($value){
        try {
            $sql = "SELECT * FROM users where id = :Id";

            $stmt = dbconnection::connect()->prepare($sql);

            $stmt->bindParam(":Id", $value, PDO::PARAM_STR);
            
            $stmt->execute();
    
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }

    public static function getuserbyUserId($value){
        try {
            $sql = "SELECT * FROM users where userid = :userId";

            $stmt = dbconnection::connect()->prepare($sql);

            $stmt->bindParam(":userId", $value, PDO::PARAM_STR);
            
            $stmt->execute();
    
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }

    //********** TODOS LOS REGISTROS USUARIOS */
    public static function getallrecords($table){
        try {
            $sql = "SELECT id,name,userid,profile,picture,status,last_login FROM $table";
            $stmt = dbconnection::connect()->prepare($sql);
            $stmt->execute();
    
            return $stmt->fetchall();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }
    //********** INSERTAR USUARIO */
    static public function adduser($table, $data){
        try {
            $sql = "INSERT INTO $table (name, userid, password, profile, picture) values (:name, :userid, :password, :profile, :picture)";

            $stmt = dbconnection::connect()->prepare($sql);
            $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
            $stmt->bindParam(":userid", $data["userid"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
            $stmt->bindParam(":profile", $data["profile"], PDO::PARAM_STR);
            $stmt->bindParam(":picture", $data["picture"], PDO::PARAM_STR);
            $stmt->execute();  

            return true;
        } 
        catch (PDOException $e) {  

            echo ' <script> 
                        Swal.fire({
                        icon: "error",
                        title: "Error Creación de usuario",
                        text: "'.$e->getMessage().'
                        footer: "Sistema POS"
                        });
                    </script>';            

            return false;
        }
    }

    static public function updateuser($table, $data){
        try {
        $sql = "UPDATE $table SET name= :name, password = :password, profile= :profile, picture= :picture where userid = :idusuario";
        $stmt = dbconnection::connect()->prepare($sql);

        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":idusuario", $data["userid"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
        $stmt->bindParam(":profile", $data["profile"], PDO::PARAM_STR);
        $stmt->bindParam(":picture", $data["picture"], PDO::PARAM_STR);
        $stmt->execute();  

        return true;
        }
        catch (PDOException $e) {  

            echo ' <script> 
                        Swal.fire({
                        icon: "error",
                        title: "Error Creación de usuario",
                        text: "'.$e->getMessage().'
                        footer: "Sistema POS"
                        });
                    </script>';            

            return false;
        }// try
    }

    static public function updateuserfield($field, $value, $userid){
        try {
        $sql = "UPDATE users SET $field = :value where userid = :userid";
        $stmt = dbconnection::connect()->prepare($sql);

        $stmt->bindParam(":value", $value, PDO::PARAM_STR);
        $stmt->bindParam(":userid", $userid, PDO::PARAM_STR);
        $stmt->execute();  

        return true;
        }
        catch (PDOException $e) {  

            echo ' <script> 
                    </script>';            

            return false;
        }// try
    }

    static public function ActivateUser($table, $userid, $status){
        try {
        $sql = "UPDATE $table SET status= :status where userid = :userid";
        $stmt = dbconnection::connect()->prepare($sql);

        $stmt->bindParam(":status", $status, PDO::PARAM_INT);
        $stmt->bindParam(":userid", $userid, PDO::PARAM_STR);
        $stmt->execute();  

        return true;
        }
        catch (PDOException $e) {  

            echo ' <script> 
                        Swal.fire({
                        icon: "error",
                        title: "Error activar usuario",
                        text: "'.$e->getMessage().'
                        footer: "Sistema POS"
                        });
                    </script>';            

            return false;
        }// try
    }

    // Eliminar usuario.

    static public function mdlDeleteUser($id){
        try {
            $sql = "delete FROM users where id = :Id";

            $stmt = dbconnection::connect()->prepare($sql);

            $stmt->bindParam(":Id", $id, PDO::PARAM_INT);
            
            $stmt->execute();
    
            return true;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}