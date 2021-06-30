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
              <h3 class="card-title">Cobranza&emsp;</h3>
            </div>
            <div class="card-body panel-body" id="listadoCobranza">
              <div class="row">
                <div class="form-group col-lg-3 col-md-3 col.col-sm-6 col-xs-12">
                  <label>Fecha Inicio</label>
                  <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <label>Fecha Fin</label>
                  <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
                </div>
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
              </div>
              <button class="btn btn-success btnMostrar">Mostrar</button>
              <br><br>
              <div id="tbllistado">
                <table id="mostrarReporte" class="table table-striped tablaDataTable dt-responsive">
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
                          <th scope="row"><button class="btn bg-gradient-info btn-xs btnEditarDetalleCliente" onclick="mostrarDetCob(true)" idcliente="'.$value['idcliente'].'"><i class="fas fa-donate"></i></button></th>';
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
                <button class="btn btn-outline-primary btn-lg" onclick="mostrarformGC(true)" id="btnagregar"><i class="fa fa-plus-circle"></i> Añadir</button><br><br>
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
                    
                  </tbody>
                </table>
              </div>
            </div> 
            <div class="card-body panel-body" id="mostrarformGC">
              <form action="" name="formulario" id="formulario" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="form-group col-lg-4 col-md-4 col-xs-12">
                    <label for=""> Serevicio:</label>
                    <input class="form-control" type="text" name="servicio" id="servicio" maxlength="100" placeholder="servicio">
                  </div>
                  <div class="form-group col-lg-4 col-md-4 col-xs-12">
                    <label for=""> Monto:</label>
                    <input class="form-control" type="text" name="monto" id="monto" maxlength="100" placeholder="monto" disabled>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-4 col-md-4 col-xs-12">
                    <label for=""> Departamento:</label>
                    <input class="form-control" type="text" name="departamento" id="departamento" maxlength="100" placeholder="departamento" disabled>
                  </div>
                  <div class="form-group col-lg-4 col-md-4 col-xs-12">
                    <label for=""> Distrito:</label>
                    <input class="form-control" type="text" name="distrito" id="distrito" maxlength="100" placeholder="distrito" disabled>
                  </div>
                  <div class="form-group col-lg-4 col-md-4 col-xs-12">
                    <label for=""> Dirección:</label>
                    <input class="form-control" type="text" name="direccion" id="direccion" maxlength="100" placeholder="direccion" disabled>
                  </div>
                  <div class="form-group col-lg-3 col-md-3 col.col-sm-6 col-xs-12">
                  <label>Fecha Emisión</label>
                  <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
                  </div>
                  <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label>Fecha Vencimiento</label>
                    <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
                  </div>
                  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                    <button class="btn btn-danger" onclick="cancelarformGC()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>