<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item h5"><a href="#"><b class="text-red">Liquidacion de Impuestos</b></a></li>
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
                        <br>

                        <div class="card-body panel-body">
                            <div class="container-fluid">
                                <form id="frmestadofinanciero" method="POST" action="ajax/estadofinancieroPDF.php" enctype="multipart/form-data" target="_blank">

                                    <input type="hidden" name="username" value="<?php echo $_SESSION['nombre']; ?>">
                                    <input type="hidden" name="apellido" value="<?php echo $_SESSION['apellidos']; ?>">
                                    
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

                                    <div class="row">
                            
                                        <div class="col-12 col-xl-6">
                                            <div class="card card-secondary">
                                                <div class="card-header text-center">
                                                    <b class="h4">ACTIVO</b>
                                                </div>
                                                <div class="card-body panel-body">
                                                    <table>
                                                        
                                                        <thead>
                                                            <th>NOMBRE</th>
                                                            <th>ANEXO</th>
                                                            <th>VALOR</th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><div class="text-white" style="background-color: #1E83C7;" align="center">ACTIVO CORRIENTE</div></td>
                                                            </tr>
                                                        
                                                            <tr>
                                                                <td>Efectivo y equivalente de Efectivo</td>
                                                                <td> 
                                                                    <select name="anexoefectivo" id="anexoefectivo" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option>                                                            
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number" name ="efectivo" id="efectivo" class="form-control text-center monto1" value="0" onchange="sumarActiCorr();"></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td>Inversiones Financieras</td>
                                                                <td> 
                                                                    <select name="anexoinverfinan" id="anexoinverfinan" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number"  name ="inverfinan" id="inverfinan" class="form-control text-center monto1" value="0" onchange="sumarActiCorr();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td>Cuentas por cobrar comerciales - Terceros</td>
                                                                <td> 
                                                                    <select name="anexocobrarcomerci" id="anexocobrarcomerci" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number" name="cobrarcomerci" id="cobrarcomerci" class="form-control text-center monto1" value="0" onchange="sumarActiCorr();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td>Cuentas por cobrar Accionistas, Gerentes y Personal</td>
                                                                <td> 
                                                                    <select name="anexocobraraccion" id="anexocobraraccion" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number" name="cobraraccion" id="cobraraccion" class="form-control text-center monto1" value="0" onchange="sumarActiCorr();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td>Cuentas por cobrar diversas - Terceros</td>
                                                                <td> 
                                                                    <select name="anexocobrarterceras" id="anexocobrarterceras" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number" name="cobrarterceras" id="cobrarterceras" class="form-control text-center monto1" value="0" onchange="sumarActiCorr();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td>Materiales, suministros y repuestos</td>
                                                                <td> 
                                                                    <select name="anexomatsumi" id="anexomatsumi" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number" name="matsumi" id="matsumi" class="form-control text-center monto1" value="0"  onchange="sumarActiCorr();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td>Mercaderia</td>
                                                                <td> 
                                                                    <select name="anexomercad" id="anexomercad" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number" name="mercad" id="mercad" class="form-control text-center monto1" value="0"  onchange="sumarActiCorr();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td>Otros activos corrientes</td>
                                                                <td> 
                                                                    <select name="anexootrosac" id="anexootrosac" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number" name="otrosac" id="otrosac" class="form-control text-center monto1" value="0" onchange="sumarActiCorr();"></td> 
                                                            </tr>

                                                            <tr>
                                                                <td class="h5"><b>TOTAL ACTIVO CORRIENTE</b></td>
                                                                <td> <input type="hidden" class="form-control text-center col-sm-6 bg-warning" readonly></td>
                                                                <td> <input type="number" name="totalactivoc" id="totalactivoc" class="form-control text-center bg-warning"  onchange="sumaTotal1();" readonly></td>
                                                            </tr>
    
                                                            <tr>
                                                                
                                                                <td> <div class="text-white" style="background-color: #1E83C7;" align="center">ACTIVO NO CORRIENTE</div></td>
                                                            </tr>
    
                                                            <tr>
                                                                <td>Inmueble, Maquinaria y Equipo</td>
                                                                <td> 
                                                                    <select name="anexoinmaqui" id="anexoinmaqui" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td><input type="number" name="inmaqui" id="inmaqui" class="form-control text-center monto2" value="0" onchange="sumarActiNoCorr();"></td>
                                                            </tr>
                                                                <td>Activos Intangibles</td>
                                                                <td> 
                                                                    <select name="anexoactintan" id="anexoactintan" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td><input type="number" name="actintan" id="actintan" class="form-control text-center monto2" value="0" onchange="sumarActiNoCorr();"></td>
                                                            <tr>
                                                                <td>Activo diferido</td>
                                                                <td> 
                                                                    <select name="anexoactdife" id="anexoactdife" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td><input type="number" name="actdife" id="actdife" class="form-control text-center monto2" value="0" onchange="sumarActiNoCorr(),diferenciaAcpa();"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Depreciacion, Amortizacion y agotamiento acumulado</td>
                                                                <td> 
                                                                    <select name="anexodepamorti" id="anexodepamorti" style="text-align: center; width:200px;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td><input type="number" name="depamorti" id="depamorti" class="form-control text-center monto2" value="0" onchange="sumarActiNoCorr();"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="h5"><b>TOTAL ACTIVO NO CORRIENTE</b></td>
                                                                <td> <input type="hidden"  readonly></td>
                                                                <td> <input type="number" name="totalactivonoc" id="totalactivonoc"   class="form-control text-center bg-warning "  onchange="sumaTotal1();" readonly></td>
                                                            </tr>           
                                                            <tr><td> </td></tr> 
                                                            <tr><td> </td></tr>  
                                                            <tr><td> </td></tr>  
                                                            <tr><td> </td></tr>  
                                                            <tr><td> </td></tr>                                                 
                                                            <tr>
                                                                <td class="h5"><b>TOTAL ACTIVO</b></td>
                                                                <td> <input type="hidden" class="form-control text-center col-sm-6 bg-warning" readonly></td>
                                                                <td> <input type="number" name="totalactivo" id="totalactivo"  class="form-control text-center bg-warning"  onchange="sumaTotal1(),diferenciaAcpa();" readonly></td>
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
                                                            <th>NOMBRE</th>
                                                            <th>ANEXO</th>
                                                            <th>VALOR</th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><div class="text-white" style="background-color: #1E83C7;" align="center">PASIVO CORRIENTE</div></td>
                                                            </tr>
                                                        
                                                            <tr>
                                                                <td>Sobregiros bancarios </td>
                                                                <td> 
                                                                    <select name="anexosobregi" id="anexosobregi" style="text-align: center; width:200px;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number" name ="sobregi" id="sobregi" class="form-control text-center mon" value="0" onchange="sumarPasivo();"></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td>Tributos por pagar</td>
                                                                <td> 
                                                                    <select name="anexotribupag" id="anexotribupag" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number"  name ="tribupag" id="tribupag" class="form-control text-center mon" value="0" onchange="sumarPasivo();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td>Remuneraciones por pagar</td>
                                                                <td> 
                                                                    <select name="anexoremupag" id="anexoremupag" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number"  name ="remupag" id="remupag" class="form-control text-center mon" value="0" onchange="sumarPasivo();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td>Cuentas por pagar comerciales - Terceros</td>
                                                                <td> 
                                                                    <select name="anexocuencomer" id="anexocuencomer" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number"  name ="cuencomer" id="cuencomer" class="form-control text-center mon" value="0" onchange="sumarPasivo();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td>Obligaciones financieras</td>
                                                                <td> 
                                                                    <select name="anexooblifinan" id="anexooblifinan" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number"  name ="oblifinan" id="oblifinan" class="form-control text-center mon" value="0" onchange="sumarPasivo();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td>Cuentas por pagar Diversas - Terceros</td>
                                                                <td> 
                                                                    <select name="anexodivterce" id="anexodivterce" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number"  name ="divterce" id="divterce" class="form-control text-center mon" value="0" onchange="sumarPasivo();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td>Pasivo Diferidos</td>
                                                                <td> 
                                                                    <select name="anexoingredif" id="anexoingredif" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number"  name ="ingredif" id="ingredif" class="form-control text-center mon" value="0" onchange="sumarPasivo();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td class="h5"><b>TOTAL PASIVO CORRIENTE</b></td>
                                                                <td> <input type="hidden" class="form-control text-center col-sm-6 bg-warning" readonly></td>
                                                                <td> <input type="number" name="totalpasivoc" id="totalpasivoc" class="form-control text-center bg-warning" readonly></td>
                                                            </tr>
    
                                                            <tr>
                                                                <td> <div class="text-white" style="background-color: #1E83C7;" align="center">PASIVO NO CORRIENTE</div></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td>Obligaciones financieras largo plazo</td>
                                                                <td> 
                                                                    <select name="anexooblilargo" id="anexooblilargo" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number"  name ="oblilargo" id="oblilargo" class="form-control text-center mon2" value="0" onchange="sumarPasivoNoCorr();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td class="h5"><b>TOTAL PASIVO NO CORRIENTE</b></td>
                                                                <td> <input type="hidden" class="form-control text-center col-sm-6 bg-warning" readonly></td>
                                                                <td> <input type="number" name="totalpasivonoc" id="totalpasivonoc" class="form-control text-center bg-warning"  onchange="sumaTotal2();" readonly></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="h5"><b>TOTAL PASIVO</b></td>
                                                                <td> <input type="hidden" class="form-control text-center col-sm-6 bg-warning" readonly></td>
                                                                <td> <input type="number" name="totalpasivo" id="totalpasivo" class="form-control text-center bg-warning" onchange="sumaTotal2();"  onchange="sumaTotal3();" readonly></td>
                                                            </tr>
    
                                                            <tr>
                                                                <td> <div class="text-white" style="background-color: #1E83C7;" align="center">PATRIMONIO</div></td>
                                                            </tr>
    
                                                            <tr>
                                                                <td>Capital</td>
                                                                <td> 
                                                                    <select name="anexocapital" id="anexocapital" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number"  name ="capital" id="capital" class="form-control text-center mon3" value="0" onchange="sumarPatrimonio();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td>Capital adicional</td>
                                                                <td> 
                                                                    <select name="anexocapadic" id="anexocapadic" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number"  name ="capadic" id="capadic" class="form-control text-center mon3" value="0" onchange="sumarPatrimonio();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td>Reserva legal</td>
                                                                <td> 
                                                                    <select name="anexoreservleg" id="anexoreservleg" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number"  name ="reservleg" id="reservleg" class="form-control text-center mon3" value="0" onchange="sumarPatrimonio();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td>Resultados acumulados</td>
                                                                <td> 
                                                                    <select name="anexoresultacu" id="anexoresultacu" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number"  name ="resultacu" id="resultacu" class="form-control text-center mon3" value="0" onchange="sumarPatrimonio();"></td> 
                                                            </tr>
                                                            <tr>
                                                                <td>Resultado del ejercicio</td>
                                                                <td> 
                                                                    <select name="anexoresultejer" id="anexoresultejer" style="text-align: center;" class="form-control text-center col-sm-6" >
                                                                        <option value="N° 1" selected>N° 1</option>
                                                                        <option value="N° 2">N° 2</option>
                                                                        <option value="N° 3">N° 3</option>
                                                                        <option value="N° 4">N° 4</option>
                                                                        <option value="N° 5">N° 5</option>
                                                                        <option value="N° 5.1">N° 5.1</option>
                                                                        <option value="N° 6">N° 6</option>
                                                                        <option value="N° 7">N° 7</option>
                                                                        <option value="N° 8">N° 8</option>
                                                                        <option value="N° 9">N° 9</option>
                                                                        <option value="N° 10">N° 10</option> 
                                                                    </select>
                                                                </td>
                                                                <td> <input type="number"  name ="resultejer" id="resultejer" class="form-control text-center mon3" value="0" onchange="sumarPatrimonio();"></td> 
                                                            </tr>
    
                                                            <tr>
                                                                <td class="h5"><b>TOTAL PATRIMONIO</b></td>
                                                                <td> <input type="hidden" class="form-control text-center col-sm-6 bg-warning" readonly></td>
                                                                <td> <input type="number" name="totalpatrimo" id="totalpatrimo" class="form-control text-center bg-warning" onchange="sumaTotal3();"  readonly></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="h5"><b>TOTAL PASIVO Y PATRIMONIO</b></td>
                                                                <td> <input type="hidden" class="form-control text-center col-sm-6 bg-warning" readonly></td>
                                                                <td> <input type="number" name="totalpasivopat" id="totalpasivopat" class="form-control text-center bg-warning" onchange="sumaTotal3(),diferenciaAcpa();" readonly></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- diferencia total de activo y pasivo -->
                                        <div class="col-12 col-xl-12 pt-xl-0 pt-5">
                                            <div align="center">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="h5"><b>DIFERENCIA ACTIVO - PASIVO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
                                                            <td> <input type="number" name="diferencia_acpa" id="diferencia_acpa"  class="form-control text-center bg-success"  readonly></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>                     
                                    </div>
                                </form>
                            </div>
                            <br>
                            <div class="text-center">
                                <button type="button" id="btnPDFestadofinanciero" class="btn btn-outline-danger btn-lg"><i class="fas fa-file-pdf fa-2x"></i>PDF</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>