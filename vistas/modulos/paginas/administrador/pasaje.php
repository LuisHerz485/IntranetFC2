<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item h5"><a href="#"><b class="text-red">Pasajes</b></a></li>
                        <li class="breadcrumb-item active h5">Registro</li></b>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["btnRegistrarPasaje"])) {
        if (ControladorPasaje::ctrRegistrarPasaje()) {
            echo "<script>Swal.fire({
                    title: 'Registrado!',
                    text: '¡Se Registro el Pasaje correctamente!',
                    icon: 'success',
                    confirmButtonText: 'Ok',
                })</script>";
        } else {
            echo "<script>Swal.fire({
                    title: 'Error!',
                    text: '¡No se pudo registrar el Pasaje!',
                    icon: 'error',
                    confirmButtonText: 'Ok',
                })</script>";
        }
    } else if (isset($_POST["btnEditarPasaje"])) {
        if (ControladorPasaje::ctrEditarPasaje()) {
            echo "<script>Swal.fire({
                    title: 'Editado!',
                    text: '¡Se Edito el Pasaje correctamente!',
                    icon: 'success',
                    confirmButtonText: 'Ok',
                })</script>";
        } else {
            echo "<script>Swal.fire({
                    title: 'Error!',
                    text: '¡No se pudo editar el Pasaje!',
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
                        <b class="h4">Pasajes - Registro</b>
                    </div>
                    <div class="card-body panel-body">
                        <form method="POST" id="frmPasaje" enctype="multipart/form-data">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-lg-3">
                                        <label>Seleccione el colaborador:</label>
                                        <input class="form-control" type="hidden" name="idpasajes" id="idpasajes" placeholder="idpasajes">
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
                                        <label>Seleccione el estado pasaje:</label>
                                        <select name="idestadopasaje" id="idestadopasaje" class="form-control select2" required>
                                            <?php
                                            if ($estadosPasaje = ControladorPasaje::ctrListarEstadosPasajes()) {
                                                foreach ($estadosPasaje as $estadosPasaje) {
                                                    echo '<option value="' . $estadosPasaje["idestadopasaje"] . '">' . $estadosPasaje["estadopasaje"] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-2">
                                        <label>Ida:</label>
                                        <input class="form-control" type="number" name="ida" id="ida" max="10.00" step="0.01" value="0" required>
                                    </div>
                                    <div class="col-12 col-lg-2">
                                        <label>Vuelta:</label>
                                        <input class="form-control" type="number" name="vuelta" id="vuelta" max="10.00" step="0.01" value="0" required>
                                    </div>
                                    <div class="col-12 col-lg-2">
                                        <label>Dias:</label>
                                        <input class="form-control" type="number" name="dias" id="dias" value="0" required>
                                    </div>
                                    <div class="col-12 col-lg-2">
                                        <label>Gastos:</label>
                                        <input class="form-control" type="number" name="gastos" id="gastos" step="0.01" value="0" readonly required>
                                    </div>
                                    <div class="col-12 col-lg-2">
                                        <label>Semana:</label>
                                        <input class="form-control" type="number" name="semana" id="semana" step="0.01" value="0" readonly required>
                                    </div>
                                    <div class="col-12 col-lg-2">
                                        <label>Mensual:</label>
                                        <input type="number" class="form-control" name="mensual" id="mensual" step="0.01" value="0" readonly required>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <label>Dias Extra:</label>
                                        <input type="number" class="form-control" name="diasextra" id="diasextra" step="0.01" value="0" required>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <label>Inasistencias:</label>
                                        <input type="number" class="form-control" name="diasmenos" id="diasmenos" step="0.01" value="0" required>
                                    </div>
                                    <div class="col-12 col-lg-2">
                                        <label>Seleccione Fecha</label>
                                        <input type="date" class="form-control" name="fechacreacion" id="fechacreacion">
                                    </div>
                                    <div class="col-12 col-lg-2">
                                        <textarea name="detalle" class="form-control" id="detalle" rows="5" maxlength="1000" placeholder="Detalle Registro Pasaje" style="margin-top: 20px;"></textarea>
                                    </div>
                                    <div class="col-12 col-lg-2">
                                        <div class="info-box bg-secondary col-12 " style="margin-top:20px;">
                                        <span class="info-box-icon bg-warning"><i class="fas fa-coins"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Pagos</span>
                                            <input type="number" class="form-control" name="pagomedio" id="pagomedio" step="0.01" value="0" required>
                                        </div>
                                        </div>
                                        <div class="col-6"></div>
                                    </div>
                                    <div class="col-12 col-lg-2">
                                        <div class="col-6"></div>
                                        <div class="info-box bg-secondary col-12" style="margin-top:20px;">
                                        <span class="info-box-icon bg-warning"><i class="fas fa-coins"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Monto por Pagar</span>
                                            <input type="number" class="form-control" name="totalpasaje" id="totalpasaje" step="0.01" value="0" readonly required>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="container-fluid" id="opcionesRegistrarPasaje" align="center" style="margin-top:32px;">
                                            <div class="input-group row">
                                                <div class="col-12 col-lg-6">
                                                    <button class="btn btn-success btn-lg btn-block" name="btnRegistrarPasaje" value="btnRegistrarPasaje" type="submit"><i class="fas fa-lg fa-save fa-3x"></i></button>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <button class="btn btn-secondary btn-lg btn-block" id="btnLimpiarFormPasaje" type="button"><i class="fas fa-lg fa-broom fa-3x"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid d-none" id="opcionesEditarPasaje" align="center" style="margin-top:32px;">
                                            <div class="input-group row">
                                                <div class="col-12 col-lg-6">
                                                    <button class="btn btn-warning btn-block" name="btnEditarPasaje" value="btnEditarPasaje" type="submit"><i class="fas fa-lg fa-save fa-3x"></i></button>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <button class="btn btn-danger btn-block" id="btnCancelarEditarPasaje" type="button"><i class="fas fa-lg fa-times-circle fa-3x"></i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                        <hr>
                        <table id="tblPasaje" class="table table-striped dt-responsive">
                            <thead>
                                <th class="no-exportar">Opciones</th>
                                <th>Nombre</th>
                                <th>Departamento</th>
                                <th>Ida</th>
                                <th>Vuelta</th>
                                <th>Dia</th>
                                <th>Gastos</th>
                                <th>Semana</th>
                                <th>Mensual</th>
                                <th>Dias Extra</th>
                                <th>Inasistencias</th>
                                <th>Pagos</th>
                                <th>Monto por pagar</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </thead>
                            <tbody>
                                <?php
                                $pasajes = ControladorPasaje::ctrListarPasaje();
                                if ($pasajes) {
                                    foreach ($pasajes as $unpasaje) {
                                        echo "<tr>
                                                <td><button type='button' class='btn btn-s btn-warning btn-editar-pasaje' dataPasaje='" . json_encode($unpasaje) . "' ><i class='fas fa-pencil-alt'></i> </button></td>
                                                <td>{$unpasaje['nombrecompleto']}</td>
                                                <td>{$unpasaje['departamento']}</td>
                                                <td>{$unpasaje['ida']}</td>
                                                <td>{$unpasaje['vuelta']}</td>
                                                <td>{$unpasaje['dias']}</td>
                                                <td>{$unpasaje['gastos']}</td>
                                                <td>{$unpasaje['semana']}</td>
                                                <td>{$unpasaje['mensual']}</td>
                                                <td>{$unpasaje['diasextra']}</td>
                                                <td>{$unpasaje['diasmenos']}</td>
                                                <td>{$unpasaje['pagomedio']}</td>
                                                <td>{$unpasaje['totalpasaje']}</td>
                                                <td>{$unpasaje['fechacreacion']}</td>
                                                <td>{$unpasaje['estadopasaje']}</td>
                                            </tr>";
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <th class="no-exportar">Opciones</th>
                                <th>Nombre</th>
                                <th>Departamento</th>
                                <th>Ida</th>
                                <th>Vuelta</th>
                                <th>Dia</th>
                                <th>Gastos</th>
                                <th>Semana</th>
                                <th>Mensual</th>
                                <th>Dias Extra</th>
                                <th>Inasistencias</th>
                                <th>Pagos</th>
                                <th>Monto por pagar</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
