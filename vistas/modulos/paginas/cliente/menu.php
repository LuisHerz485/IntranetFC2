<aside class="main-sidebar sidebar-dark-primary elevation-4" id="barra">
    <a href="escritoriocliente" class="brand-link" align="center">
        <img src="vistas/dist/img/logo-blanco.png" width="180px" height="75px" id="logo" alt="">
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="align-items: center;">
            <div class="image" style="padding-left: 3px; padding-right: 10px;">
                <?php
                if ($_SESSION['imagen'] != "") {
                    echo '<img src="' . $_SESSION['imagen'] . '" class="img-circle elevation-2" alt="User Image" style="width: 45px;">';
                } else {
                    echo '<img src="vistas/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image" style="width: 55px;">';
                }
                ?>
            </div>
            <div class="info">
                <?php
                if (empty($_SESSION['nombre'])) {
                    echo '<a id="username" class="d-block">Nombre de usuario</a>';
                } else {
                    echo '<a id="username" class="d-block">' . $_SESSION['nombre'] . ' <br/>' . $_SESSION['apellidos'] . '</a>';
                }
                ?>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">GENERAL</li>
                <li class="nav-item">
                    <a href="escritorio" class="nav-link">
                        <h5><i class="fas fa-desktop"></i>
                            <p class="ml-5">Escritorio</p>
                        </h5>
                    </a>
                </li>
                <li class="nav-header">MIS ARCHIVOS</li>
                <li class="nav-item">
                    <a href="drivecliente" class="nav-link">
                        <i class="fas fa-folder-open"></i>
                        <p>Mis Archivos</p>
                    </a>
                </li>

                <li class="nav-header">PAGOS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <p>Seguimiento de Pagos<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pagospendientes" class="nav-link ml-4">
                                <i class="fas fa-forward"></i>
                                <p>Pagos Pendientes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pagosrealizados" class="nav-link ml-4">
                                <i class="fas fa-forward"></i>
                                <p>Pagos Realizados</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">SUNAT</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-atlas"></i>
                        <p>Consulta<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pagospendientes" class="nav-link ml-4">
                                <i class="fas fa-forward"></i>
                                <p>Consulta Ruc</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">AYUDA</li>
                <li class="nav-item">
                    <a href="https://www.youtube.com/watch?v=VwHqLrttPJo&amp;ab_channel=FCCONTADORESYASOCIADOS" target="_blank" class="nav-link">
                        <i class="fab fa-youtube"></i>
                        <p><span>Video Manual</span>&emsp;&emsp;<span class="badge bg-danger pull-right">YouTube</span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://wa.me/+51932270227?text=Necesito%20ayuda%20con%20la%20intranet%20-%20Admin%20FC%20Contadores" target="_blank" class="nav-link">
                        <i class="fab fa-whatsapp"></i>
                        <p><span>Solicitar Ayuda</span>&emsp;&ensp;<span class="badge bg-success pull-right">Whatsapp</span></p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>