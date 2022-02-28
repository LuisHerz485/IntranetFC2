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
                        <li class="breadcrumb-item active h5">AFP</li></b>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div id="barra"class="card-header">
                        <b class="h4">Credenciales de Clientes AFP</b>
                    </div>
                    <div class="card-body panel-body">
                        <form method="POST" id="frmcredenAFP" enctype="multipart/form-data">
                            <div class="container-fluid">
                                <div class="row">
                                    <div  class="col-12 col-lg-3">
                                        <label id="thcumpleanos" ><p>Seleccione el cliente</p></label>
                                        <input class="form-control" type="hidden" name="idcredencli" id="idcredencli" placeholder="idcredencli">
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
                                        <label id="thcumpleanos" ><p>Nombre de la AFP</p></label>
                                        <input class="form-control" type="text" name="nombreafp" id="nombreafp" placeholder="nombreafp" required>
                                    </div>
                                    <div  class="col-12 col-lg-3">
                                        <label id="thcumpleanos" ><p>contraseña</p></label>
                                        <input class="form-control" type="text" name="contrase" id="contrase" placeholder="contrase" required>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <hr>

                        <table id="tblafp" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Razon Social</th>
                                    <th>LOGIN</th>
                                    <th>CONTRASEÑA</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                $afp = controladorafp::ctrlistarafp();
                                if($afp){
                                    foreach($afp as $afp){
                                        echo
                                        '<tr>'.
                                        '<td>'.$afp["razonsocial"].'</td>
                                        <td>'.$afp["usuarioafp"].'</td>
                                        <td>'.$afp["contraseafp"].'</td>';
                                        
                                    }
                                }
                                ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>Razon Social</th>
                                    <th>LOGIN</th>
                                    <th>CONTRASEÑA</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>