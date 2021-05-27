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
              <h3 class="card-title">Registro de Asistencia</h3>
            </div>
            <div class="card-body panel-body" id="listadoregistrosA">
              <div class="dt-buttons">

              </div>
              <br/>
              <div id="tbllistado">
                <table  class="table table-striped tablaDataTable dt-responsive">
                  <thead>
                    <th>Opciones</th>
                    <th>Código</th>
                    <th>Nombre Completo</th>
                    <th>Área</th>
                    <th>Fecha</th>
                    <th>Asistencia</th>
                    <th>Estado</th>
                    <th>Detalle</th>
                  </thead>
                  <tbody>
                  <?php
                      $item = null;
                      $valor = null;
                      $asistencia = ControladorAsistencia::ctrMostrarAsistencia($item,$valor);
                      foreach($asistencia as $key => $value){
                        echo '<tr>
                          <th scope="row"><button class="btn btn-warning btn-xs btnEditarDetalle" fecha="'.$value['fecha'].'" codigo="'.$value['codigo'].'" data-toggle="modal" data-target="#modalDetalle"><i class="fas fa-pencil-alt"></i></button></th>
                          <td>'.$value['codigo'].'</td>
                          <td>'.$value['nombre'].' '.$value['apellidos'].'</td>
                          <td>'.$value['area'].'</td>
                          <td>'.$value['fecha'].'</td>
                          <td>'.$value['asistencia'].'</td>';
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
                    <th>Opciones</th>
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

<!-- Modal Contraseña -->
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
              <input class="form-control" type="hidden" name="fecha" id="fecha">
              <input type="text" name="detalle" id="detalle" class="form-control input-lg" placeholder="Detalle" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <?php
          $contrausuario = new ControladorUsuarios();
          $contrausuario -> ctrEditarContra();
        ?>
      </div>
    </form>
  </div>
</div>

<!-- /.content-wrapper -->