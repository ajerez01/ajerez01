<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'C:/xampp/htdocs/POS/logs/php_log_error.txt');

try {
    require_once    "../controllers/categories.controller.php";
    require_once    "../models/categories.model.php";

    class ajaxcategories{
        public $categoryid;

        public function ajaxEditCategory(){
            $response = CategoryModel::getcategorybyId($this->categoryid);
            echo json_encode($response);
        }
    }

} catch (Exception $e) {
    echo ' <script> 
        Swal.fire({
        icon: "error",
        title: "Editar Categoría",
        text: "'.$e->getMessage().'
        footer: "Sistema POS"
        });
    </script>';      
}

if(isset($_POST['categoryid'])){
    $editcategory = new ajaxcategories();
    $editcategory -> categoryid = $_POST['categoryid'];
    $editcategory -> ajaxEditCategory();
}