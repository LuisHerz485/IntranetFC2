
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
                            <b class="h4" style="color: white; font-size: 27px;">Cotizaciones</b>
                            <div class="col" align="right">
                                <abbr title="Ayuda"><button class="btn btn-warning btn-circle" data-toggle="modal" data-target="#modalAyuda"><i class="fas fa-question-circle"></i></button></abbr>
                            </div>
                        </div>
                    </div>
                    <div class="card-body panel-body">
                        <div class="container-fluid">
                            <form id="frmliquidaciones" method="POST" action="ajax/generarLiquidacionPDF.php" enctype="multipart/form-data" target="_blank">
                                <div class="row">
                        
                                    <div class="col-12 col-xl-6">
                                        <div class="card card-secondary">
                                            <div class="card-header text-center">
                                                <b class="h4">ACTIVO</b>
                                            </div>
                                            <div class="card-body panel-body">
                                                <table>
                                                    
                                                    <thead>
                                                        <th>Nombre</th>
                                                        <th>ANEXO</th>
                                                        <th>VALOR</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><div class="text-white" style="background-color: rgb(204,0,0);" align="left">-ACTIVO CORRIENTE-</div></td>
                                                        </tr>
                                                    
                                                        <tr>
                                                            <td>Efectivo y equivalente de Efectivo azaxaxsaxasdxas</td>
                                                            <td> <input type="text"  class="form-control text-center col-sm-6" readonly></td>
                                                            <td> <input type="number" name ="efectivo" id="efectivo" class="form-control text-center" value="0"></td>                                                    
                                                        </tr>
                                                        <tr>
                                                            <td>Inversiones Financieras</td>
                                                            <td> <input type="text"  style="text-aling: center;" class="form-control text-center col-sm-6" readonly></td>
                                                            <td> <input type="number"  name ="inverfinan" id="inverfinan" class="form-control text-center" value="0"></td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Cuentas por cobrar comerciales</td>
                                                            <td> <input type="text" class="form-control text-center col-sm-6" readonly></td>
                                                            <td> <input type="number" name="cobrarcomerci" id="cobrarcomerci" class="form-control text-center" value="0"></td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Cuentas por cobrar accionistas</td>
                                                            <td> <input type="text" class="form-control text-center col-sm-6" readonly></td>
                                                            <td> <input type="number" name="cobraraccion" id="cobraraccion" class="form-control text-center" value="0"></td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Cuentas por cobrar terceras</td>
                                                            <td> <input type="text" class="form-control text-center col-sm-6" readonly></td>
                                                            <td> <input type="number" name="cobrarterceras" id="cobrarterceras" class="form-control text-center" value="0"></td> 
                                                        </tr>
                                                        <tr>
                                                            <td class="h5">TOTAL-ACTIVO-CORRIENTE</td>
                                                            <td> <input type="text" class="form-control text-center col-sm-6 bg-warning" readonly></td>
                                                            <td> <input type="number" name="totalactivoc" id="totalactivoc" class="form-control text-center bg-warning" value="0" readonly></td>
                                                        </tr>

                                                        <tr>
                                                            
                                                            <td> <div class="text-white" style="background-color: rgb(204,0,0);" align="left">-ACTIVO NO CORRIENTE-</div></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><input type="text" class="form-control text-center col-sm-6" readonly></td>
                                                            <td><input type="number" class="form-control text-center" value="0"></td>
                                                        </tr>
                                                            <td></td>
                                                            <td><input type="text" class="form-control text-center col-sm-6" readonly></td>
                                                            <td><input type="number" class="form-control text-center" value="0"></td>
                                                        <tr>
                                                            <td></td>
                                                            <td><input type="text" class="form-control text-center col-sm-6" readonly></td>
                                                            <td><input type="number" class="form-control text-center" value="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><input type="text" class="form-control text-center col-sm-6" readonly></td>
                                                            <td><input type="number" class="form-control text-center" value="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><input type="text" class="form-control text-center col-sm-6" readonly></td>
                                                            <td><input type="number" class="form-control text-center" value="0"></td>  
                                                        </tr>
                                                        <tr>
                                                            <td class="h5">TOTAL-ACTIVO-NO-CORRIENTE</td>
                                                            <td> <input type="text" class="form-control text-center col-sm-6 bg-warning" readonly></td>
                                                            <td> <input type="number" name="totalactivonoc" id="totalactivonoc" class="form-control text-center bg-warning" value="0" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="h5">TOTAL-ACTIVO</td>
                                                            <td> <input type="text" class="form-control text-center col-sm-6 bg-warning" readonly></td>
                                                            <td> <input type="number" name="totalactivo" id="totalactivo" class="form-control text-center bg-warning" value="0" readonly></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-xl-6 pt-xl-0 pt-5">
                                        <div class="card card-secondary ">
                                            <div class="card-header text-center">
                                                <b class="h4">PASIVO</b>
                                            </div>
                                            <div class="card-body panel-body">
                                                <table>
                                                    <thead>
                                                        <th>Nombre</th>
                                                        <th>ANEXO</th>
                                                        <th>VALOR</th>
                                                    </thead>
                                                    <tbody>
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