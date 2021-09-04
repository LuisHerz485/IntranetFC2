<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Administración de Permisos</a></li>
                        <li class="breadcrumb-item active">Permisos</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Permisos&emsp;</h3>
                    </div>

                    <div class="card-body panel-body" id="">
                        <form id="frmRegistrarPermiso" class="container-fluid">
                            <div class="row">
                                <input class="form-control" type="hidden" name="idusuario" id="idusuario" value="<?php echo $_SESSION['idusuario']; ?>">
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Seleccione tipo de permiso:</label>
                                    <select name="idtipopermiso" id="idtipopermiso" class="form-control select2">
                                        <?php
                                        $tiposPermiso = ModeloPermiso::listarTiposPermisos();
                                        foreach ($tiposPermiso as $tipoPermiso) {
                                            echo '<option value="' . $tipoPermiso["idtipopermiso"] . '">' . $tipoPermiso["nombrepermiso"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                    <label>Fecha Inicio:</label>
                                    <input type="datetime-local" class="form-control" name="fechainicio" id="fechainicio" required>
                                </div>
                                <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                    <label>Fecha Fin:</label>
                                    <input type="datetime-local" class="form-control" name="fechafin" id="fechafin">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12" maxlength="50">
                                    <label>Detalle:</label>
                                    <textarea name="detalle" class="form-control" id="detalle" rows="2"></textarea required>
                                </div>
                            </div>
                        </form>
                        <button class="btn btn-success" id="btnRegistrarPermiso" >Registrar</button>
                        <button class="btn btn-primary" id="btnLimpiarFormPermiso" type="button">Limpiar</button> 
                        <br /> 
                        <div >
                            <table id="" class="table table-striped dt-responsive">
                                <thead>
                                    <th>Tipo Permiso</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Detalle</th>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <th>Tipo Permiso</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Detalle</th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 