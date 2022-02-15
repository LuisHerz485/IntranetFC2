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
                        <li class="breadcrumb-item active h5">Credenciales</li></b>
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
                        <b class="h4">Credenciales de Clientes</b>
                    </div>
                    <div class="card-body panel-body">
                        <form>
                        
                        </form>
                        <hr>

                        <table id="tblcredencialesclientes" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Razon Social</th>
                                    <th>RUC</th>
                                    <th>Gerente</th>
                                    <th>Login</th>
                                    <th>Contraseña</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                $credencialesclientes = controladorcredencialesclientes::ctrlistarcredencialesclientes();
                                if($credencialesclientes){
                                    foreach($credencialesclientes as $credencialesclientes){
                                        echo
                                        
                                            '<td>'.$credencialesclientes["razonsocial"].'</td>
                                            <td>'.$credencialesclientes["ruc"].'</td>
                                            <td>'.$credencialesclientes["Gerente"].'</td>
                                            <td>'.$credencialesclientes["logincliente"].'</td>
                                            <td>'.$credencialesclientes["contrase"].'</td>';
                                        echo '</tr>';
                                    }
                                }
                                ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Razon Social</th>
                                    <th>RUC</th>
                                    <th>Gerente</th>
                                    <th>Login</th>
                                    <th>Contraseña</th>
                                </tr>

                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>    