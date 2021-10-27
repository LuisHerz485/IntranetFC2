<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <b class="text-black ml-5 h1"><strong>Dashboard</strong></b>
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
                <div class="col-lg-4 col-md-6 col-xs-12">
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
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <a href="menuAsistencia" class="small-box bg-danger">
                        <div class="inner">
                            <h3><span>Gestión de</span></br><span>Asistencia</span></h3>
                        </div>
                        <div class="icon text-white">
                            <i class="fas fa-clock"></i>
                        </div>
                        <p class="small-box-footer bg-secondary border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <a href="menuChecklist" class="small-box bg-danger">
                        <div class="inner">
                            <h3><span>Gestión de</span></br><span>checklist</span></h3>
                        </div>
                        <div class="icon text-white">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <p class="small-box-footer bg-secondary border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <a href="permisos-pendientes" class="small-box bg-danger">
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
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <a href="clientes" class="small-box bg-danger">
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
                <?php } ?>
                <?php
                if ($_SESSION['idtipousuario'] == 1) { ?>
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <a href="menuCobranza" class="small-box bg-danger">
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
            </div>
        </div>
    </section>
</div>