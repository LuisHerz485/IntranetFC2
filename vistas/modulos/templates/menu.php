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
                if($_SESSION['imagen']!=""){
                    echo '<img src="'.$_SESSION['imagen'].'" class="img-circle elevation-2" alt="User Image" style="width: 55px;">';
                }else{
                    echo '<img src="vistas/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image" style="width: 55px;">';
                }
            ?>
        </div>
        <div class="info">
            <?php
                if($_SESSION['nombre']!=""){
                    echo '<a id="username" class="d-block">'.$_SESSION['nombre'].' <br/>'.$_SESSION['apellidos'].'</a>';
                }else{
                    echo '<a id="username" class="d-block">Nombre de usuario</a>';
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
                    <p>Cobranzas<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="generarCobranza" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Generar Cobranza</p>
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