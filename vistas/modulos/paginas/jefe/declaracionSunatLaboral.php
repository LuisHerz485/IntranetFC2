<script>
    const canEdit = <?php echo in_array($_SESSION["idusuario"], [16, 29, 71]) || $_SESSION["iddepartamento"] == 7 ? "true" : "false" ?>;
</script>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item h5"><a href="#"><b class="text-red">Obligaciones Mensuales</b></a></li>
                        <li class="breadcrumb-item active h5">Registro de Declaraciones</li></b>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div class="card-header" style="background-color: rgb(204,0,0);">
                        <div class="row">
                            <b class="h4" style="color: white; font-size: 27px;">Registro de Declaraciones Mensuales Laboral</b>
                            <div class="col" align="right">
                                <abbr title="Ayuda"><button class="btn btn-warning btn-circle" data-toggle="modal" data-target="#modalAyuda"><i class="fas fa-question-circle"></i></button></abbr>
                            </div>
                        </div>
                    </div>
                    <div class="card-body panel-body">
                        <div class="container-fluid">
                            <form id="fomularioFiltroDeclaracion">
                                <div class="row">
                                    <input type="hidden" name="idtipodeclaracion" id="idtipodeclaracion" value="2">
                                    <div class="col-12 col-lg-3">
                                        <label>Seleccione Mes</label>
                                        <input type="month" class="form-control" name="mesanyo" id="mesanyo">
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <label>Seleccione Estado:</label>
                                        <select name="idestadodeclaracion" id="idestadodeclaracion" class="form-control select2" required>
                                            <option value="0">Todos
                                                <?php
                                                $estados = ModeloDeclaracionSunat::mdllistarEstadosDeclaracion();
                                                if ($estados) {
                                                    foreach ($estados as $estado) {
                                                        echo '<option value="' . $estado["idestadodeclaracion"] . '">' . $estado["estado"] . '</option>';
                                                    }
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <label>Opcion:</label>
                                        <button type="button" class="btn btn-outline-danger  btn-block" id="btnfiltrar" name="btnfiltrar"><i class="fas fa-search"></i> Filtrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="mt-3">
                            <table id="tblDeclaracionSunat" class="table table-striped dt-responsive tablaDataDeclaracionSunat">
                                <thead>
                                    <th class="no-exportar">Opciones</th>
                                    <th>Ruc</th>
                                    <th>Clientes </th>
                                    <th>Fecha Vencimiento</th>
                                    <th>Estado</th>
                                    <th>fechaDeclarada</th>
                                    <th>N° de orden</th>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <th class="no-exportar">Opciones</th>
                                    <th>Ruc</th>
                                    <th>Clientes </th>
                                    <th>Fecha Vencimiento</th>
                                    <th>Estado</th>
                                    <th>fechaDeclarada</th>
                                    <th>N° de orden</th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalFechaDeclara" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title text-red"><strong>Fecha declaracion cliente</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form id="formRegistrarDeclaracionSunat">
                        <div class="row">
                            <input type="hidden" name="idtipodeclaracion" id="idtipodeclaracion" value="2">
                            <input type="hidden" name="iddeclaracionS" id="iddeclaracionS">
                            <input type="hidden" name="fechavencimiento" id="fechavencimiento">
                            <div class="col-12">
                                <label>Ingrese fecha en la que se declaro en SUNAT</label>
                                <input type="date" name="fechadeclarada" class="form-control">
                            </div>
                            <div class="col-12">
                                <label>Numero de Orden:</label>
                                <input type="number" name="numOrden" maxlength="20" class="form-control" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" id="btnRegistrarDeclaracion"><i class="fas fa-save"></i> Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Salir</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditarDeclara" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title text-red"><strong>Editar declaracion</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form id="formEditarDeclaracionSunat">
                        <div class="row">
                            <input type="hidden" name="idtipodeclaracion" id="idtipodeclaracionEditar" value="2">
                            <input type="hidden" name="iddetalledeclaracion" id="iddetalledeclaracionEditar">
                            <input type="hidden" name="iddeclaracionS" id="iddeclaracionEditar">
                            <input type="hidden" name="fechavencimiento" id="fechavencimientoEditar">
                            <div class="col-12">
                                <label>Ingrese fecha en la que se declaro en SUNAT</label>
                                <input type="date" name="fechadeclarada" class="form-control" id="fechadeclaradaEditar">
                            </div>
                            <div class="col-12">
                                <label>Numero de Orden:</label>
                                <input type="number" name="numOrden" maxlength="20" class="form-control" id="numOrdenEditar" required>
                            </div>
                            <div class="col-12">
                                <label>Seleccione un estado</label>
                                <select name="idestado" id="idestadoEditar" class="form-control select2" required>
                                    <?php
                                    if ($estados) {
                                        foreach ($estados as $estado) {
                                            echo '<option value="' . $estado["idestadodeclaracion"] . '">' . $estado["estado"] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" id="btnEditarDeclaracion"><i class="fas fa-save"></i> Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Salir</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalAyuda" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title text-yellow"><strong>Sección Ayuda <i class="far fa-question-circle"></i></strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <strong class="">Bienvenido a la sección ayuda de "Registro Declaraciones"</strong>
                            <ul>
                                <li>Esta sección le brindará información sobre como ingresar la fecha en la que se declara en cada empresa. </li>
                                <ol type="I">
                                    <li> Se debe realizar el primer filtro seleccionando el mes que se quiere declarar(obligatorio).</li>
                                    <li> El segundo filtro es para ver los estados de declaración (opcional).</li>
                                    <li> Se debe seleccionar la opción "Filtrar" para que se liste en la tabla los clientes.</li>
                                    <li> Cada empresa mostrada en la tabla (filtrada por mes) tiene en la columna "opciones" un botón: <span class="border m-1"><i class="far fa-calendar-check"></i></span> el cual se debe selccionar para declarar la fecha.</li>
                                    <li> Se abrirá una ventana emergente el cual deberá llenar el campo de fecha y el número de orden.</li>
                                    <li> Luego seleccina el botón "Guardar"<b class="text-red">*</b>.</li>
                                </ol><br>
                                <b class="text-red">* Importante uan vez que guarde, ya no podrá editar la fecha ni el número de orden.</b>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-yellow" al>
                <b><i class="fas fa-info-circle"></i> Para más orientación ir a la sección "Ayuda" del menú principal</b>
            </div>
        </div>
    </div>
</div>