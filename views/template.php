<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Facturacion Electronico</title>

  <link rel="shortcut icon" href="views/img/templates/icono-negro.png" type="image/x-icon">
  <?php
    session_start();
  ?>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="views/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="views/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/adminlte.css">
  <!-- Personalizada -->
  <link rel="stylesheet" href="views/css/app.css">

<!-- ---- PLUGINS JAVASCRIPTS ---- -->
  <!-- jQuery -->
  <script src="views/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="views/plugins/datatables/jquery.dataTables.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="views/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="views/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="views/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="views/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="views/plugins/jszip/jszip.min.js"></script>
  <script src="views/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="views/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="views/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="views/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="views/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Sweetalert 2 -->
  <script src="views/plugins/sweetalert2/sweetalert2.all.min.js"></script>

  <!-- AdminLTE App -->
  <script src="views/dist/js/adminlte.min.js"></script>

  
</head>
<body class="hold-transition sidebar-mini">

    <?php
      ini_set('display_errors', 1);
      ini_set('log_errors', 1);
      ini_set('error_log', 'C:/xampp/htdocs/POS/logs/php_log_error.txt');


    if(isset($_SESSION['login']) && $_SESSION['login'] == 'true'){
        # Site wrapper -->
        echo '<div class="wrapper">';
      # Menu superior -->

        include_once 'views/modules/main_header.php';
      #  include_once 'views/modules/main_menu.php'; // esta incluido en el main_header.php
        if (isset($_GET["ruta"])){
          $ruta = $_GET["ruta"];

          if ($ruta == "main" || 
              $ruta == "users" || 
              $ruta == "categories" ||
              $ruta == "products" ||
              $ruta == "customers" ||
              $ruta == "sales_admin" ||
              $ruta == "sales_new" ||
              $ruta == "close" ||
              $ruta == "sales_reports" ){
            include_once 'views/modules/' . $ruta . '.php';
          }
          else
          {
            include_once 'views/modules/404.php';
          }

        }
        else
        {
          include_once 'views/modules/main.php';
        }

        include_once 'views/modules/main_footer.php';
        echo '</div>';
    }
    else{
        include_once 'views/modules/login.php';
    }
    ?>


<!-- ./wrapper -->
    <!-- Javas scripts personalizados -->
  <script src="views/js/app.js"></script>
  <script src="views/js/template.js"></script>
  <script src="views/js/users.js"></script>
  <script src="views/js/categories.js"></script>

</body>
</html>
