<aside class="main-sidebar sidebar-dark-blue elevation-4" style="background-color: #B31616;" id="barra">
  <a href="escritorio" class="brand-link" align="center" style="border-color: #FFFFFF;">
    <img src="vistas/dist/img/logo-blanco.png" width="180px" height="75px" id="logo" alt="">
  </a>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="align-items: center; color: white; border-color: #FFFFFF;">
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
          echo '<a id="username" class="d-block">' . '<p style="color: white;">' . $_SESSION['nombre'] . ' <br/>' . $_SESSION['apellidos'] . '</p>' . '</a>';
        }
        ?>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="escritorio" class="nav-link">
            <h5><i class="fas fa-desktop"></i>
              <p class="ml-5">Escritorio</p>
            </h5>
          </a>
        </li>
        <li class="nav-header" style="color: white;">ADMINISTRACIÓN</li>
        <?php if (in_array($_SESSION['idusuario'], [16,54,152,56,151])) { ?>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-file-invoice"></i>
            <p style="margin-left:4px;">Credenciales<i class="right fas fa-caret-left" style="font-size: 20px;"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="credencialesclientes" class="nav-link ml-4">
                <i class="fas fa-landmark"></i>
                <p style="margin-left:4px;">Clientes</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="credencialesusuario" class="nav-link ml-4">
                <i class="fas fa-landmark"></i>
                <p style="margin-left:4px;">Usuarios</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="afp" class="nav-link ml-4">
                <i class="fas fa-user-circle"></i>
                <p style="margin-left:4px;">AFP</p>
              </a>
            </li>
          </ul>
        </li>
        <?php } ?>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="fas fa-building"></i>
            <p style="font-size: 14px; margin-left:4px;"> ADMINISTRACIÓN INTRANET<i class="right fas fa-caret-left" style="font-size: 20px;"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="departamento" class="nav-link ml-4">
                <i class="fas fa-home"></i>
                <p style="margin-left:6px;">Áreas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="menuAsistencia" class="nav-link ml-4">
                <i class="fas fa-check"></i>
                <p style="margin-left:6px;">Asistencia</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="menuChecklist" class="nav-link ml-4">
                <i class="fas fa-clipboard-check"></i>
                <p style="margin-left:6px;">Check List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="clientes" class="nav-link ml-4">
                <i class="fas fa-user-tie"></i>
                <p style="margin-left:6px;">Clientes</p>
              </a>
            </li>

            
              <li class="nav-item">
                <a href="permisos-pendientes" class="nav-link ml-4">
                  <i class="fas fa-id-badge"></i>
                  <p style="margin-left:6px;">Permisos</p>
                </a>
              </li>

              <?php if (in_array($_SESSION['idusuario'], [16,54,152,56,151])) { ?>
              <li class="nav-item">
                <a href="horariocolab" class="nav-link ml-4">
                  <i class="fas fa-id-badge"></i>
                  <p style="margin-left:6px;">Horarios colaboradores</p>
                </a>
              </li>
              <?php } ?>
             
            <li class="nav-item">
              <a href="tipousuario" class="nav-link ml-4">
                <i class="fas fa-user-cog"></i>
                <p style="margin-left:1px;">Tipo Usuario</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="usuarios" class="nav-link ml-4">
                <i class="fas fa-user"></i>
                <p style="margin-left:6px;">Usuarios</p>
              </a>
        </li>
      </ul>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="fas fa-user-circle"></i>
          <p style="font-size: 14px; margin-left:4px;"> ADMINISTRACIÓN PERSONAL<i class="right fas fa-caret-left" style="font-size: 20px;"></i></p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="checklist" class="nav-link ml-4">
              <i class="fas fa-clipboard-check"></i>
              <p style="margin-left:6px;">Check List</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="permisos" class="nav-link ml-4">
              <i class="fas fa-comment-dots"></i>
              <p style="margin-left:3px;">Solicitud de permiso</p>
            </a>
          </li>
        </ul>
      </li>
      
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="fas fa-piggy-bank"></i>
          <p style="font-size: 14px; margin-left:4px;"> PAGOS A COLABORADORES<i class="right fas fa-caret-left" style="font-size: 20px;"></i></p>
        </a>
        <ul class="nav nav-treeview">
          <?php if ($_SESSION['idtipousuario'] == 1) { ?>
          </li>
            <li class="nav-item">
              <a href="planilla" class="nav-link ml-4">
              <i class="fas fa-dollar-sign"></i>
              <p style="margin-left:6px;">Registro Planilla</p>
            </a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a href="pasaje" class="nav-link ml-4">
              <i class="fas fa-car-side"></i>
              <p style="margin-left:1px;">Registro Pasaje</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="listarpasaje" class="nav-link ml-4">
              <i class="fas fa-clipboard"></i>
              <p style="margin-left:6px;">Resumen Pasaje</p>
            </a>
          </li>
        </ul>
      </li>
      
      <?php if ($_SESSION['iddepartamento'] == 4 || $_SESSION['idtipousuario'] == 1) { ?>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
        <i class="fas fa-birthday-cake"></i>
          <p style="font-size: 14px; margin-left:4px;"> CUMPLEAÑOS<i class="right fas fa-caret-left" style="font-size: 20px;"></i></p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="cumpleanos" class="nav-link ml-4">
              <i class="fas fa-user"></i>
              <p style="margin-left:6px;">Colaboradores</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="cumplecliente" class="nav-link ml-4">
              <i class="fas fa-user"></i>
              <p style="margin-left:6px;">Clientes</p>
            </a>
          </li>
        </ul>
      </li>
      <?php } ?>
      <?php if ($_SESSION['idtipousuario'] != 4 || $_SESSION['iddepartamento'] == 15) { ?>
        <li class="nav-header" style="color: white;">Drive</li>
        <li class="nav-item has-treeview">
          <a href="admindrive" class="nav-link">
            <i class="fab fa-google-drive"></i>
            <p style="margin-left:4px;">Administración de Clientes</p>
          </a>
        </li>
        <li class="nav-header" style="color: white;">SISTEMA EMPRESA</li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="fas fa-fax"></i>
            <p style="margin-left:4px;">Servicios<i class="right fas fa-caret-left" style="font-size: 20px;"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="servicios" class="nav-link ml-4">
                <i class="fas fa-truck-pickup"></i>
                <p style="margin-left:4px;">Tipo de Servicio</p>
              </a>
            </li>
          </ul>
        </li>
        <?php if ($_SESSION['idtipousuario'] == 1) { ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-chart-line"></i>
              <p style="margin-left:4px;">Movimiento económico<i class="right fas fa-caret-left" style="font-size: 20px;"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="menuCobranza" class="nav-link ml-4">
                  <i class="fas fa-donate"></i>
                  <p style="margin-left:4px;">Sistema Cobranza</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="menuIngreso" class="nav-link ml-4">
                  <i class="fas fa-donate"></i>
                  <p style="margin-left:4px;">Sistema Ingreso</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } ?>

        <li class="nav-header" style="color: white;">OPERACIONES</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-atlas"></i>
            <p style="margin-left:4px;">COTIZACIONES<i class="right fas fa-caret-left" style="font-size: 20px;"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="estadofinanciero" class="nav-link ml-4">
                <i class="fas fa-globe"></i>
                <p style="margin-left:4px;">Cotizacion</p>
              </a>
            </li>
          </ul>
        <li>
        </li>

        <li class="nav-header" style="color: white;">SUNAT</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-atlas"></i>
            <p style="margin-left:4px;">Consultas<i class="right fas fa-caret-left" style="font-size: 20px;"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="consultaruc" class="nav-link ml-4">
                <i class="fas fa-globe"></i>
                <p style="margin-left:4px;">Consulta Ruc</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-calendar-alt"></i>
            <p style="margin-left:4px;">Cronograma<i class="right fas fa-caret-left" style="font-size: 20px;"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="cronogramaSunat" class="nav-link ml-4">
                <i class="far fa-calendar"></i>
                <p style="margin-left:4px;">Cronograma Mensual</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="cronogramaAnualSunat" class="nav-link ml-4">
                <i class="far fa-calendar"></i>
                <p style="margin-left:4px;">Cronograma Anual</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="cronogramaLibros" class="nav-link ml-4">
                <i class="far fa-calendar"></i>
                <p style="margin-left:4px;">Cronograma Ple-Sunat</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-file-invoice"></i>
            <p style="margin-left:4px;">Declaraciones Mensuales<i class="right fas fa-caret-left" style="font-size: 20px;"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="declaracionSunatTributaria" class="nav-link ml-4">
                <i class="fas fa-landmark"></i>
                <p style="margin-left:4px;">Tributaria</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="declaracionSunatLaboral" class="nav-link ml-4">
                <i class="fas fa-landmark"></i>
                <p style="margin-left:4px;">Laboral</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="reportesDeclaracion" class="nav-link ml-4">
                <i class="fas fa-clipboard"></i>
                <p style="margin-left:4px;">Reportes de Clientes</p>
              </a>
            </li>
          </ul>
        </li>

        <?php if (in_array($_SESSION['iddepartamento'], [1,3,7,9])) {?>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-file-invoice"></i>
            <p style="margin-left:4px;">Declaraciones Anuales<i class="right fas fa-caret-left" style="font-size: 20px;"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="declaracionAnualSunat" class="nav-link ml-4">
                <i class="fas fa-landmark"></i>
                <p style="margin-left:4px;">Declaración</p>
              </a>
            </li>
          </ul>
        </li>
        <?php } ?>

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
        <?php if (in_array($_SESSION['iddepartamento'], [1,7,9])) {?>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-file-invoice"></i>
            <p style="margin-left:4px;">Liquidaciones Impuestos<i class="right fas fa-caret-left" style="font-size: 20px;"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="liquidaciones" class="nav-link ml-4">
                <i class="fas fa-fax"></i>
                <p style="margin-left:3px;">Liquidaciones Mensuales</p>
              </a>
              <a href="listarliquidaciones" class="nav-link ml-4">
                <i class="fas fa-fax"></i>
                <p style="margin-left:3px;">Mostrar Liquidaciones</p>
              </a>
            </li>
          </ul>
        </li>
        <?php } ?>

      <?php } ?>
      <li class="nav-header" style="color: white;">AYUDA</li>
      <li class="nav-item">
        <a href="https://www.youtube.com/watch?v=VwHqLrttPJo&amp;ab_channel=FCCONTADORESYASOCIADOS" target="_blank" class="nav-link">
          <i class="fab fa-youtube"></i>
          <p style="margin-left:4px;"><span>Video Manual</span>&emsp;&emsp;<span class="badge bg-danger pull-right">YouTube</span></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="https://wa.me/+51932270227?text=Necesito%20ayuda%20con%20la%20intranet%20-%20Admin%20FC%20Contadores" target="_blank" class="nav-link">
          <i class="fab fa-whatsapp"></i>
          <p style="margin-left:4px;"><span>Solicitar Ayuda</span>&emsp;&ensp;<span class="badge bg-success pull-right">Whatsapp</span></p>
        </a>
      </li>
      </br></br></br>
      </ul>
    </nav>
  </div>
</aside>