<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item h5"><a href="#"><b class="text-red">Cliente</b></a></li>
                        <li class="breadcrumb-item active h5">Cumpleaños</li></b>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["btnRegistrarCumplecliente"])) {
        if (controladorcumplecliente::ctrRegistrarCumplecliente()) {
            echo "<script>Swal.fire({
                    title: 'Registrado!',
                    text: '¡Se Registro el Cumpleaños correctamente!',
                    icon: 'success',
                    confirmButtonText: 'Ok',
                })</script>";
        } else {
            echo "<script>Swal.fire({
                    title: 'Error!',
                    text: '¡No se pudo registrar el Cumpleaños!',
                    icon: 'error',
                    confirmButtonText: 'Ok',
                })</script>";
        }
    } else if (isset($_POST["btnEditarCumplecliente"])) {
        if (ControladorCumpleCliente::ctrEditarCumplecliente()) {
            echo "<script>Swal.fire({
                    title: 'Editado!',
                    text: '¡Se Edito el Cumpleaños correctamente!',
                    icon: 'success',
                    confirmButtonText: 'Ok',
                })</script>";
        } else{
            echo "<script>Swal.fire({
                    title: 'Error!',
                    text: '¡No se pudo editar el Cumpleaños!',
                    icon: 'error',
                    confirmButtonText: 'Ok',
                })</script>";
        }
    }
    ?>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div id="fondo" class="card card-danger">
                    <div id="thcumpleanos2"class="card-header">
                        <b class="h4">🥳Fechas de cumpleaños de Clientes🥳</b>
                    </div>
                    <div class="card-body panel-body">
                        <form method="POST" id="frmCumpleClientes" enctype="multipart/form-data">
                            <div class="container-fluid">
                                <div class="row">
                                    <div  class="col-12 col-lg-3">
                                        <label id="thcumpleanos" ><p>Seleccione el cliente</p></label>
                                        <input class="form-control" type="hidden" name="idcumplecliente" id="idcumplecliente" placeholder="idcumplecliente">
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
                                    <div class="col-12 col-lg-3">
                                        <label><p id ="thcumpleanos">Seleccione Fecha de Cumpleaños</p></label>
                                        <input type="date" class="form-control" name="fechacumplecliente" id="fechacumplecliente">
                                    </div>
                                    <div  class="col-12 col-lg-4">
                                        <div class="container-fluid" id="opcionesRegistrarCumplecliente" style="margin-top:32px;">
                                            <div class="input-group row">
                                                <div class="col-20 col-lg-6">
                                                    <button id="btnRegistrar" class="button btn-primary btn-lg btn-block pull-right" name="btnRegistrarCumplecliente" value="btnRegistrarCumplecliente" type="submit"><span class="fas fa-lg fa-birthday-cake fa-3x"></span></button>
                                                </div>
                                                <div class="col-20 col-lg-6">
                                                    <button id="btnLimpiarcliente" class="button btn-secondary btn-lg btn-block pull-right" type="button"><span class="fas fa-lg fa-broom fa-3x"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid d-none" id="opcionesEditarCumplecliente"  style="margin-top:32px;">
                                            <div class="input-group row">
                                                <div class="col-12 col-lg-6">
                                                    <button class="btn btn-warning btn-block pull-right" name="btnEditarCumplecliente" value="btnEditarCumplecliente" type="submit"><i class="fas fa-lg fa-save fa-3x"></i></button>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <button class="btn btn-danger btn-block pull-right" id="btnCancelarEditarCumplecliente" type="button"><i class="fas fa-lg fa-times-circle fa-3x"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <table id="tblCumplecliente" class="table table-bordered table-striped">
                             <thead  id="thcumpleanos2">
                                <tr>
                                <th class="no-exportar">editar</th>
                                <th>Cliente</th>
                                <th>Fecha de Cumpleaños</th>
                                <th class="no-exportar">IMAGEN</th>
                                </tr>
                            </thead>
                        <tbody id="tblbody">
                            <?php
                            $cumplecliente = controladorcumplecliente::ctrListarCumpleCliente();
                            if($cumplecliente){
                                foreach ($cumplecliente as $uncumplecliente) {
                                    echo 
                                    '<td>' . "<button type='button' class='btn btn-s btn-warning btn-editar-cumplecliente' dataCumplecliente='" . json_encode($uncumplecliente) . "' ><i class='fas fa-magic'></i> </button>" . '</td>
                                        <td style="color:black;">' . $uncumplecliente['razonsocial'] . '</td>
                                        <td style="color:black;">' . $uncumplecliente['fechacumplecliente'] . '</td>'
                                        . '<td>' . "<img src='" . $uncumplecliente['imagen'] . "' class='img-fluid' width='50px' height='50px'>" . '</td>';
                                    echo '</tr>';
                                }
                            }
                            ?>     
                        </tbody>
                            <tfoot  id="thcumpleanos2">
                            <tr>
                                <th class="no-exportar">editar</th>
                                <th>Cliente</th>
                                <th>Fecha de Cumpleaños</th>
                                <th class="no-exportar">IMAGEN</th>
                                </tr>
                            </tfoot>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
