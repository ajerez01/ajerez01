<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'C:/xampp/htdocs/POS/logs/php_log_error.txt');

require_once "dbconnection.php";

class CategoryModel{

    static public function ctrAddCategory($name){
        try {
            $sql = "INSERT INTO categories (name) values (:name)";

            $stmt = dbconnection::connect()->prepare($sql);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->execute();  

            return true;
        } 
        catch (PDOException $e) {  

            echo ' <script> 
                        Swal.fire({
                        icon: "error",
                        title: "Error Creación de Categoría",
                        text: "'.$e->getMessage().'
                        footer: "Sistema POS"
                        });
                    </script>';            

            return false;
        }
    }

    //********** TODOS LOS REGISTROS DE CATEGORIAS */
    public static function getallrecords(){
        try {
            $sql = "SELECT id,name FROM categories";
            $stmt = dbconnection::connect()->prepare($sql);
            $stmt->execute();
    
            return $stmt->fetchall();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }

    public static function getcategorybyId($value){
        try {
            $sql = "SELECT * FROM categories where id = :Id";

            $stmt = dbconnection::connect()->prepare($sql);

            $stmt->bindParam(":Id", $value, PDO::PARAM_STR);
            
            $stmt->execute();
    
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }
    // ELIMINAR UNA CATEGORIA *////
    public static function deleteCategorybyId($value){
        try {
            $sql = "delete from categories where id = :Id";

            $stmt = dbconnection::connect()->prepare($sql);

            $stmt->bindParam(":Id", $value, PDO::PARAM_STR);
            
            $stmt->execute();
    
            return true;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return false;
        }
    }

    // ACTUALIZAR NOMBRE CATEGORIA **/
    public static function updateCategory($id, $name){
        try {
            $sql = "update categories set name = :Name where id = :Id";

            $stmt = dbconnection::connect()->prepare($sql);

            $stmt->bindParam(":Id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":Name", $name, PDO::PARAM_STR);
            
            $stmt->execute();
    
            return true;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return false;
        }
    }
}