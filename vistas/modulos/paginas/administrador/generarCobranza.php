<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item h4"><a href="menuCobranza"><b class="text-red">Administración de Cobranza</b></a></li>
            <li class="breadcrumb-item active h4">Generar Cobranza</li></b>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-danger">
          <div class="card-header" style="background-color: rgb(204,0,0);">
            <b class="h3" style="color: white; font-size: 27px;">Generar Cobranza</b>
          </div>
          <div class="card-body panel-body" id="listadoGC">
            <div id="tbllistadoCobranza">
              <table id="" class="table table-striped tablaDataTableC dt-responsive text-center">
                <thead style="background-color:lightgray; font-size: 20px;">
                  <th>Opciones</th>
                  <th>RUC</th>
                  <th>Razón Social</th>
                  <th>Imagen</th>
                  <th>Estado</th>
                </thead>
                <tbody>
                  <?php
                  $item = null;
                  $valor = null;
                  $clientes = ControladorClientes::ctrMostrarCliente($item, $valor);
                  foreach ($clientes as $key => $value) {
                    echo '<tr>
                          <th scope="row" class="text-center"><abbr title="Generar Cobranza"><button class="btn btn-success btnListarLocal btn-circle btn-xl" onclick="mostrarformDC(true)" idcliente="' . $value['idcliente'] . '"><i class="fas fa-donate"></i></button></abbr></th>';
                    echo '<td>' . $value['ruc'] . '</td>
                          <td>' . $value['razonsocial'] . '</td>';
                    if ($value["imagen"] != "") {
                      echo '<td><img src="' . $value['imagen'] . '" width="50px"></td>';
                    } else {
                      echo '<td><img src="vistas/dist/img/avatar.png" width="50px"></td>';
                    }
                    if ($value["estado"] == 1) {
                      echo '<td><h5><span class="badge badge-success">Activo</h5></td>';
                    } else {
                      echo '<td><h5><span class="badge badge-danger">Inactivo</h5></td>';
                    }
                    echo '</tr>';
                  }
                  ?>
                </tbody>
                <tfoot style="background-color:lightgray; font-size: 20px;">
                  <th>Opciones</th>
                  <th>RUC</th>
                  <th>Razón Social</th>
                  <th>Imagen</th>
                  <th>Estado</th>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="card-body panel-body" id="formularioGC">
            <div class="row">
              <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <label>Departamento(*):</label>
                <input class="form-control" type="hidden" name="idlocalcliente" id="idlocalcliente">
                <input class="form-control" type="hidden" name="idubicacion" id="idubicacion">
                <input class="form-control" type="hidden" name="idcliente" id="idcliente">
                <select name="iddepartamento" id="iddepartamento" class="form-control select2" data-live-search="true" required>
                </select>
              </div>
              <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <label>Distrito(*):</label>
                <select name="iddistrito" id="iddistrito" class="form-control select2" data-live-search="true" required>
                </select>
              </div>
              <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <label for="">Local(*):</label>
                <select name="iddireccion" id="iddireccion" class="form-control select2" data-live-search="true" required>
                </select>
              </div>
              <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <label>Fecha Emisión(*):</label>
                <input type="date" class="form-control" name="fecha_emision" id="fecha_emision">
              </div>
              <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <label>Fecha Vencimiento(*):</label>
                <input type="date" class="form-control" name="fecha_vencimiento" id="fecha_vencimiento">
              </div>
              <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <label>Planes / Servicio</label>
                <select name="idplan" id="idplan" class="form-control select2" data-live-search="true" required>
                  <option value="0">Seleccione Plan ...</option>
                  <?php
                  $item = 1;
                  $valor = null;
                  $servicio = ControladorDetalleCobranza::ctrMostrarPlanes($item, $valor);
                  foreach ($servicio as $key => $value) {
                    echo '<option id="plan' . $value['idplan'] . '" precio="' . $value['precio'] . '" value="' . $value['idplan'] . '">' . $value['nombre'] . '</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <label>Precio</label>
                <input type="number" name="precio" id="precio" class="form-control">
              </div>
              <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <label>Nota (Precio)</label>
                <input name="nota" id="nota" class="form-control" placeholder="Puede dejar vacía esta sección">
              </div>
              <div class="form-group col-lg-8 col-md-4 col-sm-6 col-xs-12">
                <label>Descripción:</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion">
              </div>
            </div>
            <button class="btn btn-success btnAgregarCobranza">Generar Cobranza</button>
            <button class="btn btn-primary" onclick="limpiarCobranza()" type="button"><i class="fas fa-broom"> Limpiar</i></button>
            <button class="btn btn-danger" onclick="cancelarGC()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
            <br />
            <br />
            <div id="tbllistadoCobranza">
              <table id="mostrarCobranza" class="table table-striped tablaDataCobranza dt-responsive">
                <thead>
                  <th class="no-exportar">Opciones</th>
                  <th>Fecha de Emisión</th>
                  <th>Direccion</th>
                  <th>Plan</th>
                  <th>Monto</th>
                  <th>Fecha de Vencimiento</th>
                  <th>Estado</th>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                  <th>Opciones</th>
                  <th>Fecha de Emisión</th>
                  <th>Direccion</th>
                  <th>Plan</th>
                  <th>Monto</th>
                  <th>Fecha de Vencimiento</th>
                  <th>Estado</th>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalDetCob" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <form role="form" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><strong>Detalle de Cobranza</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="input-group">
              <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Departamento</label>
                  <input name="" id="modalDepartamento" class="form-control" disabled>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Distrito</label>
                  <input name="" id="modalDistrito" class="form-control" disabled>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Direccion</label>
                  <input name="direccion" id="modalDireccion" class="form-control" disabled>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Fecha Emision</label>
                  <input name="" id="modalFechaEmision" class="form-control" disabled>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Fecha Vencimiento</label>
                  <input name="" id="modelFechaVencimiento" class="form-control" disabled>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Plan</label>
                  <input name="" id="modalPlan" class="form-control" disabled>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Monto</label>
                  <input name="" id="modalMonto" class="form-control" disabled>
                </div>
                <div class="row col-12">
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Descripcion</label>
                    <textarea name="descripcion" id="modalDescripcion" class="form-control" rows="2" disabled></textarea>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Observación sobre el precio</label>
                    <textarea name="" id="modalObservacion" class="form-control" rows="2" disabled></textarea>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="modal fade" id="modalConstancia" role="document">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <form role="form" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><strong>Detalles Constancia</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="input-group">
              <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Medio de Pago</label>
                  <select name="tipo_pago" id="tipo_pago" class="form-control">
                    <option>NÚMERO DE CTA DE AHORROS (BCP)</option>
                    <option>NÚMERO DE CTA DE AHORROS (BANBIF)</option>
                    <option>NÚMERO DE CTA DE AHORROS (SCOTIABANK)</option>
                    <option>NÚMERO DE CTA DE AHORROS (BBVA)</option>
                    <option>NÚMERO DE CTA DE AHORROS (INTERBANK)</option>
                    <option>NÚMERO DE CTA DE INTERBANCARIA (INTERBANK)</option>
                    <option>EFECTIVO</option>
                    <option>YAPE</option>
                    <input type="hidden" name="iddetallecobranza" id="iddetallecobranza" class="form-control">
                    <input type="hidden" name="idcobranza" id="idcobranza" class="form-control">
                  </select>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Fecha de pago</label>
                  <input type="date" class="form-control" name="fecha_pago" id="fecha_pago">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label>Observación</label>
                  <textarea type="text" class="form-control" name="nota_const" id="nota_const" rows="2"></textarea>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Monto a confirmar</label>
                  <input type="number" class="form-control" name="monto_const" id="monto_const">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>A deuda</label>
                  <input type="number" class="form-control" name="deuda" id="deuda" disabled>
                </div>
                <div class="col-12">
                  <button type="button" class="btn btn-success float-sm-right" onclick="limpiarPreConstancia()"><i class="fas fa-broom"> Limpiar</i></button>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <h4 style="color: #1561B7;" class="text-center"><strong>Historial de Pagos</strong></h4>
                  <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table id="mostrarSubPagos" class="table table-bordered mt-2 table-striped dt-responsive text-center" cellspacing="0" width="100%">
                      <thead>
                        <th>Fecha Pago</th>
                        <th>Monto Pagado</th>
                        <th>Opción</th>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info btnPreConstancia">Guardar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="modal fade" id="modalDetHisCob" role="dialog">
  <div class="modal-dialog modal-lg">
    <form role="form" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><strong>Detalle de Cobranza</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="input-group">
              <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Medio de pago</label>
                  <input name="" id="modalmediopago" class="form-control" disabled>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Fecha de Pago</label>
                  <input name="" id="modalfechapago" class="form-control" disabled>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Observación</label>
                  <textarea name="" id="modalobservacion" class="form-control" disabled></textarea>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Monto pagado</label>
                  <input name="" id="modalmontopagado" class="form-control" disabled>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
          <button type="button" class="btn btn-info" data-dismiss="modal" data-toggle="modal" href="#modalConstancia">Volver</button>
        </div>
      </div>
    </form>
  </div>
</div>