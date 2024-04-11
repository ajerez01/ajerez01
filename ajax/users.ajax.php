<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'C:/xampp/htdocs/POS/logs/php_log_error.txt');

try {
    require_once    "../controllers/users.controller.php";
    require_once    "../models/users.model.php";

    class AjaxUsers{
        public $userID;
        public $id;
        public $status;        

        public function ajaxEditUser(){          
            $value = $this->id;
            $Respuesta = usermodel::getuserbyId($value);              
            echo json_encode($Respuesta);
        }

        public function ajaxValUserId(){          
            $value = $this->userID;
            $Respuesta = usermodel::getuserbyUserId($value);              
            echo json_encode($Respuesta);
        }

        public function ajaxActivateUser(){
            $table = 'users';            
            $Respuesta = usermodel::ActivateUser($table, $this->userID ,$this->status);              
            echo json_encode($Respuesta);
        }

    }

    // llamadas a metodos de la clase AjaxUsers

    if(isset($_POST['id'])){
        $editar = new AjaxUsers();
        $editar -> id = $_POST['id'];
        $editar -> ajaxEditUser();   

    }
    else{
      //  var_dump("Id usuario en no valido: " );
    }
    // Activar usuario
    if(isset($_POST['userstatus'])){
        $activate = new AjaxUsers();
        $activate -> userID = $_POST['userid'];
        $activate -> status = $_POST['userstatus'];
        $activate -> ajaxActivateUser();   

    }
    else{
       // var_dump("userid usuario en no valido: " );
    }

    // validar que el usuario no este repetido.
    if(isset($_POST['newUserId'])){
        $_userid = new AjaxUsers();
        $_userid -> userID = $_POST['newUserId'];
        $_userid -> ajaxValUserId();

    }

} catch (Exception $e) {
    echo ' <script> 
        Swal.fire({
        icon: "error",
        title: "Editar usuario",
        text: "'.$e->getMessage().'
        footer: "Sistema POS"
        });
    </script>';      
}


