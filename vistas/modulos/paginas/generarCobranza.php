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
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <label>Departamento(*):</label>
                  <input class="form-control" type="hidden" name="idcliente" id="idcliente">
                  <select name="iddepartamento" id="iddepartamento" class="form-control select2" data-live-search="true" required>
                    
                  </select>
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <label>Distrito(*):</label>
                  <select name="iddistrito" id="iddistrito" class="form-control select2" data-live-search="true" required>
                    
                  </select>
                </div>
                <div class="form-group col-lg-6 col-md-3 col-sm-6 col-xs-12">
                  <label for="">Local(*):</label>
                  <select name="iddireccion" id="iddireccion" class="form-control select2" data-live-search="true" required>
                    
                  </select>
                </div>
              </div>
              <button class="btn btn-success btnAgregarCobranza">Generar Cobranza</button>
              <button class="btn btn-danger" onclick="cancelarGC()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
              <br/>
              <br/>
              <div id="tbllistadoCobranza">
                <table id="mostrarAgenda" class="table table-striped tablaDataTableC dt-responsive">
                  <thead>
                    <th>Opciones</th>
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
                    <th>Direccion</th>
                    <th>Fecha de Emisión</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Estado</th>
                    <th>Descripción</th>
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

<!-- /.content-wrapper -->