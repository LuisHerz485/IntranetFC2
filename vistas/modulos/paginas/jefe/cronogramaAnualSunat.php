<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item h5"><a href="#"><b class="text-red">Cronograma Sunat</b></a></li>
                        <li class="breadcrumb-item active h5">Cronograma Anual</li></b>
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
                        <b class="h4">Consultar Cronograma Anual</b>
                    </div>
                    <div class="card-body panel-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-lg-3">
                                    <label>Seleccione Año</label>
                                    <select id="idAnual" name="idAnual" class="form-control select2">
                                        <?php $cont = date('Y');
                                        while ($cont >= 2020) { ?>
                                            <option><?php echo ($cont); ?></option>
                                        <?php $cont = ($cont - 1);
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label>Opcion:</label>
                                    <button type="button" class="btn btn-outline-danger  btn-block" id="btnbuscarAnio" name="btnbuscaraAnio"><i class="fas fa-search"></i> Buscar</button>
                                </div>
                            </div>

                        </div>
                        <div class="mt-3">
                            <table id="tblCronogramaAnualSunat" class="container table table-striped dt-responsive tablaDataCronogramaAnual">
                                <thead>
                                    <tr>
                                        <th>ULTIMO DÍGITO DEL RUC</th>
                                        <th>FECHA DE VENCIMIENTO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ULTIMO DÍGITO DEL RUC</th>
                                        <th>FECHA DE VENCIMIENTO</th>
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