<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" id="ocultar" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <?php if (isset($_SESSION['idtipousuario']) && in_array($_SESSION['idtipousuario'], [1, 3])) { ?>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge" id="notificaciones"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <span class="dropdown-item dropdown-header">Notificaciones</span>
          <div class="dropdown-divider"></div>
          <a href="permisos-pendientes" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> <span id="permisosPendientes">0</span> Permisos Pendientes
          </a>
          <audio id="audio" preload="auto" src="sounds/notificacion.mp3">
        </div>
      </li>
    <?php } ?>
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-user-times"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <?php
        if ($_SESSION['nombre'] != "") {
          echo ' <span class="dropdown-item dropdown-header">' . $_SESSION["nombre"] . ' ' . $_SESSION["apellidos"] . '<br/>' . $_SESSION["login"] . ' - ' . $_SESSION["tipousuario"] . '</span>';
        } else {
          echo '<span class="dropdown-item dropdown-header">Nombre de Usuario</span>';
        }
        ?>
        <div class="dropdown-divider"></div>
        <a href="salir" class="dropdown-item">
          <i class="fas fa-user-times mr-2"></i> Cerrar Sesión
          <span class="float-right text-muted text-sm">Activa</span>
        </a>
    </li>
  </ul>
</nav>