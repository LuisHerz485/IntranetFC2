<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item h5"><a href="menuChecklist"><b class="text-red">Administración de Clientes</b></a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <b class="h4">Administración de Google Drive - Clientes</b>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col" align="center">
                                    <abbr title="Listar"><button type="button" class="btn btn-primary btn-circle btn-xxl" id="btnListarArchivos" carpetaPadreId="">
                                            <i class="fas fa-list"></i></button></abbr>
                                    <abbr title="Subir Archivo"><button type="button" class="btn btn-success btn-circle btn-xxl ml-2" id="btnFormSubirArchivo">
                                            <i class="fas fa-cloud-upload-alt"></i></button></abbr>
                                    <abbr title="Volver al Inicio"><button type="button" class="btn btn-warning btn-circle btn-xxl ml-2" id="btnVolverAlInicio">
                                            <i class="fas fa-home"></i></button></abbr>
                                    <abbr title="Crear Carpeta"><button type="button" class="btn btn-secondary btn-circle btn-xxl ml-2" id="btnFormCrearCarpeta">
                                            <i class="fas fa-folder-plus"></i></button></abbr>
                                    <abbr title="Subir Nivel"><button type="button" class="btn btn-info btn-circle btn-xxl ml-2" id="btnSubirNivel" carpetaPadreId="">
                                            <i class="fas fa-level-up-alt"></i></button></abbr>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <table id="mostrarArchivos" class="table table-striped tablaDataArchivos dt-responsive">
                                        <thead>
                                            <th>Opciones</th>
                                            <th>Nombre</th>
                                            <th>Tipo de Archivo</th>
                                            <th>Fecha de Creacion</th>
                                        </thead>
                                        <tbody style="font-size: 20px">
                                        </tbody>
                                        <tfoot>
                                            <th>Opciones</th>
                                            <th>Nombre</th>
                                            <th>Tipo de Archivo</th>
                                            <th>Fecha de Creacion</th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalSubirArchivo" role="dialog">
    <div class="modal-dialog">
        <form id="frmSubirArchivo">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Subir un Archivo <i id="icoSubirArchivo" class="fas fa-spinner fa-pulse d-none"></i> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row mb-3">
                            <div class="col">
                                <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Salir</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-success btn-block" name="btnSubirArchivos" id="btnSubirArchivos">Aceptar</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label>Subir Archivo:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Subir</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="archivos" name="archivos[]" multiple>
                                        <div class="custom-file-label">Seleccionar Archivo</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="modalCrearCarpeta" role="dialog">
    <div class="modal-dialog">
        <form id="frmCrearCarpeta">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear una Carpeta <i id="icoCargandoCrearCarpeta" class="fas fa-spinner fa-pulse d-none"></i>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-12">
                                <label>Nombre de la Carpeta:</label>
                                <input type="text" class="form-control" name="carpetaNombre" id="carpetaNombre">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Salir</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-secondary btn-block" id="btnCrearCarpeta">Crear Carpeta</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>