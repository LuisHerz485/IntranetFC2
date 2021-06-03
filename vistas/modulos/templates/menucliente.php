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
                if($_SESSION['razonsocial']!=""){
                    echo '<a class="d-block">'.$_SESSION['razonsocial']. '</a>';
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
                <a href="escritoriocliente" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Escritorio</p>
                </a>
            </li>

            <li class="nav-header">MIS ARCHIVOS</li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-folder"></i>
                    <p style="font-size: 14px;">Area Tributaria<i class="right fas fa-angle-right"></i></p>
                    
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Comprobante de percepciones</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Comprobante de retenciones</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Cronograma de fraccionamiento</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Declaraciones anuales</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Declaraciones mensuales</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Extracto de pagos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Ficha RUC</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Gestiones SUNARP</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Importaciones DUAS</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Liquidacion de impuestos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pago de detracciones</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Reporte de compras</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Reporte de ventas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Comprobante de terceros</p>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-folder"></i>
                    <p>Area Laboral<i class="right fas fa-angle-right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>AFP y ONP</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Alta y bajas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Backup PLAME</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Boletas de pagos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Comprobantes de pagos AFP</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Contratos de personal</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>ESSALUD y microempresa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>PDT 601</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>REMYPE</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tickets AFP</p>
                        </a>
                    </li>
                </ul>
            </li> 
   

            <li class="nav-header">PAGOS</li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-folder"></i>
                    <p style="font-size: 14px;">Seguimiento de Pagos<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pagos Pendientes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pagos Realizados</p>
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