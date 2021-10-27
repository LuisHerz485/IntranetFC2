<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item h4"><a href="menuIngreso"><b class="text-red">Administración de Ingreso</b></a></li>
            <li class="breadcrumb-item active h4">Ingreso General</li></b>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-danger">
          <div class="card-header">
            <b class="h3">Ingreso General de la Empresa</b>
          </div>
          <div class="card-body panel-body" id="listadoregistrosD">
            <div class="container-fluid">
              <div class="row text-center justify-content-center align-items-center">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <h4><strong>Seleccione año:</strong></h4>
                  <div class="row justify-content-center">
                    <div class="col-4">
                      <select class="form-control col-3 select2" id="fecha_ingreso" name="fecha_ingreso">
                        <?php $cont = date('Y');
                        while ($cont >= 2016) { ?>
                          <option><?php echo ($cont); ?></option>
                        <?php $cont = ($cont - 1);
                        } ?>
                      </select>
                    </div>
                  </div>
                  <button class="btn btn-success btnIngreso mt-2"><i class="fas fa-search-dollar"> Buscar</i></button>
                  <div class="row justify-content-center mt-2">
                    <div class="info-box bg-secondary col-9">
                      <span class="info-box-icon bg-warning"><i class="fas fa-coins"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Monto generado por año</span>
                        <span class="info-box-number"><span id="TotalAnyo">S/.0</span></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-8">
                  <table id="tablaIngresoMes" class="table table-striped tablaDataIngreso dt-responsive">
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