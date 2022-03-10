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
                        <li class="breadcrumb-item active h5">Principal</li></b>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row mx-5">
                <div class="col-xl-2 col-lg-1 col-md-1"></div>
                <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <a href="usuarios" class="small-box bg" style="background-color: rgb(204,0,0); color:white;">
                        <div class="inner">
                            <h3>Colaboradores</h3>
                            <p>Lista de colaboradores</p>
                        </div>
                        <div class="icon text-white">
                            <i class="fas fa-users"></i>
                        </div>
                        <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                    </a>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-1"></div>
                <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <a href="permisos-pendientes" class="small-box bg" style="background-color: rgb(204,0,0); color:white;">
                        <div class="inner text-white">
                            <h3>Permisos</h3>
                            <p>Permisos Pendientes: <span id="dashboardPermisos">0</span></p>
                        </div>
                        <div class="icon text-white">
                            <i class="fas fa-comments"></i>
                        </div>
                        <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                    </a>
                </div>
                <div class="col-xl-1"></div>
                <?php
                if ($_SESSION['idtipousuario'] != 4) { ?>
                    <div class="col-xl-2 col-lg-1 col-md-1"></div>
                    <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12 col-xs-12">
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
                    <div class="col-xl-1 col-lg-1 col-md-1"></div>
                    <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <a href="planilla" class="small-box bg-success">
                            <div class="inner text-white">
                                <h3>Planilla</h3>
                                <p>Registro de Planilla <span id="dashboardPermisos"></span></p>
                            </div>
                            <div class="icon text-white">
                            <i class="fas fa-file-invoice-dollar"></i>
                            </div>
                            <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                        </a>
                    </div>
                    <div class="col-xl-1"></div>
                    <?php
                    if ($_SESSION['idtipousuario'] == 1) { ?>
                        <div class="col-xl-2 col-lg-1 col-md-1"></div>
                        <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <a href="#" class="small-box bg-info" data-toggle="modal" data-target="#modalCobra">
                                <div class="inner  text-white">
                                <h3>Tesoreria FC</h3>
                                <p>Gestión de Cobranza</p>
                                </div>
                                <div class="icon text-white">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </div>
                                <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                            </a>
                        </div>
                    <?php } ?>
                    <?php if ($_SESSION['idtipousuario'] == 3) { ?> 
                        <div class="col-xl-2 col-lg-1 col-md-1"></div>
                    <?php } else { ?>
                        <div class="col-xl-1 col-lg-1 col-md-1"></div>
                    <?php } ?>
                    <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <a href="#" class="small-box bg-info " data-toggle="modal" data-target="#modalDecMen">
                            <div class="inner">
                                <h3>Sunat</h3>
                                <p>Declaraciones</p>
                            </div>
                            <div class="icon text-white">
                                <i class="fas fa-landmark"></i>
                            </div>
                            <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                        </a>
                    </div>

                    <div class="col-xl-1"></div>
                <?php } ?>
                
                <!--ACCESO RESTRINGIDO CALENDARIO-->
                <?php if (in_array($_SESSION['idusuario'], [16,54,152,56,151,164])) { ?>
                
                    <div class="col-xl-1"></div>
                    <div class="col-xl-3 col-lg-1 col-md-1"></div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <a href="calendario" class="small-box bg-primary">
                                <div class="inner">
                                    <h3>Calendario - Agenda Web</h3>
                                    <p>Manejos de Eventos</p>
                                </div>
                                <div class="icon text-white">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                            </a>
                    </div>
                
                <?php } ?>


            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modalCobra" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title text-info"><strong>Gestor de Cobranza</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                            <a href="generarCobranza" class="small-box bg-info">
                                <div class="inner">
                                    <h3><span>Generar</span></br><span>Cobranza</span></h3>
                                </div>
                                <div class="icon text-white">
                                    <i class="fas fa-donate"></i>
                                </div>
                                <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                            </a>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                            <a href="mostrarcobranza" class="small-box bg-info">
                                <div class="inner">
                                    <h3><span>Mostrar</span></br><span>Adeudados</span></h3>
                                </div>
                                <div class="icon text-white">
                                    <i class="fas fa-search-dollar"></i>
                                </div>
                                <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                            </a>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                            <a href="mostrarpagado" class="small-box bg-info">
                                <div class="inner">
                                    <h3><span>Mostrar</span></br><span>Pagados</span></h3>
                                </div>
                                <div class="icon text-white">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                </div>
                                <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
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

<div class="modal fade" id="modalDecMen" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title text-info"><strong>Menú Declaraciones Sunat</strong></h4>
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
                    <div class="row">
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
                        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                            <a href="liquidaciones" class="small-box bg-info">
                                <div class="inner">
                                    <h3>Registrar</h3>
                                    <p>Liquidaciones Mensuales</p>
                                </div>
                                <div class="icon text-white">
                                    <i class="fas fa-money-check-alt"></i>
                                </div>
                                <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                            </a>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                            <a href="listarliquidaciones" class="small-box bg-info">
                                <div class="inner">
                                    <h3>Mostrar</h3>
                                    <p>Liquidaciones Mensuales</p>
                                </div>
                                <div class="icon text-white">
                                    <i class="fas fa-money-check"></i>
                                </div>
                                <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
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