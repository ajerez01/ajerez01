
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      <!-- User Profile -->

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                    <?php if($_SESSION["picture"] != ''){
                       echo ' <img src="' . $_SESSION["picture"] . '" class="user-image" alt="User Image"> ';
                    } else{
                       echo '<img src="views/img/users/default/anonymous.png" class="user-image" alt="User Image">';
                    }
                    ?>                    
                    
                     <span class="hidden xs"> <?php echo $_SESSION["name"]; ?> </span>
                </a>
                <!-- Dropdown menu for user -->
                <ul class="dropdown-menu">
                    <li class="user-body">
                      <div class="pull-right">
                        <a href="close" class="btn btn-default btn-flat">Salir</a>
                      </div>
                    </li>
                </ul>
              </li>
            </ul>
        </div>
    </ul>

</nav>   

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="main" class="brand-link">
        <img src="views/img/templates/icono-blanco.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SISTEMA INVENTARIO</span>
    </a>
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
        <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
        <!-- Menu superior -->
      <?php
        include_once 'views/modules/main_menu.php';
      ?>
            <!-- /.sidebar-menu -->
    </div>

</aside>
