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
              <li class="breadcrumb-item"><a href="#">Seguimiento de Pagos</a></li>
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
              <h3 class="card-title">Pagos Realizados</h3>
            </div>
            <div class="card-body">
                <div id="tbllistado">
                    <table id="mostrarArchivo" class="table table-striped tablaDataPagos   dt-responsive text-center">
                        <thead>
                          <<th>Fecha de Emisión</th>
                          <th>Fecha de Vencimiento</th>
                          <th>Servicio</th>
                          <th>Monto Actual</th>
                          <th>Local</th>
                        </thead>
                        <tbody>
                          <?php
                          $valor = $_SESSION['idcliente'];
                          $cobranza = ModeloCobranza::mdlMostrarCobranza($valor);
                          foreach($cobranza as $key => $value){
                            $detCob = ModeloDetalleCobranza::mdlMostrarDetalleCobranza($value['idcobranza']);
                          if($value['estado']!="0"){
                            echo '<tr>';
                            echo '<td>'.$value['fechaemision'].'</td>
                            <td>'.$value['fechavencimiento'].'</td>
                            <td>'.$detCob[0]['monto'].'</td>
                            <td>'.$detCob[0]['plan'].'</td>
                            <td>'.$value['direccion'].'</td>';
                            echo'</tr>';
                          }
                        }
                      ?>
                        </tbody>
                        <tfoot>
                          <th>Fecha de Emisión</th>
                          <th>Fecha de Vencimiento</th>
                          <th>Servicio</th>
                          <th>Monto Actual</th>
                          <th>Local</th>
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

<!-- /.content-wrapper -->

