<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" id="barra">
    <!-- Brand Logo -->
    <a href="escritorio" class="brand-link">
        <img src="vistas/dist/img/logo-blanco.png" width="240px" id="logo" alt="">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="align-items: center;">
            <div class="image" style="padding-left: 3px; padding-right: 10px;">
                <?php
                if ($_SESSION['imagen'] != "") {
                    echo '<img src="' . $_SESSION['imagen'] . '" class="img-circle elevation-2" alt="User Image" style="width: 55px;">';
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

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-header">GENERAL</li>
                <li class="nav-item">
                    <a href="escritorio" class="nav-link">
                        <i class="fas fa-desktop"></i>
                        <p class="ml-5">Escritorio</p>
                    </a>
                </li>
                <li class="nav-header">ADMINISTRACIÓN</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-folder"></i>
                        <p style="font-size: 14px;">Administración de Usuarios<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="usuarios" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="tipousuario" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tipo Usuario</p>
                            </a>
                        </li>
                        <?php
                        if ($_SESSION['idtipousuario'] != 4) { ?>
                            <li class="nav-item">
                                <a href="permisos-pendientes" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Permisos</p>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-folder"></i>
                        <p>Administración de Áreas<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="departamento" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Áreas</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-folder"></i>
                        <p>Asistencia<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="cambiarhorario" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cambiar Horario</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="asistencia" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registro de Asistencia</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="reportes" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reportes</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-folder"></i>
                        <p>Administración personal<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="permisos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Solicitud de permiso</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="checklist" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Check List</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-folder"></i>
                        <p>Administración Checklist<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="checklist-administrador" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consulta Checklist</p>
                            </a>
                        </li>
                        <?php
                        if ($_SESSION['idtipousuario'] == 4 || $_SESSION['idtipousuario'] == 1) { ?>
                            <li class="nav-item">
                                <a href="checklist-jefe" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Asignar Checklist</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="checklist-asignado" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ver Checklist Asignado</p>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-header">Drive</li>
                <li class="nav-item has-treeview">
                    <a href="admindrive" class="nav-link">
                        <i class="fas fa-folder"></i>
                        <p>Administración del Clientes</p>
                    </a>
                </li>
                <?php
                if ($_SESSION['idtipousuario'] != 4) { ?>
                    <li class="nav-header">SEGUIMIENTO CLIENTES</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-folder"></i>
                            <p style="font-size: 14px;">Administración de Clientes<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="clientes" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Clientes</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-folder"></i>
                            <p>Servicios<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="servicios" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tipo de Servicio</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php
                if ($_SESSION['idtipousuario'] == 1) { ?>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-folder"></i>
                            <p>Cobranzas<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="generarCobranza" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Generar Cobranza</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="mostrarcobranza" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Mostrar Adeudados</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="mostrarpagado" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Mostrar Pagados</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">ECONOMÍA</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-folder"></i>
                            <p>Ingresos<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="ingreso" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Empresa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="ingresocliente" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Clientes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="ingresoanualcliente" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ranking</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                <?php } ?>
                <li class="nav-header">HERRAMIENTAS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>Consultas<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="consultaruc" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consulta RUC</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="consultadni" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consulta DNI</p>
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
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>