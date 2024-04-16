 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar Productos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- Ejemplo de ruta no amigable sin httaccess-->
              <li class="breadcrumb-item"><a href="index.php?page=inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Productos</li>
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
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddProducts">
                Agregar Producto
            </button>
        </div>
        <div class="card-body">
            <table id="tables" class="table table-bordered table-striped dt-responsive">
                <thead>
                    <tr>
                        <th style="width:10px">#</th>
                        <th>Imagen</th>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Categoría</th>
                        <th>Stock</th>
                        <th>Costo Unit.</th>
                        <th>Precio</th>
                        <th>Agregado</th>
                        <th>Acciones</th>                       
                    </tr>
                </thead>
                <tbody>                        
                    <tr>
                        <td>1</td>
                        <td><img src="views/img/productos/aspirador-industrial.png" alt="" class="img-thumbnail" width="60px"></td>
                        <td>1001</td>
                        <td>Descripción para este producto</td>
                        <td>Categoría de producto</td>
                        <td>80</td>
                        <td>1,000.00</td>
                        <td>1,500.00</td>
                        <td>2024-01-01 00:00:00</td>
                        <td>
                            <div class="btn-group">                            
                                <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditProducts"><i class="fa fa-pen"></i></button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteProducts"><i class="fa fa-times"></i></button>
                            </div>  
                        </td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td><img src="views/img/productos/aspirador-industrial.png" alt="" class="img-thumbnail" width="60px"></td>
                        <td>1001</td>
                        <td>Descripción para este producto</td>
                        <td>Categoría de producto</td>
                        <td>80</td>
                        <td>1,000.00</td>
                        <td>1,500.00</td>
                        <td>2024-01-01 00:00:00</td>
                        <td>
                            <div class="btn-group">                            
                            <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditProducts"><i class="fa fa-pen"></i></button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteProducts"><i class="fa fa-times"></i></button>
                            </div>  
                        </td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td><img src="views/img/productos/aspirador-industrial.png" alt="" class="img-thumbnail" width="60px"></td>
                        <td>1001</td>
                        <td>Descripción para este producto</td>
                        <td>Categoría de producto</td>
                        <td>80</td>
                        <td>1,000.00</td>
                        <td>1,500.00</td>
                        <td>2024-01-01 00:00:00</td>
                        <td>
                            <div class="btn-group">                            
                            <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditProducts"><i class="fa fa-pen"></i></button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteProducts"><i class="fa fa-times"></i></button>
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
<div id="modalAddProducts" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
          <form role="form" method="post" enctype="multipart/form-data" action="">
          
            <div class="modal-header" style="background-color:#007bff; color:white">
              <h4 class="modal-title">Mantenimiento Productos</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>        
            </div>

            <div class="modal-body">
                    <!--Codigo de producto-->
                    <div class="card-body">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                          </div>
                          <input type="text" name="InsProductCode" class="form-control" placeholder="Código de Producto">
                        </div>   
                      <!--Nombre del producto-->
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-box"></i></span>
                          </div>
                          <input type="text" name="InsProductName" class="form-control" placeholder="Nombre de Producto">
                        </div>
                      <!--Categoría del producto-->
                      <div class="input-group mb-3">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-bars"></i></span>
                        </div>

                        <select class="form-control select2 select2-hidden-accessible" name ="InsProductCategory" style="width: 80%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                          <option value = "" selected="selected" data-select2-id="0">Selecionar Categoría</option>
                          <option value = "Administrador">Categoría 1</option>
                          <option value = "Especial">Categoría 1</option>
                          <option value = "Vendedor">Categoría 1</option>
                        </select>

                      </div> 

                      <!--Existencia del producto-->
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-socks"></i></span>
                          </div>
                          <input type="number" name="InsProductStock" class="form-control" placeholder="Existencia de Producto">
                      </div>

                      <!--Costo del producto-->
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-folder-plus"></i></span>
                          </div>
                          <input type="number" min=0 name="InsProductCost" class="form-control" placeholder="Costo de Producto">
                      </div>

                      <!--Precio del producto-->
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-folder-minus"></i></span>
                          </div>
                          <input type="number" min=0 name="InsProductPrice" class="form-control" placeholder="Precio de Producto">
                      </div>

                      <!-- Foto -->
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-picture-o"></i></span>
                        </div>
                        
                        <div class="custom-file">
                          <input type="file" class="custom-file-input userpicture" id="ProductImage" name="picturefile">
                          <label class="custom-file-label" for="ProductImage">Seleccione la Foto del producto</label>
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
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </div>
        </form>
      </div> <!-- Modal content-->
  </div> <!-- Ventana Modal ----->
</div>

<div id="modalEditProducts" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
          <form role="form" method="post" enctype="multipart/form-data" action="">
          
            <div class="modal-header" style="background-color:#007bff; color:white">
              <h4 class="modal-title">Editar producto</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>        
            </div>

            <div class="modal-body">
                    <!--Codigo de producto-->
                    <div class="card-body">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                          </div>
                          <input type="text" name="InsProductCode" class="form-control" placeholder="Código de Producto">
                        </div>   
                      <!--Nombre del producto-->
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-box"></i></span>
                          </div>
                          <input type="text" name="InsProductName" class="form-control" placeholder="Nombre de Producto">
                        </div>
                      <!--Categoría del producto-->
                      <div class="input-group mb-3">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-bars"></i></span>
                        </div>

                        <select class="form-control select2 select2-hidden-accessible" name ="InsProductCategory" style="width: 80%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                          <option value = "" selected="selected" data-select2-id="0">Selecionar Categoría</option>
                          <option value = "Administrador">Categoría 1</option>
                          <option value = "Especial">Categoría 1</option>
                          <option value = "Vendedor">Categoría 1</option>
                        </select>

                      </div> 

                      <!--Existencia del producto-->
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-socks"></i></span>
                          </div>
                          <input type="number" name="InsProductStock" class="form-control" placeholder="Existencia de Producto">
                      </div>

                      <!--Costo del producto-->
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-folder-plus"></i></span>
                          </div>
                          <input type="number" min=0 name="InsProductCost" class="form-control" placeholder="Costo de Producto">
                      </div>

                      <!--Precio del producto-->
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-folder-minus"></i></span>
                          </div>
                          <input type="number" min=0 name="InsProductPrice" class="form-control" placeholder="Precio de Producto">
                      </div>

                      <!-- Foto -->
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-picture-o"></i></span>
                        </div>
                        
                        <div class="custom-file">
                          <input type="file" class="custom-file-input userpicture" id="ProductImage" name="picturefile">
                          <label class="custom-file-label" for="ProductImage">Seleccione la Foto del producto</label>
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
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </div>
        </form>
      </div> <!-- Modal content-->
  </div> <!-- Ventana Modal ----->
</div>

