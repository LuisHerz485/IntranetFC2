<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Administración</a></li>
                        <li class="breadcrumb-item active">Check List Asignados</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Check List - Asignado</h3>
                    </div>
                    <div class="card-body panel-body">
                        <div class="container-fluid">
                            <form method=POST id="frmFiltroChecklistAsignado" class="row">
                                <div class="col-3">
                                    <label>Asignado por:</label>
                                    <select name="idasignador" id="idasignador" class="form-control select2" required>
                                        <?php
                                        if ($usuarios = ModeloUsuarios::mdlMostrarUsuariosNombre()) {
                                            foreach ($usuarios as $usuario) {
                                                echo '<option value="' . $usuario['idusuario'] . '" ' . ($_SESSION["idusuario"] == $usuario['idusuario'] ? "selected" : "") . '>' . $usuario['nombre'] . ' ' . $usuario['apellidos'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label>Seleccione Fecha Desde</label>
                                    <input type="date" class="form-control" name="fechadesde" id="fechadesde" required>
                                </div>
                                <div class="col-3">
                                    <label>Seleccione Fecha Hasta</label>
                                    <input type="date" class="form-control" name="fechahasta" id="fechahasta" required>
                                </div>
                                <div class="col-3">
                                    <label>Opciones</label>
                                    <button type="button" value="filtrar" class="btn btn-primary  btn-block" id="btnFiltrarChecklistAsignado" name="btnFiltrarChecklistAsignado"><i class="fas fa-search"></i> Filtrar</button>
                                </div>
                            </form>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <table id="mostrarCheckListAsignado" class="table table-striped tablaDataCheckListAsignado dt-responsive">
                                        <thead>
                                            <th class="no-exportar">Opciones</th>
                                            <th>Actividad</th>
                                            <th>Nombre Completo</th>
                                            <th>Fecha</th>
                                            <th>Hora Inicio</th>
                                            <th>Hora Fin</th>
                                            <th>Estado</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <th class="no-exportar">Opciones</th>
                                            <th>Actividad</th>
                                            <th>Nombre Completo</th>
                                            <th>Fecha</th>
                                            <th>Hora Inicio</th>
                                            <th>Hora Fin</th>
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
    </div>
</div>
<div class="modal fade" id="modalVerActividad" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title"><strong>Ver Actividad</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <textarea id="detalle2" name="detalle" class="form-control" rows="5" placeholder="Descripicion" disabled></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btnSalirVerActividad" type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>