<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Obligaciones Mensuales</a></li>
                        <li class="breadcrumb-item active">Registro de Declaraciones</li>
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
                        <b class="h4">Registro de Declaraciones</b>
                    </div>
                    <div class="card-body panel-body">
                        <div class="container-fluid">
                            <form id="fomularioFiltroDeclaracion">
                                <div class="row">
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
                <h4 class="modal-title text-red"><strong>Fecha declara cliente</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form id="formEditarDeclaracionSunat">
                        <div class="row">
                            <input type="hidden" name="iddeclaracionS" id="iddeclaracionS">
                            <input type="hidden" name="fechavencimiento" id="fechavencimiento">
                            <div class="col-12">
                                <label>Ingrese fecha en la que se declaro en SUNAT</label>
                                <input type="date" name="fechadeclarada" class="form-control" id="fechadeclarada">
                            </div>
                            <div class="col-12">
                                <label>Numero de Orden:</label>
                                <input type="number" name="numOrden" maxlength="20" class="form-control" id="numOrden" required>
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