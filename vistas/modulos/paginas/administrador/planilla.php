<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item h5"><a href="#"><b class="text-red">Administración Intranet</b></a></li>
                        <li class="breadcrumb-item active h5">Planilla</li></b>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["btnRegistrarPlanilla"])) {
        if (ControladorPlanilla::ctrRegistrarPlanilla()) {
            echo "<script>Swal.fire({
                    title: 'Registrado!',
                    text: '¡Se Registro el Planilla correctamente!',
                    icon: 'success',
                    confirmButtonText: 'Ok',
                })</script>";
        } else {
            echo "<script>Swal.fire({
                    title: 'Error!',
                    text: '¡No se pudo registrar la Planilla!',
                    icon: 'error',
                    confirmButtonText: 'Ok',
                })</script>";
        }
    } else if (isset($_POST["btnEditarPlanilla"])) {
        if (ControladorPlanilla::ctrEditarPlanilla()) {
            echo "<script>Swal.fire({
                    title: 'Editado!',
                    text: '¡Se Edito la Planilla correctamente!',
                    icon: 'success',
                    confirmButtonText: 'Ok',
                })</script>";
        } else {
            echo "<script>Swal.fire({
                    title: 'Error!',
                    text: '¡No se pudo editar la Planilla!',
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
                    <div class="card-header">
                        <b class="h4">Planilla - Registro</b>
                    </div>
                    <div class="card-body panel-body">
                        <form method="POST" id="frmPlanilla" enctype="multipart/form-data">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <label>Seleccione el colaborador:</label>
                                        <input class="form-control" type="hidden" name="idplanilla" id="idplanilla" placeholder="idplanilla">
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
                                    <div class="col-12 col-lg-6">
                                        <label>Seleccione el estado de la planilla:</label>
                                        <select name="idestadoplanilla" id="idestadoplanilla" class="form-control select2" required>
                                            <?php
                                            if ($estadosPlanilla = ControladorPlanilla::ctrListarEstadosPlanillas()) {
                                                foreach ($estadosPlanilla as $estadoPlanilla) {
                                                    echo '<option value="' . $estadoPlanilla["idestadoplanilla"] . '">' . $estadoPlanilla["estadoplanilla"] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <label>Honorario:</label>
                                        <input class="form-control" type="number" name="honorario" id="honorario" min="0" value="0" required>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <label>Dias Laborales</label>
                                        <input class="form-control" type="number" name="diaslaborales" id="diaslaborales" min="1" value="0" required>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <label>Remuneración Diaria:</label>
                                        <input class="form-control" type="number" name="remuneraciondiaria" id="remuneraciondiaria" value="0" readonly required>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <label>Remuneración Mensual:</label>
                                        <input class="form-control" type="number" name="remuneracionmensual" id="remuneracionmensual" value="0" readonly required>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label>Fecha de ingreso:</label>
                                        <input type="date" class="form-control" name="fechaingreso" id="fechaingreso" required>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label>Fecha de fin:</label>
                                        <input type="date" class="form-control" name="fechafin" id="fechafin" required>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label>Descuento:</label>
                                        <input type="number" class="form-control" name="montodescuento" id="montodescuento" value="0" required>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <label>Observacion (Tamaño Max. 1000):</label>
                                        <textarea name="observacion" class="form-control" id="observacion" rows="3" maxlength="1000"></textarea>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <div class="container-fluid" id="opcionesRegistrarPlanilla" align="center" style="margin-top:32px;">
                                            <div class="input-group row">
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-block" name="btnRegistrarPlanilla" value="btnRegistrarPlanilla" type="submit"><i class="fas fa-lg fa-save"></i> Registrar</button>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-secondary btn-block" id="btnLimpiarFormPlanilla" type="button"><i class="fas fa-lg fa-broom"></i> Limpiar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid d-none" id="opcionesEditarPlanilla" align="center" style="margin-top:32px;">
                                            <div class="input-group row">
                                                <div class="col-12">
                                                    <button class="btn btn-success btn-block" name="btnEditarPlanilla" value="btnEditarPlanilla" type="submit"><i class="fas fa-lg fa-save"></i> Editar</button>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-danger btn-block" id="btnCancelarEditarPlanilla" type="button"><i class="fas fa-lg fa-times-circle"></i> Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                        <hr>
                        <table id="tblPlanilla" class="table table-striped dt-responsive">
                            <thead>
                                <th class="no-exportar">Opciones</th>
                                <th>Nombre</th>
                                <th>Cargo</th>
                                <th>Estado</th>
                                <th>Remuneración Mensual</th>
                                <th>Fecha Ingreso</th>
                                <th>Fecha Fin</th>
                            </thead>
                            <tbody>
                                <?php
                                $planillas = ControladorPlanilla::ctrListarPlanillas();
                                if ($planillas) {
                                    foreach ($planillas as $unaPlanilla) {
                                        echo "<tr>
                                                <td><button type='button' class='btn btn-s btn-warning btn-editar-planilla' dataPlanilla='" . json_encode($unaPlanilla) . "' ><i class='fas fa-pencil-alt'></i> </button></td>
                                                <td>{$unaPlanilla['nombrecompleto']}</td>
                                                <td>{$unaPlanilla['cargo']}</td>
                                                <td>{$unaPlanilla['estadoplanilla']}</td>
                                                <td>{$unaPlanilla['remuneracionmensual']}</td>
                                                <td>{$unaPlanilla['fechaingreso']}</td>
                                                <td>{$unaPlanilla['fechafin']}</td> 
                                            </tr>";
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <th class="no-exportar">Opciones</th>
                                <th>Nombre</th>
                                <th>Cargo</th>
                                <th>Estado</th>
                                <th>Remuneración Mensual</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>