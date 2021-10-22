  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Administración de Usuarios</a></li>
              <li class="breadcrumb-item active">Tipo de usuarios</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <?php ControladorTipoUsuario::ctrCrearTipoUsuario(); ?>
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tipo de usuarios&emsp;<button class="btn btn-success" onclick="mostrarformTU(true)" id="btnagregar"><i class="fa fa-plus-circle"></i> Añadir</button></h3>
            </div>
            <div class="card-body panel-body" id="listadoregistrosTU">
              <div id="tbllistado">
                <table class="table table-striped tablaDataTipoUsuario dt-responsive">
                  <thead>
                    <th class="no-exportar">Opciones</th>
                    <th>Estado</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha/registro</th>
                  </thead>
                  <tbody>
                    <?php
                    $item = null;
                    $valor = null;
                    $tipousuario = ControladorTipoUsuario::ctrMostrarTipoUsuario($item, $valor);
                    foreach ($tipousuario as $key => $value) {
                      echo '<tr>
                          <th scope="row"><button class="btn btn-warning btn-s btnEditarTipoUsuario" onclick="mostrarformTU(true)" nombre="' . $value['nombre'] . '"><i class="fas fa-pencil-alt"></i></button></th>';
                      if ($value['estado'] != "1") {
                        echo '<td><button class="btn btn-danger btn-xs btnActivarTU" nombre="' . $value["nombre"] . '" estado="1">Inactivo</button></td>';
                      } else {
                        echo '<td><button class="btn btn-success btn-xs btnActivarTU" nombre="' . $value["nombre"] . '" estado="0">Activo</button></td>';
                      }
                      echo '<td>' . $value['nombre'] . '</td>
                          <td>' . $value['descripcion'] . '</td>
                          <td>' . $value['fechaCreada'] . '</td></tr>';
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <th class="no-exportar">Opciones</th>
                    <th>Estado</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha/registro</th>
                  </tfoot>
                </table>
              </div>
            </div>
            <div class="card-body panel-body" id="formularioregistrosTU">
              <form action="" name="formulario" id="formulario" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="">Nombre(*):</label>
                    <input class="form-control" type="hidden" name="editarTU" id="editarTU" value="no">
                    <input class="form-control" type="hidden" name="idtipousuario" id="idtipousuario">
                    <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="">Descripción(*):</label>
                    <input class="form-control" type="text" name="descripcion" id="descripcion" maxlength="100" placeholder="Descripción" required>
                  </div>
                  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                    <button class="btn btn-danger" id="btnCancelarFormTU" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>