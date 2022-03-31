<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: rgb(204,0,0);">
                        <h3 class="card-title" style="color: white; font-size: 27px;">MI INFORMACIÓN</h3>
                    </div>
                    <div class="card-body panel-body text-center">
                        <br />
                        <br />
                        <input type="hidden" value="<?php echo $_SESSION['idcliente']; ?>">
                        <?php
                        //listar informacion del clientes: ruc, usuariosunat, clavesol
                        $id= $_SESSION['idcliente'];
                        $item = "idcliente";
                        $valor = $id;
                        $cliente = ControladorClientes::ctrbuscarclienteporid($id);
                        if($cliente){
                            echo '
                                            <div class="text-center">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="razonsocial">RAZON SOCIAL</label>
                                                            <input type="text" class="form-control text-center" id="razonsocial" name="razonsocial" value="'.$cliente["razonsocial"].'" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="ruc">RUC</label>
                                                            <input type="text" class="form-control text-center" id="ruc" name="ruc" value="'.$cliente["ruc"].'" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br />
                                            <div class="text-center">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="usuariosunat">UsuarioSunat</label>
                                                            <input type="text" class="form-control text-center" id="usuariosunat" name="usuariosunat" value="'.$cliente["usuariosunat"].'" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="clavesol">ClaveSol</label>
                                                            <input type="text" class="form-control text-center" id="clavesol" name="clavesol" value="'.$cliente["clavesunat"].'" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            ';
                            
                        }
                        ?>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>