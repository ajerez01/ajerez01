<?php

class usercontroller{

    public static function ctrUserSignin(){      

      $regex = "[ a-zA-Zá-úÑñ]+$";

          if(isset($_POST["_userId"])) {

            if(preg_match("/^$regex/", $_POST["_userId"]) &&
               preg_match("/^$regex/", $_POST["_password"])) {

               }
           
               $userId = $_POST["_userId"];
               
               $respuesta = usermodel::getuserbyUserId($userId);
              // var_dump($respuesta);

               if($respuesta['userid'] === $_POST["_userId"] && $respuesta['password'] === crypt($_POST["_password"] , '$2y$06$PiMyLifeUpExampleSalt1')){
                  // Verificar si el usuario esta activo
                  
                  if(!$respuesta['status'] == 1)
                  {
                    echo ' <div class="alert alert-danger"> "Este usuario no esta activo. Por favor contactar el administrador"</div> ';                   

                    return false;
                  }                  
              //****Verificar si el usuario esta activo** */

                $_SESSION["login"] = true;
                $_SESSION["name"] = $respuesta['name'];
                $_SESSION["id"] = $respuesta['id'];
                $_SESSION["userid"] = $respuesta['userid'];
                $_SESSION["password"] = $respuesta['password'];
                $_SESSION["profile"] = $respuesta['profile'];
                $_SESSION["picture"] = $respuesta['picture'];

                date_default_timezone_set('America/Santo_Domingo');
                $curdate = date('Y-m-d'); // fecha actual
                $curtime = date('H:i:s'); // fecha actual
                $fulldate = $curdate . " " . $curtime;

                $response = usermodel::updateuserfield('last_login', $fulldate, $respuesta['userid']);

                echo '<script>
                        window.location.assign("index.php?page=main");
                      </script>'; 
               // var_dump($_SESSION["_session"]);  
               
               //var_dump($respuesta);          
               }
               else{
                $_SESSION["_session"] = false;
                  echo '<br> <div class="alert alert-danger"> Usuario o contraseña incorrecto</div>';
               }
              
               
              // var_dump($respuesta);
          } 

    }

    //***Registro de usuario */

  public function ctrAddUser(){
      if(isset($_POST["UserName"])){
        $regexec = "[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+";  // preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', variable)
        $regexaf = "[a-zA-Z]+$";

        if(preg_match("/^$regexec$/", $_POST["UserName"])){        
            $path = "";
            $imagename = "";
            if(isset($_FILES['picturefile']['tmp_name']) && $_FILES['picturefile']['tmp_name'] != ""){
              // var_dump($_FILES['picturefile']['tmp_name']);
              $file_tmp = $_FILES['picturefile']['tmp_name'];
  
              list($imgwidth, $imgheight) = getimagesize($file_tmp);
  
              $newimgwidth = 500;
              $newimgheight = 500;
  
              
              $path = "views/img/users/" . $_POST["UserId"];
  
              mkdir($path, 0755);
  
              if($_FILES['picturefile']['type'] === 'image/jpeg'){
                $randonname = mt_rand(1000,9999);
                $imagename = $path .'/'. $randonname .'.jpg';
                
                $from = imagecreatefromjpeg($file_tmp);
                $to = imagecreatetruecolor($newimgwidth , $newimgheight );
  
                imagecopyresized($to, $from, 0,0,0,0, $newimgwidth,$newimgheight, $imgwidth, $imgheight);
  
                imagejpeg($to, $imagename);
  
              }
  
              if($_FILES['picturefile']['type'] === 'image/png'){
                $randonname = mt_rand(1000,9999);
                $imagename = $path .'/'. $randonname .'.png';
                
                $from = imagecreatefrompng($file_tmp);
                $to = imagecreatetruecolor($newimgwidth , $newimgheight );
  
                imagecopyresized($to, $from, 0,0,0,0, $newimgwidth,$newimgheight, $imgwidth, $imgheight);
  
                imagepng($to, $imagename);
  
              } 
            } 

            $table = "users";
  
            $password = crypt($_POST["UserPassword"] , '$2y$06$PiMyLifeUpExampleSalt1');

            $datos = array("name" => $_POST["UserName"],
                            "userid" => $_POST["UserId"],
                            "password" => $password,
                            "profile" => $_POST["UserProfile"],
                            "picture" => $imagename);

            // var_dump($datos);
            $response = usermodel::adduser($table, $datos);

            if($response){
              echo ' <script> 
                        Swal.fire({
                          icon: "success",
                          title: "Creación de usuario",
                          text: "Usuario '.$_POST["UserName"].' Creado correctamente",
                          footer: "Sistema POS"
                        }).then(function(result){
                            if(result.value){
                              window.location = "users";
                            }
                          }
                        
                        );
                    </script>';
          }

        }
        else{          
          echo ' <script> Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Something went wrong!",
              footer: "Pie de pagina"
            });
            </script>';
        } 
      }
        
    
  }
  

  public static function getallusers(){

    $Respuesta = usermodel::getallrecords('users');
    return $Respuesta;

  }

    /////// ACTUALIZAR USUARIO ///////////

    public function ctrUpdateUser(){
    // var_dump($_POST);

      if(isset($_POST["edUserName"])){
        $regexec = "[ a-zA-Zá-úÑñ]+$";
        $regexaf = "[a-zA-Z]+$";

        if(preg_match("/^$regexec$/", $_POST["edUserName"])){        
            $path = "";
            $imagename = "";
            if(isset($_FILES['edpicturefile']['tmp_name']) && $_FILES['edpicturefile']['tmp_name'] != ""){
              // var_dump($_FILES['edpicturefile']['tmp_name']);
              $file_tmp = $_FILES['edpicturefile']['tmp_name'];
  
              list($imgwidth, $imgheight) = getimagesize($file_tmp);
  
              $newimgwidth = 500;
              $newimgheight = 500;
  
              
              $path = "views/img/users/" . $_POST["edUserId"];

              // Para eliminar y crear el archivo de imagen si hay un nueva
                unlink($_POST["edImage"]);
                mkdir($path, 0755);
  
              if($_FILES['edpicturefile']['type'] === 'image/jpeg'){
                $randonname = mt_rand(1000,9999);
                $imagename = $path .'/'. $randonname .'.jpg';
                
                $from = imagecreatefromjpeg($file_tmp);
                $to = imagecreatetruecolor($newimgwidth , $newimgheight );
  
                imagecopyresized($to, $from, 0,0,0,0, $newimgwidth,$newimgheight, $imgwidth, $imgheight);
  
                imagejpeg($to, $imagename);
  
              }
  
              if($_FILES['edpicturefile']['type'] === 'image/png'){
                $randonname = mt_rand(1000,9999);
                $imagename = $path .'/'. $randonname .'.png';
                
                $from = imagecreatefrompng($file_tmp);
                $to = imagecreatetruecolor($newimgwidth , $newimgheight );
  
                imagecopyresized($to, $from, 0,0,0,0, $newimgwidth,$newimgheight, $imgwidth, $imgheight);
  
                imagepng($to, $imagename);
  
              } 
            }  //$_FILES['edpicturefile']['tmp_name']

            if(empty($imagename)){
              $imagename = $_POST["edImage"];
            }
            $table = "users";
            
            if(!empty($_POST["UserPassword"])){
              $password = crypt($_POST["UserPassword"] , '$2y$06$PiMyLifeUpExampleSalt1');
            }
            else{
              $password = $_POST["edUserPassword"];
            }
            

            $datos = array("name" => $_POST["edUserName"],
                            "userid" => $_POST["edUserId"],
                            "password" => $password,
                            "profile" => $_POST["edUserProfile"],
                            "picture" => $imagename);

            // var_dump($datos);
            $response = usermodel::updateuser($table, $datos);

            if($response){
              echo ' <script> 
                        Swal.fire({
                          icon: "success",
                          title: "Actualización de usuario",
                          text: "El usuario '.$_POST["edUserName"].' actualizado correctamente",
                          footer: "Sistema POS"
                        }).then((result) => {
                          if (result.isConfirmed || result.isDismissed) {
                            window.location.href = "users"; // Redirige a la página de usuarios
                          }
                        });

                    </script>';
          }

        }
        else{          
          echo ' <script> Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Something went wrong!",
              footer: "Pie de pagina"
            });
            </script>';
        } 
      }    // isset($_POST["UserName"])
    
  }  // ctrAddUser

  public static function ctrDeleteUser(){

    if(isset($_GET["id"])){
      $id = $_GET["id"];

      // PARA VALIDAR QUE EL USUARIO NO PUEDE ELIMINARSE A SI MISMO.
      if($_GET["id"] != $_SESSION["id"]){
          // Elimina la foto y carpeta del usuario
          if (isset($_GET['userid'])){
            if ($_GET['userpicture'] != ''){
              unlink($_GET['userpicture']);
              rmdir("views/img/users/" . $_GET['userid']);
            }
          }

          $response = usermodel::mdlDeleteUser($_GET["id"]);

          if($response){
            echo '<script> 
                    Swal.fire({
                      icon: "success",
                      showConfirmButton: true, // Cambiado de showConfirmButtom a showConfirmButton
                      title: "Eliminación de usuario",
                      text: "Usuario ha sido eliminado correctamente!",
                      footer: "Sistema POS"
                    }).then(function(result){
                      if (result.value) {      
                        window.location = "users";      
                      }
                    })
                </script>';
      
          }

      }
      else{
        echo ' <script> 
                Swal.fire({
                  icon: "error",
                  title: "Error elininación de usuario",
                  text: "Usuario no pude eliminarse a si mismo",
                  footer: "Sistema POS"
                })
            </script>';
      }

    }

  }

}


