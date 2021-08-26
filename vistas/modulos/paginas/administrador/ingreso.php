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
            <li class="breadcrumb-item"><a href="#">Economía</a></li>
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
            <h3 class="card-title">Ingreso Económico</h3>
          </div>
          <div class="card-body panel-body" id="listadoregistrosD">
            <div class="container-fluid">
              <div class="row text-center justify-content-center align-items-center">
                <div class="col-4">
                  <h4><strong>Seleccione año:</strong></h4>
                  <div class="row justify-content-center">
                    <select class="form-control col-3 select2-" id="fecha_ingreso" name="fecha_ingreso">
                    <?php $cont = date('Y');
                      while ($cont >= 2016) { ?>
                      <option><?php echo($cont); ?></option>
                    <?php $cont = ($cont-1); } ?>
                    </select>
                      </div>

                      <button class="btn btn-success btnIngreso mt-2"><i class="fas fa-search-dollar"> Buscar</i></button>
                  <div class="row justify-content-center mt-2">
                    <div class="info-box bg-secondary col-9">
                    <span class="info-box-icon bg-warning"><i class="fas fa-coins"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Monto generado por año</span>
                        <span class="info-box-number">S/.<span  id="TotalAnyo">0</span></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-8">
                  <table id="tablaIngresoMes" class="table table-striped tablaDataPIngreso dt-responsive">
                    <thead>
                      <th>MES</th>
                      <th>MONTO</th>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <th>MES</th>
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