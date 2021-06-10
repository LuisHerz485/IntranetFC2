<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="inicio" class="brand-link">
      <img src="vistas/dist/img/logo-blanco.png" width="240px" alt="">
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="align-items: center;">
        <div class="image">
            <?php
                if($_SESSION['imagen']!=""){
                    echo '<img src="'.$_SESSION['imagen'].'" class="img-circle elevation-2" alt="User Image" style="width: 55px;">';
                }else{
                    //Cual es el avatar?
                    echo '<img src="vistas/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image" style="width: 55px;">';
                }
            ?>
        </div>
        <div class="info">
            <?php
                if($_SESSION['nombre']!=""){
                    echo '<a class="d-block">'.$_SESSION['nombre']. '</a>';
                }else{
                    echo '<a class="d-block">Nombre de empresa</a>';
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
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Escritorio</p>
                </a>
            </li>
            
            <li class="nav-header">MIS ARCHIVOS</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-folder"></i>
                    <p>Área Tributaria<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Comprobante de<br /> percepciones</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Comprobante de retenciones</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Cronograma de <br/>fraccionamiento</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/UI/sliders.html" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Declaraciones anuales</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Declaraciones mensuales</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Extracto de pagos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Ficha RUC</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Gestiones SUNARP</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Importaciones DUAS</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Liquidacion de impuestos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Pago de detracciones</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Reporte de compras</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Reporte de ventas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Comprobante de terceros</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-folder"></i>
                    <p>Área Laboral<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">AFP y ONP</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Alta y bajas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Backup PLAME</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/UI/sliders.html" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Boletas de pagos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Comprobantes de pagos AFP</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Contratos de personal</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">ESSALUD y microempresa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">PDT 601</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">REMYPE</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Tickets AFP</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-folder"></i>
                    <p>Auditorias<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Preventiva</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Tributaria</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Financiera</p>
                        </a>
                    </li>
                </ul>
            </li>
                
            <li class="nav-item">
                <a href="upload" class="nav-link">
                    <i class="nav-icon fas fa-upload"></i>
                    <p>Subir archivos</p>
                </a>
            </li>

            <li class="nav-header">PAGOS</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-folder"></i>
                    <p>Seguimiento de Pagos<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Pagos Pendientes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i style="font-size: 14px;" class="far fa-circle nav-icon"></i>
                            <p style="font-size: 14px;">Pagos Realizados</p>
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