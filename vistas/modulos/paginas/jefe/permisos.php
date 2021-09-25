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
                        <li class="breadcrumb-item"><a href="#">Administración de Permisos</a></li>
                        <li class="breadcrumb-item active">Permisos</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <?php
    if (isset($_POST["btnRegistrarPermiso"])) {
        if (ControladorPermiso::ctrRegistrarPermiso()) {
            echo "<script>Swal.fire({
                title: 'Registrado!',
                text: '¡Se Registro el Permiso correctamente!',
                icon: 'success',
                confirmButtonText: 'Ok',
              })</script>";
        } else {
            echo "<script>Swal.fire({
                title: 'Error!',
                text: '¡No se pudo Registrar el Permiso!',
                icon: 'error',
                confirmButtonText: 'Ok',
              })</script>";
        }
    } else if (isset($_POST["btnEditarPermiso"])) {
        if (ControladorPermiso::ctrEditarPermiso()) {
            echo "<script>Swal.fire({
                title: 'Editado!',
                text: '¡Se Edito el Permiso correctamente!',
                icon: 'success',
                confirmButtonText: 'Ok',
              })</script>";
        } else {
            echo "<script>Swal.fire({
                title: 'Error!',
                text: '¡No se pudo Editar el Permiso!',
                icon: 'error',
                confirmButtonText: 'Ok',
              })</script>";
        }
    }
    ?>
    <!-- /.content-header -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary" id="form">
                    <div class="card-header">
                        <h3 class="card-title">Permisos&emsp;</h3>
                    </div>
                    <div class="card-body panel-body">
                        <form method="POST" id="frmRegistrarPermiso" class="container-fluid" enctype="multipart/form-data">
                            <div class="row">
                                <input class="form-control" type="hidden" name="idusuario" id="idusuario" value="<?php echo $_SESSION['idusuario']; ?>">
                                <input class="form-control" type="hidden" name="idpermiso" id="idpermiso">
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Seleccione tipo de permiso:</label>
                                    <select name="idtipopermiso" id="idtipopermiso" class="form-control select2" required>
                                        <?php
                                        $tiposPermiso = ModeloPermiso::mdlListarTiposPermisos();
                                        if ($tiposPermiso) {
                                            foreach ($tiposPermiso as $tipoPermiso) {
                                                echo '<option value="' . $tipoPermiso["idtipopermiso"] . '">' . $tipoPermiso["nombrepermiso"] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Fecha Inicio:</label>
                                    <input type="datetime-local" class="form-control" name="fechainicio" id="fechainicio" required>
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Fecha Fin:</label>
                                    <input type="datetime-local" class="form-control" name="fechafin" id="fechafin" required>
                                </div>
                                <div class="form-group col-lg-9 col-md-9 col-sm-6 col-xs-12">
                                    <label>Detalle (Tamaño Max. 500):</label>
                                    <textarea name="detalle" class="form-control" id="detalle" rows="3" minlength="10" maxlength="500" required></textarea>
                                </div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <label> Opciones </label>
                                    <div class="container-fluid" id="opcionesRegistrarPermiso">
                                        <div class="input-group row">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block" name="btnRegistrarPermiso" value="btnRegistrarPermiso" type="submit"><i class="fas fa-lg fa-save"></i> Registrar</button>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <button class="btn btn-secondary btn-block" id="btnLimpiarFormPermiso" type="button"><i class="fas fa-lg fa-broom"></i> Limpiar</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container-fluid d-none" id="opcionesEditarPermiso">
                                        <div class="input-group row">
                                            <div class="col-12">
                                                <button class="btn btn-success btn-block" name="btnEditarPermiso" value="btnEditarPermiso" type="submit"><i class="fas fa-lg fa-save"></i> Editar</button>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <button class="btn btn-danger btn-block" id="btnCancelarEditarPermiso" type="button"><i class="fas fa-lg fa-times-circle"></i> Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-9 col-md-9 col-sm-6 col-xs-12">
                                    <label>Subir Evidencia (opcional)</label>
                                    <input type="file" class="form-control" name="evidenciaPermiso">
                                </div>
                            </div>
                        </form>
                        <br />
                        <div>
                            <table id="tablaPermisos" class="table table-striped tablaDataPermisos dt-responsive">
                                <thead>
                                    <th class="no-exportar">id</th>
                                    <th class="no-exportar">idTipoPermiso</th>
                                    <th class="no-exportar">Opciones</th>
                                    <th>Estado</th>
                                    <th>Tipo Permiso</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Detalle</th>
                                    <th>Observacion</th>
                                    <th class="no-exportar">Ver mas</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $permisos = ModeloPermiso::mdlListarPermisosxUsuarios($_SESSION["idusuario"]);
                                    if ($permisos) {
                                        foreach ($permisos as $permiso) {
                                            echo '<tr> 
                                        <td>' . $permiso['idpermiso'] . '</td>  
                                        <td>' . $permiso['idtipopermiso'] . '</td>';
                                            if ($permiso['idestadopermiso'] != 1) {
                                                echo '<td><button href="#form" class="btn btn-s btn-warning btn-editar-permiso" idpermiso="' . $permiso["idpermiso"] . '" disabled><i class="fas fa-pencil-alt"></i> </button></td>';
                                            } else {
                                                echo '<td><a href="#form" class="btn btn-s btn-warning btn-editar-permiso" idpermiso="' . $permiso["idpermiso"] . '"><i class="fas fa-pencil-alt"></i> </a></td>';
                                            }

                                            if ($permiso['idestadopermiso'] == "1") {
                                                echo '<td><h4><span class="badge badge-warning">Pendiente</h4></td>';
                                            } else if ($permiso['idestadopermiso'] == "2") {
                                                echo '<td><h4><span class="badge badge-success">Aprobado</h4></td>';
                                            } else if ($permiso['idestadopermiso'] == "3") {
                                                echo '<td><h4><span class="badge badge-danger">No Aprobado</h4></td>';
                                            }
                                            echo '<td>' . $permiso['tipopermiso'] . ' </td>
                                        <td>' . $permiso['fechainicio'] . '</td>
                                        <td>' . $permiso['fechafin'] . '</td>
                                        <td>' . $permiso['detalle'] . '</td>
                                        <td>' . $permiso['observacion'] . '</td>
                                        <td> <button class="btn btn-secondary btn-mostrar-detalle" detalles="' . $permiso['detalle'] . '" observacion="' . $permiso['observacion'] . '" ><i class="far fa-eye"></i></button></td> 
                                        </tr>';
                                        }
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <th class="no-exportar">id</th>
                                    <th class="no-exportar">idTipoPermiso</th>
                                    <th class="no-exportar">Opciones</th>
                                    <th>Estado</th>
                                    <th>Tipo Permiso</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Detalle</th>
                                    <th>Observacion</th>
                                    <th class="no-exportar">Ver mas</th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de solo el detalle del permiso -->
<div class="modal fade" id="modalPermisoDetalle" role="dialog">
    <div class="modal-dialog">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalle del Permiso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-12">
                                <label>Detalle (Tamaño Max. 500):</label>
                                <textarea name="detalle2" class="form-control" id="detalle2" rows="5" disabled></textarea>
                            </div>
                            <div class="col-12">
                                <label>Observacion:</label>
                                <textarea name="observacion2" class="form-control" id="observacion2" rows="3" disabled></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Salir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>