<script>
    const idliquidacion_recibido = <?php echo $_POST["id_liquidacion"] ?? "false"; ?>;
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
                    <div class="card-header">
                        <div class="row">
                            <b class="h4">Liquidaciones Impuesto SUNAT</b>
                            <div class="col" align="right">
                                <abbr title="Ayuda"><button class="btn btn-warning btn-circle" data-toggle="modal" data-target="#modalAyuda"><i class="fas fa-question-circle"></i></button></abbr>
                            </div>
                        </div>
                    </div>
                    <div class="card-body panel-body">
                        <div class="container-fluid">
                            <form id="frmliquidaciones" method="POST">
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
                                                <input type="date" name="fechavencimiento" id="fechavencimiento" class="form-control">
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
                                                            <td> <input type="text" ids="#ventas_netas,#ventas_no_gravadas,#exportaciones_facturada,#exportaciones_embarcadas,#nota_debito" idTotal="#ingreso_bruto" name="ventas_netas" id="ventas_netas" class="form-control text-center solo-numeros suma-montos" tieneIGV="true" idIGV="#ventas_netasigv" idNeto="#ventas_netastotal" value="0"></td>
                                                            <td> <input type="text" id="ventas_netasigv" ids="#ventas_netasigv,#nota_debitoigv" idTotal="#ingreso_brutoigv" class="form-control text-center suma-montos" readonly></td>
                                                            <td> <input type="text" id="ventas_netastotal" class="form-control text-center" value="0" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>VENTAS NO GRAVADAS</td>
                                                            <td> <input type="text" ids="#ventas_netas,#ventas_no_gravadas,#exportaciones_facturada,#exportaciones_embarcadas,#nota_debito" idTotal="#ingreso_bruto" name="ventas_no_gravadas" id="ventas_no_gravadas" class="form-control text-center solo-numeros suma-montos" tieneIGV="false" idNeto="#ventas_no_gravadastotal" value="0"></td>
                                                            <td></td>
                                                            <td> <input type="text" id="ventas_no_gravadastotal" class="form-control text-center " value="0" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>EXPORTACIONES FACTURADAS EN EL PERIODO</td>
                                                            <td> <input type="text" ids="#ventas_netas,#ventas_no_gravadas,#exportaciones_facturada,#exportaciones_embarcadas,#nota_debito" idTotal="#ingreso_bruto" name="exportaciones_facturada" id="exportaciones_facturada" class="form-control text-center solo-numeros suma-montos" value="0" tieneIGV="false" idNeto="#exportaciones_facturadatotal"></td>
                                                            <td> </td>
                                                            <td> <input type="text" id="exportaciones_facturadatotal" class="form-control text-center " value="0" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>EXPORTACIONES EMBARCADAS EN EL PERIODO</td>
                                                            <td> <input type="text" ids="#ventas_netas,#ventas_no_gravadas,#exportaciones_facturada,#exportaciones_embarcadas,#nota_debito" idTotal="#ingreso_bruto" name="exportaciones_embarcadas" id="exportaciones_embarcadas" class="form-control text-center solo-numeros suma-montos" value="0" tieneIGV="false" idNeto="#exportaciones_embarcadastotal"></td>
                                                            <td> </td>
                                                            <td> <input type="text" id="exportaciones_embarcadastotal" class="form-control text-center" value="0" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>NOTAS DE DEBITO</td>
                                                            <td> <input type="text" name="nota_debito" id="nota_debito" ids="#ventas_netas,#ventas_no_gravadas,#exportaciones_facturada,#exportaciones_embarcadas,#nota_debito" idTotal="#ingreso_bruto" class="form-control text-center solo-numeros suma-montos" tieneIGV="true" idIGV="#nota_debitoigv" idNeto="#nota_debitototal" value="0"></td>
                                                            <td> <input type="text" id="nota_debitoigv" ids="#ventas_netasigv,#nota_debitoigv" idTotal="#ingreso_brutoigv" class="form-control text-center suma-montos" value="0" readonly></td>
                                                            <td> <input type="text" id="nota_debitototal" class="form-control text-center" value="0" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>TOTAL INGRESOS</td>
                                                            <td> <input type="text" name="ingreso_bruto" id="ingreso_bruto" ids="#ingreso_bruto,#ingreso_brutoigv" idTotal="#ingreso_brutototal" class="form-control bg-warning text-center  resta-dos-numeros suma-montos" value="0" idResultado="#ingreso_neto" idIzq="#ingreso_bruto" idDer="#nota_credito" readonly></td>
                                                            <td> <input type="text" id="ingreso_brutoigv" ids="#ingreso_bruto,#ingreso_brutoigv" idTotal="#ingreso_brutototal" class="form-control text-center resta-dos-numeros suma-montos bg-warning" value="0" idResultado="#ingreso_netoigv" idIzq="#ingreso_brutoigv" idDer="#nota_credito" readonly></td>
                                                            <td> <input type="text" id="ingreso_brutototal" class="form-control text-center resta-dos-numeros bg-warning" value="0" idResultado="#ingreso_netototalvalor" idIzq="#ingreso_brutototal" idDer="#nota_creditototal" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>NOTAS DE CREDITO</td>
                                                            <td> <input type="text" name="nota_credito" id="nota_credito" class="form-control text-center solo-numeros resta-dos-numeros" idResultado="#ingreso_neto" idIzq="#ingreso_bruto" idDer="#nota_credito" tieneIGV="true" idIGV="#nota_creditoigv" idNeto="#nota_creditototal" value="0"></td>
                                                            <td> <input type="text" id="nota_creditoigv" class="form-control text-center resta-dos-numeros" value="0" idResultado="#ingreso_netoigv" idIzq="#ingreso_brutoigv" idDer="#nota_creditoigv" readonly></td>
                                                            <td> <input type="text" id="nota_creditototal" class="form-control text-center  resta-dos-numeros" value="0" idResultado="#ingreso_netototalvalor" idIzq="#ingreso_brutototal" idDer="#nota_creditototal" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>INGRESO NETO</td>
                                                            <td> <input type="text" name="ingreso_neto" id="ingreso_neto" class="form-control text-center bg-success" value="0" readonly></td>
                                                            <td> <input type="text" id="ingreso_netoigv" class="form-control text-center bg-success resta-dos-numeros" idResultado="#total_impuesto" idIzq="#ingreso_netoigv" idDer="#total_comprasigv" value="0" readonly></td>
                                                            <td>
                                                                <input type="hidden" id="ingreso_netototalvalor">
                                                                <input type="text" id="ingreso_netototal" class="form-control text-center bg-success" value="0" readonly>
                                                            </td>
                                                        </tr>
                                                    </tbody>
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
                                                            <td> <input type="text" name="comp_nacion_grava" id="comp_nacion_grava" ids="#comp_nacion_grava,#comp_importa_grava,#comp_nacion_no_grava,#comp_importa_no_grava" idTotal="#total_compras" class="form-control text-center solo-numeros suma-montos" tieneIGV="true" idIGV="#comp_nacion_gravaigv" idNeto="#comp_nacion_gravatotal" value="0"></td>
                                                            <td> <input type="text" id="comp_nacion_gravaigv" class="form-control text-center suma-montos" ids="#comp_nacion_gravaigv,#comp_importa_gravaigv" idTotal="#total_comprasigv" readonly></td>
                                                            <td> <input type="text" id="comp_nacion_gravatotal" class="form-control text-center" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>COMPRAS IMPORTADAS GRAVADAS</td>
                                                            <td> <input type="text" name="comp_importa_grava" id="comp_importa_grava" ids="#comp_nacion_grava,#comp_importa_grava,#comp_nacion_no_grava,#comp_importa_no_grava" idTotal="#total_compras" class="form-control text-center solo-numeros suma-montos" tieneIGV="true" idIGV="#comp_importa_gravaigv" idNeto="#comp_importa_gravatotal" value="0"></td>
                                                            <td><input type="text" id="comp_importa_gravaigv" class="form-control text-center suma-montos" ids="#comp_nacion_gravaigv,#comp_importa_gravaigv" idTotal="#total_comprasigv" readonly></td>
                                                            <td> <input type="text" id="comp_importa_gravatotal" class="form-control text-center" text-center readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>COMPRAS NACIONALES NO GRAVADAS</td>
                                                            <td> <input type="text" name="comp_nacion_no_grava" id="comp_nacion_no_grava" ids="#comp_nacion_grava,#comp_importa_grava,#comp_nacion_no_grava,#comp_importa_no_grava" idTotal="#total_compras" class="form-control text-center solo-numeros suma-montos" tieneIGV="false" idNeto="#comp_nacion_no_gravatotal" value="0"></td>
                                                            <td> </td>
                                                            <td> <input type="text" id="comp_nacion_no_gravatotal" class="form-control text-center" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>COMPRAS IMPORTADAS NO GRAVADAS</td>
                                                            <td> <input type="text" name="comp_importa_no_grava" id="comp_importa_no_grava" ids="#comp_nacion_grava,#comp_importa_grava,#comp_nacion_no_grava,#comp_importa_no_grava" idTotal="#total_compras" class="form-control text-center solo-numeros suma-montos" tieneIGV="false" idNeto="#comp_importa_no_gravatotal" value="0"></td>
                                                            <td> </td>
                                                            <td> <input type="text" id="comp_importa_no_gravatotal" class="form-control text-center" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>TOTAL COMPRAS</td>
                                                            <td> <input type="text" name="total_compras" ids="#total_compras,#total_comprasigv" idTotal="#total_comprastotalvalor" id="total_compras" class="form-control text-center bg-warning suma-montos" value="0" readonly></td>
                                                            <td> <input type="text" id="total_comprasigv" ids="#total_compras,#total_comprasigv" idTotal="#total_comprastotalvalor" class="form-control text-center bg-warning resta-dos-numeros suma-montos" idResultado="#total_impuesto" idIzq="#ingreso_netoigv" idDer="#total_comprasigv" readonly></td>
                                                            <td>
                                                                <input type="hidden" id="total_comprastotalvalor">
                                                                <input type="text" id="total_comprastotal" class="form-control text-center bg-warning" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>IMPUESTO RESULTANTE</td>
                                                            <td></td>
                                                            <td>
                                                                <input type="text" id="total_impuestovalor" class="form-control text-center" value="0" readonly>
                                                                <input type="hidden" name="total_impuesto" id="total_impuesto" class="form-control text-center suma-montos" ids="#total_impuesto,#saldo_afavor_anterior" idTotal="#saldo_afavor">

                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>SALDO A FAVOR -PERIODO ANTERIOR</td>
                                                            <td> </td>
                                                            <td> <input type="text" id="saldo_afavor_anterior" class="form-control text-center suma-montos" ids="#total_impuesto,#saldo_afavor_anterior" idTotal="#saldo_afavor" value="0" readonly></td>
                                                            <td> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>TRIBUTO A PAGAR O SALDO A FAVOR</td>
                                                            <td> </td>
                                                            <td> <input type="text" name="saldo_afavor" id="saldo_afavor" class="form-control text-center  bg-success" value="0" readonly></td>
                                                            <td> </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="text-danger h5"><b>IMPORTE A PAGAR</b></span></td>
                                                            <td> </td>
                                                            <td>
                                                                <input type="text" id="importe_apagar2" class="form-control text-center bg-warning">
                                                                <input type="hidden" id="importe_apagar" value="0" readonly>
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
                                                <b class="h4">IMPUESTO A LA RENTA</b>
                                            </div>
                                            <div class="card-body panel-body">
                                                <input type="hidden" id="idregimen" name="idregimen" />
                                                <span id="nombreRegimen"><b>REGIMEN MYPE TRIBUTARIO</b></span>
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
                                                            <td> <input type="text" id="ingresos_netos" class="form-control text-center" value="0" readonly></td>
                                                            <td> <input type="text" name="coeficiente" id="coeficiente" class="form-control text-center solo-numeros"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>IMPUESTO RESULTANTE</td>
                                                            <td> <input type="text" name="impuesto_resultante" id="ingreso_resultante" class="form-control text-center suma-montos" ids="#ingreso_resultante,#saldo_afavor_renta" idTotal="#tributo_apagar_renta" value="0" readonly></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>SALDO A FAVOR DEL PERIODO ANTERIOR (-)</td>
                                                            <td> <input type="text" name="saldo_afavor_renta" id="saldo_afavor_renta" class="form-control text-center solo-numeros suma-montos" ids="#ingreso_resultante,#saldo_afavor_renta" idTotal="#tributo_apagar_renta" value="0"></td>
                                                            <td> </td>

                                                        </tr>
                                                        <tr>
                                                            <td>TRIBUTO A PAGAR O SALDO A FAVOR</td>
                                                            <td>
                                                                <input type="text" name="tributo_apagar_renta" id="tributo_apagar_renta" class="form-control text-center suma-montos" ids="#tributo_apagar_renta,#pagos_previos" idTotal="#impuesto_renta" value="0" readonly>
                                                            </td>
                                                            <td> </td>

                                                        </tr>
                                                        <tr>
                                                            <td>PAGOS PREVIOS (-)</td>
                                                            <td> <input type="text" name="pagos_previos" id="pagos_previos" class="form-control text-center solo-numeros suma-montos" ids="#tributo_apagar_renta,#pagos_previos" idTotal="#impuesto_renta" value="0"></td>
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
                                                        <td><span id="impuesto_general_ventas">S/. 0</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>IMPUESTO A LA RENTA MYPE TRIBUTARIO</td>
                                                        <td><span id="impuesto_rentaTotal">S/. 0</span></td>
                                                    </tr>
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
                                                <div class="col-12">
                                                    Aqui va haber un grafico proximamente
                                                </div>
                                                <hr>
                                                <table class="table table-hover table-bordered" id="tablaResumen">
                                                    <thead class="bg-secondary">
                                                        <th>PERIODO</th>
                                                        <th id="mesuno">
                                                        </th>
                                                        <th id="mesdos">
                                                        </th>
                                                        <th id="mestres">
                                                        </th>
                                                    </thead>
                                                    <tr>
                                                        <td>IMPUESTO GENERAL A LAS VENTAS - IGV</td>
                                                        <td><span id="mesunoCantidadImpuesto">S/. 0</span></td>
                                                        <td><span id="mesdosCantidadImpuesto">S/. 0</span></td>
                                                        <td><span id="mesactualCantidadImpuesto">S/. 0</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>IMPUESTO A LA RENTA MYPE TRIBUTARIO</td>
                                                        <td><span id="mesunoCantidadRenta">S/. 0</span></td>
                                                        <td><span id="mesdosCantidadRenta">S/. 0</span></td>
                                                        <td><span id="mesactualCantidadRenta">S/. 0</span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="button" id="btnRegistrarLiquidacion" class="btn btn-outline-success btn-lg"><i class="fas fa-save fa-4x"></i>Registrar</button>
                                            <button type="button" id="btnEditarLiquidacion" class="btn btn-outline-warning btn-lg d-none"><i class="fas fa-edit fa-4x"></i>Editar</button>
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