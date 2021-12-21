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
    if (isset($_POST["btnRegistrarCumpleanos"])) {
        if (ControladorCumpleanos::ctrRegistrarCumpleanos()) {
            echo "<script>Swal.fire({
                    title: 'Registrado!',
                    text: '¡Se Registro el Cumpleaños correctamente!',
                    icon: 'success',
                    confirmButtonText: 'Ok',
                })</script>";
        } else {
            echo "<script>Swal.fire({
                    title: 'Error!',
                    text: '¡No se pudo registrar el Cumpleaños!',
                    icon: 'error',
                    confirmButtonText: 'Ok',
                })</script>";
        }
    } else if (isset($_POST["btnEditarCumpleanos"])) {
        if (ControladorCumpleanos::ctrEditarCumpleanos()) {
            echo "<script>Swal.fire({
                    title: 'Editado!',
                    text: '¡Se Edito el Cumpleaños correctamente!',
                    icon: 'success',
                    confirmButtonText: 'Ok',
                })</script>";
        } else {
            echo "<script>Swal.fire({
                    title: 'Error!',
                    text: '¡No se pudo editar el Cumpleaños!',
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
                        <form method="POST" id="frmCumpleanos" enctype="multipart/form-data">
                            <div class="container-fluid">
                                <div class="row">
                                <div class="col-12 col-lg-3">
                                        <label>Seleccione el colaborador:</label>
                                        <input class="form-control" type="hidden" name="idcumpleanos" id="idcumpleanos" placeholder="idcumpleanos">
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
                                    <div class="col-12 col-lg-2">
                                        <label>Seleccione Fecha de Cumpleaños</label>
                                        <input type="date" class="form-control" name="fechacumple" id="fechacumple">
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="container-fluid" id="opcionesRegistrarCumpleanos" align="center" style="margin-top:32px;">
                                            <div class="input-group row">
                                                <div class="col-12 col-lg-6">
                                                    <button class="btn btn-success btn-lg btn-block" name="btnRegistrarCumpleanos" value="btnRegistrarCumpleanos" type="submit"><i class="fas fa-lg fa-save fa-3x"></i></button>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <button class="btn btn-secondary btn-lg btn-block" id="btnLimpiarFormCumpleanos" type="button"><i class="fas fa-lg fa-broom fa-3x"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid d-none" id="opcionesEditarCumpleanos" align="center" style="margin-top:32px;">
                                            <div class="input-group row">
                                                <div class="col-12 col-lg-6">
                                                    <button class="btn btn-warning btn-block" name="btnEditarCumpleanos" value="btnEditarCumpleanos" type="submit"><i class="fas fa-lg fa-save fa-3x"></i></button>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <button class="btn btn-danger btn-block" id="btnCancelarEditarCumpleanos" type="button"><i class="fas fa-lg fa-times-circle fa-3x"></i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                        <hr>
                        <table id="tblCumpleanos" class="table table-striped dt-responsive">
                            <thead>
                                <th class="no-exportar">Opciones</th>
                                <th>Nombre</th>
                                <th>Fecha Cumpleaños</th>
                                <th class="no-exportar">Imagen</th>
                            </thead>
                            <tbody>
                                <?php
                                $cumpleanos = ControladorCumpleanos::ctrListarCumpleanos();
                                if ($cumpleanos) {
                                    foreach ($cumpleanos as $uncumpleanos) {
                                        echo 
                                       '<td>' . "<button type='button' class='btn btn-s btn-warning btn-editar-cumpleanos' dataCumpleanos='" . json_encode($uncumpleanos) . "' ><i class='fas fa-pencil-alt'></i> </button>" . '</td>
                                        <td>' . $uncumpleanos['nombrecompleto'] . '</td>
                                        <td>' . $uncumpleanos['fechacumple'] . '</td>';
                                        if ($uncumpleanos["imagen"] != "") {
                                            echo '<td><img src="' . $uncumpleanos['imagen'] . '" width="50px"></td>';
                                        } else {
                                            echo '<td><img src="vistas/dist/img/avatar.png" width="50px"></td>';
                                        }
                                        echo '</tr>';
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <th class="no-exportar">Opciones</th>
                                <th>Nombre</th>
                                <th>Fecha Cumpleaños</th>
                                <th class="no-exportar">Imagen</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
