<script>
    window.idliquidacion_recibido = <?php echo $_POST["id_liquidacion"] ?? "false"; ?>;
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
                        <li class="breadcrumb-item h5"><a href="#"><b class="text-red">Liquidacionde Impuestos</b></a></li>
                        <li class="breadcrumb-item active h5">Registro de Liquidaciones</li></b>
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
                            <form id="frmliquidaciones" method="POST" action="ajax/generarLiquidacionPDF.php" enctype="multipart/form-data" target="_blank">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row justify-content-center">
                                            <div class="col-12 col-md-4 col-lg-4 col-xl-3">
                                                <input type="hidden" name="id_liquidacion" id="idliquidacion">
                                                <label>Seleccione Periodo:</label>
                                                <input type="month" name="periodo" id="periodo" class="form-control buscar-meses-anteriores">
                                            </div>
                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                                <label>Seleccione Clientes:</label>
                                                <input type="hidden" name="id_elaborador" value="<?php echo $_SESSION["idusuario"]; ?>">
                                                <input type="hidden" name="elaborador" id="elaborador">
                                                <input type="hidden" name="revisor" id="revisor">
                                                <input type="hidden" name="razonsocial" id="razonsocial">
                                                <input type="hidden" name="ruc" id="ruc">
                                                <select name="idcliente" id="idcliente_liquidacion" class="form-control select2 buscar-meses-anteriores" required>
                                                    <?php
                                                    $clientes = ModeloClientes::mdlMostrarClienteParaLiquidacion();
                                                    if ($clientes) {
                                                        foreach ($clientes as $cliente) {
                                                            echo '<option nombreregimen="' . $cliente["nombreregimen"] . '" coeficiente="' . $cliente["coeficiente"] . '" idregimen="' . $cliente["idregimen"] . '" value="' . $cliente["idcliente"] . '">' . $cliente["razonsocial"] . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-4 col-lg-4 col-xl-3">
                                                <label>Fecha Vencimiento:</label>
                                                <input type="date" name="fechavencimiento" id="fechavencimiento" class="form-control" required>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                    <div class="col-12 col-xl-6">
                                        <div class="card card-secondary">
                                            <div class="card-header text-center">
                                                <b class="h4">INGRESO</b>
                                            </div>
                                            <div class="card-body panel-body">
                                                <table>
                                                    <thead>
                                                        <th>Nombres</th>
                                                        <th>Base</th>
                                                        <th>IGV</th>
                                                        <th>Total</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td> VENTAS NETAS</td>
                                                            <td> <input type="number" name="ventas_netas" id="ventas_netas" class="form-control text-center  " value="0" required></td>
                                                            <td> <input type="text" name="ventas_netas_igv" id="ventas_netas_igv" class="form-control text-center" value="0" readonly></td>
                                                            <td> <input type="text" name="ventas_netas_total" id="ventas_netas_total" class="form-control text-center" value="0" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VENTAS NO GRAVADAS</td>
                                                            <td> <input type="number" name="ventas_no_gravadas" id="ventas_no_gravadas" class="form-control text-center" value="0" required></td>
                                                            <td></td>
                                                            <td> <input type="text" name="ventas_no_gravadas_total" id="ventas_no_gravadas_total" class="form-control text-center" value="0" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>EXPORTACIONES FACTURADAS EN EL PERIODO</td>
                                                            <td> <input type="number" name="exportaciones_facturada" id="exportaciones_facturada" class="form-control text-center" value="0" required></td>
                                                            <td> </td>
                                                            <td> <input type="text" name="exportaciones_facturada_total" id="exportaciones_facturada_total" class="form-control text-center" value="0" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>EXPORTACIONES EMBARCADAS EN EL PERIODO</td>
                                                            <td> <input type="number" name="exportaciones_embarcadas" id="exportaciones_embarcadas" class="form-control text-center" value="0" required></td>
                                                            <td> </td>
                                                            <td> <input type="text" name="exportaciones_embarcadas_total" id="exportaciones_embarcadas_total" class="form-control text-center" value="0" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>NOTAS DE DEBITO</td>
                                                            <td> <input type="number" name="nota_debito" id="nota_debito" class="form-control text-center  " value="0" required></td>
                                                            <td> <input type="text" name="nota_debito_igv" id="nota_debito_igv" class="form-control text-center" value="0" readonly></td>
                                                            <td> <input type="text" name="nota_debito_total" id="nota_debito_total" class="form-control text-center" value="0" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>TOTAL INGRESOS</td>
                                                            <td> <input type="text" name="ingreso_bruto" id="ingreso_bruto" class="form-control bg-warning text-center" value="0" readonly></td>
                                                            <td> <input type="text" name="ingreso_bruto_igv" id="ingreso_bruto_igv" class="form-control text-center bg-warning" value="0" readonly></td>
                                                            <td> <input type="text" name="ingreso_bruto_total" id="ingreso_bruto_total" class="form-control text-center  bg-warning" value="0" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>NOTAS DE CREDITO</td>
                                                            <td> <input type="number" name="nota_credito" id="nota_credito" class="form-control text-center" value="0" required></td>
                                                            <td> <input type="text" name="nota_credito_igv" id="nota_credito_igv" class="form-control text-center" value="0" readonly></td>
                                                            <td> <input type="text" name="nota_credito_total" id="nota_credito_total" class="form-control text-center" value="0" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>INGRESO NETO</td>
                                                            <td> <input type="text" name="ingreso_neto" id="ingreso_neto" class="form-control text-center bg-success" value="0" readonly></td>
                                                            <td> <input type="text" name="ingreso_neto_igv" id="ingreso_neto_igv" class="form-control text-center bg-success" value="0" readonly></td>
                                                            <td>
                                                                <input type="hidden" name="ingreso_neto_total" id="ingreso_neto_total" value="0">
                                                                <input type="text" id="ingreso_neto_formato" class="form-control text-center bg-success" value="S./ 0" readonly>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-6 pt-xl-0 pt-5">
                                        <div class="card card-secondary ">
                                            <div class="card-header text-center">
                                                <b class="h4">IMPUESTO A LA RENTA</b>
                                            </div>
                                            <div class="card-body panel-body">
                                                <input type="hidden" id="idregimen" name="idregimen" />
                                                <input type="hidden" id="nombreregimen" name="nombreregimen" />
                                                <span> Regimen: <b id="nombreregimen_text">
                                                        < Escoja un cliente>
                                                    </b></span>
                                                <hr>
                                                <table>
                                                    <thead>
                                                        <th>Nombres</th>
                                                        <th>TOTAL</th>
                                                        <th>PORCENTAJE</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>INGRESOS NETOS</td>
                                                            <td> <input type="text" name="ingresos_netos" id="ingresos_netos" class="form-control text-center" value="0" readonly></td>
                                                            <td> <input type="number" name="coeficiente" id="coeficiente" value="0" class="form-control text-center" required></td>
                                                        </tr>
                                                        <tr>
                                                            <td>IMPUESTO RESULTANTE</td>
                                                            <td> <input type="text" name="impuesto_resultante" id="ingreso_resultante" class="form-control text-center" value="0" readonly></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>SALDO A FAVOR DEL PERIODO ANTERIOR <b>(-)</b></td>
                                                            <td> <input type="number" name="saldo_afavor_renta" id="saldo_afavor_renta" class="form-control text-center" value="0" required></td>
                                                            <td> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>TRIBUTO A PAGAR O SALDO A FAVOR</td>
                                                            <td>
                                                                <input type="text" name="tributo_apagar_renta" id="tributo_apagar_renta" class="form-control text-center" value="0" readonly>
                                                            </td>
                                                            <td> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>PAGOS PREVIOS <b>(-)</b></td>
                                                            <td> <input type="number" name="pagos_previos" id="pagos_previos" class="form-control text-center" value="0" required></td>
                                                            <td> </td>

                                                        </tr>
                                                        <tr>
                                                            <td><span class="text-danger h5"><b>RENTA A PAGAR</b></td>
                                                            <td> <input type="text" name="impuesto_renta" id="impuesto_renta" class="form-control text-center bg-warning" value="0" readonly></td>
                                                            <td> </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <hr>
                                                <table class="table table-hover table-bordered">
                                                    <thead class="bg-secondary">
                                                        <th>RESUMEN IMPUESTO POR PAGAR</th>
                                                        <th>IMPORTE</th>
                                                    </thead>
                                                    <tr>
                                                        <td>IMPUESTO GENERAL A LAS VENTAS - IGV</td>
                                                        <input type="hidden" name="impuesto_general_ventas" id="impuesto_general_ventas" value="0">
                                                        <td><span id="impuesto_general_ventas_text">S/. 0</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>IMPUESTO A LA RENTA MYPE TRIBUTARIO</td>
                                                        <input type="hidden" name="impuesto_renta_total" id="impuesto_renta_total" value="0"></td>
                                                        <td><span id="impuesto_renta_total_text">S/. 0</span></td>
                                                    </tr>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-6 pt-xl-0 pt-5">
                                        <div class="card card-secondary">
                                            <div class="card-header text-center">
                                                <b class="h4">COMPRAS</b>
                                            </div>
                                            <div class="card-body panel-body">
                                                <table>
                                                    <thead>
                                                        <th>Nombres</th>
                                                        <th>Base</th>
                                                        <th>IGV</th>
                                                        <th>Total</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>COMPRAS NACIONALES GRAVADAS</td>
                                                            <td> <input type="number" name="comp_nacion_grava" id="comp_nacion_grava" class="form-control text-center" value="0"></td>
                                                            <td> <input type="text" name="comp_nacion_grava_igv" id="comp_nacion_grava_igv" class="form-control text-center" value="0" readonly></td>
                                                            <td> <input type="text" name="comp_nacion_grava_total" id="comp_nacion_grava_total" class="form-control text-center" value="0" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>COMPRAS IMPORTADAS GRAVADAS</td>
                                                            <td> <input type="number" name="comp_importa_grava" id="comp_importa_grava" class="form-control text-center" value="0"></td>
                                                            <td><input type="text" name="comp_importa_grava_igv" id="comp_importa_grava_igv" class="form-control text-center" value="0" readonly></td>
                                                            <td> <input type="text" name="comp_importa_grava_total" id="comp_importa_grava_total" class="form-control text-center" value="0" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>COMPRAS NACIONALES NO GRAVADAS</td>
                                                            <td> <input type="number" name="comp_nacion_no_grava" id="comp_nacion_no_grava" class="form-control text-center" value="0"></td>
                                                            <td> </td>
                                                            <td> <input type="text" name="comp_nacion_no_grava_total" id="comp_nacion_no_grava_total" class="form-control text-center" value="0" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>COMPRAS IMPORTADAS NO GRAVADAS</td>
                                                            <td> <input type="number" name="comp_importa_no_grava" id="comp_importa_no_grava" class="form-control text-center" value="0"></td>
                                                            <td> </td>
                                                            <td> <input type="text" name="comp_importa_no_grava_total" id="comp_importa_no_grava_total" class="form-control text-center" value="0" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>TOTAL COMPRAS</td>
                                                            <td> <input type="text" name="total_compras" id="total_compras" class="form-control text-center bg-warning" value="0" readonly></td>
                                                            <td> <input type="text" name="total_compras_igv" id="total_compras_igv" class="form-control text-center bg-warning" value="0" readonly></td>
                                                            <td>
                                                                <input type="hidden" name="total_compras_total" id="total_compras_total" value="0">
                                                                <input type="text" id="total_compras_formato" class="form-control text-center bg-warning" value="S./ 0" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>IMPUESTO RESULTANTE</td>
                                                            <td></td>
                                                            <td>
                                                                <input type="text" id="total_impuesto_formato" class="form-control text-center" value="S./ 0" readonly>
                                                                <input type="hidden" name="total_impuesto" id="total_impuesto" class="form-control text-center" value="0">

                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>SALDO A FAVOR - PERIODO ANTERIOR <b>(-)</b></td>
                                                            <td> </td>
                                                            <td> <input type="number" name="saldo_afavor_anterior" id="saldo_afavor_anterior" class="form-control text-center" value="0"></td>
                                                            <td> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>TRIBUTO A PAGAR O SALDO A FAVOR</td>
                                                            <td> </td>
                                                            <td> <input type="text" name="saldo_afavor" id="saldo_afavor" class="form-control text-center bg-success" value="0" readonly></td>
                                                            <td> </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4">
                                                                <hr>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>PERCEPCIONES DEL PERIODO</td>
                                                            <td> </td>
                                                            <td> <input type="number" name="percepciones_periodo" id="percepciones_periodo" class="form-control text-center" value="0" required></td>
                                                            <td> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>PERCEPCIONES DEL PERIODO ANTERIOR </td>
                                                            <td> </td>
                                                            <td> <input type="number" name="percepciones_periodo_ant" id="percepciones_periodo_ant" class="form-control text-center" value="0" required></td>
                                                            <td> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>SALDO DE PERCEPCIONES NO APLICADAS </td>
                                                            <td> </td>
                                                            <td> <input type="number" name="saldo_percepciones_no_apl" id="saldo_percepciones_no_apl" class="form-control text-center" value="0" required></td>
                                                            <td> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>RETENCIONES DECLARADAS EN EL PERIODO</td>
                                                            <td> </td>
                                                            <td> <input type="number" name="retenciones_declaradas" id="retenciones_declaradas" class="form-control text-center" value="0" required></td>
                                                            <td> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>RETENCIONES DECLARADAS EN PERIODO ANTERIORES </td>
                                                            <td> </td>
                                                            <td> <input type="number" name="retenciones_declaradas_ant" id="retenciones_declaradas_ant" class="form-control text-center" value="0" required></td>
                                                            <td> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>SALDO DE RETENCIONES NO APLICADAS </td>
                                                            <td> </td>
                                                            <td> <input type="number" name="saldo_retenciones_no_apl" id="saldo_retenciones_no_apl" class="form-control text-center" value="0" required></td>
                                                            <td> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>PAGOS PREVIOS</td>
                                                            <td> </td>
                                                            <td> <input type="number" name="pagos_previos_compras" id="pagos_previos_compras" class="form-control text-center" value="0" required></td>
                                                            <td> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>IGV A PAGAR</td>
                                                            <td> </td>
                                                            <td> <input type="text" name="igv_a_pagar" id="igv_a_pagar" class="form-control text-center" value="0" readonly></td>
                                                            <td> </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="text-danger h5"><b>IMPORTE A PAGAR</b></span></td>
                                                            <td> </td>
                                                            <td>
                                                                <input type="text" id="importe_apagar_formato" class="form-control text-center bg-warning" value="S./ 0" readonly>
                                                                <input type="hidden" name="importe_apagar" id="importe_apagar" value="0">
                                                            </td>
                                                            <td> </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-6 pt-xl-0 pt-5">
                                        <div class="card card-secondary ">
                                            <div class="card-header text-center">
                                                <b class="h4">RESUMEN DE LIQUIDACIONES</b>
                                            </div>
                                            <div class="card-body panel-body">
                                                <div class="chart">
                                                    <textarea class="d-none" name="grafico" id="grafico"></textarea>
                                                    <div class="chartjs-size-monitor">
                                                        <div class="chartjs-size-monitor-expand">
                                                            <div class=""></div>
                                                        </div>
                                                        <div class="chartjs-size-monitor-shrink">
                                                            <div class=""></div>
                                                        </div>
                                                    </div>
                                                    <canvas id="barChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%; display: block;" width="453" height="250" class="chartjs-render-monitor"></canvas>
                                                </div>
                                                <hr>
                                                <table class="table table-hover table-bordered" id="tablaResumen">
                                                    <thead class="bg-secondary">
                                                        <th>PERIODO</th>
                                                        <input type="hidden" name="mesPasadoAnterior" id="mesPasadoAnterior" value="-">
                                                        <th id="mesPasadoAnterior_text"> - </th>
                                                        <input type="hidden" name="mesAnterior" id="mesAnterior" value="-">
                                                        <th id="mesAnterior_text"> - </th>
                                                        <input type="hidden" name="mesActual" id="mesActual" value="-">
                                                        <th id="mesActual_text"> - </th>
                                                    </thead>
                                                    <tr>
                                                        <td>IMPUESTO GENERAL A LAS VENTAS - IGV</td>
                                                        <input type="hidden" name="mesPasadoAnteriorImpuesto" id="mesPasadoAnteriorImpuesto" value="S/. 0">
                                                        <td><span id="mesPasadoAnteriorImpuesto_text">S/. 0</span></td>
                                                        <input type="hidden" name="mesAnteriorImpuesto" id="mesAnteriorImpuesto" value="S/. 0">
                                                        <td><span id="mesAnteriorImpuesto_text">S/. 0</span></td>
                                                        <input type="hidden" name="mesActualImpuesto" id="mesActualImpuesto" value="S/. 0">
                                                        <td><span id="mesActualImpuesto_text">S/. 0</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>IMPUESTO A LA RENTA MYPE TRIBUTARIO</td>
                                                        <input type="hidden" name="mesPasadoAnteriorRenta" id="mesPasadoAnteriorRenta" value="S/. 0">
                                                        <td><span id="mesPasadoAnteriorRenta_text">S/. 0</span></td>
                                                        <input type="hidden" name="mesAnteriorRenta" id="mesAnteriorRenta" value="S/. 0">
                                                        <td><span id="mesAnteriorRenta_text">S/. 0</span></td>
                                                        <input type="hidden" name="mesActualRenta" id="mesActualRenta" value="S/. 0">
                                                        <td><span id="mesActualRenta_text">S/. 0</span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="button" id="btnRegistrarLiquidacion" class="btn btn-outline-success btn-lg"><i class="fas fa-save fa-2x"></i>Registrar</button>
                                            <button type="button" id="btnEditarLiquidacion" class="btn btn-outline-warning btn-lg d-none"><i class="fas fa-edit fa-2x"></i>Editar</button>
                                            <button type="button" id="btnPDFLiquidacion" class="btn btn-outline-danger btn-lg d-none"><i class="fas fa-file-pdf fa-2x"></i>PDF</button>
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