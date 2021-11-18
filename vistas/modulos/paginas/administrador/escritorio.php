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
                <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
                    <a href="usuarios" class="small-box bg-danger">
                        <div class="inner">
                            <h3>Colaboradores</h3>
                            <p>Lista de colaboradores</p>
                        </div>
                        <div class="icon text-white">
                            <i class="fas fa-users"></i>
                        </div>
                        <p class="small-box-footer bg-secondary border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                    </a>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
                    <a href="menuAsistencia" class="small-box bg-cyan">
                        <div class="inner">
                            <h3><span>Gestión de</span></br><span>Asistencia</span></h3>
                        </div>
                        <div class="icon text-white">
                            <i class="fas fa-clock"></i>
                        </div>
                        <p class="small-box-footer bg-secondary border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                    </a>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
                    <a href="menuChecklist" class="small-box bg-primary">
                        <div class="inner">
                            <h3><span>Gestión de</span></br><span>checklist</span></h3>
                        </div>
                        <div class="icon text-white">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <p class="small-box-footer bg-secondary border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                    </a>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
                    <a href="permisos-pendientes" class="small-box bg-success">
                        <div class="inner">
                            <h3>Permisos</h3>
                            <p>Permisos Pendientes: <span id="dashboardPermisos">0</span></p>
                        </div>
                        <div class="icon text-white">
                            <i class="fas fa-comments"></i>
                        </div>
                        <p class="small-box-footer bg-secondary border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                    </a>
                </div>
                <?php
                if ($_SESSION['idtipousuario'] != 4) { ?>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
                        <a href="clientes" class="small-box bg-indigo">
                            <div class="inner">
                                <h3>Clientes</h3>
                                <p>Lista de clientes</p>
                            </div>
                            <div class="icon text-white">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <p class="small-box-footer bg-secondary border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                        </a>
                    </div>
                    <?php
                    if ($_SESSION['idtipousuario'] == 1) { ?>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
                            <a href="menuCobranza" class="small-box bg-orange">
                                <div class="inner">
                                    <h3><span>Gestión de</span></br><span>Cobranza</span></h3>
                                </div>
                                <div class="icon text-white">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </div>
                                <p class="small-box-footer bg-secondary border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                            </a>
                        </div>
                    <?php } ?>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
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