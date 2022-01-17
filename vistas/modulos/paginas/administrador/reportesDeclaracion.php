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
                        <li class="breadcrumb-item active h5">Reporte de Declaraciones</li></b>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div class="card-header" style="background-color: rgb(204,0,0);>
                        <div class="row">
                            <b class="h4" style="color: white; font-size: 27px;">Reporte de Declaraciones Mensuales</b>
                        </div>
                    </div>
                    <div class="card-body panel-body">
                        <div class="container-fluid">
                            <form id="fomularioFiltroDeclaracionClientes">
                                <div class="row">
                                    <div class="col-12 col-lg-2">
                                        <label>Seleccione Año</label>
                                        <select id="anyo" name="anyo" class="form-control select2">
                                            <?php $cont = date('Y');
                                            while ($cont >= 2020) { ?>
                                                <option><?php echo ($cont); ?></option>
                                            <?php $cont = ($cont - 1);
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <label>Seleccione Clientes:</label>
                                        <select name="idcliente" id="idcliente" class="form-control select2" required>
                                            <?php
                                            $clientes = ModeloClientes::mdlMostrarClientes("cliente", null, null);
                                            if ($clientes) {
                                                foreach ($clientes as $cliente) {
                                                    echo '<option value="' . $cliente["idcliente"] . '">' . $cliente["razonsocial"] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <label>Seleccione Tipo Declaracion</label>
                                        <select id="idtipodeclaracion" name="idtipodeclaracion" class="form-control select2">
                                            <option value="1">TRIBUTARIA</option>
                                            <option value="2">LABORAL</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <label>Opcion:</label>
                                        <button type="button" class="btn btn-outline-danger  btn-block" id="btnfiltrarCliente" name="btnfiltrarCliente"><i class="fas fa-search"></i> Filtrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="mt-3">
                            <table id="tblReporteDeclaracionSunat" class="table table-striped dt-responsive tablaDataReporteDeclaracionSunat">
                                <thead style="background-color:lightgray; font-size: 20px;">
                                    <th>Mes</th>
                                    <th>Fecha de Vencimiento </th>
                                    <th>Estado</th>
                                    <th>Fecha Declarada</th>
                                    <th>N° de orden</th>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot style="background-color:lightgray; font-size: 20px;">
                                    <th>Mes</th>
                                    <th>Fecha de Vencimiento </th>
                                    <th>Estado</th>
                                    <th>Fecha Declarada</th>
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