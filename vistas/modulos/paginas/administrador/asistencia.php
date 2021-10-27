<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item h5"><a href="menuAsistencia"><b class="text-red">Administración de Asistencia</b></a></li>
          <li class="breadcrumb-item active h5">Control Asistencia</li></b>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <?php ControladorAsistencia::ctrEditarDetalleAsistencia(); ?>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-danger">
          <div class="card-header">
          <b class="h4">Control de Asistencia</b>
          </div>
          <div class="card-body panel-body" id="listadoregistrosA">
            <div id="tbllistado">
              <table class="table table-striped tablaDataAsistencia dt-responsive">
                <thead>
                  <th class="no-exportar">Opciones</th>
                  <th class="no-exportar">Código</th>
                  <th>Área</th>
                  <th>Nombre Completo</th>
                  <th>Asistencia</th>
                  <th>Fecha</th>
                  <th>Estado</th>
                  <th class="no-exportar">Detalle</th>
                </thead>
                <tbody>
                  <?php
                  $item = null;
                  $valor = null;
                  $asistencia = ControladorAsistencia::ctrMostrarAsistencia($item, $valor);
                  foreach ($asistencia as $key => $value) {
                    echo '<tr>
                          <th scope="row"><abbr title="Cambio de estado"><button class="btn btn-warning btn-xl btn-circle btnEditarDetalle" fecha="' . $value['fecha'] . '" codigo="' . $value['codigo'] . '" data-toggle="modal" data-target="#modalDetalle"><i class="fas fa-pencil-alt"></i></button></abbr></th>
                          <td>' . $value['codigo'] . '</td>
                          <td>' . $value['area'] . '</td>
                          <td>' . $value['nombre'] . ' ' . $value['apellidos'] . '</td>
                          <td>' . $value['asistencia'] . '</td>
                          <td>' . $value['fecha'] . '</td>';
                    if ($value['estado'] == "0") {
                      echo '<td>Injustificado</td>';
                    } else if ($value['estado'] == "1") {
                      echo '<td>Justificado</td>';
                    } else {
                      echo '<td>Correcto</td>';
                    }
                    echo '<td>' . $value['detalle'] . '</td></tr>';
                  }
                  ?>
                </tbody>
                <tfoot>
                  <th>Opciones</th>
                  <th>Código</th>
                  <th>Área</th>
                  <th>Nombre Completo</th>
                  <th>Asistencia</th>
                  <th>Fecha</th>
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
<div class="modal fade" id="modalDetalle" role="dialog">
  <div class="modal-dialog">
    <form role="form" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cambio de Estado</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fas fa-check"></i></span>
              <select class="form-control input-lg" name="estado" id="estado">
                <option value="3">Seleccionar ...</option>
                <option value="0">Injustificado</option>
                <option value="1">Justificado</option>
                <option value="2">Correcto</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fas fa-comment-alt"></i></span>
              <input class="form-control" type="hidden" name="idasistencia" id="idasistencia">
              <input type="text" name="detalle" id="detalle" class="form-control input-lg" placeholder="Detalle">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>