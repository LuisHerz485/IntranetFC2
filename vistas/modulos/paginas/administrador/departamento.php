<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item h5"><a href="#"><b class="text-red">Administración de Áreas</b></a></li>
            <li class="breadcrumb-item active h5">Áreas</li></b>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <?php ControladorDepartamento::ctrCrearDepartamento(); ?>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-danger">
          <div class="card-header">
            <b class="h4">Departamentos de la empresa</b>
          </div>
          <div class="mt-4 ml-5 h2">
            <b><button class="btn btn-outline-danger centro" onclick="mostrarformD(true)" id="btnagregar"><i class="fas fa-plus-circle"> Seleccione este botón para añadir departamento</button></b></i>
          </div>
          <div class="card-body panel-body" id="listadoregistrosD">
            <div id="tbllistado">
              <table class="table table-striped tablaDataAreas dt-responsive">
                <thead>
                  <th class="no-exportar">Opciones</th>
                  <th>Estado</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Fecha de registro</th>
                </thead>
                <tbody>
                  <?php
                  $item = null;
                  $valor = null;
                  $departamento = ControladorDepartamento::ctrMostrarDepartamento($item, $valor);
                  foreach ($departamento as $key => $value) {
                    echo '<tr>
                          <th scope="row"><abbr title="Editar departamento"><button class="btn btn-warning btn-s btnEditarDepartamento btn-circle btn-xl" onclick="mostrarformD(true)" nombre="' . $value['nombre'] . '"><i class="fas fa-pencil-alt"></i></button></abbr></th>';
                    if ($value['estado'] != "1") {
                      echo '<td><button class="btn btn-danger btn-xs btnActivarD" nombre="' . $value["nombre"] . '" estado="1">Inactivo</button></td>';
                    } else {
                      echo '<td><button class="btn btn-success btn-xs btnActivarD" nombre="' . $value["nombre"] . '" estado="0">Activo</button></td>';
                    }
                    echo '<td>' . $value['nombre'] . '</td>
                          <td>' . $value['descripcion'] . '</td>
                          <td>' . $value['fechaCreada'] . '</td></tr>';
                  }
                  ?>
                </tbody>
                <tfoot>
                  <th>Opciones</th>
                  <th>Estado</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Fecha/registro</th>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="card-body panel-body" id="formularioregistrosD">
            <form action="" name="formulario" id="formulario" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Nombre(*):</label>
                  <input class="form-control" type="hidden" name="editarD" id="editarD" value="no">
                  <input class="form-control" type="hidden" name="iddepartamento" id="iddepartamento">
                  <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Descripción(*):</label>
                  <input class="form-control" type="text" name="descripcion" id="descripcion" maxlength="100" placeholder="Descripción" required>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                  <button class="btn btn-danger" id="btnCancelarFormDepartamento" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>