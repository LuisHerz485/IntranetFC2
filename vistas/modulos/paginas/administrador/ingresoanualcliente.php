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
            <li class="breadcrumb-item"><a href="#">Ingresos</a></li>
            <li class="breadcrumb-item active">Presupuesto de Ingresos</li>
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
            <h3 class="card-title">Ranking de clientes</h3>
          </div>
          <div class="card-body panel-body" id="listadoMostrarRanking">
            <div class="container-fluid">
              <div class="row text-center justify-content-center align-items-center">
                <div class="col-4">
                  <h4><strong>Seleccione año:</strong></h4>
                  <div class="row justify-content-center">
                    <select class="form-control col-3 select2" id="fecha_ranking" name="fecha_ranking">
                    <?php $cont = date('Y');
                      while ($cont >= 2016) { ?>
                      <option><?php echo($cont); ?></option>
                    <?php $cont = ($cont-1); } ?>
                    </select>
                      </div>

                      <button class="btn btn-warning btnIngresoRanking mt-2"><i class="fas fa-search-dollar"> Buscar</i></button>
                  <div class="row justify-content-center mt-2">
                    <div class="info-box bg-success col-9">
                    <span class="info-box-icon bg-default"><i class="fas fa-thumbs-up"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Cliente que genera más ingreso: </span>
                        <span id=""></span>
                        <span class="info-box-number"><span  id="montomayor"></span></span>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center mt-2">
                    <div class="info-box bg-danger col-9">
                    <span class="info-box-icon bg-default"><i class="fas fa-thumbs-down"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Cliente que genera menos ingreso: </span>
                        <span class="info-box-number"><span  id="montomenor"></span></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-8">
                  <table id="tablaIngresoRanking" class="table table-striped tablaDataIngreso dt-responsive">
                    <thead>
                      <th>CLIENTE</th>
                      <th>MONTO</th>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <th>CLIENTE</th>
                      <th>MONTO</th>
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
</div>

<!-- /.content-wrapper -->