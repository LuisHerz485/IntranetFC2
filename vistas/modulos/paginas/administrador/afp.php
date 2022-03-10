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
    <?php
    if (isset($_POST["btnregistrarafp"])){
        if(controladorafp::ctrregistrarafp()){
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
    }else if(isset($_POST["btneditarguardarafp"])){
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
                        <b class="h4">Credenciales de Clientes AFP</b>
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
                                        <label id="thcumpleanos" ><p>Nombre de la AFP</p></label>
                                        <input class="form-control" type="text" name="usuarioafp" id="usuarioafp" placeholder="nombreafp" required>
                                    </div>
                                    <div  class="col-12 col-lg-3">
                                        <label id="thcumpleanos" ><p>contraseña</p></label>
                                        <input class="form-control" type="text" name="contraseafp" id="contraseafp" placeholder="contrase" required>
                                    </div>
                                    <hr>
                                    <hr>
                                    <div class="col-12 col-lg-4">
                                        <div class="container-fluid" id="opcionesregistrarafp">
                                            <div class="input-group row">
                                                <div class="col-12 col-lg-6">
                                                    <button id="btnregistrarafp" class="btn btn-primary btn-lg btn-block pull-right" name="btnregistrarafp" value="btnregistrarafp" type="submit"><span class="fas fa-lg fa-save fa-3x"></span></button>
                                                </div>
                                                <div class="col-12 col-lg-6">

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
                                        //'<td>'."<button type='button' class='btn btn-s btn-warning btn-editar-afp' dataafp='" . json_encode($afp) . "' ><i class='fas fa-edit'></i> </button>" . '</td>'.
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