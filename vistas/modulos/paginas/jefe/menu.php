<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #B31616;" id="barra">
    <a href="escritorio" class="brand-link" align="center" style="border-color: #FFFFFF;">
        <img src="vistas/dist/img/logo-blanco.png" width="180px" width="75px" id="logo" alt="">
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="align-items: center; border-color: #FFFFFF;">
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

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">GENERAL</li>
                <li class="nav-item">
                    <a href="escritorio" class="nav-link">
                        <i class="fas fa-desktop"></i>
                        <p class="ml-5">Escritorio</p>
                    </a>
                </li>
                <li class="nav-header">ADMINISTRACION</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user-cog"></i>
                        <p style="font-size: 14px;" class="">ADMINISTRACIÓN PERSONAL<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="asistencia" class="nav-link ml-4">
                                <i class="fas fa-forward"></i>
                                <p>Asistencia</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="checklist-jefe" class="nav-link ml-4">
                                <i class="fas fa-forward"></i>
                                <p>Check List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="permisos" class="nav-link ml-4">
                                <i class="fas fa-forward"></i>
                                <p>Solicitud de permiso</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <?php if ($_SESSION['iddepartamento'] == 3 || $_SESSION['iddepartamento'] == 5 || $_SESSION['iddepartamento'] == 8 || $_SESSION['iddepartamento'] == 12 || $_SESSION['iddepartamento'] == 11 || $_SESSION['iddepartamento'] == 13 || $_SESSION['iddepartamento'] == 14  && $_SESSION['idtipousuario'] == 6) { ?>
                    <li class="nav-header">DRIVE</li>
                    <li class="nav-item has-treeview">
                        <a href="admindrive" class="nav-link">
                            <i class="fab fa-google-drive"></i>
                            <p style="font-size: 15px;" class="ml-1">ADMINISTRACIÓN DEL DRIVE</p>
                        </a>
                    </li>

                    <li class="nav-header">SUNAT</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-atlas"></i>
                            <p>Consultas<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="consultaruc" class="nav-link ml-4">
                                    <i class="fas fa-forward"></i>
                                    <p>Consulta Ruc</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-calendar-alt"></i>
                            <p>Cronograma<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="cronogramaAnualSunat" class="nav-link ml-4">
                                    <i class="fas fa-forward"></i>
                                    <p>Cronograma Anual</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="cronogramaSunat" class="nav-link ml-4">
                                    <i class="fas fa-forward"></i>
                                    <p>Cronograma Mensual</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (in_array($_SESSION['iddepartamento'], [18, 13, 5, 8, 3])) { ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-file-invoice"></i>
                            <p>Declaraciones Mensuales<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="declaracionSunatTributaria" class="nav-link ml-4">
                                    <i class="fas fa-forward"></i>
                                    <p>Tributaria</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="declaracionSunatLaboral" class="nav-link ml-4">
                                    <i class="fas fa-forward"></i>
                                    <p>Laboral</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="reportesDeclaracion" class="nav-link ml-4">
                                    <i class="fas fa-forward"></i>
                                    <p>Reportes de Clientes</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-file-invoice"></i>
                            <p>Declaraciones Anuales<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="declaracionAnualSunat" class="nav-link ml-4">
                                    <i class="fas fa-forward"></i>
                                    <p>Declaración</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-file-invoice"></i>
                            <p style="margin-left:4px;">Declaraciones Ple<i class="right fas fa-caret-left" style="font-size: 20px;"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                             <li class="nav-item">
                                <a href="declaracionple" class="nav-link ml-4">
                                    <i class="fas fa-landmark"></i>
                                    <p style="margin-left:4px;">Libros Electrónicos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-file-invoice"></i>
                            <p>Liquidaciones Impuestos<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="liquidaciones" class="nav-link ml-4">
                                    <i class="fas fa-forward"></i>
                                    <p>Liquidaciones Mensuales</p>
                                </a>
                                <a href="listarliquidaciones" class="nav-link ml-4">
                                    <i class="fas fa-forward"></i>
                                    <p>Mostrar Liquidaciones</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

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