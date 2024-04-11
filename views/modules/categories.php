 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar Categorías</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- Ejemplo de ruta no amigable sin httaccess-->
              <li class="breadcrumb-item"><a href="index.php?page=inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Categorías</li>
            </ol> 
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card" style="background-color: black; color:white">
        <div class="card-header">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddCategory">
                Agregar Categoría
            </button>
        </div>
        <div class="card-body">
            <table id="tables" class="table table-bordered table-striped dt-responsive">
                <thead>
                    <tr>
                        <th style="width:10px">#</th>
                        <th>Categorias</th>
                        <th>Acciones</th>                       
                    </tr>
                </thead>
                <tbody>                   
                    <?php
                      $respuesta =  Categorycontroller::getallCategories(); 
                      foreach ($respuesta as $key => $value) {
                        echo '
                        <tr>
                          <td>'. $value["id"] .'</td>
                          <td class="text-uppercase">'. $value["name"] .'</td>                                                
                          <td class"actions-btn">
                              <div class="btn_action_group">                            
                                  <button class="btn btn-warning btn_edit_Categoryid" categoryid = "'. $value["id"] .'" data-toggle="modal" data-target="#modalEditCategory"><i class="fa fa-pen"></i></button>
                                  <button class="btn btn-danger" id="btn_delete_Categoryid" categoryid = "'. $value["id"] .'"><i class="fa fa-times"></i></button>
                              </div>  
                          </td>
                        </tr>';
                      }
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
<div id="modalAddCategory" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
          <form role="form" method="post"action="">
          
            <div class="modal-header" style="background-color:#007bff; color:white">
              <h4 class="modal-title">Mantenimiento Categorías</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>        
            </div>

            <div class="modal-body">
                <!-- Nombre de categoría-->
                <div class="card-body">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-list"></i></span>
                    </div>
                    <input type="text" name="CategoryName" class="form-control" placeholder="Nombre Categorías">
                  </div>  
                </div> 

                <div class="modal-footer-pers">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>        
                  <button type="submit" class="btn btn-primary">Guadar</button>
                </div>
            </div>
            <?php
                $addcategory = new CategoryController();
                $addcategory -> ctrAddCategory();
            ?>
        </form>
      </div> <!-- Modal content-->
  </div> <!-- Ventana Modal ----->
</div>

<div id="modalEditCategory" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
          <form role="form" method="post" action="">
          
            <div class="modal-header" style="background-color:#007bff; color:white">
              <h4 class="modal-title">Editar Categorías</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>        
            </div>

            <div class="modal-body">
                <!-- Nombre de Categorías-->
                <div class="card-body">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-list"></i></span>
                    </div>
                    <input type="text" id="edCategoryName" name="edCategoryName" class="form-control" value="">
                    <input type="hidden" name="edCategoryId" id="edCategoryId" value="">
                  </div>    

              </div> <!-- Modal Body-->

              <div class="modal-footer-pers">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>        
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </div>
            </div>
            <?php
                $editCategory = new CategoryController();
                $editCategory -> updateCategory();

            ?>
        </form>
      </div> <!-- Modal content-->
  </div> <!-- Ventana Modal ----->
</div>

<!-- Eliminar categoria ->

<?php
  $deletecategory = new Categorycontroller;
  $deletecategory ->delete_Category();
  
?>