<?php

class Categorycontroller{
    //***Registro de catogoria */
    public function ctrAddCategory(){
        if(isset($_POST["CategoryName"])){
            $regexec = "[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+";  // preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', variable)

            if(preg_match("/^$regexec$/", $_POST["CategoryName"])){ 
                
                $Category = $_POST["CategoryName"];

                $response = CategoryModel::ctrAddCategory($Category);

                if($response){
                echo ' <script> 
                            Swal.fire({
                            icon: "success",
                            title: "Creación de Categoría",
                            text: "Categoría '.$Category.' Creada correctamente",
                            footer: "Sistema POS"
                            }).then(function(result){
                                if(result.value){
                                window.location = "categories";
                                }
                            }
                            
                            );
                        </script>';
                }
            }
            else{          
                echo ' <script> Swal.fire({
                    icon: "error",
                    title: "Error nombre de categoría",
                    text: "Nombre de categoría no permitido!",
                    footer: "POS"
                });
                </script>';
            } 
        }    
    } // ctrAddCategory  
    
    public static function getallCategories(){

        $response = categorymodel::getallrecords();
        return $response;
    
    }

    /* ELIMINAR UNA CATEGORIA */
    public static function delete_Category(){
        if (isset($_GET['categoryId'])){
            $response = categorymodel::deleteCategorybyId($_GET['categoryId']);
            var_dump($response) ;
            if($response){
                echo ' <script> 
                            Swal.fire({
                                icon: "success",
                                title: "Eliminación Categoría",
                                text: "Categoría eliminada correctamente",
                                footer: "Sistema POS"
                                }).then(function(result){
                                    if(result.value){
                                    window.location = "categories";
                                    }
                                }                            
                            );
                        </script>';
            }
        }    
    }

        /* ACTUALIZAR UNA CATEGORIA */
        public static function updateCategory(){
            if (isset($_POST['edCategoryName'])){
                //var_dump($_POST['edCategoryName']);
                $response = categorymodel::updateCategory($_POST['edCategoryId'],$_POST['edCategoryName']);
               // var_dump($response) ;
                if($response){
                    echo ' <script> 
                                Swal.fire({
                                icon: "success",
                                title: "Actualización de Categoría.",
                                text: "Categoría actualizada correctamente",
                                footer: "Sistema POS"
                                }).then(function(result){
                                    if(result.value){
                                    window.location = "categories";
                                    }
                                }
                                
                                );
                            </script>';
                }
            }    
        }

        public static function getcategorybyid(){
            return 0;
        }

} // class