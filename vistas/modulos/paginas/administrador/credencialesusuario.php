<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item h5"><a href="#"><b class="text-red">Colaboradores</b></a></li>
                        <li class="breadcrumb-item active h5">Usuario</li></b>
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
                        <b class="h4">Credenciales de Usuarios</b>
                    </div>
                    <div class="card-body panel-body">
                        <form>
                        
                        </form>
                        <hr>

                        <table id="tblcredencialesusuario" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombres completo</th>
                                    <th>departamento</th>
                                    <th>Login</th>
                                    <th>Contraseña</th>
                                    <th>Estado</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                $credencialesusuario = controladorcredencialesusuario::ctrlistarcredencialesusuario();
                                if($credencialesusuario){
                                    foreach($credencialesusuario as $credencialesusuario){
                                        echo
                                        '<tr>'.
                                        '<td>'.$credencialesusuario["nombrecompleto"].'</td>
                                        <td>'.$credencialesusuario["nombre"].'</td>
                                        <td>'.$credencialesusuario["login"].'</td>
                                        <td>'.$credencialesusuario["contrase"].'</td>';
                                        
                                            if($credencialesusuario["estado"] == "1"){
                                                echo '<td><button class="btn btn-success btn-sm">Activo</button></td>';
                                            }else{
                                                echo '<td><button class="btn btn-danger btn-sm">Inactivo</button></td>';
                                            }
                                        
                                    }
                                }
                                ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>Nombres completo</th>
                                    <th>departamento</th>
                                    <th>Login</th>
                                    <th>Contraseña</th>
                                    <th>Estado</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>