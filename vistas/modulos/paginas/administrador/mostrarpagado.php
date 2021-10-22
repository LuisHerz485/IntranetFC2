<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Cobranza</a></li>
            <li class="breadcrumb-item active">Relación de Pagos</li>
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
            <h3 class="card-title">Consulta de Cobranza General</h3>
          </div>
          <div class="card-body panel-body" id="listadoregistrosR">
            <div class="container">
              <div class="row">
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <label>Seleccione mes a buscar:</label>
                  <input type="month" class="form-control" name="fecha_busqueda" id="fecha_busqueda">
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin-top: 30px;">
                  <button class="btn btn-success btn-s btnFiltroMes"><strong><i class="fas fa-search-dollar"></i> Buscar</strong></button>
                </div>
                <div class="form-group col ">
                  <div class="row justify-content-center mt-2">
                    <div class="info-box bg-secondary col-9">
                      <span class="info-box-icon bg-warning"><i class="fas fa-coins"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Sumatoria de los montos:</span>
                        <span class="info-box-number" id="txtTotal">S./ 0.00</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="">
              <table id="mostrarPagado" class="table table-striped tablaDataPagosPendientes dt-responsive">
                <thead>
                  <th class="no-exportar">Opciones</th>
                  <th>RUC</th>
                  <th>Razón Social</th>
                  <th>Plan</th>
                  <th>Monto</th>
                  <th>Fecha de Vencimiento</th>
                  <th>Estado</th>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                  <th>Opciones</th>
                  <th>RUC</th>
                  <th>Razón Social</th>
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