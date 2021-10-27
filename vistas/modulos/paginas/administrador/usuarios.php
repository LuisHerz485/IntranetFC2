  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item h5"><a href="#"><b class="text-red">Administración de Usuarios</b></a></li>
              <li class="breadcrumb-item active h5">Usuarios</li></b>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <?php ControladorUsuarios::ctrCrearUsuario(); ?>
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-danger">
            <div class="card-header">
              <b class="h4">Colaboradores de la empresa</b>
            </div>
            <div class="mt-4 ml-5 h2">
              <b><button button class="btn btn-outline-danger centro" onclick="mostrarform(true)" id="btnagregar"><i class="fas fa-user-plus"> Seleccione este botón para añadir usuario</button></b></i>
            </div>
            <div class="card-body panel-body" id="listadoregistros">
              <div id="tbllistado">
                <table class="table table-striped tablaDataUsuario dt-responsive">
                  <thead>
                    <?php
                    if ($_SESSION['idtipousuario'] == 1) { ?>
                      <th class="no-exportar">Opciones</th><?php } ?>
                    <th>Estado</th>
                    <th>Área</th>
                    <th>Nombre Completo</th>
                    <th>Email</th>
                    <th class="no-exportar">Foto</th>
                  </thead>
                  <tbody>
                    <?php
                    $item = null;
                    $valor = null;
                    $usuarios = ControladorUsuarios::ctrMostrarUsuario($item, $valor);
                    foreach ($usuarios as $key => $value) {
                      if ($_SESSION['idtipousuario'] == 1) {
                        echo '<tr>
                          <th scope="row"><abbr title="Editar Usuario"><button class="btn btn-warning btn-circle btn-xl btnEditarUsuario" onclick="mostrarform(true)" login="' . $value['usuario'] . '"><i class="fas fa-pencil-alt"></i></button></abbr> <abbr title="Cambiar Contraseña"><button class="btn btn-info btn-circle btn-xl btnContra" login="' . $value['usuario'] . '" data-toggle="modal" data-target="#modalContra"><i class="fas fa-key"></i></button></abbr></th>';
                      }
                      if ($value['estado'] != "1") {
                        echo '<td><button class="btn btn-danger btn-xs  btnActivarUs" login="' . $value["usuario"] . '" estado="1">Inactivo</button></td>';
                      } else {
                        echo '<td><button class="btn btn-success btn-xs btnActivarUs" login="' . $value["usuario"] . '" estado="0">Activo</button></td>';
                      }
                      echo '<td>' . $value['departamento'] . '</td>
                          <td>' . $value['nombre'] . ' ' . $value['apellidos'] . '</td>
                          <td>' . $value['email'] . '</td>';
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
                    <?php
                    if ($_SESSION['idtipousuario'] == 1) { ?>
                      <th class="no-exportar">Opciones</th><?php } ?>
                    <th>Estado</th>
                    <th>Área</th>
                    <th>Nombre Completo</th>
                    <th>Email</th>
                    <th>Foto</th>
                  </tfoot>
                </table>
              </div>
            </div>
            <div class="card-body panel-body" id="formularioregistros">
              <form action="" name="formulario" id="formulario" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="">Tipo usuario(*):</label>
                    <select name="idtipousuario" id="idtipousuario" class="form-control select-picker" required>
                      <option value="0">Seleccione ...</option>
                      <?php
                      $item = 1;
                      $valor = null;
                      $tipousuario = ControladorTipoUsuario::ctrMostrarTipoUsuario($item, $valor);
                      foreach ($tipousuario as $key => $value) {
                        echo '<option value="' . $value['idtipousuario'] . '">' . $value['nombre'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="">Departamento(*):</label>
                    <select name="iddepartamento" id="iddepartamento" class="form-control select-picker" required>
                      <option value="0">Seleccione ...</option>
                      <?php
                      $item = 1;
                      $valor = null;
                      $departamento = ControladorDepartamento::ctrMostrarDepartamento($item, $valor);
                      foreach ($departamento as $key => $value) {
                        echo '<option value="' . $value['iddepartamento'] . '">' . $value['nombre'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="">Nombre(*):</label>
                    <input class="form-control" type="hidden" name="editar" id="editar" value="no">
                    <input class="form-control" type="hidden" name="idusuario" id="idusuario">
                    <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="">Apellidos(*):</label>
                    <input class="form-control" type="text" name="apellidos" id="apellidos" maxlength="100" placeholder="Apellidos" required>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="">Email: </label>
                    <input class="form-control" type="email" name="email" id="email" maxlength="70" placeholder="email">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="">Login(*):</label>
                    <input class="form-control" type="text" name="login" id="login" maxlength="20" placeholder="nombre de usuario" required>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12" id="claves" name="claves">
                    <label for="">Clave de ingreso(*):</label>
                    <input class="form-control" type="password" name="clave" id="clave" maxlength="64" placeholder="Clave">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12" id="claves1">
                    <label for="">Clave de asistencia(*):</label>
                    <abbr title="Genera código automático"><button class="btn btn-info   btn-xs" type="button" onclick="generarU(6)"></abbr>Generar</button>
                    <input class="form-control" type="text" name="codigo_persona" id="codigo_persona" maxlength="64" placeholder="Clave">
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
                    <button class="btn btn-danger" id="btnCancelarFormUsuarios" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
          <?php
          $contrausuario = new ControladorUsuarios();
          $contrausuario->ctrEditarContra();
          ?>
        </div>
      </form>
    </div>
  </div>