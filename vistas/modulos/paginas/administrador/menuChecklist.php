<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item h4"><a href="#"><b class="text-red">Administración de CheckList</b></a></li>
                        <li class="breadcrumb-item active h4">Check List</li></b>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card">
                    <div class="card-header" style="background-color: rgb(204,0,0);">
                        <b style="color: white; font-size: 27px;">Gestor de Check List</b>
                    </div>
                    <div class="  card-body panel-body p-4">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-4 col-md-6 col-xs-12">
                                <a href="checklist-administrador" class="small-box" style="background-color: rgb(204,0,0); color:white;">
                                    <div class="inner">
                                        <h3><span>Consulta</span></br><span>CheckList</span></h3>
                                    </div>
                                    <div class="icon text-white">
                                        <i class="fas fa-tasks"></i>
                                    </div>
                                    <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                                </a>
                            </div>
                            <?php
                            if ($_SESSION['idtipousuario'] == 4 || $_SESSION['idtipousuario'] == 1) { ?>
                                <div class="col-lg-4 col-md-6 col-xs-12">
                                    <a href="checklist-jefe" class="small-box" style="background-color: rgb(204,0,0); color:white;">
                                        <div class="inner">
                                            <h3><span>Asignar</span></br><span>CheckList</span></h3>
                                        </div>
                                        <div class="icon text-white">
                                            <i class="fas fa-file-alt"></i>
                                        </div>
                                        <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <?php
                            if ($_SESSION['idtipousuario'] == 4 || $_SESSION['idtipousuario'] == 1) { ?>
                                <div class="col-lg-4 col-md-6 col-xs-12">
                                    <a href="checklist-asignado" class="small-box" style="background-color: rgb(204,0,0); color:white;">
                                        <div class="inner">
                                            <h3><span>Ver CheckList</span></br><span>Asignado</span></h3>
                                        </div>
                                        <div class="icon text-white">
                                            <i class="fas fa-sync-alt"></i>
                                        </div>
                                        <p class="small-box-footer bg-dark border">Ingresar <i class="fas fa-arrow-circle-right"></i></p>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>