<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item h4"><a href="#"><b class="text-red">Pasajes</b></a></li>
            <li class="breadcrumb-item active h4">Resumen</li></b>
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
            <b class="h3">Pasajes por Colaborador</b>
          </div>
          <div class="card-body panel-body" id="listadoIngresoPasaje">
            <div class="container-fluid">
              <div class="row text-center justify-content-center align-items-center">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <h4><strong>Seleccione colaborador:</strong></h4>
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-3 mb-2">
                      </div>
                      <div class="col-12">
                        <select class="form-control col-11 select2" id="idusuario" name="idusuario">
                          <?php
                          $item = 1;
                          $valor = null;
                          $usuario = ControladorUsuarios::ctrMostrarUsuario($item, $valor);
                          foreach ($usuario as $key => $value) {
                            echo '<option value="' . $value['idusuario'] . '">' . $value['nombre'] . '</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-success btnTotalPasaje mt-2" type="button"><i class="fas fa-search-dollar"> Buscar</i></button>
                  <div class="row justify-content-center mt-2">
                    <div class="info-box bg-secondary col-9">
                      <span class="info-box-icon bg-warning"><i class="fas fa-coins"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Monto total de pasajes</span>
                        <span class="info-box-number"><span id="montoTotal">S/.0</span></span>
                      </div>
                    </div>
                  </div>

                  <div class="row justify-content-center mt-2">
                    <div class="info-box bg-secondary col-9">
                      <span class="info-box-icon bg-warning"><i class="fas fa-coins"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Monto total de pasajes</span>
                        <span class="info-box-number"><span id="TotalGeneral">S/.0</span></span>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-7">
                  <table id="tablaIngresoPasajes" class="table table-striped tablaIngresoPasaje dt-responsive">
                    <thead>
                      <th>FECHA</th>
                      <th>MONTO</th>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <th>FECHA</th>
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