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
              <li class="breadcrumb-item active">Registro de Asistencia</li>
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
              <h3 class="card-title">Registro de Asistencia del Usuario</h3>
            </div>
            <div class="card-body panel-body" id="listadoregistrosA">
              <div id="tbllistado">
                <table  class="table table-striped tablaDataAsistenciaUsuario dt-responsive">
                  <thead>
                    <th>Asistencia</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Detalle</th>
                  </thead>
                  <tbody>
                  <?php 
                      $asistencia = ModeloAsistencia::mdlConsultarAsistenciaColaborador($_SESSION["idusuario"]);
                      foreach($asistencia as $value){
                        echo '<tr>
                          <td>'.$value['asistencia'].'</td>
                          <td>'.$value['fecha'].'</td>';
                          if($value['estado']=="0"){
                            echo'<td>Injustificado</td>';
                          }else if($value['estado']=="1"){
                            echo'<td>Justificado</td>';
                          }else{
                            echo'<td>Correcto</td>';
                          }
                        echo'<td>'.$value['detalle'].'</td></tr>';
                      }
                  ?>
                  </tbody>
                  <tfoot>                
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
</div>

<!-- /.content-wrapper -->