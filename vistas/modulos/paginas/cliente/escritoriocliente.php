

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><strong>Dashboard</strong></h1>
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

    <section class="content ml-5">
        <div class="container-fluid">
            <h4><strong>Tipo de cambio</strong></h4>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <a class="small-box bg-success" target="_blank">
                        <div class="inner">
                        <h3><?php echo tipodecambio()["precio_compra"] ; ?></h3>
                        <p>Precio Compra</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </a>                     
                </div>
                <div class="col-lg-3 col-6">
                    <a class="small-box bg-danger" target="_blank">
                    <div class="inner">
                        <h3><?php echo tipodecambio()["precio_venta"] ; ?></h3>
                         <p>Precio Venta</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-dollar-sign"></i>
                        </div>
                    </a>                     
                </div>
            </div>
        </div>
    </section>

    <section class="content ml-5">
        <div class="container-fluid">
            <h4><strong>Cobranzas</strong></h4>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <a  href="https://fccontadores.com/servicios/" class="small-box bg-lightblue" target="_blank">
                        <div class="inner">
                            <h3>Pagar</h3>

                            <p>Ir a pagar pendientes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <p class="small-box-footer">Ingresar <i
                                class="fas fa-arrow-circle-right"></i></p>
                    </a>                    
                </div>
                <div class="col-lg-3 col-6">
                    <a href="pagosrealizados" class="small-box bg-purple">
                        <div class="inner">
                            <h3>Mis Pagos</h3>

                            <p>Mis pagos realizados</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-search-dollar"></i>
                        </div>
                        <p class="small-box-footer">Ingresar <i
                                class="fas fa-arrow-circle-right"></i></p>
                    </a>                    
                </div>
                
            </div>
        </div>
    </section>

</div>
<!-- /.content-wrapper -->