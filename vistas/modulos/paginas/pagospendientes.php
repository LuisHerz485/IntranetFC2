<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Seguimiento de Pagos</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <div class="row">
                <div class="col-6 d-flex justify-content-between align-items-center">
                <h3 class="card-title text-center ">Pagos Pendientes</h3>
                </div>
                <div class="col-6">
                <a href="#" class="btn btn-success float-sm-right"><i class="fas fa-donate"> Pagar</i></a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div id="tbllistado">
                  <table id="mostrarArchivo" class="table table-striped tablaDataPagos dt-responsive text-center">
                    <thead>
                      <th>Estado</th>
                      <th>Fecha de Pago</th>
                      <th>Servicio</th>
                      <th>Monto Actual</th>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <th>Estado</th>
                      <th>Fecha de Pago</th>
                      <th>Servicio</th>
                      <th>Monto Actual</th>
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

<!-- /.content-wrapper -->

