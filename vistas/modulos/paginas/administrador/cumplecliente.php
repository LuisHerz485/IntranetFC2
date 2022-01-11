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
                        <li class="breadcrumb-item active h5">Cumpleaños</li></b>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["btnRegistrarCumpleClientes"])) {
        if (ControladorCumpleClientes::ctrRegistrarCumpleClientes()) {
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
    } else if (isset($_POST["btnEditarCumpleClientes"])) {
        if (ControladorCumpleClientes::ctrEditarCumpleaClientes()) {
            echo "<script>Swal.fire({
                    title: 'Editado!',
                    text: '¡Se Edito el Cumpleaños correctamente!',
                    icon: 'success',
                    confirmButtonText: 'Ok',
                })</script>";
        } else {
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
                        <b class="h4">🥳Fechas de cumpleaños de Cliente🥳</b>
                    </div>
                    <div class="card-body panel-body">
                        <form method="POST" id="frmCumpleClientes" enctype="multipart/form-data">
                            <div class="container-fluid">
                                <div class="row">
                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                                <label id="thcumpleanos">Seleccione Clientes:</label>
                                                <input class="form-control" type="hidden" name="idcumplecliente" id="idcumplecliente" placeholder="idcumplecliente">
                                                <select name="idcliente" id="idcliente" class="form-control select2 buscar-meses-anteriores" required>
                                                    <?php
                                                    $clientes = ModeloClientes::mdlMostrarClienteParaLiquidacion();
                                                    if ($clientes) {
                                                        foreach ($clientes as $cliente) {
                                                            echo '<option nombreregimen="' . $cliente["nombreregimen"] . '" coeficiente="' . $cliente["coeficiente"] . '" idregimen="' . $cliente["idregimen"] . '" value="' . $cliente["idcliente"] . '">' . $cliente["razonsocial"] . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                    <div class="col-12 col-lg-3">
                                        <label id="thcumpleanos">Seleccione Fecha de Cumpleaños</label>
                                        <input type="date" class="form-control" name="fechacumplecliente" id="fechacumplecliente">
                                    </div>


                                    <div align="right" class="col-12 col-lg-4">
                                        <div class="container-fluid" id="opcionesRegistrarCumpleClientes" align="right" style="margin-top:32px;">
                                            <div class="input-group row">
                                                <div class="col-12 col-lg-6">
                                                    <button id="btnRegistrar" class="btn btn-primary btn-lg btn-block pull-right" name="btnRegistrarCumpleClientes" value="btnRegistrarCumpleClientes" type="submit"><span class="fas fa-lg fa-birthday-cake fa-3x"></span></button>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <button id="btnLimpiarcliente" class="btn btn-secondary btn-lg btn-block pull-right" id="btnLimpiarFormCumpleClientes" type="button"><span class="fas fa-lg fa-broom fa-3x"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid d-none" id="opcionesEditarCumpleClientes" align="right" style="margin-top:32px;">
                                            <div class="input-group row">
                                                <div class="col-12 col-lg-6">
                                                    <button class="btn btn-warning btn-block pull-right" name="btnEditarCumpleClientes" value="btnEditarCumpleClientes" type="submit"><i class="fas fa-lg fa-save fa-3x"></i></button>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <button class="btn btn-danger btn-block pull-right" id="btnCancelarEditarCumpleClientes" type="button"><i class="fas fa-lg fa-times-circle fa-3x"></i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                        </form>
                        <hr>
                        <table id="tblCumpleClientes" class="table table-striped dt-responsive">
                            <thead id="thcumpleanos2" style="background-color: black; color:white;">
                                <th  class="no-exportar">Opciones</th>
                                <th >Nombre</th>
                                <th >Fecha Cumpleaños</th>
                                <th  class="no-exportar">Imagen</th>
                            </thead>
                            <tbody>
                            <div class="luz"></div>
                            <div class="luz a"></div>
                            <div class="luz b"></div>
                            <div class="luz c"></div>
                            <div class="luz d"></div>
                            <div class="luz e"></div>
                            <div class="luz f"></div>
                            <div class="luz g"></div>
                            <div class="luz h"></div>
                                <?php
                                $cumpleclientes = ControladorCumpleClientes::ctrListarCumpleClientes();
                                if ($cumpleclientes) {
                                    foreach ($cumpleclientes as $uncumplecliente) {
                                        echo 
                                       '<td>' . "<button type='button' class='btn btn-s btn-warning btn-editar-cumpleanoclientes' dataCumplenosClientes='" . json_encode($uncumplecliente) . "' ><i class='fas fa-pencil-alt'></i> </button>" . '</td>
                                        <td>' . $uncumplecliente['razonsocial'] . '</td>
                                        <td>' . $uncumplecliente['fechacumplecliente'] . '</td>';
                                        if ($uncumplecliente["imagen"] != "") {
                                            echo '<td><img src="' . $uncumplecliente['imagen'] . '" width="50px"></td>';
                                        } else {
                                            echo '<td><img src="vistas/dist/img/avatar.png" width="50px"></td>';
                                        }
                                        echo '</tr>';
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot id="thcumpleanos2" style="background-color: black; color:white;">
                                <th  class="no-exportar">Opciones</th>
                                <th >Nombre</th>
                                <th >Fecha Cumpleaños</th>
                                <th  class="no-exportar">Imagen</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
