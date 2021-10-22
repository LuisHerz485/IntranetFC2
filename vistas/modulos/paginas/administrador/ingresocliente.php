<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Ingresos</a></li>
            <li class="breadcrumb-item active">Presupuesto de Ingresos</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Ingresos por cliente</h3>
          </div>
          <div class="card-body panel-body" id="listadoIngresoCliente">
            <div class="container-fluid">
              <div class="row text-center justify-content-center align-items-center">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <h4><strong>Seleccione cliente:</strong></h4>
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-3 mb-2">
                        <select class="form-control select2" id="fecha_anho" name="fecha_anho">
                          <?php $cont = date('Y');
                          while ($cont >= 2020) { ?>
                            <option><?php echo ($cont); ?></option>
                          <?php $cont = ($cont - 1);
                          } ?>
                        </select>
                      </div>
                      <div class="col-12">
                        <select class="form-control col-11 select2" id="idcliente" name="idcliente">
                          <?php
                          $item = 1;
                          $valor = null;
                          $usuario = ControladorClientes::ctrMostrarCliente($item, $valor);
                          foreach ($usuario as $key => $value) {
                            echo '<option value="' . $value['idcliente'] . '">' . $value['razonsocial'] . '</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-success btnIngresoCliente mt-2"><i class="fas fa-search-dollar"> Buscar</i></button>
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
                <div class="col-7">
                  <table id="tablaIngresoCliente" class="table table-striped tablaDataIngresoCliente dt-responsive">
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