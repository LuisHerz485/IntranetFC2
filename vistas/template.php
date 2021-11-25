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
  <meta property="og:image" itemprop="image" content="vistas/dist/img/url.jpg" />
  <meta property="og:type" content="article" />
  <meta property="og:locale" content="en_GB" />
  <?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
  ?>
  <link rel="shortcut icon" href="vistas/dist/img/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="vistas/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="vistas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="vistas/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="vistas/dist/css/adminlte.css">
  <link rel="stylesheet" href="vistas/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="vistas/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="vistas/plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="vistas/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="vistas/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/dist/css/tabla.css">
  <link rel="stylesheet" href="vistas/css/inicio.css">
  <link rel="stylesheet" href="vistas/css/boton.css">
  <link rel="stylesheet" href="vistas/css/centro.css">
  <link rel="stylesheet" href="vistas/css/font.css">
  <link rel="stylesheet" href="vistas/css/color.css">

  <script src="vistas/plugins/jquery/jquery.min.js"></script>
  <script src="vistas/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vistas/plugins/chart.js/Chart.min.js"></script>
  <script src="vistas/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script src="vistas/plugins/sparklines/sparkline.js"></script>
  <script src="vistas/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="vistas/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <script src="vistas/plugins/jquery-knob/jquery.knob.min.js"></script>
  <script src="vistas/plugins/moment/moment.min.js"></script>
  <script src="vistas/plugins/daterangepicker/daterangepicker.js"></script>
  <script src="vistas/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="vistas/plugins/summernote/summernote-bs4.min.js"></script>
  <script src="vistas/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="vistas/dist/js/adminlte.js"></script>
  <script src="vistas/dist/js/demo.js"></script>
  <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="vistas/plugins/toastr/toastr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script type="text/javascript" src="vistas/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="vistas/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="vistas/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="vistas/plugins/jszip/jszip.min.js"></script>
  <script src="vistas/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="vistas/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="vistas/plugins/select2/js/select2.full.min.js"></script>
</head>

<?php
if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == "ok") {
  echo '<body class="hold-transition sidebar-mini layout-fixed">';
  echo '<div class="wrapper">';
  include "vistas/modulos/templates/encabezado.php";
  if (isset($_GET['ruta']) && $_GET['ruta'] == "salir") {
    include "vistas/modulos/paginas/salir.php";
  } else 
  if (isset($_SESSION['cliente']) && $_SESSION['cliente'] == "no") {
    switch ($_SESSION['idtipousuario']) {
      case 1: {
          $administradorGeneralRutas = ["escritorio", "usuarios", "tipousuario", "servicios",  "departamento", "asistencia", "clientes", "reportes", "generarCobranza", "mostrarcobranza", "mostrarpagado", "ingreso", "ingresocliente", "ingresoanualcliente", "permisos", "permisos-pendientes", "checklist", "checklist-administrador", "checklist-jefe", "checklist-asignado", "admindrive", "cambiarhorario", "tardanzas", "consultaruc", "menuAsistencia", "menuChecklist", "menuCobranza", "menuIngreso", "cronogramaSunat", "declaracionSunatTributaria", "declaracionSunatLaboral", "reportesDeclaracion", "cronogramaAnualSunat", "liquidaciones", "listarliquidaciones", "declaracionAnualSunat"];
          include "vistas/modulos/paginas/administrador/menu.php";
          if (isset($_GET['ruta']) && in_array($_GET['ruta'], $administradorGeneralRutas)) {
            include "vistas/modulos/paginas/administrador/" . $_GET['ruta'] . ".php";
          } else {
            include "vistas/modulos/paginas/404.php";
          }
          break;
        }
      case 2: {
          $colaboradorRutas = ["escritorio", "asistencia", "permisos", "checklist", "admindrive", "cronogramaSunat", "consultaruc", "declaracionSunatTributaria", "declaracionSunatLaboral", "reportesDeclaracion", "cronogramaAnualSunat", "declaracionAnualSunat", "liquidaciones", "listarliquidaciones"];
          include "vistas/modulos/paginas/colaborador/menu.php";
          if (isset($_GET['ruta']) && in_array($_GET['ruta'], $colaboradorRutas)) {
            include "vistas/modulos/paginas/colaborador/" . $_GET['ruta'] . ".php";
          } else {
            include "vistas/modulos/paginas/404.php";
          }
          break;
        }
      case 3: {
          $administradorRutas = ["escritorio", "usuarios", "tipousuario", "departamento", "asistencia", "clientes", "reportes", "consultaruc", "consultadni", "permisos", "permisos-pendientes", "checklist", "checklist-administrador", "menuAsistencia", "menuChecklist", "declaracionSunatTributaria", "declaracionSunatLaboral", "reportesDeclaracion"];
          include "vistas/modulos/paginas/administrador/menu.php";
          if (isset($_GET['ruta']) && in_array($_GET['ruta'], $administradorRutas)) {
            include "vistas/modulos/paginas/administrador/" . $_GET['ruta'] . ".php";
          } else {
            include "vistas/modulos/paginas/404.php";
          }
          break;
        }
      case 4: {
          $recursosHumanosRutas = ["escritorio", "usuarios", "tipousuario", "departamento", "asistencia", "reportes", "consultaruc", "consultadni", "permisos", "checklist", "checklist-administrador", "checklist-jefe", "permisos-pendientes", "menuAsistencia", "menuChecklist"];
          include "vistas/modulos/paginas/administrador/menu.php";
          if (isset($_GET['ruta']) && in_array($_GET['ruta'], $recursosHumanosRutas)) {
            include "vistas/modulos/paginas/administrador/" . $_GET['ruta'] . ".php";
          } else {
            include "vistas/modulos/paginas/404.php";
          }
          break;
        }
      case 6: {
          $jefeAreaRutas = ["escritorio", "asistencia", "permisos", "checklist-jefe", "admindrive",   "consultaruc", "declaracionSunatTributaria", "declaracionSunatLaboral", "reportesDeclaracion", "cronogramaAnualSunat", "declaracionAnualSunat", "liquidaciones", "listarliquidaciones",];
          include "vistas/modulos/paginas/jefe/menu.php";
          if (isset($_GET['ruta']) && in_array($_GET['ruta'], $jefeAreaRutas)) {
            include "vistas/modulos/paginas/jefe/" . $_GET['ruta'] . ".php";
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
    $clienteRutas = ["escritorio", "tributaria", "laboral", "auditoria", "upload",  "pagospendientes", "pagosrealizados", "drivecliente"];
    include "vistas/modulos/paginas/cliente/menu.php";
    if (isset($_GET['ruta']) && in_array($_GET['ruta'], $clienteRutas)) {
      include "vistas/modulos/paginas/cliente/" . $_GET['ruta'] . ".php";
    } else {
      include "vistas/modulos/paginas/404.php";
    }
  }
  include "vistas/modulos/templates/footer.php";
} else {
  echo '<body class="hold-transition login-page">';
  $visitanteRutas = ["marcarasistencia", "restringido", "login", "loginCliente", "inicio"];
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
<script src="vistas/js/usuario.js?v=1"></script>
<script src="vistas/js/tipousuario.js?v=1"></script>
<script src="vistas/js/departamento.js?v=1"></script>
<script src="vistas/js/asistencia.js?v=1"></script>
<script src="vistas/js/reportes.js?v=1"></script>
<script src="vistas/js/clientes.js?v=2"></script>
<script src="vistas/js/agenda.js?v=1"></script>
<script src="vistas/js/archivo.js?v=1"></script>
<script src="vistas/js/pagosclientes.js?v=1"></script>
<script src="vistas/js/cobranza.js?v=2"></script>
<script src="vistas/js/detallecobranza.js?v=1"></script>
<script src="vistas/js/traduccion.js?v=1"></script>
<script src="vistas/js/dataTable.js?v=3.1"></script>
<script src="vistas/js/clock.js?v=1"></script>
<script src="vistas/js/select2.js?v=1"></script>
<script src="vistas/js/menu.js?v=1"></script>
<script src="vistas/js/servicio.js?v=1"></script>
<script src="vistas/js/economia.js?v=2"></script>
<script src="vistas/js/checklist.js?v=1"></script>
<script src="vistas/js/tiposervicio.js?v=1"></script>
<script src="vistas/js/permiso.js?v=2"></script>
<script src="vistas/js/subida.js?v=1"></script>
<script src="vistas/js/tardanzas.js?v=1"></script>
<script src="vistas/js/cronogramaSunat.js?v=2"></script>
<script src="vistas/js/declaracionSunat.js?v=1"></script>
<script src="vistas/js/liquidaciones.js?v=3.2"></script>
<script src="vistas/js/declaracionAnualSunat.js?v=1.2"></script>
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
</body>

</html>