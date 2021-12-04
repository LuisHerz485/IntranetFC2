<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-black ml-5"><strong>Dashboard</strong></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Escritorio</a></li>
                        <li class="breadcrumb-item active">Principal</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row mx-5">
                <div class="col-12 col-lg-6">
                    <a href="asistencia" class="small-box bg-danger">
                        <div class="inner">
                            <h3>Asistencia</h3>
                            <p>Lista de asistencia</p>
                        </div>
                        <div class="icon text-white">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <p class="small-box-footer bg-secondary border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                    </a>
                </div>
                <div class="col-lg-6 col-6">
                    <a href="checklist" class="small-box bg-primary">
                        <div class="inner">
                            <h3>Check List</h3>
                            <p>Lista de actividades a realizar</p>
                        </div>
                        <div class="icon text-white">
                            <i class="far fa-file-word"></i>
                        </div>
                        <p class="small-box-footer bg-secondary border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                    </a>
                </div>
                <div class="col-12 col-lg-6">
                    <a href="https://fccontadores.com:2096/" class="small-box bg-orange" target="_blank">
                        <div class="inner">
                            <h3>Webmail</h3>

                            <p>Ir al correo de la empresa</p>
                        </div>
                        <div class="icon text-white">
                            <i class="fas fa-envelope-square"></i>
                        </div>
                        <p class="small-box-footer bg-secondary border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                    </a>
                </div>
                <div class="col-12 col-lg-6">
                    <a href="permisos" class="small-box bg-success">
                        <div class="inner">
                            <h3>Permisos</h3>
                            <p>Solicitar Permiso</p>
                        </div>
                        <div class="icon text-white">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <p class="small-box-footer bg-secondary border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                    </a>
                </div>
                <?php if (in_array($_SESSION['iddepartamento'], [3, 20])) { ?>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                        <a href="#" class="small-box bg-info " data-toggle="modal" data-target="#modalDecMen">
                            <div class="inner">
                                <h3>SUNAT</h3>
                                <p>Declaraciones</p>
                            </div>
                            <div class="icon text-white">
                                <i class="fas fa-landmark"></i>
                            </div>
                            <p class="small-box-footer bg-secondary border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modalDecMen" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title text-info"><strong>Menú Declaraciones SUNAT</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                            <a href="declaracionSunatTributaria" class="small-box bg-info">
                                <div class="inner">
                                    <h3>Tributaria</h3>
                                    <p>Declaración Mensual</p>
                                </div>
                                <div class="icon text-white">
                                    <i class="fas fa-paste"></i>
                                </div>
                                <p class="small-box-footer bg-secondary border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                            </a>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                            <a href="declaracionSunatLaboral" class="small-box bg-info">
                                <div class="inner">
                                    <h3>Laboral</h3>
                                    <p>Declaración Mensual</p>
                                </div>
                                <div class="icon text-white">
                                    <i class="fas fa-paste"></i>
                                </div>
                                <p class="small-box-footer bg-secondary border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                            </a>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                            <a href="declaracionAnualSunat" class="small-box bg-info">
                                <div class="inner">
                                    <h3>Anual</h3>
                                    <p>Declaración Anual</p>
                                </div>
                                <div class="icon text-white">
                                    <i class="fas fa-paste"></i>
                                </div>
                                <p class="small-box-footer bg-secondary border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-info" al>
                <b></b>
            </div>
        </div>
    </div>
</div>