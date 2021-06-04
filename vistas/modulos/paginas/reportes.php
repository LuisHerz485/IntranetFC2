<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Asistencia</a></li>
              <li class="breadcrumb-item active">Reportes</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Consulta de Asistencia por Fecha</h3>
            </div>
            <div class="card-body panel-body" id="listadoregistrosR">
              <div class="row">
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <label>Fecha Inicio</label>
                  <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <label>Fecha Fin</label>
                  <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
                </div>
                <div class="form-group col-lg-6 col-md-3 col-sm-6 col-xs-12">
                    <label for="">Empleado</label>
                    <select name="idusuario" id="idusuario" class="form-control select-picker" required>
                    <option value="0">Seleccione ...</option>
                    <?php 
                      $item = 1;
                      $valor = null;
                      $usuario = ControladorUsuarios::ctrMostrarUsuario($item,$valor);
                      foreach($usuario as $key => $value){ 
                        echo '<option value="'.$value['idusuario'].'">'.$value['nombre'].' '.$value['apellidos'].'</option>';
                      }
                    ?>
                    </select>
                </div>
              </div>
              <button class="btn btn-success btnMostrar">Mostrar</button>
              <br/>
              <br/>
              <div id="tbllistado">
                <table id="mostrarReporte" class="table table-striped tablaDataTable dt-responsive">
                  <thead>
                    <th>Código</th>
                    <th>Nombre Completo</th>
                    <th>Área</th>
                    <th>Fecha</th>
                    <th>Asistencia</th>
                    <th>Estado</th>
                    <th>Detalle</th>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                    <th>Código</th>
                    <th>Nombre Completo</th>
                    <th>Área</th>
                    <th>Fecha</th>
                    <th>Asistencia</th>
                    <th>Estado</th>
                    <th>Detalle</th>
                  </tfoot>   
                </table>
              </div>
            </div>
          </div>
        </div>           
      </div>
    </div>
  </div>
</div>

<!-- /.content-wrapper -->