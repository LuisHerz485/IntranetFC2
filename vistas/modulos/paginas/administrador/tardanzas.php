<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Asistencia</a></li>
                        <li class="breadcrumb-item active">Reportes</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Consulta de Tardanzas por Fecha</h3>
                    </div>
                    <div class="card-body panel-body">
                        <form id="frmlistarTardanzas">
                            <div class="row justify-content-center">
                                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <label>Fecha Inicio</label>
                                    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
                                </div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <label>Fecha Fin</label>
                                    <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <label>Opciones</label>
                                    <button type="button" id="btnMostrar" class="btn btn-warning btn-block"><strong><i class="far fa-eye"></i> Mostrar</strong></button>
                                </div>
                            </div>
                        </form>
                        <br />
                        <br />
                        <div id="tbllistado">
                            <table id="mostrarReporteTardanzas" class="table table-striped tablaDataTardanzas dt-responsive">
                                <thead>
                                    <th>Área</th>
                                    <th>Nombre Completo</th>
                                    <th>N° de Tardanzas</th>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <th>Área</th>
                                    <th>Nombre Completo</th>
                                    <th>N° de Tardanzas</th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>