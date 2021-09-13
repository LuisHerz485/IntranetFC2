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
    <!-- /.content-header -->
    <?php
    if (isset($_POST["btnEditarEstadoPermiso"])) {
        $respuesta = ControladorPermiso::ctrEditarEstado();
        if ($respuesta) {
            echo "<script>Swal.fire({
                title: 'Actualizado!',
                text: '¡Se actualizo correctamente el estado del permiso!',
                icon: 'success',
                confirmButtonText: 'Ok',
            });</script>";
        } else {
            echo "<script>Swal.fire({
                title: 'Error!',
                text: '¡No se pudo actualizar!',
                icon: 'error',
                confirmButtonText: 'Ok',
            });</script>";
        }
    }
    ?>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Permisos Pendientes&emsp;</h3>
                    </div>
                    <div class="card-body panel-body">
                        <form method=POST id="frmFiltroPermiso">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-3">
                                        <label>Seleccione estado de permiso</label>
                                        <select name="idestadopermiso" class="form-control select2">
                                            <option value="0">Todos</option>
                                            <?php
                                            $estadosPermisos = ModeloPermiso::mdlListarEstadosPermisos();
                                            if ($estadosPermisos) {
                                                foreach ($estadosPermisos as $estadoPermiso) {
                                                    echo '<option value="' . $estadoPermiso["idestadopermiso"] . '">' . $estadoPermiso["nombreestadopermiso"] . '</option>';
                                                }
                                            }
                                            ?>
                                            
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label>Seleccione Fecha Desde</label>
                                        <input type="date" class="form-control" name="fechadesde" id="fechadesde">
                                    </div>
                                    <div class="col-3">
                                        <label>Seleccione Fecha Hasta</label>
                                        <input type="date" class="form-control" name="fechahasta" id="fechahasta">
                                    </div>
                                    <div class="col-3">
                                        <label>Opciones</label>
                                        <button type="submit" value="filtrar" class="btn btn-primary  btn-block" id="btnFiltrar" name="btnFiltrar"><i class="fas fa-search"></i> Filtrar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="mt-3">
                            <table id="tblPermisosPendientes" class="table table-striped dt-responsive tablaDataPermisosPendientes">
                                <thead>
                                    <th>Estado</th>
                                    <th>Nombres y Apellidos</th>
                                    <th>Tipo Permiso</th>
                                    <th>Fecha Creacion</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Detalles</th>
                                    <th class="no-exportar">Ver mas</th>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_POST["btnFiltrar"])) {
                                        $permisos = ControladorPermiso::ctrFiltroPermiso();
                                    } else {
                                        $permisos = ModeloPermiso::mdlListarPermisos();
                                    }
                                    if (isset($permisos)) {
                                        foreach ($permisos as $permiso) {
                                            switch ($permiso['idestadopermiso']) {
                                                case "1":
                                                    echo '<tr><td><button class="btn btn-warning btn-xs btn-actualizar-estado-permiso" idpermiso="' . $permiso['idpermiso'] . '" idestadopermiso="1">' . $permiso['estadopermiso'] . '</button></td>';
                                                    break;
                                                case "2":
                                                    echo '<tr><td><button class="btn btn-success btn-xs btn-actualizar-estado-permiso" idpermiso="' . $permiso['idpermiso'] . '" idestadopermiso="2">' . $permiso['estadopermiso'] . '</button></td>';
                                                    break;
                                                case "3":
                                                    echo '<tr><td><button class="btn btn-danger btn-xs btn-actualizar-estado-permiso" idpermiso="' . $permiso['idpermiso'] . '" idestadopermiso="3">' . $permiso['estadopermiso'] . '</button></td>';
                                                    break;
                                                default:
                                                    break;
                                            }
                                            echo '<td>' . $permiso['nombre'] . ' ' . $permiso['apellidos'] . '</td>
                                                    <td>' . $permiso['tipopermiso'] . '</td>
                                                    <td>' . $permiso['fechacreacion'] . '</td>
                                                    <td>' . $permiso['fechainicio'] . '</td>
                                                    <td>' . $permiso['fechafin'] . '</td>
                                                    <td>' . $permiso['detalle'] . '</td>
                                                    <td> <button class="btn btn-secondary btn-mostrar-detalles" detalles="' . $permiso['detalle'] . '" fechainicio="' . $permiso['fechainicio'] . '" fechafin="' . $permiso['fechafin'] . '" ><i class="far fa-eye"></i></button></td> </tr>';
                                        }
                                    } else {
                                        echo "<script>Swal.fire({
                                            title: 'Advertencia!',
                                            text: '¡Campos mal Ingresados o Ningun resultado!',
                                            icon: 'warning',
                                            confirmButtonText: 'Ok',
                                          });</script>";
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <th>Estado</th>
                                    <th>Nombres y Apellidos</th>
                                    <th>Tipo Permiso</th>
                                    <th>Fecha Creacion</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Detalles</th>
                                    <th>Ver mas</th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Estado Pendiente -->
<div class="modal fade" id="modalPermisoCambio" role="dialog">
    <div class="modal-dialog">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Estado de Permiso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <input class="form-control" type="hidden" name="idpermiso" id="idpermiso">
                                <label>Seleccione tipo de estado:</label>
                                <select name="idestadopermiso" id="idestadopermiso" class="form-control select2">
                                    <?php
                                    if ($estadosPermisos) {
                                        foreach ($estadosPermisos as $estadoPermiso) {
                                            echo '<option value="' . $estadoPermiso["idestadopermiso"] . '">' . $estadoPermiso["nombreestadopermiso"] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Salir</button>
                            </div>
                            <div class="col">
                                <button type="submit" value="btnEditarEstadoPermiso" class="btn btn-primary btn-block" name="btnEditarEstadoPermiso">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal ver detalles del permiso -->
<div class="modal fade" id="modalPermisoDetalles" role="dialog">
    <div class="modal-dialog">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles del Permiso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-6">
                                <label>Fecha Inicio:</label>
                                <input type="datetime-local" class="form-control" name="fechainicio" id="fechainicio" disabled>
                            </div>
                            <div class="col-6">
                                <label>Fecha Fin:</label>
                                <input type="datetime-local" class="form-control" name="fechafin" id="fechafin" disabled>
                            </div>
                            <div class="col-12">
                                <label>Detalle (Tamaño Max. 500):</label>
                                <textarea name="detalle" class="form-control" id="detalle" rows="3" disabled></textarea>
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