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
              <h3 class="card-title">Conbranza&emsp;
                <button class="btn btn-success" onclick="mostrarformGC" id="btnagregar"><i class="fa fa-plus-circle"> Añadir</i></button>
              </h3>
            </div>
            <div class="card-body panel-body" id="listadoregistrosC">
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
                  <select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true" required>
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
                    <th>Ruc</th>
                    <th>Razon Social</th>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

</div>