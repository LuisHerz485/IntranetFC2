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
                        <li class="breadcrumb-item active h5">Contratos</li></b>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["btnregistrarcontratocolab"])) {
        if(controladorcontratocolab::ctrregistrarcontratocolab()){
            echo "<script>Swal.fire({
                title: 'Registrado!',
                text: '¡Se Registro el contrato correctamente!',
                icon: 'success',
                confirmButtonText: 'Ok',
            })</script>";
        }else{
            echo "<script>Swal.fire({
                title: 'Error!',
                text: '¡No se pudo registrar el contrato!',
                icon: 'error',
                confirmButtonText: 'Ok',
            })</script>";

        }
    }else if(isset($_POST["btneditarguardarcontratocolab"])){
        if(controladorcontratocolab::ctreditarcontratocolab()){
            echo "<script>Swal.fire({
                title: 'Editado!',
                text: '¡Se Edito el contrato correctamente!',
                icon: 'success',
                confirmButtonText: 'Ok',
            })</script>";
        }else{
            echo "<script>Swal.fire({
                title: 'Error!',
                text: '¡No se pudo editar el contrato!',
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
                        <b class="h4">Contratos de colaboradores</b>
                    </div>
                    <div class="card-body panel-body">
                        <form method="POST" id="frmcontratocolab" enctype="multipart/form-data">
                            <div class="container-fluid">
                                <div class="row">
                                    <div  class="col-12 col-lg-3">
                                        <label><p>Seleccione el colaborador</p></label>
                                        <input class="form-control" type="hidden" name="idcontratousuario" id="idcontratousuario" placeholder="idcontratousuario">
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
                                        <label><p>Seleccione Fecha de inicio de contato</p></label>
                                        <input class="form-control" type="date" name="iniciocontrato" id="iniciocontrato" required>

                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <label><p>Seleccione Fecha de fin de contrato</p></label>
                                        <input class="form-control" type="date" name="fincontrato" id="fincontrato" required>

                                    </div>
                                    <div>
                                        <label><p>Digite el pago al colaborador</p></label>
                                        <input class="form-control" type="number" step="any" name="Pago" id="Pago"  value="0.00"placeholder="S/. 0.00">
                                        
                                    </div>
                                    <hr>
                                    <hr>

                                    <div class="col-12 col-lg-4">
                                        <div class="container-fluid" id="opcionesregistrarcontratocolab">
                                            <div class="input-group row">
                                                <div class="col-12 col-lg-6">
                                                    <button id="btnregistrarcontratocolab" class="btn btn-primary btn-lg btn-block pull-right" name="btnregistrarcontratocolab" value="btnregistrarcontratocolab" type="submit"><span class="fas fa-lg fa-save fa-3x"></span></button>
                                                </div>
                                                <div class="col-12 col-lg-6">

                                                </div>
                                            </div>

                                        </div>

                                        <div class="container-fluid d-none" id="opcioneseditarcontratocolab">
                                            <div class="input-group row">
                                                <div  class="col-12 col-lg-6">
                                                    <button id="btneditarguardarcontratocolab" class="btn btn-warning btn-lg btn-block pull-right" name="btneditarguardarcontratocolab" value="btneditarguardarcontratocolab" type="submit"><span class="fas fa-lg fa-save fa-3x"></span></button>
                                                </div>
                                                <div>
                                                    <button class="btn btn-danger btn-block pull-right" id="btncancelarcontratocolab" name="btncancelarcontratocolab" value="btncancelarcontratocolab" type="button"><i class="fas fa-lg fa-times-circle fa-3x"></i></button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                        <hr>

                        <div class="table-responsive">
                            <table id="tblcontratocolab" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Colaborador</th>
                                        <th>Area</th>
                                        <th>Fecha de inicio</th>
                                        <th>Fecha de fin</th>
                                        <th>Monto</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    /*datos de tabla de contrato colaboradores */
                                    $contratocolab = controladorcontratocolab::ctrlistarcontratocolab();
                                    if($contratocolab){
                                        foreach($contratocolab as $uncontratocolab){
                                            echo'<td>'.$uncontratocolab["nombrecompleto"].'</td>';
                                            echo'<td>'.$uncontratocolab["nombre"].'</td>';
                                            echo'<td>'.$uncontratocolab["iniciocontrato"].'</td>';
                                            echo'<td>'.$uncontratocolab["fincontrato"].'</td>';
                                            echo '<td>'.'S/. '.$uncontratocolab["Pago"].'</td>';
                                            if($uncontratocolab["estado"] == "1"){
                                                echo '<td><button class="btn btn-success btn-sm">Activo</button></td>';
                                            }else{
                                                echo '<td><button class="btn btn-danger btn-sm">Inactivo</button></td>';
                                            }
                                            echo'<td>' . "<button type='button' class='btn btn-s btn-warning btn-editar-contratocolabs' dataContratoColab='" . json_encode($uncontratocolab) . "' ><i class='fas fa-edit'></i> </button>" . '</td>';
                                            echo'</tr>';
                                        }
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Colaborador</th>
                                        <th>Area</th>
                                        <th>Fecha de inicio</th>
                                        <th>Fecha de fin</th>
                                        <th>Monto</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </tfoot>
                            </table>    
                        </div>
                        <div>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="modaleditarcontratocolab" role="dialog">
  <div class="modal-dialog">
    <form role="form" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">EDITAR CONTRATO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="input-group">
              <input class="form-control" type="hidden" name="idusuario5" id="idusuario5">                
                <div><label>Fecha inicio Contrato</label>
                <input type="date" class="form-control" name="iniciocontrato" id="iniciocontrato" required></div>
                <br>
                <div><label>Fecha fin Contrato</label>
                <input type="date" class="form-control" name="fincontrato" id="fincontrato" required></div>
                <br>
                <div><label>Monto</label>
                <input type="number" class="form-control" name="monto" id="monto" required></div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary" name="guardareditarcontrato" value="guardareditarcontrato" >Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>

