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
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <b class="h4">Planilla - Registro</b>
                    </div>
                    <div class="card-body panel-body" id="formularioCheckListColaborador">
                        <form method=POST id="frmFiltroChecklist">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <input class="form-control" type="hidden" name="idplanilla" placeholder="idplanilla" required>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label>Seleccione el Colaborador:</label>
                                        <select name="idusuario" class="form-control select2" required>
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
                                        <input class="form-control" type="hidden" name="idestadoplanilla" value="<?php echo $_SESSION["idusuario"]; ?>">
                                        <label>Seleccione el estado de planilla:</label>
                                        <select name="idestadochecklist" id="idestadochecklist" class="form-control select2" required>
                                            <option value="0">Todos</option>
                                            <?php
                                            $estadosChecklist = ChecklistModelo::mdlListarEstadoCheckList();
                                            if ($estadosChecklist) {
                                                foreach ($estadosChecklist as $estadoChecklist) {
                                                    echo '<option value="' . $estadoChecklist["idestadochecklist"] . '">' . $estadoChecklist["nombre"] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label>Registre su honorario:</label>
                                        <input class="form-control" type="number" name="honorario" required>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label>Registre su Remuneración Diaria:</label>
                                        <input class="form-control" type="number" name="remuneraciondiaria" placeholder="" required>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label>Registre su Remuneración Mensual:</label>
                                        <input class="form-control" type="number" name="remuneracionmensual" placeholder="" required>
                                    </div>

                                    <div class="col-12 col-lg-3">
                                        <label>Seleccione su fecha de ingreso:</label>
                                        <input type="date" class="form-control" name="fechadesde" id="fechadesde" required>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <label>Seleccione su fecha de fin:</label>
                                        <input type="date" class="form-control" name="fechahasta" id="fechahasta" required>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="container-fluid d-none" id="opcionesRegistrarPermiso" align="center" style="margin-top:32px;">
                                            <div class="input-group row">
                                                <div class="col-12 col-lg-6">
                                                    <button class="btn btn-primary btn-block" name="btnRegistrarPermiso" value="btnRegistrarPermiso" type="submit"><i class="fas fa-lg fa-save"></i> Registrar</button>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <button class="btn btn-secondary btn-block" id="btnLimpiarFormPermiso" type="button"><i class="fas fa-lg fa-broom"></i> Limpiar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid" id="opcionesEditarPermiso" align="center" style="margin-top:32px;">
                                            <div class="input-group row">
                                                <div class="col-12 col-lg-6">
                                                    <button class="btn btn-success btn-block" name="btnEditarPermiso" value="btnEditarPermiso" type="submit"><i class="fas fa-lg fa-save"></i> Editar</button>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <button class="btn btn-danger btn-block" id="btnCancelarEditarPermiso" type="button"><i class="fas fa-lg fa-times-circle"></i> Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                        <hr>
                        <table id="mostrarPlanilla" class="table table-striped tablaDataPlanilla dt-responsive">
                            <thead>
                                <th class="no-exportar">Opciones</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Remuneración Mensual</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <th class="no-exportar">Opciones</th>
                                <th>Nombre</th>
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