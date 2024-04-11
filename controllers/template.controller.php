<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'C:/xampp/htdocs/POS/logs/php_log_error.txt');

class TemplateController{

    public function ctrtemplate(){
        include 'views/template.php';
    }

}

