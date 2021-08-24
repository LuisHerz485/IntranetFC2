<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Intranet FC</title>

  <meta property="og:title" content="Intranet FC Contadores" />
  <meta property="og:url" content="https://intranet.fccontadores.com/" />
  <meta property="og:description" content="Sistema de Control de FC Contadores & Asociados S.A.C.">
  <meta property="og:image" itemprop="image" content="vistas/dist/img/url.jpg"/>
  <meta property="og:type" content="article" />
  <meta property="og:locale" content="en_GB" />

  <!-- Icono del sistema -->
  <link rel="shortcut icon" href="vistas/dist/img/favicon.ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="vistas/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="vistas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="vistas/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="vistas/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="vistas/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="vistas/plugins/toastr/toastr.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="vistas/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="vistas/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/dist/css/tabla.css">



  <!-- jQuery -->
  <script src="vistas/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="vistas/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
  $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="vistas/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="vistas/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="vistas/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="vistas/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="vistas/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="vistas/plugins/moment/moment.min.js"></script>
  <script src="vistas/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="vistas/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="vistas/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="vistas/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="vistas/dist/js/demo.js"></script>
  <!-- DataTable -->
  <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- Toastr -->
  <script src="vistas/plugins/toastr/toastr.min.js"></script>
  <!-- Swal alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <!-- DataTable Buttons -->
  <script type="text/javascript" src="vistas/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="vistas/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="vistas/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <!-- JSZIP -->
  <script src="vistas/plugins/jszip/jszip.min.js"></script>
  <!-- PDFMAKE -->
  <script src="vistas/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="vistas/plugins/pdfmake/vfs_fonts.js"></script>
  <!-- Select2 -->
  <script src="vistas/plugins/select2/js/select2.full.min.js"></script>

</head>
<?php
if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == "ok") {
  echo '<body class="hold-transition sidebar-mini layout-fixed">';
  echo '<div class="wrapper">';
  include "vistas/modulos/templates/encabezado.php";

  if (isset($_SESSION['cliente']) && $_SESSION['cliente'] == "no") {
    switch ($_SESSION['idtipousuario']) {
      case 1: {
          $administradorRutas = ["escritorio", "usuarios", "tipousuario", "departamento", "asistencia", "clientes", "reportes", "generarCobranza", "mostrarcobranza", "salir"];
          include "vistas/modulos/templates/menu.php";
          if (isset($_GET['ruta']) && in_array($_GET['ruta'], $administradorRutas)) {
            include "vistas/modulos/paginas/administrador/" . $_GET['ruta'] . ".php";
          } else {
            include "vistas/modulos/paginas/404.php";
          }
          break;
        }
      case 2: {
          $colaboradorRutas = ["escritoriocolaborador", "asistencia", " salir"];
          include "vistas/modulos/templates/menucolaborador.php";
          if (isset($_GET['ruta']) && in_array($_GET['ruta'], $colaboradorRutas)) {
            include "vistas/modulos/paginas/colaborador/" . $_GET['ruta'] . ".php";
          } else {
            include "vistas/modulos/paginas/404.php";
          }
          break;
        }
      case 3: {
          $administradorRutas = ["escritorio", "usuarios", "tipousuario", "departamento", "asistencia", "clientes", "reportes","salir"];
          include "vistas/modulos/templates/menu.php";
          if (isset($_GET['ruta']) && in_array($_GET['ruta'], $administradorRutas)) {
            include "vistas/modulos/paginas/administrador/" . $_GET['ruta'] . ".php";
          } else {
            include "vistas/modulos/paginas/404.php";
          }
          break;
        }
      default: {
        include "vistas/modulos/paginas/salir.php";
      }
    }
    } else {
      $clienteRutas = ["escritoriocliente", "tributaria", "laboral", "auditoria", "./salirC", "upload",  "pagospendientes", "pagosrealizados"];
      include "vistas/modulos/templates/menucliente.php";
      if (isset($_GET['ruta']) && in_array($_GET['ruta'], $clienteRutas)) {
        include "vistas/modulos/paginas/cliente/" . $_GET['ruta'] . ".php";
      } else {
        include "vistas/modulos/paginas/404.php";
      }
    }

    include "vistas/modulos/templates/footer.php";
  } else {
      echo '<body class="hold-transition login-page">';
      $visitanteRutas = ["marcarasistencia", "login", "loginCliente", "inicio"];
    if (isset($_GET['ruta'])) {
      if (in_array($_GET['ruta'], $visitanteRutas)) {
        include "vistas/modulos/paginas/" . $_GET['ruta'] . ".php";
      } else {
        include "vistas/modulos/paginas/404.php";
      }
    } else {
      include "vistas/modulos/paginas/inicio.php";
    }
  }
?>

  <script src="vistas/js/usuario.js"></script>
  <script src="vistas/js/tipousuario.js"></script>
  <script src="vistas/js/departamento.js"></script>
  <script src="vistas/js/asistencia.js"></script>
  <script src="vistas/js/reportes.js"></script>
  <script src="vistas/js/clientes.js"></script>
  <script src="vistas/js/agenda.js"></script>
  <script src="vistas/js/archivo.js"></script>
  <script src="vistas/js/pagosclientes.js"></script>
  <script src="vistas/js/cobranza.js"></script>
  <script src="vistas/js/detallecobranza.js"></script>
  <script src="vistas/js/traduccion.js"></script>
  <script src="vistas/js/dataTable.js"></script>
  <script src="vistas/js/clock.js"></script>
  <script src="vistas/js/select2.js"></script>
  <script src="vistas/js/menu.js"></script>
  <script src="vistas/js/servicio.js"></script>
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>
