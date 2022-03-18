
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
                                <form id="frmpruebapdf" method="POST" action="ajax/pruebapdf.php" enctype="multipart/form-data" target="_blank">
                                    <div class="row">


                                        <div class="col-12">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-md-4 col-lg-4 col-xl-3">
                                                    <input type="hidden" name="id_prueba" id="idprueba">
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
                                                    <select name="idcliente" id="idcliente_prueba" class="form-control select2 buscar-meses-anteriores" required>
                                                        <?php
                                                        $clientes = ModeloClientes::mdlMostrarClienteParaPrueba();
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
                                                    <input type="hidden" name="id_pdf" id="id_pdf">
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
                                                                <td> <input type="text"  class="form-control text-center col-sm-6" readonly></td>
                                                                <td> <input type="number" name ="efectivo" id="efectivo" class="form-control text-center monto1" value="0" onchange="sumarActiCorr();"></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td>Inversiones Financieras</td>
                                                                <td> <input type="text"  style="text-align: center;" class="form-control text-center col-sm-6" readonly></td>
                                                                <td> <input type="number"  name ="inverfinan" id="inverfinan" class="form-control text-center monto1" value="0" onchange="sumarActiCorr();"></td> 
                                                            </tr>

                                                            <!--TOTAL-->
                                                            <tr>
                                                                <td class="h5"><b>TOTAL ACTIVO CORRIENTE</b></td>
                                                                <td> <input type="text" class="form-control text-center col-sm-6 bg-warning" readonly></td>
                                                                <td> <input type="number" name="totalactivoc" id="totalactivoc" class="form-control text-center bg-warning"  onchange="sumaTotal1();" readonly></td>
                                                            </tr>

                                                    </table>

                                                        <div class="text-center">
                                                        <button type="button" id="btnRegistrarPrueba" class="btn btn-outline-success btn-lg"><i class="fas fa-save fa-2x"></i>Registrar</button>
                                                        <button type="button" id="btnEditarPrueba" class="btn btn-outline-warning btn-lg"><i class="fas fa-edit fa-2x"></i>Editar</button>
                                                        <button type="button" id="btnPDFPrueba" class="btn btn-outline-danger btn-lg d-none"><i class="fas fa-file-pdf fa-2x"></i>PDF</button>
                                                    </div>


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