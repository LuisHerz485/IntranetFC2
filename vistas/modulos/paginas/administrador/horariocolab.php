<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item h5"><a href="#"><b class="text-red">Colaboradores</b></a></li>
                        <li class="breadcrumb-item active h5">Entrada y Salida</li></b>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["btnRegistrarHorariocolab"])) {
        if (controladorhorarioscolab::ctrRegistrarhorarioscolab()) {
            echo "<script>Swal.fire({
                    title: 'Registrado!',
                    text: '¡Se Registro el Horario correctamente!',
                    icon: 'success',
                    confirmButtonText: 'Ok',
                })</script>";
        } else {
            echo "<script>Swal.fire({
                    title: 'Error!',
                    text: '¡No se pudo registrar el Horario!',
                    icon: 'error',
                    confirmButtonText: 'Ok',
                })</script>";
        }
    } else if (isset($_POST["btnGuardarHorario"])) {
        if (ControladorEntrada::ctrEditarEntrada()) {
            echo "<script>Swal.fire({
                    title: 'Editado!',
                    text: '¡Se Edito el horario correctamente!',
                    icon: 'success',
                    confirmButtonText: 'Ok',
                })</script>";
        } else {
            echo "<script>Swal.fire({
                    title: 'Error!',
                    text: '¡No se pudo editar el horario!',
                    icon: 'error',
                    confirmButtonText: 'Ok',
                })</script>";
        }
    }


    ?>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div id="barra"class="card-header">
                        <b class="h4">Hora de entrada y salida de colaboradores</b>
                    </div>
                    <div class="card-body panel-body">
                        <form method="POST" id="frmhorariocolab" enctype="multipart/form-data">
                            <div class="container-fluid">
                                <div class="row">


                                    <div  class="col-12 col-lg-3">
                                        <label><p>Seleccione el colaborador</p></label>
                                        <input class="form-control" type="hidden" name="idhorariocolab" id="idhorariocolab" placeholder="idhorariocolab">
                                        <select name="idusuario" id="idusuario" class="form-control select2" required>
                                            <?php
                                            if ($usuarios = ModeloUsuarios::mdlMostrarUsuariosNombre()) {
                                                foreach ($usuarios as $usuario) {
                                                    echo '<option value="' . $usuario['idusuario'] . '">' . $usuario['nombre'] . ' ' . $usuario['apellidos'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-3">
                                        <label><p>Seleccione Hora entrada</p></label>
                                        <input type="time" class="form-control" name="horaentrada" id="horaentrada" required>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <label><p>Seleccione Hora Salida</p></label>
                                        <input type="time" class="form-control" name="horasalida" id="horasalida" required>
                                    </div>
                                    <div class="col-lg-6 col-md-9 col-sm-6 col-xs-12">
                                        <label>Detalles (max 300)</label>
                                        <textarea size ="6" type="text"rows="2" class="form-control" name="detalle" id="detalle" minlength="10" maxlength="300"></textarea>
                                    </div>

                                    
                                    <div  class="col-12 col-lg-4">
                                        <div class="container-fluid" id="opcionesRegistrarHorariocolab"  style="margin-top:32px;">
                                            <div class="input-group row">
                                                <div class="col-12 col-lg-6">
                                                    <button id="btnRegistrarhorariocolab" class="btn btn-primary btn-lg btn-block pull-right" name="btnRegistrarHorariocolab" value="btnRegistrarHorariocolab" type="submit"><span class="fas fa-lg fa-save fa-3x"></span></button>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <button class="btn btn-secondary btn-lg btn-block pull-right" id="btnLimpiarFormHorariocolab" type="button"><span class="fas fa-lg fa-eraser fa-3x"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                   
                                        <div class="container-fluid d-none" id="opcionesEditarHorariocolab" style="margin-top:32px;">
                                            <div class="input-group row">
                                                <div class="col-12 col-lg-6">
                                                    <button id="btnEditar" class="btn btn-warning btn-lg btn-block pull-right" name="btnGuardarHorario" value="btnGuardarHorario" type="submit"><span class="fas fa-lg fa-edit fa-3x"></span></button>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <button id="btnCancelarEditarHorariocolab" class="btn btn-dark btn-lg btn-block pull-right" id="btnLimpiarFormHorariocolab" type="button"><span class="fas fa-lg  fa-angle-left fa-3x"></span></button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                        <hr>

                        <table id="tblhorarioscolab" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th class="no-exportar">Editar</th>
                                <th>Nombre</th>
                                <th>Hora Entrada</th>
                                <th>Hora Salida</th>
                                <th>Detalle</th>
                                </tr>
                            </thead>

                            <tbody class="tblbody">
                                <?php
                                /* Datos de tabla de horario */
                                $horariocolab = controladorhorarioscolab::ctrListhorarioscolab();
                                if($horariocolab){
                                    foreach ($horariocolab as $unhorariocolab) {
                                        echo 
                                        '<td>' . "<button type='button' class='btn btn-s btn-warning btn-editar-horariocolab' datahorariocolab='" . json_encode($unhorariocolab) . "' ><i class='fas fa-edit'></i> </button>
                                        " . '</td>
                                            <td>' . $unhorariocolab["nombrecompleto"] . '</td>
                                            <td style="color:black;">' . $unhorariocolab['horaentrada'] . '</td>
                                            <td style="color:black;">' . $unhorariocolab['horasalida'] . '</td>
                                            <td> <button class="btn btn-secondary btn-ver-detalle-horariocolab" detalle2="' . $unhorariocolab['detalle'] . '" >'. '<i class="d-none">'. $unhorariocolab['detalle'].'</i>'.'<i class="far fa-eye"></i></button></td> </tr>';
                                        echo '</tr>';
                                    }
                                }
                                
                                ?>

                            </tbody>

                            <tfoot>
                                <tr>
                                <th class="no-exportar">Editar</th>
                                <th>Nombre</th>
                                <th>Hora Entrada</th>
                                <th>Hora Salida</th>
                                <th>Detalle</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalVerDetallecolab" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title"><strong>Ver Detalle</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-12">
                <label>Detalle:</label>
              <textarea id="detalle2" name="detalle" class="form-control" rows="5" disabled></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="btnSalirVerDetalle" type="button" class="btn btn-danger btn-block" data-dismiss="modal"> Cancelar</button>
      </div>
    </div>
  </div>
</div>