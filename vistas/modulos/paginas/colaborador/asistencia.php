<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item h5"><a href="#"><b class="text-red">Administración de Personal</b></a></li>
            <li class="breadcrumb-item active h5">Asistencia</li></b>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-danger">
          <div class="card-header" style="background-color: rgb(204,0,0);">
            <b class="h3" style="color: white; font-size: 27px;" >Registro de Asistencia del Usuario</b>
          </div>
          <div class="card-body panel-body" id="listadoregistrosA">
            <div id="tbllistado">
              <table class="table table-striped dt-responsive tablaDataAsistenciaUsuario">
                <thead style="background-color:lightgray; font-size: 20px;">
                  <th>Asistencia</th>
                  <th>Fecha</th>
                  <th>Estado</th>
                  <th>Detalle</th>
                </thead>
                <tbody>
                  <?php
                  $asistencia = ModeloAsistencia::mdlConsultarAsistenciaColaborador($_SESSION["idusuario"]);
                  foreach ($asistencia as $value) {
                    echo '<tr>
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
                <tfoot style="background-color:lightgray; font-size: 20px;">
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