<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item h5"><a href="#"><b class="text-red">Operaciones</b></a></li>
                            <li class="breadcrumb-item active h5">Estado de Resultados Integrales</li></b>
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
                                <b class="h4" style="color: white; font-size: 27px;">Cotizaciones</b>
                                <div class="col" align="right">
                                    <abbr title="Ayuda"><button class="btn btn-warning btn-circle" data-toggle="modal" data-target="#modalAyuda"><i class="fas fa-question-circle"></i></button></abbr>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h2>&nbsp;&nbsp;&nbsp;CONSULTA RUC:</h2>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <label for="">RUC(*):</label>
                                    <input class="form-control" type="hidden" name="editarDA" id="editarDA" value="no">
                                    <input class="form-control" type="hidden" name="idcliente" id="idcliente">
                                    <div class="input-group mb-3">
                                        <input class="form-control" type="text" name="ruc" id="ruc" maxlength="12" placeholder="RUC" required>
                                        <div class="input-group-append">
                                        <button class="btn btn-outline-success" id="btnBuscarRazon" type="button"><i class="fas fa-search"></i> Buscar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <label for="">Razón Social(*):</label>
                                    <input class="form-control" type="text" name="razonsocial" id="razonsocial" maxlength="100" placeholder="Razón Social" required>
                                </div>
                            </div>
                        </div>

                        <div class="card-body panel-body">
                            <div class="container-fluid">
                                <form id="frmliquidaciones" method="POST" action="ajax/generarLiquidacionPDF.php" enctype="multipart/form-data" target="_blank">
                                    <div class="row">
                            
                                        <div class="col-12 col-md-6">
                                            <div class="card card-secondary">
                                                <div class="card-header text-center">
                                                    <b class="h3">ACTIVO</b>
                                                </div>
                                                <div class="card-body panel-body">
                                                    <table>
                                                        
                                                        <thead>
                                                            <th>NOMBRE</th>
                                                            <th>VALOR</th>
                                                        </thead>
                                                        <tbody>
                                                        
                                                            <tr>
                                                                <td>Ventas Netas de Servicios</td>
                                                                <td> <input type="number" name ="ventas_netas_servicios" id="ventas_netas_servicios" class="form-control text-center" value="0" onchange="sumarResulInte();"></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td>Descuentos Concedidos</td>
                                                                <td> <input type="number"  name ="descuentos_concedidos" id="descuentos_concedidos" class="form-control text-center" value="0" onchange="sumarResulInte();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td class="text-white form-control" style="background-color: #1E83C7;"><b>TOTAL VENTAS NETAS</b></td>
                                                                <td> <input type="number" name="total_ventas_netas" id="total_ventas_netas" class="form-control text-center bg-warning"  onchange="restaTotal1();" readonly></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>(-)</b> Costo de Ventas</td>
                                                                <td> <input type="number" name="costo_de_ventas" id="costo_de_ventas" class="form-control text-center" value="0" onchange="restaTotal1();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td><b>(-)</b> Costo de Servicios</td>
                                                                <td> <input type="number" name="costo_de_servicios" id="costo_de_servicios" class="form-control text-center" value="0" onchange="restaTotal1();"></td> 
                                                            </tr>

                                                            <tr>
                                                                <td class="text-white form-control" style="background-color: #1E83C7;"><b>UTILIDAD BRUTA</b></td>
                                                                <td> <input type="number" name="utilidad_bruta" id="utilidad_bruta" class="form-control text-center bg-warning" readonly></td>
                                                            </tr>

                                                            <tr><td> </td></tr>
                                                            <tr><td> </td></tr>

                                                            <tr>
                                                                <td><b>(-)</b> Gastos de Venta</td>
                                                                <td> <input type="number" name="gastos_de_venta" id="gastos_de_venta" class="form-control text-center monto1" value="0"  onchange="sumarActiCorr();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td><b>(-)</b> Gastos de Administración</td>
                                                                <td> <input type="number" name="gastos_de_administracion" id="gastos_de_administracion" class="form-control text-center monto1" value="0"  onchange="sumarActiCorr();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td><b>(+)</b> Ganancias (Perdidas) Por Venta de Activos</td>
                                                                <td> <input type="number" name="ganancias_por_activos" id="ganancias_por_activos" class="form-control text-center monto1" value="0" onchange="sumarActiCorr();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td><b>(+)</b> Otros Ingresos</td>
                                                                <td> <input type="number" name="otros_ingresos" id="otros_ingresos" class="form-control text-center monto1" value="0" onchange="sumarActiCorr();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td><b>(-)</b> Otros Gastos</td>
                                                                <td> <input type="number" name="otros_gastos" id="otros_gastos" class="form-control text-center monto1" value="0" onchange="sumarActiCorr();"></td> 
                                                            </tr>

                                                            <tr>
                                                                <td class="text-white form-control" style="background-color: #1E83C7;"><b>UTILIDAD OPERATIVA</b></td>
                                                                <td> <input type="number" name="utilidad_operativa" id="utilidad_operativa" class="form-control text-center bg-warning" onchange="sumaImpuestoRenta();" ></td>
                                                            </tr>
    
                                                            <tr>
                                                                <td><b>(+)</b> Ingresos Financieros</td>
                                                                <td><input type="number" name="ingresos_financieros" id="ingresos_financieros" class="form-control text-center" value="0" onchange="sumaImpuestoRenta();"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>(-)</b> Gastos Financieros</td>
                                                                <td><input type="number" name="gastos_financieros" id="gastos_financieros" class="form-control text-center" value="0" onchange="sumaImpuestoRenta();"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-white form-control" style="background-color: #1E83C7;"><b>UTILIDAD ANTES DE PARTICIPACIONES E IMPTO A LA RENTA</b></td>
                                                                <td> <input type="number" name="utilidad_de_parti" id="utilidad_de_parti" class="form-control text-center bg-warning" readonly></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>(-)</b> IMPUESTO A LA RENTA</td>
                                                                <td><input type="number" name="impuesto_a_la_renta" id="impuesto_a_la_renta" class="form-control text-center monto2" value="0" onchange="sumarActiNoCorr();"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>15 UIT = 66,000</td>
                                                                <td><input type="number" name="uit" id="uit" class="form-control text-center monto2" value="0" onchange="sumarActiNoCorr();"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>EXCESO</td>
                                                                <td><input type="number" name="exceso" id="exceso" class="form-control text-center monto2" value="0" onchange="sumarActiNoCorr();"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-white form-control" style="background-color: #1E83C7;"><b>RESULTADO DEL EJERCICIO</b></td>
                                                                <td> <input type="number" name="resultado_ejercicio" id="resultado_ejercicio" class="form-control text-center bg-warning"  onchange="sumaTotal1();" readonly></td>
                                                            </tr>           
                                                            <tr><td> </td></tr> 
                                                            <tr><td> </td></tr>  
                                                            <tr><td> </td></tr>  
                                                            <tr><td> </td></tr>  
                                                            <tr><td> </td></tr>                                                 
                                                            <tr>
                                                                <td class="text-white form-control" style="background-color: #1E83C7;"><b>REGULARIZACION DE RENTA ANUAL</b></td>
                                                                <td> <input type="number" name="regularizacion_de_renta" id="regularizacion_de_renta" class="form-control text-center bg-warning"  onchange="sumaTotal1();" readonly></td>
                                                            </tr> 
                                                        </tbody>
                                                    </table>
                                                </div>
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