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
        <div class="card card">
          <div class="card-header" style="background-color: rgb(204,0,0);">
            <b style="color: white; font-size: 27px;">Departamentos de la empresa</b>
            <b><button class="btn bg-yellow" style="margin-left: 50%;" onclick="mostrarformD(true)" id="btnagregar"><i class="fas fa-plus"> Añadir departamento</button></b></i>
          </div>
          <div class="card-body panel-body" id="listadoregistrosD">
            <div id="tbllistado">
              <table class="table table-striped tablaDataAreas dt-responsive">
                <thead style="background-color:lightgray; font-size: 20px;">
                  <th class="no-exportar" style="width: 8%;">Opciones</th>
                  <th style="width: 8%;">Estado</th>
                  <th style="width: 30%;">Nombre</th>
                  <th style="width: 30%;">Descripción</th>
                  <th style="width: 24%;">Fecha de registro</th>
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
                <tfoot style="background-color:lightgray; font-size: 20px;">
                  <th>Opciones</th>
                  <th>Estado</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Fecha de registro</th>
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