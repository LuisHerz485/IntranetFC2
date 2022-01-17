<script>
    const canEdit = <?php echo in_array($_SESSION["idusuario"], [16, 29, 71, 137]) || $_SESSION["iddepartamento"] == 7 ? "true" : "false" ?>;
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
                        <li class="breadcrumb-item h5"><a href="#"><b class="text-red">Liquidaciones de Impuestos</b></a></li>
                        <li class="breadcrumb-item active h5">Lista de Liquidaciones</li></b>
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
                            <b class="h4" style="color: white; font-size: 27px;">Liquidaciones Impuesto SUNAT</b>
                            <div class="col" align="right">
                                <abbr title="Ayuda"><button class="btn btn-warning btn-circle" data-toggle="modal" data-target="#modalAyuda"><i class="fas fa-question-circle"></i></button></abbr>
                            </div>
                        </div>
                    </div>
                    <div class="card-body panel-body">
                        <div class="container-fluid">
                            <form id="frmliquidacionesFiltrar" method="POST">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row justify-content-center">
                                            <div class="col-12 col-md-4 col-lg-4 col-xl-3">
                                                <label>Seleccione Periodo:</label>
                                                <input type="month" name="mesyanyo" id="mesyanyo" class="form-control">
                                            </div>
                                            <div class="col-12 col-md-4 col-lg-4 col-xl-3">
                                                <label>Opcion:</label>
                                                <button id="btnBuscarLiquidaciones" type="button" class="btn btn-outline-danger btn-block">Buscar</button>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                    <div class="col-12">
                                        <div class="card ">
                                            <div class="card-body panel-body">
                                                <table id="tablaLiquidaciones" class="table table-striped dt-responsive tablaDataLiquidacionesGeneral">
                                                    <thead style="background-color:lightgray; font-size: 20px;">
                                                        <th class="no-exportar">Opciones</th>
                                                        <th>Cliente</th>
                                                        <th>Importe a Pagar</th>
                                                        <th>Renta a Pagar</th>
                                                        <th>Regimen</th>
                                                        <th>Periodo</th>
                                                        <th>Fecha Vencimiento</th>
                                                        <th>Revisor</th>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                    <tfoot style="background-color:lightgray; font-size: 20px;">
                                                        <th class="no-exportar">Opciones</th>
                                                        <th>Cliente</th>
                                                        <th>Importe a Pagar</th>
                                                        <th>Renta a Pagar</th>
                                                        <th>Regimen</th>
                                                        <th>Periodo</th>
                                                        <th>Fecha Vencimiento</th>
                                                        <th>Revisor</th>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>