<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item h5"><a href="#"><b class="text-red">Seguimiento de pagos</b></a></li>
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
              <b class="h4" style="color: white; font-size: 27px;">Pagos pendiendes</b>
          </div>
          <div class="mt-4 ml-5 h2">
              <a href="https://fccontadores.com/servicios/" class="btn btn-outline-danger centro"><i class="fas fa-donate"> Seleccione este botón para Pagar</i></a>
            </div>
          <div class="card-body">
            <div id="tbllistado">
              <table id="mostrarPendiente" class="table table-striped tablaDataClientesPagos dt-responsive text-center">
                <thead style="background-color:lightgray; font-size: 20px;">
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
                  foreach ($cobranza as $key => $value) {
                    $detCob = ModeloDetalleCobranza::mdlMostrarDetalleCobranza($value['idcobranza']);
                    if ($value['estado'] == "0") {
                      echo '<tr>';
                      echo '<td>' . $value['fechaemision'] . '</td>
                            <td>' . $value['direccion'] . '</td>  
                            <td>' . $detCob[0]['plan'] . '</td>
                            <td>' . $detCob[0]['monto'] . '</td>
                            <td>' . $value['fechavencimiento'] . '</td>
                            <td><button class="btn btn-primary btn-sm">Pendiente</button></td>
                            <td><abbr title="Constancia"><form action="ajax/generarPDF.php" method="POST" target="_blank"> <input type="hidden" name="idcobranza"  value="' . $value['idcobranza'] . '" /><button type="submit" class="btn btn-primary btn-circle btn-xl"><i class="fas fa-paste"></i></button></form></abbr></td>';
                      echo '</tr>';
                    } else if ($value['estado'] == "2") {
                      echo '<tr>';
                      echo '<td>' . $value['fechaemision'] . '</td>
                            <td>' . $value['direccion'] . '</td>  
                            <td>' . $detCob[0]['plan'] . '</td>
                            <td>' . $detCob[0]['monto'] . '</td>
                            <td>' . $value['fechavencimiento'] . '</td>
                            <td><button class="btn btn-warning btn-sm">A deuda</button></td>
                            <td><abbr title="Constancia"><form action="ajax/generarPDF.php" method="POST" target="_blank"> <input type="hidden" name="idcobranza"  value="' . $value['idcobranza'] . '" /><button type="submit" class="btn btn-warning btn-circle btn-xl"><i class="fas fa-paste"></i></button></form></abbr></td>';
                      echo '</tr>';
                    } else if ($value['estado'] == "3") {
                      echo '<tr>';
                      echo '<td>' . $value['fechaemision'] . '</td>
                            <td>' . $value['direccion'] . '</td>  
                            <td>' . $detCob[0]['plan'] . '</td>
                            <td>' . $detCob[0]['monto'] . '</td>
                            <td>' . $value['fechavencimiento'] . '</td>
                            <td><button class="btn btn-danger btn-sm">Vencido</button></td>
                            <td><abbr title="Constancia"><button type="submit" class="btn btn-danger btn-circle btn-xl" btnConstancia" onclick="Swal.fire(\'Servicio vencido, pagar urgente!!\', \' atte. Sr. Fredy\', \'warning\')"><i class="fas fa-paste"></i></button></abbr></td>';
                      echo '</tr>';
                    }
                  }
                  ?>
                </tbody>
                <tfoot style="background-color:lightgray; font-size: 20px;">
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