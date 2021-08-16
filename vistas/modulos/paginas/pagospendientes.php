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
              <div class="row">
                <div class="col-6 d-flex justify-content-between align-items-center">
                <h3 class="card-title text-center ">Pagos Pendientes</h3>
                </div>
                <div class="col-6">
                <a href="https://fccontadores.com/servicios/" class="btn btn-warning float-sm-right" style="color: #000" target="_blank"><i class="fas fa-donate"> Pagar</i></a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div id="tbllistado">
                  <table id="mostrarPendiente" class="table table-striped tablaDataClientesPagos dt-responsive text-center">
                    <thead>
                      <th>Fecha de Emisión</th>
                      <th>Local</th>
                      <th>Servicio</th>
                      <th>Monto</th>
                      <th>Fecha de Vencimiento</th>
                      <th>Estado</th>
                      <th class="no-exportar">Constancia</th>
                    </thead>
                    <tbody>
                      <?php
                      $valor = $_SESSION['idcliente'];
                      $cobranza = ModeloCobranza::mdlMostrarCobranza($valor);
                      foreach($cobranza as $key => $value){
                        $detCob = ModeloDetalleCobranza::mdlMostrarDetalleCobranza($value['idcobranza']);
                          if($value['estado']=="0"){
                            echo '<tr>';
                            echo '<td>'.$value['fechaemision'].'</td>
                            <td>'.$value['direccion'].'</td>  
                            <td>'.$detCob[0]['plan'].'</td>
                            <td>'.$detCob[0]['monto'].'</td>
                            <td>'.$value['fechavencimiento'].'</td>
                            <td><button class="btn btn-primary btn-s">Pendiente</button></td>
                            <td><abbr title="Constancia"><button class="btn btn-primary btn-s btnConstancia" onclick="Swal.fire(\'No hay ningun pago!!\', \'\', \'info\')"><i class="fas fa-paste"></i></button></abbr></td>';
                            echo'</tr>';
                          }
                          else if($value['estado']=="2"){
                            echo '<tr>';
                            echo '<td>'.$value['fechaemision'].'</td>
                            <td>'.$value['direccion'].'</td>  
                            <td>'.$detCob[0]['plan'].'</td>
                            <td>'.$detCob[0]['monto'].'</td>
                            <td>'.$value['fechavencimiento'].'</td>
                            <td><button class="btn btn-warning btn-s">A deuda</button></td>
                            <td><abbr title="Constancia"><a href="ajax/generarPDF.php?idcobranza='.$value['idcobranza'].'" class="btn btn-warning btn-s btnConstancia" target="_blank"><i class="fas fa-paste"></i></a></abbr></td>';
                            echo'</tr>';
                          }
                          else if($value['estado']=="3"){
                            echo '<tr>';
                            echo '<td>'.$value['fechaemision'].'</td>
                            <td>'.$value['direccion'].'</td>  
                            <td>'.$detCob[0]['plan'].'</td>
                            <td>'.$detCob[0]['monto'].'</td>
                            <td>'.$value['fechavencimiento'].'</td>
                            <td><button class="btn btn-danger btn-s">Vencido</button></td>
                            <td><abbr title="Constancia"><button class="btn btn-danger btn-s btnConstancia" onclick="Swal.fire(\'Servicio vencido, pagar urgente!!\', \' atte. Sr Fredy\', \'warning\')"><i class="fas fa-paste"></i></button></abbr></td>';
                            echo'</tr>';
                          }
                        }
                      ?>
                    </tbody>
                    <tfoot>
                      <th>Fecha de Emisión</th>
                      <th>Local</th>
                      <th>Monto</th>
                      <th>Servicio</th>
                      <th>Fecha de Vencimiento</th>
                      <th>Estado</th>
                      <th>Constancia</th>
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

