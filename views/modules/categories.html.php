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
      <div class="card">
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
                    <tr>
                        <td>1</td>
                        <td>EQUIPOS ELECTROMECÁNICOS</td>
                        <td>
                            <div class="btn-group">                            
                                <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditCategory"><i class="fa fa-pen"></i></button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalAddCategory"><i class="fa fa-times"></i></button>
                            </div>  
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>EQUIPOS ELECTROMECÁNICOS</td>
                        <td>
                            <div class="btn-group">                            
                                <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditCategory"><i class="fa fa-pen"></i></button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalAddCategory"><i class="fa fa-times"></i></button>
                            </div>  
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>TALADROS</td>
                        <td>
                          <div class="btn-group">                            
                                <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditCategory"><i class="fa fa-pen"></i></button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalAddCategory"><i class="fa fa-times"></i></button>
                          </div> 
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>ANDAMIOS</td>
                        <td>
                          <div class="btn-group">                            
                                <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditCategory"><i class="fa fa-pen"></i></button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalAddCategory"><i class="fa fa-times"></i></button>
                          </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>GENERADORES DE ENERGÍA</td>
                        <td>
                          <div class="btn-group">                            
                                <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditCategory"><i class="fa fa-pen"></i></button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalAddCategory"><i class="fa fa-times"></i></button>
                          </div>  
                        </td>
                    </tr>
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
                    <input type="text" id="edUserName" name="edUserName" class="form-control" value="">
                  </div>    

              </div> <!-- Modal Body-->

              <div class="modal-footer-pers">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>        
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </div>
            </div>
        </form>
      </div> <!-- Modal content-->
  </div> <!-- Ventana Modal ----->
</div>

