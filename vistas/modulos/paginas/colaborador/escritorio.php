<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <b class="text-black ml-5 h1"><strong>Dashboard</strong></b>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item h5"><a href="#"><b class="text-red">Escritorio</b></a></li>
                        <li class="breadcrumb-item active h5">Principal</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row mx-5">
            <div class="col-xl-1 col-lg-1 col-md-1"></div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <a href="asistencia" class="small-box bg-success">
                        <div class="inner">
                            <h3>Asistencia</h3>
                            <p>Lista de asistencia</p>
                        </div>
                        <div class="icon text-white">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                    </a>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-1"></div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <a href="checklist" class="small-box bg-success">
                        <div class="inner">
                            <h3>Check List</h3>
                            <p>Lista de actividades a realizar</p>
                        </div>
                        <div class="icon text-white">
                        <i class="fas fa-clipboard-check"></i>
                        </div>
                        <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                    </a>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-1"></div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12" style="margin-top:20px">
                    <a href="https://fccontadores.com:2096/" class="small-box bg-orange" target="_blank">
                        <div class="inner text-white">
                            <h3>Webmail</h3>

                            <p>Ir al correo de la empresa</p>
                        </div>
                        <div class="icon text-white">
                            <i class="fas fa-envelope-open-text"></i>
                        </div>
                        <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                    </a>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-1"></div>
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12" style="margin-top:20px">
                    <a href="permisos" class="small-box bg-yellow">
                        <div class="inner text-white">
                            <h3>Permisos</h3>
                            <p>Solicitar Permiso</p>
                        </div>
                        <div class="icon text-white">
                            <i class="fas fa-comment-alt"></i>
                        </div>
                        <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                    </a>
                </div>

                <?php if (in_array($_SESSION['idusuario'], [90,128,52,82])) {?>
                <div class="col-xl-1 col-lg-1 col-md-1"></div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <a href="clientes" class="small-box bg-success">
                        <div class="inner">
                            <h3>Clientes</h3>
                             <p>Lista de clientes</p>
                        </div>
                        <div class="icon text-white">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                    </a>
                </div>
                <?php } ?>

                <?php if (in_array($_SESSION['iddepartamento'], [3, 20])) { ?>
                
                <div class="col-xl-4 col-lg-1 col-md-1"></div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12" style="margin-top:20px">
                    <a href="#" class="small-box bg-info " data-toggle="modal" data-target="#modalDecMen">
                        <div class="inner">
                             <h3>SUNAT</h3>
                             <p>Declaraciones</p>
                        </div>
                        <div class="icon text-white">
                             <i class="fas fa-landmark"></i>
                        </div>
                        <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
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
                                <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
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
                                <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                            </a>
                        </div>
                    </div>

                    <?php if (in_array($_SESSION['idusuario'], [90])) {?>
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
                                <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                   
                </div>
            </div>
            <div class="modal-footer bg-info" al>
                <b></b>
            </div>
        </div>
    </div>
</div>