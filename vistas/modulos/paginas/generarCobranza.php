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
              <li class="breadcrumb-item"><a href="#">Cobranzas</a></li>
              <li class="breadcrumb-item active">Generar Cobranza</li>
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
              <h3 class="card-title">Generar Cobranza</h3>
            </div>
            <div class="card-body panel-body" id="listadoGC">
              <div id="tbllistadoCobranza">
                <table id="" class="table table-striped tablaDataTableC dt-responsive">
                  <thead>
                    <th>Opciones</th>
                    <th>RUC</th>
                    <th>Razón Social</th>
                    <th>Imagen</th>
                  </thead>
                  <tbody>
                  <?php 
                      $item = null;
                      $valor = null;
                      $clientes = ControladorClientes::ctrMostrarCliente($item,$valor);
                      foreach($clientes as $key => $value){
                        echo '<tr>
                          <th scope="row" class="text-center"><button class="btn btn-success btn-xs btnListarLocal" onclick="mostrarformDC(true)" idcliente="'.$value['idcliente'].'"><i class="fas fa-donate"></i></button></th>';
                          echo '<td>'.$value['ruc'].'</td>
                          <td>'.$value['razonsocial'].'</td>';
                          if($value["imagen"]!=""){
                            echo '<td><img src="'.$value['imagen'].'" width="50px"></td>';
                          }else{
                            echo '<td><img src="vistas/dist/img/avatar.png" width="50px"></td>';
                          }
                        echo'</tr>';
                      }
                  ?>
                  </tbody>
                  <tfoot>
                    <th>Opciones</th>
                    <th>RUC</th>
                    <th>Razón Social</th>
                    <th>Imagen</th>
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
                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <label>Fecha Vencimiento(*):</label>
                  <input type="date" class="form-control" name="fecha_vencimiento" id="fecha_vencimiento">
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <label>Planes</label>
                  <select name="idplan" id="idplan" class="form-control select2" data-live-search="true" required>
                    <option value="0" >Seleccione Plan ...</option>
                    <?php 
                      $item = 1;
                      $valor = null;
                      $servicio = ControladorDetalleCobranza::ctrMostrarPlanes($item,$valor);
                      foreach($servicio as $key => $value){ 
                        echo '<option value="'.$value['idplan'].'">'.$value['nombre'].'</option>';
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <label>Precio</label>
                  <input name="precio" id="precio" class="form-control">
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <label>Nota (Precio)</label>
                  <input name="nota" id="nota" class="form-control">
                </div>
                <div class="form-group col-lg-6 col-md-3 col-sm-6 col-xs-12">
                  <label>Descripción:</label>
                  <input type="text" class="form-control" name="descripcion" id="descripcion">
                </div>
              </div>
              <button class="btn btn-success btnAgregarCobranza">Generar Cobranza</button>
              <button class="btn btn-danger" onclick="cancelarGC()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
              <br/>
              <br/>
              <div id="tbllistadoCobranza">
                <table id="mostrarCobranza" class="table table-striped tablaDataTableC dt-responsive">
                  <thead>
                    <th>Opciones</th>
                    <th>Departamento</th>
                    <th>Distrito</th>
                    <th>Direccion</th>
                    <th>Fecha de Emisión</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Estado</th>
                    <th>Descripción</th>
                  </thead>
                  <tbody>
                    
                  </tbody>
                  <tfoot>
                    <th>Opciones</th>
                    <th>Departamento</th>
                    <th>Distrito</th>
                    <th>Direccion</th>
                    <th>Fecha de Emisión</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Estado</th>
                    <th>Descripción</th>
                  </tfoot>   
                </table>
              </div>
            </div>

            <!--<div class="card-body panel-body" id="formularioS">
              <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Servicio</label>
                  <select name="idservicio" id="idservicio" class="form-control select2" data-live-search="true" required>
                    <option value="0">Seleccione Servicio ...</option>
                    <?php /*
                      $item = 1;
                      $valor = null;
                      $servicio = ControladorDetalleCobranza::ctrMostrarServicio($item,$valor);
                      foreach($servicio as $key => $value){ 
                        echo '<option value="'.$value['idservicio'].'">'.$value['nombre'].'</option>';
                      }*/
                    ?>
                    </select>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Planes</label>
                  <select name="idplanes" id="idplanes" class="form-control select2" data-live-search="true" required>
                    <option value="0" >Seleccione Plan ...</option>
                    <?php 
                      /*$item = 1;
                      $valor = null;
                      $servicio = ControladorDetalleCobranza::ctrMostrarPlanes($item,$valor);
                      foreach($servicio as $key => $value){ 
                        echo '<option value="'.$value['idplan'].'">'.$value['nombre'].'</option>';
                      }*/
                    ?>
                  </select>
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <label>Precio</label>
                  <input name="idprecio" id="idprecio" class="form-control" disabled>
                </div>
                <div class="form-group col-lg-9 col-md-9 col-sm-6 col-xs-12">
                  <label>Observación</label>
                  <input name="idnota" id="idnota" class="form-control" required>
                </div>
              </div>
              <button class="btn btn-success btnAgregarDetCobranza">Generar Detalle</button>
              <button class="btn btn-danger" onclick="cancelarDetC()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
              <br/>
              <br/>
              <div id="tbllistadoDetCobranza">
                <table id="mostrarDetCobranza" class="table table-striped tablaDataTableC dt-responsive text-center">
                  <thead>
                    <th>Opciones</th>
                    <th>Servicio</th>
                    <th>Plan</th>
                    <th>Monto</th>
                    <th>Estado</th>
                    <th>Observación</th>
                  </thead>
                  <tbody>
                    
                  </tbody>
                  <tfoot>
                    <th>Opciones</th>
                    <th>Servicio</th>
                    <th>Plan</th>
                    <th>Monto</th>
                    <th>Estado</th>
                    <th>Observación</th>
                  </tfoot>   
                </table>
              </div>
            </div> -->
            </div>

          </div>
        </div>           
      </div>
    </div>
  </div>
</div>  

</div>

<!-- /.content-wrapper -->