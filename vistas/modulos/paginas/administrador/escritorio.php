<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-black ml-5"><strong>Dashboard</strong></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Escritorio</a></li>
                        <li class="breadcrumb-item active">Principal</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row mx-5">
                <div class="col-12 col-lg-6">
                    <!-- small box -->
                    <a href="usuarios" class="small-box bg-primary">
                        <div class="inner">
                            <h3>Colaboradores</h3>

                            <p>Lista de colaboradores</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <p class="small-box-footer">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-12 col-lg-6">
                    <!-- small box -->
                    <a href="asistencia" class="small-box bg-orange">
                        <div class="inner">
                            <h3>Asistencia</h3>

                            <p>Lista de asistencia</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <p class="small-box-footer">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                    </a>
                </div>

                <?php
                if ($_SESSION['idtipousuario'] != 4) { ?>
                    <!-- ./col -->
                    <div class="col-12 col-lg-6">
                        <!-- small box -->
                        <a href="clientes" class="small-box bg-info">
                            <div class="inner">
                                <h3>Clientes</h3>

                                <p>Lista de clientes</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <p class="small-box-footer">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                        </a>
                    </div>
                <?php } ?>
                <!-- ./col -->
                <?php
                if ($_SESSION['idtipousuario'] == 1) { ?>
                    <div class="col-12 col-lg-6">
                        <!-- small box -->
                        <a href="generarCobranza" class="small-box bg-success">
                            <div class="inner">
                                <h3>Cobranzas</h3>

                                <p>Lista de Cobranzas</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <p class="small-box-footer">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                        </a>
                    </div>
                <?php } ?>
                <!-- ./col -->
                <div class="col-12 col-lg-6">
                    <!-- small box -->
                    <a href="permisos-pendientes" class="small-box bg-danger">
                        <div class="inner">
                            <h3>Permisos</h3>

                            <p>Cantidad de Permisos Pendientes: <span id="dashboardPermisos">0</span></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <p class="small-box-footer">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                    </a>
                </div>
                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->

    </section>
</div>
<!-- /.content-wrapper -->