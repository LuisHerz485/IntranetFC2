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
                                <b class="h4" style="color: white; font-size: 27px;">Pagos Acta impuestos a la renta Anual</b>
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

                                        <div class="col-12 col-xl-8">
                                            <div class="card card-primary">
                                                <div class="card-header text-center">
                                                    <b class="h4">Pagos mensuales periodo 
                                                    <?php
                                                    $cont = date('Y');
                                                    ?>
                                                    <select id="sel1">
                                                    <?php while ($cont >= 1950) { ?>
                                                    <option value="<?php echo($cont); ?>"><?php echo($cont); ?></option>
                                                    <?php $cont = ($cont-1); } ?>
                                                    </select></b>
                                                </div>
                                                <div class="card-body panel-body">
                                                    <!-- Tabla de Pagos acta impuesto a la renta Anual  -->
                                                    
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <th>Periodo</th>
                                                                    <th>Fecha Pago</th>
                                                                    <th>Utilizacion de saldo</th>
                                                                    <th>Compensacion ITAN</th>
                                                                    <th>Monto Pagado</th>
                                                                    <th>Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Enero</td>
                                                                    <td><input type="date" class="form-control" min="2022-01-01"></td>
                                                                    <td><input type="number" id="utisaldo1" class="form-control" onchange="sumaenero();"></td>
                                                                    <td><input type="number" id="citan1" class="form-control" onchange="sumaenero();"></td>
                                                                    <td><input type="number" id="monto1" class="form-control" onchange="sumaimpuestototal(),sumaenero();" ></td>
                                                                    <td><input type="number" id="totalenero" class="form-control" readonly></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Febrero</td>
                                                                    <td><input type="date" class="form-control" min="2022-02-01"></td>
                                                                    <td><input type="number" id="utisaldo2" class="form-control" onchange ="sumafebrero();"></td>
                                                                    <td><input type="number" id="citan2" class="form-control" onchange ="sumafebrero();"></td>
                                                                    <td><input type="number" id="monto2" class="form-control" onchange="sumaimpuestototal(),sumafebrero();"></td>
                                                                    <td><input type="number" id="totalfebrero" class="form-control" readonly></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Marzo</td>
                                                                    <td><input type="date" class="form-control" min="2022-03-01"></td>
                                                                    <td><input type="number" id="utisaldo3" class="form-control" onchange="sumamarzo();"></td>
                                                                    <td><input type="number" id="citan3" class="form-control" onchange="sumamarzo();"></td>
                                                                    <td><input type="number" id="monto3" class="form-control" onchange="sumaimpuestototal(),sumamarzo();"></td>
                                                                    <td><input type="number" id="totalmarzo" class="form-control" readonly></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Abril</td>
                                                                    <td><input type="date" class="form-control" min="2022-04-01"></td>
                                                                    <td><input type="number" id="utisaldo4" class="form-control" onchange="sumaabril();"></td>
                                                                    <td><input type="number" id="citan4" class="form-control" onchange="sumaabril();"></td>
                                                                    <td><input type="number" id="monto4" class="form-control" onchange="sumaimpuestototal(),sumaabril();"></td>
                                                                    <td><input type="number" id="totalabril" class="form-control" readonly></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Mayo</td>
                                                                    <td><input type="date" class="form-control" min="2022-05-01"></td>
                                                                    <td><input type="number" id="utisaldo5" class="form-control" onchange="sumamayo();"></td>
                                                                    <td><input type="number" id="citan5" class="form-control" onchange="sumamayo();"></td>
                                                                    <td><input type="number" id="monto5" class="form-control" onchange="sumaimpuestototal(),sumamayo();"></td>
                                                                    <td><input type="number" id="totalmayo" class="form-control" readonly></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Junio</td>
                                                                    <td><input type="date" class="form-control" min="2022-06-01"></td>
                                                                    <td><input type="number" id="utisaldo6" class="form-control" onchange="sumajunio();"></td>
                                                                    <td><input type="number" id="citan6" class="form-control" onchange="sumajunio();"></td>
                                                                    <td><input type="number" id="monto6" class="form-control" onchange="sumaimpuestototal(),sumajunio();"></td>
                                                                    <td><input type="number" id="totaljunio" class="form-control" readonly></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Julio</td>
                                                                    <td><input type="date" class="form-control" min="2022-07-01"></td>
                                                                    <td><input type="number" id="utisaldo7" class="form-control" onchange="sumajulio();"></td>
                                                                    <td><input type="number" id="citan7" class="form-control" onchange="sumajulio();"></td>
                                                                    <td><input type="number" id="monto7" class="form-control" onchange="sumaimpuestototal(),sumajulio();"></td>
                                                                    <td><input type="number" id="totaljulio" class="form-control" readonly></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Agosto</td>
                                                                    <td><input type="date" class="form-control" min="2022-08-01"></td>
                                                                    <td><input type="number" id="utisaldo8" class="form-control"onchange="sumaagosto();"></td>
                                                                    <td><input type="number" id="citan8" class="form-control" onchange="sumaagosto();"></td>
                                                                    <td><input type="number" id="monto8" class="form-control" onchange="sumaimpuestototal(),sumaagosto();"></td>
                                                                    <td><input type="number" id="totalagosto" class="form-control" readonly></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Setiembre</td>
                                                                    <td><input type="date" class="form-control" min="2022-09-01"></td>
                                                                    <td><input type="number" id="utisaldo9" class="form-control" onchange="sumasetiembre();"></td>
                                                                    <td><input type="number" id="citan9" class="form-control" onchange="sumasetiembre();"></td>
                                                                    <td><input type="number" id="monto9" class="form-control" onchange="sumaimpuestototal(),sumasetiembre();"></td>
                                                                    <td><input type="number" id="totalsetiembre" class="form-control" readonly></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Octubre</td>
                                                                    <td><input type="date" class="form-control" min="2022-10-01"></td>
                                                                    <td><input type="number" id="utisaldo10" class="form-control" onchange="sumaoctubre();"></td>
                                                                    <td><input type="number" id="citan10" class="form-control" onchange="sumaoctubre();"></td>
                                                                    <td><input type="number" id="monto10" class="form-control" onchange="sumaimpuestototal(),sumaoctubre();"></td>
                                                                    <td><input type="number" id="totaloctubre" class="form-control" readonly></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Noviembre</td>
                                                                    <td><input type="date" class="form-control" min="2022-11-01"></td>
                                                                    <td><input type="number" id="utisaldo11" class="form-control" onchange="sumanoviembre();"></td>
                                                                    <td><input type="number" id="citan11" class="form-control" onchange="sumanoviembre();"></td>
                                                                    <td><input type="number" id="monto11" class="form-control" onchange="sumaimpuestototal(),sumanoviembre();"></td>
                                                                    <td><input type="number" id="totalnoviembre" class="form-control" readonly></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Diciembre</td>
                                                                    <td><input type="date" class="form-control" min="2022-12-01"></td>
                                                                    <td><input type="number" id="utisaldo12" class="form-control" onchange="sumadiciembre();"></td>
                                                                    <td><input type="number" id="citan12" class="form-control" onchange="sumadiciembre();"></td>
                                                                    <td><input type="number" id="monto12" class="form-control" onchange="sumaimpuestototal(),sumadiciembre();"></td>
                                                                    <td><input type="number" id="totaldicimebre" class="form-control" readonly></td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>Total General</th>
                                                                    <td></td>
                                                                    <td><input type="number" class="form-control" value="0"></td>
                                                                    <td><input type="number" class="form-control" value="0"></td>
                                                                    <td><input type="number" id="totalgeneral1" class="form-control" value="0" readonly></td>
                                                                    <td><input type="number" class="form-control" value="0" readonly></td>
                                                                </tr>
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                                <tr>
                                                                    <th></th>
                                                                </tr>
                                                                <tr><th></th></tr>
                                                                <tr>
                                                                    <th>No Aplicado</th>
                                                                    <td></td>
                                                                    <td><input type="number" class="form-control" value="0"></td>
                                                                    <td><input type="number" class="form-control" value="0"></td>
                                                                    <td><input type="number" class="form-control" value="0" readonly></td>
                                                                    <td><input type="number" class="form-control" value="0" readonly></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Total General</th>
                                                                    <td></td>
                                                                    <td><input type="number" class="form-control" value="0"></td>
                                                                    <td><input type="number" class="form-control" value="0"></td>
                                                                    <td><input type="number" class="form-control" value="0" readonly></td>
                                                                    <td><input type="number" class="form-control" value="0" readonly></td>
                                                                </tr>
                                                            </tfoot>
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
