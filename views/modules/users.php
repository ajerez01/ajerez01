 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- Ejemplo de ruta no amigable sin httaccess-->
              <li class="breadcrumb-item"><a href="index.php?page=inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol> 
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddUsers">
                Agregar usuario
            </button>
        </div>
        <div class="card-body">
            <table id="tables" class="table table-bordered table-striped dt-responsive">
                <thead>
                    <tr>
                        <th style="width:10px">#</th>
                        <th>Nombre</th>
                        <th>Id Usuario</th>
                        <th>Foto</th>
                        <th>Perfil</th>
                        <th>Estado</th>   
                        <th>Ultimo Login</th>  
                        <th>Acciones</th>                       
                    </tr>
                </thead>
                <tbody>

                  <?php
                      $table = 'users';
                      $respuesta =  usercontroller::getallusers();
                      foreach ($respuesta as $key => $value) {
                        echo '<tr>
                              <td>'. $value["id"] .'</td>
                              <td>'. $value["name"] .'</td>
                              <td>'. $value["userid"] .'</td>';

                              if($value["picture"] != ''){
                                echo '<td><img src="'. $value["picture"] .'" class="img-thumbnail" width="40px" alt="foto"></td>';
                              }
                              else{
                                echo '<td><img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="40px" alt="foto"></td>';
                              }

                        echo '<td>'. $value["profile"] .'</td> ';
                        
                              if($value["status"] === 0)
                              {
                                echo '<td><button class="btn btn-warning btn-xs btn-activate" userid="'. $value["userid"] .'" userstatus = "1"> Desactivado</button></td>';
                              }
                              else{
                                echo '<td><button class="btn btn-success btn-xs btn-activate" userid="'. $value["userid"] .'" userstatus = "0"> Activado</button></td>';
                              }
                                  

                        echo '<td>'. $value["last_login"] .'</td>
                              <td>
                                <div class="btn-group">
                                  <buttton class="btn btn-warning btn-user-edit" idusuario="'. $value["id"] .'" data-toggle="modal" data-target="#modalEditUsers"><i class="fa fa-pen"></i></buttton>
                                  <buttton class="btn btn-danger userDelete" userid = "'. $value["userid"] .'"  idusuario="'. $value["id"] .'"  userpicture = "' . $value["picture"]  . '"><i class="fa fa-times"></i></buttton>
                                </div>
                              </td>
                            </tr> ';
                      } // for each

                  ?>

                </tbody>
            </table>                
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Ventana Modal ----->
</div>
  <!-- Modal -->
<div id="modalAddUsers" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
          <form role="form" method="post" enctype="multipart/form-data" action="">
          
            <div class="modal-header" style="background-color:#007bff; color:white">
              <h4 class="modal-title">Mantenimiento Usuarios</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>        
            </div>

            <div class="modal-body">
                    <!-- Nombre de usuario-->
                    <div class="card-body">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" name="UserName" class="form-control" placeholder="Nombre Usuario">
                      </div>     
                      <!-- Id de usuario-->
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="text" name="UserId" id="newUserId" class="form-control" placeholder="Id de usuario">
                      </div> 
                      <!-- Contraseña-->
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="text" name="UserPassword" class="form-control" placeholder="Clave Usuario">
                      </div> 
                      <!-- Perfil -->
                      <div class="input-group mb-3">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-users"></i></span>
                        </div>

                        <select class="form-control select2 select2-hidden-accessible" name ="UserProfile" style="width: 80%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                          <option value = "" selected="selected" data-select2-id="0">Selecionar Perfil</option>
                          <option value = "Administrador">Administrador</option>
                          <option value = "Especial">Especial</option>
                          <option value = "Vendedor">Vendedor</option>
                        </select>

                      </div> 
                      <!-- Foto -->
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-picture-o"></i></span>
                        </div>
                        
                        <div class="custom-file">
                          <input type="file" class="custom-file-input userpicture" id="exampleInputFile" name="picturefile">
                          <label class="custom-file-label" for="exampleInputFile">Seleccione la Foto</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Subir</span>
                        </div> 

                      </div> 

                      <div>
                        <img src="views/img/users/default/anonymous.png" alt="Foto" class="img-thumbnail img-preview" width="100px">
                        <p class="help-block">Menor a 5 MB</p>
                      </div>               

              </div> <!-- Modal Body-->

              <div class="modal-footer-pers">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>        
                <button type="submit" class="btn btn-primary">Guadar</button>
              </div>
            </div>

            <?php
                $adduser = new usercontroller();
                $adduser->ctrAddUser();
            ?>
        </form>
      </div> <!-- Modal content-->
  </div> <!-- Ventana Modal ----->
</div>

<div id="modalEditUsers" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
          <form role="form" method="post" enctype="multipart/form-data" action="">
          
            <div class="modal-header" style="background-color:#007bff; color:white">
              <h4 class="modal-title">Editar Usuarios</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>        
            </div>

            <div class="modal-body">
                    <!-- Nombre de usuario-->
                    <div class="card-body">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" id="edUserName" name="edUserName" class="form-control" value="">
                      </div>     
                      <!-- Id de usuario-->
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="text" id="edUserId" name="edUserId" class="form-control" value="" readonly>
                      </div> 
                      <!-- Contraseña-->
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="text" name="UserPassword" class="form-control" value="">
                        <input type="hidden" id="edUserPassword" name="edUserPassword" id="edUserPassword">
                      </div> 
                      <!-- Perfil -->
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-users"></i></span>
                        </div>

                        <select class="form-control select2 select2-hidden-accessible" id="edUserProfile" name ="edUserProfile" style="width: 80%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                          <option value = ""  selected="selected" data-select2-id="0"></option>
                          <option value = "Administrador">Administrador</option>
                          <option value = "Especial">Especial</option>
                          <option value = "Vendedor">Vendedor</option>
                        </select>
                      </div> 

                      <!-- Foto -->
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-picture-o"></i></span>
                        </div>
                        
                        <div class="custom-file">
                          <input type="file" class="custom-file-input userpicture" id="edpicturefile" name="edpicturefile">
                          <label class="custom-file-label" for="exampleInputFile">Seleccione la Foto</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Subir</span>
                        </div> 

                      </div> 

                      <div>
                        <img src="views/img/users/default/anonymous.png" alt="Foto" class="img-thumbnail img-preview" width="100px">
                        <input type="hidden" id="edImage" name = "edImage">
                        <p class="help-block">Menor a 5 MB</p>
                      </div>               

              </div> <!-- Modal Body-->

              <div class="modal-footer-pers">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>        
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </div>
            </div>
            <?php
                $updateuser = new usercontroller();
                $updateuser->ctrUpdateUser();
            ?>
        </form>
      </div> <!-- Modal content-->
  </div> <!-- Ventana Modal ----->
</div>

<?php
  $userdelete = new usercontroller();
  $userdelete -> ctrDeleteUser();
?>