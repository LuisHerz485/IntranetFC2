<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Cronograma Sunat</a></li>
                        <li class="breadcrumb-item active">Ver Cronograma</li>
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
                        <b class="h4">Consultar Cronograma</b>
                    </div>
                    <div class="card-body panel-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-lg-3">
                                    <label>Seleccione Año</label>
                                    <select id="idano" name="idano" class="form-control select2">
                                        <?php $cont = date('Y');
                                        while ($cont >= 2020) { ?>
                                            <option><?php echo ($cont); ?></option>
                                        <?php $cont = ($cont - 1);
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label>Opcion:</label>
                                    <button type="button" class="btn btn-outline-danger  btn-block" id="btnbuscar" name="btnbuscar"><i class="fas fa-search"></i> Buscar</button>
                                </div>
                            </div>

                        </div>
                        <div class="mt-3">
                            <table id="tblCronogramaSunat" class="table table-striped dt-responsive tablaDataCronogramaSunat">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Mes</th>
                                        <th colspan="6">FECHA DE VENCIMIENTO SEGÚN EL ULTIMO DIGITO DEL RUC</th>
                                    </tr>
                                    <tr>
                                        <th>Ruc 0</th>
                                        <th>Ruc 1</th>
                                        <th>Ruc 2 y 3</th>
                                        <th>Ruc 4 y 5</th>
                                        <th>Ruc 6 y 7</th>
                                        <th>Ruc 8 y 9</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Mes</th>
                                        <th>Ruc 0</th>
                                        <th>Ruc 1</th>
                                        <th>Ruc 2 y 3</th>
                                        <th>Ruc 4 y 5</th>
                                        <th>Ruc 6 y 7</th>
                                        <th>Ruc 8 y 9</th>
                                    </tr>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>