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
              <li class="breadcrumb-item"><a href="#">Cobranza</a></li>
              <li class="breadcrumb-item active">Administración de Cobranza</li>
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
              <h3 class="card-title"><strong>Cobranza&emsp;</strong></h3>
            </div>
            <div class="card-body panel-body" id="listadoCobranza">
              <div class="row">
                <div class="form-group col-lg-6 col-md-3 col-sm-6 col-xs-12">
                  <label for="">Cliente</label>
                  <select name="idcliente" id="idcliente" class="form-control select2" data-live-search="true" required>
                    <option value="0">Seleccione ...</option>
                    <?php 
                      $item = 1;
                      $valor = null;
                      $clientes = ControladorClientes::ctrMostrarCliente($item,$valor);
                      foreach($clientes as $key => $value){ 
                        echo '<option value="'.$value['idcliente'].'">'.$value['razonsocial'].'</option>';
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group col-lg-6 col-md-3 col-sm-6 col-xs-12 mt-4">
                  <button class="btn btn-outline-success btn-lg float-right btnMostrarCli"><i class="fas fa-eye"> Mostrar</i></button>
                </div>
              </div>
              
              <br><br>
              <div id="tbllistado">
                <table id="mostrarCliCob" class="table table-hover tabtable dt-responsive">
                  <thead class="text-center">
                    <th>Opción</th>
                    <th>Estado</th>
                    <th>Ruc</th>
                    <th>Razon Social</th>
                  </thead>
                  <tbody>
                    <?php
                      $item = null;
                      $valor = null;
                      $cliente = ControladorClientes:: ctrMostrarCliente($item, $valor);
                      foreach ($cliente as $key => $value) {
                        echo '<tr class="text-center">
                          <th scope="row"><button class="btn bg-gradient-warning btn-xs btnEditarDetalleCliente" onclick="mostrarDetCob(true)" idcliente="'.$value['idcliente'].'"><i class="fas fa-donate"></i></button></th>';
                         if($value['estado']!="1"){
                            echo'<td><button class="btn btn-danger btn-xs" idcliente="'.$value["idcliente"].'" estado="1" disabled>Inactivo</button></td>';
                          }else{
                            echo'<td><button class="btn btn-success btn-xs" idcliente="'.$value["idcliente"].'" estado="0" disabled>Activo</button></td>';
                          }
                          echo '<td>'.$value['ruc'].'</td>
                          <td>'.$value['razonsocial'].'</td>';
                        echo '</tr>';
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-body panel-body" id="mostrarDetCob">
              <div id="tbllistado">
                <div class="">
                  <button class="btn btn-outline-danger btn-lg float-left mb-4" onclick="cancelarformGC(true)" data-target=""><i class="fas fa-arrow-alt-circle-left"></i> Volver</button>
                  <button class="btn btn-outline-success btn-lg float-right" data-toggle="modal"data-target="#modalCobranza"><i class="fa fa-plus-circle"></i> Añadir</button>
                </div>
                <table id="mostrarReporte" class="table table-striped tablaDataTable dt-responsive">
                  <thead class="text-center">
                    <th>Opción</th>
                    <th>Estado</th>
                    <th>Ubicación</th>
                    <th>Servicio</th>
                    <th>Fecha Emisión</th>
                    <th>Fecha Vencimiento</th>
                    <th>Detalle</th>
                  </thead>
                  <tbody>
                    <tr class="text-center">
                      <th scope="row">
                        <button class="btn bg-gradient-warning btn-xxs btnAgregarCobr" data-toggle="modal"data-target="#modalConstancia"><i class="fas fa-file-invoice"></i></button>
                      </th>
                      <td>ESTADO</td>
                    </tr>                 
                  </tbody>
                </table>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
</div>

<!-- Modal Generar Cobranza -->

<div class="modal fade" id="modalCobranza" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <form role="form" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><strong>Añadir Cobranza</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="form-group col-lg-6">
            <label for=""> Servicio:</label>
            <input class="form-control" type="text" name="servicio" id="servicio" maxlength="100" placeholder="servicio">
            </div> 
            <div class="form-group col-lg-6">
              <label for=""> Departamento:</label>
              <input class="form-control" type="text" name="departamento" id="departamento" maxlength="100" placeholder="departamento" disabled>
            </div>
            <div class="form-group col-lg-6">
              <label for=""> Distrito:</label>
              <input class="form-control" type="text" name="distrito" id="distrito" maxlength="100" placeholder="distrito" disabled>
            </div>
            <div class="form-group col-lg-6">
            <label for=""> Dirección:</label>
              <input class="form-control" type="text" name="direccion" id="direccion" maxlength="100" placeholder="direccion" disabled>
            </div>
            <div class="form-group col-lg-6">
            <label for=""> Monto:</label>
            <input class="form-control" type="text" name="montoCobranza" id="montoCobranza" placeholder="monto" disabled>
            </div>
            <div class="form-group col-lg-6">
            <label for=""> Detalle:</label>
            <input class="form-control" type="text" name="detalleCobranza" id="detalleCobranza" placeholder="detalle de cobranza">
            </div>
            <div class="form-group col-lg-6">
            <label>Fecha Emisión</label>
            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
            </div>
            <div class="form-group col-lg-6">
              <label>Fecha Vencimiento</label>
              <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit" id=""><i class="fa fa-save"></i> Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
        </div>
      </div>
    </form>
  </div>
</div>


<!-- Modal Generar Constancia -->

<div class="modal fade" id="modalConstancia" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <form role="form" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><strong>Añadir Constancia</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="form-group col-lg-6">
            <label for=""> Servicio:</label>
            <input class="form-control" type="text" name="servicio" id="servicio" maxlength="100" placeholder="servicio" disabled="">
            </div> 
            <div class="form-group col-lg-6">
              <label for=""> Ubicacion:</label>
              <input class="form-control" type="text" name="ubicacion" id="ubicacion" maxlength="100" placeholder="ubicacion" disabled>
            </div>
            <div class="form-group col-lg-6">
              <label for=""> Tipo Pago:</label>
              <input class="form-control" type="text" name="tipoPago" id="distrtipoPagoito" maxlength="100" placeholder="Tipo de pago">
            </div>
            <div class="form-group col-lg-6">
            <label for=""> Detalle Pago:</label>
              <input class="form-control" type="text" name="detallePago" id="detallePago" maxlength="100" placeholder="Detalla de pago">
            </div>
            <div class="form-group col-lg-6">
            <label>Fecha Pago</label>
            <input type="date" class="form-control" name="fecha_pago" id="fecha_pago">
            </div>
            <div class="form-group col-lg-6">
            <label for=""> Monto:</label>
            <input class="form-control" type="text" name="montoConstancia" id="montoConstancia" placeholder="monto">
            </div>
            <div class="form-group col-lg-6">
            <label for=""> Detalle:</label>
            <input class="form-control" type="text" name="detallecConstancia" id="detallecConstancia" placeholder="detalle sobre la constancia">
            </div>            
          </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit" id=""><i class="fa fa-save"></i> Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
        </div>
      </div>
    </form>
  </div>
</div>