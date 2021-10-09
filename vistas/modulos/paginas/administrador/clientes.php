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
            <li class="breadcrumb-item"><a href="#">Administración de Clientes</a></li>
            <li class="breadcrumb-item active">Clientes</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <?php
  ControladorClientes::ctrCrearCliente();
  ControladorClientes::ctrEditarContra();
  ?>
  <!-- /.content-header -->
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Clientes&emsp;<button class="btn btn-success" onclick="mostrarformC(true)" id="btnagregar"><i class="fa fa-plus-circle"></i> Añadir</button></h3>
          </div>
          <div class="card-body panel-body" id="listadoregistrosC">
            <div id="tbllistado">
              <table id="" class="table table-striped tablaDataClientes dt-responsive">
                <thead>
                  <th class="no-exportar">Opciones</th>
                  <th>Estado</th>
                  <th>RUC</th>
                  <th>Razón Social</th>
                  <th class="no-exportar">Imagen</th>
                </thead>
                <tbody>
                  <?php
                  $item = null;
                  $valor = null;
                  $clientes = ControladorClientes::ctrMostrarCliente($item, $valor);
                  foreach ($clientes as $key => $value) {
                    echo '<tr>
                          <th scope="row"><button class="btn btn-warning btn-s btnEditarCliente" onclick="mostrarformC(true)" idcliente="' . $value['idcliente'] . '"><i class="fas fa-pencil-alt"></i></button> <button class="btn btn-secondary btn-s btnEditarDetalleCliente" onclick="mostrarDetformC(true)" idcliente="' . $value['idcliente'] . '"><i class="far fa-address-book"></i></button> <button class="btn btn-info btn-s btnContraC" idcliente="' . $value['idcliente'] . '" data-toggle="modal" data-target="#modalContra"><i class="fas fa-key"></i></button></th>';
                    if ($value['estado'] != "1") {
                      echo '<td><button class="btn btn-danger btn-xs btnActivarC" idcliente="' . $value["idcliente"] . '" estado="1">Inactivo</button></td>';
                    } else {
                      echo '<td><button class="btn btn-success btn-xs btnActivarC" idcliente="' . $value["idcliente"] . '" estado="0">Activo</button></td>';
                    }
                    echo '<td>' . $value['ruc'] . '</td>
                          <td>' . $value['razonsocial'] . '</td> ';
                    if ($value["imagen"] != "") {
                      echo '<td><img src="' . $value['imagen'] . '" width="50px"></td>';
                    } else {
                      echo '<td><img src="vistas/dist/img/avatar.png" width="50px"></td>';
                    }
                    echo '</tr>';
                  }
                  ?>
                </tbody>
                <tfoot>
                  <th>Opciones</th>
                  <th>Estado</th>
                  <th>RUC</th>
                  <th>Razón Social</th>
                  <th>Imagen</th>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="card-body panel-body" id="formularioregistrosC">
            <form action="" name="formulario" id="formulario" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">RUC(*):</label>
                  <input class="form-control" type="hidden" name="editarDA" id="editarDA" value="no">
                  <input class="form-control" type="hidden" name="idcliente" id="idcliente">
                  <input class="form-control" type="text" name="ruc" id="ruc" maxlength="12" placeholder="RUC" required>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Razón Social(*):</label>
                  <input class="form-control" type="text" name="razonsocial" id="razonsocial" maxlength="100" placeholder="Razón Social" required>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Login(*):</label>
                  <input class="form-control" type="text" name="logincliente" id="logincliente" maxlength="20" placeholder="Login" required>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12" id="claves">
                  <label for="">Contraseña(*):</label>
                  <button class="btn btn-info" type="button" onclick="generar(10);">Generar</button>
                  <input class="form-control" type="text" name="contrasenacliente" id="contrasenacliente" maxlength="64" placeholder="Contraseña">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Identificador Google Drive(*):</label>
                  <input class="form-control" type="text" name="iddrive" id="iddrive" maxlength="20" placeholder="ID Google Drive" required>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label class="panel" for="">Imagen:</label>
                  <input type="file" class="nuevaFoto center-block" name="nuevaFoto" id="nuevaFoto">
                  <input class="form-control" type="hidden" name="fotoaux" id="fotoaux">
                  <p class="center-block">Peso maximo de la foto 2Mb</p>
                  <img src="vistas/dist/img/avatar.png" class="thumbnail center-block previsualizar" alt="" width="150px" id="imagenmuestra" name="imagenmuestra">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                  <button class="btn btn-danger" id="btnCancelarformClientes" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                </div>
              </div>
            </form>
          </div>
          <div class="card-body panel-body" id="formulariodetalleC">
            <div class="row">
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Cargo(*):</label>
                <input type="text" class="form-control" name="detallecargo" id="detallecargo" required>
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Nombres y Apellidos(*):</label>
                <input type="hidden" class="form-control" name="idclienteA" id="idclienteA" required>
                <input class="form-control" type="hidden" name="editarAg" id="editarAg" value="no">
                <input class="form-control" type="hidden" name="idrepresentante" id="idrepresentante">
                <input type="text" class="form-control" name="nombrecompleto" id="nombrecompleto" required>
              </div>
              <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <label>Telefono1(*):</label>
                <input type="text" class="form-control" name="telefono1" id="telefono1" required>
              </div>
              <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <label>Correo1(*):</label>
                <input type="text" class="form-control" name="correo1" id="correo1">
              </div>
              <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <label>Telefono2:</label>
                <input type="text" class="form-control" name="telefono2" id="telefono2" required>
              </div>
              <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <label>Correo2:</label>
                <input type="text" class="form-control" name="correo2" id="correo2">
              </div>
            </div>
            <button class="btn btn-success btnAgregarAgenda">Agregar</button>
            <button class="btn btn-primary" onclick="limpiarAgenda()" type="button">Limpiar</button>
            <button class="btn btn-danger" onclick="cancelarDetformC()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
            <br />
            <br />
            <div id="tbllistado">
              <table id="mostrarAgenda" class="table table-striped tablaDataTable dt-responsive">
                <thead>
                  <th>Opciones</th>
                  <th>Cargo</th>
                  <th>Nombre Completo</th>
                  <th>Telefono1</th>
                  <th>Telefono2</th>
                  <th>Correo1</th>
                  <th>Correo2</th>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                  <th>Opciones</th>
                  <th>Cargo</th>
                  <th>Nombre Completo</th>
                  <th>Telefono1</th>
                  <th>Telefono2</th>
                  <th>Correo1</th>
                  <th>Correo2</th>
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

<!-- Modal Contraseña -->
<div class="modal fade" id="modalContra" role="dialog">
  <div class="modal-dialog">
    <form role="form" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cambio de contraseña</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fas fa-key"></i></span>
              <input class="form-control" type="hidden" name="idusuario1" id="idusuario1">
              <input type="password" name="contra" id="contra" class="form-control input-lg" placeholder="Ingrese Nueva Contraseña" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- /.content-wrapper -->