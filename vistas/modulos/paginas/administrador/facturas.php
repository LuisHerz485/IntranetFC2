<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item h5"><a href="#"><b class="text-red">Clientes</b></a></li>
                        <li class="breadcrumb-item active h5">FACTURAS</li></b>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php

    if (isset($_POST["btnregistrarfactura"])){
        if(controladorfacturas::ctrRegistrarFactura()){
            echo "<script>Swal.fire({
                title: 'Registrado!',
                text: '¡Se Registro afp correctamente!',
                icon: 'success',
                confirmButtonText: 'Ok',
            })</script>";
        }else{
            echo "<script>Swal.fire({
                title: 'Error!',
                text: '¡No se Registro afp correctamente!',
                icon: 'error',
                confirmButtonText: 'Ok',
            })</script>";
        }
    }
    
    if(isset($_POST["btneliminarfactura"])){
        if (controladorfacturas::ctrEliminarFactura()){
            echo "<script>Swal.fire({
                title: 'ELIMINADO!',
                text: '¡se elimino el registro!',
                icon: 'success',
                confirmButtonText: 'Ok',
            })</script>";
        }else{
        echo "<script>Swal.fire({
                title: 'Error!',
                text: '¡No se pudo eliminar!',
                icon: 'error',
                confirmButtonText: 'Ok',
            })</script>";
        }
    }
    
    else if(isset($_POST["btneditarguardarafp"])){
        if(controladorafp::ctreditarafp()){
            echo "<script>Swal.fire({
                title: 'Error!',
                text: '¡Se edito el AFP correctamente!',
                icon: 'error',
                confirmButtonText: 'Ok',
            })</script>";
        }else{
            echo "<script>Swal.fire({
                title: 'Error!',
                text: '¡No se edito el AFP correctamente!',
                icon: 'error',
                confirmButtonText: 'Ok',
            })</script>";
        }
    }


    ?>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div id="barra"class="card-header">
                        <b class="h4">Facturas de Clientes</b>
                    </div>
                    <div class="card-body panel-body">
                        <form method="POST" id="frmcredenAFP" enctype="multipart/form-data">
                            <div class="container-fluid">
                                <div class="row">
                                    <div  class="col-12 col-lg-3">
                                        <label id="thcumpleanos" ><p>Seleccione el cliente</p></label>
                                        <input class="form-control" type="hidden" name="idcredencli2" id="idcredencli2" placeholder="idcredencli">
                                        <select name="idcliente" id="idcliente" class="form-control select2" required>
                                            <?php
                                            if ($clientes = ModeloClientes::mdlMostrarClienteParaLiquidacion()) {
                                                foreach ($clientes as $clientes) {
                                                    echo '<option value="' . $clientes['idcliente'] . '">' .  $clientes['razonsocial']  . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div  class="col-12 col-lg-3">
                                        <label id="thcumpleanos" ><p>PORTAL</p></label>
                                        <input class="form-control" type="text" name="portal" id="portal" placeholder="Link del portal" required>
                                    </div>
                                    <div  class="col-12 col-lg-3">
                                        <label id="thcumpleanos" ><p>Nombre de la Factura</p></label>
                                        <input class="form-control" type="text" name="usuariofacturas" id="usuariofacturas" placeholder="Nombre del facturador" required>
                                    </div>
                                    <div  class="col-12 col-lg-3">
                                        <label id="thcumpleanos" ><p>Contraseña</p></label>
                                        <input class="form-control" type="text" name="contrasefacturas" id="contrasefacturas" placeholder="Contraseña" required>
                                        <input type="hidden" name="idfacturas" id="idfacturas" class="form-control">
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="container-fluid" id="opcionesregistrarfactura">
                                            <div class="input-group row">
                                                <div class="col-12 col-lg-6">
                                                    </br>
                                                    <button id="btnregistrarfactura" class="btn btn-primary btn-lg btn-block pull-right" name="btnregistrarfactura" value="btnregistrarfactura" type="submit"><span class="fas fa-lg fa-save fa-3x"></span></button>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="container-fluid d-none" id="opcioneseditarafp">
                                            <div class="input-group row">
                                                <div  class="col-12 col-lg-6">
                                                    <button id="btneditarguardarafp" class="btn btn-warning btn-lg btn-block pull-right" name="btneditarguardarafp" value="btneditarguardarafp" type="submit"><span class="fas fa-lg fa-save fa-3x"></span></button>
                                                </div>
                                                <div>
                                                    <button class="btn btn-danger btn-block pull-right" id="btncancelarafp" name="btncancelarafp" value="btncancelarafp" type="button"><i class="fas fa-lg fa-times-circle fa-3x"></i></button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>

                        </form>
                        <hr>

                        <table id="tblafp" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                    <th>SISTEMA DE FACTURA</th>
                                    <th>PORTAL</th>
                                    <th>LOGIN</th>
                                    <th>CONTRASEÑA</th>
                                    <th>OPCIONES</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                $factura = controladorfacturas::ctrListarFacturas();
                                if($factura){
                                    foreach($factura as $factura){
                                        echo
                                        '
                                        <tr>
                                            <td>'.$factura["razonsocial"].'</td>
                                            <td><a href='.$factura['portal'].' target="_blank"></a></td>
                                            <td>'.$factura["usuariofacturas"].'</td>
                                            <td>'.$factura["contrasefacturas"].'</td>
                                            <td>
                                                <div class="btn-group">'.
                                                    "<button id='btneliminarfactura' name='btneliminarfactura' type='submit' class='btn btn-warning btn-sm btn-eliminar-factura' datafactura='" . json_encode($factura) . "'><i class='fa fa-pen'></i></button>
                                                    
                                                </div>".'</td>
                                        </tr>';                             
                                    }
                                }
                                ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    
                                    <th>SISTEMA DE FACTURA</th>
                                    <th>PORTAL</th>
                                    <th>LOGIN</th>
                                    <th>CONTRASEÑA</th>
                                    <th>OPCIONES</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>