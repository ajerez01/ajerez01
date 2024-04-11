
<div id="background"></div>

<div class="login-page">
  <img src="views/img/templates/logo-blanco-bloque.png" class="img-responsive img-login" alt="">
  <div class="login-box">
    <!-- /.login-logo -->
    
    <div class="login-logo">
      
    </div>
    <div class="card card-outline card-primary">
      <div class="card-body">
        <p class="login-box-msg">Ingrese al sistema</p>

        <form action="#" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Usuario" name="_userId" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Contraseña" name="_password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row pull-right">
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Acceder</button>
            </div>
            <!-- /.col -->
          </div>

          <?php 
              $login = new usercontroller();
              $login -> ctrUserSignin();        
          ?>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

</div>   <!-- /.login-page -->

