<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item h5"><a href="menuChecklist"><b class="text-red">Administración de CheckList</b></a></li>
            <li class="breadcrumb-item active h5">Área - Checklist</li></b>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card">
          <div class="card-header" style="background-color: rgb(204,0,0);">
            <div class="row">
              <div>
                <b style="color: white; font-size: 27px;">Asignar actividades - Checklist</b>
              </div>
              <div class="col" align="right">
                <abbr title="Ayuda"><button class="btn btn-warning btn-circle" style="margin-top: 0.5%;"><i class="fas fa-question-circle"></i></button></abbr>
              </div>
            </div>
          </div>
          <div id="listadoUserCL" class="card-body panel-body">
            <label class="text-primary h2" align="center">Este es tu equipo <i class="fas fa-users"></i></label>
            <?php if ($_SESSION['iddepartamento'] == 9) { ?>
              <div class="row">
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-10">
                  <label class="h5">Consultar por área:</label>
                  <select name="idarea" id="idarea" class="form-control select-picker select2" required>
                    <option value="0">Seleccione departamento...</option>
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
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin-top: 30px;">
                  <button class="btn btn-warning btnCheckArea"><strong><i class="far fas fa-search"></i> Mostrar</strong></button>
                </div>
              </div>
            <?php } ?>
            <div>
              <table id="listaCheckUser" class="table table-striped tablaDataTableC dt-responsive text-center">
                <thead style="background-color:lightgray; font-size: 20px;">
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Área</th>
                  <th>Opción</th>
                </thead>
                <tbody>
                  <?php
                  if ($_SESSION['iddepartamento'] != 9) {
                    $usuarios = ModeloUsuarios::mdlListarUsuariosPorDepartamento($_SESSION["iddepartamento"]);
                    if ($usuarios) {
                      foreach ($usuarios as $usuario) {
                        echo '<tr> 
                          <td>' . $usuario['nombre'] . ' ' . $usuario['apellidos'] . '</td>
                          <td>' . $usuario['email'] . '</td>
                          <td>' . $usuario['departamento'] . '</td>
                          <td><button class="btn btn-s btn-outline-danger btnListarCheckList" idusuario="' . $usuario["idusuario"] . '" iddepartamento="' . $usuario["iddepartamento"] . '" idtipousuario="' . $usuario["idtipousuario"] . '" onclick="mostrarformCL(true)"><i class="fas fa-tasks"></i></button></td>
                          </tr>';
                      }
                    }
                  } else if ($_SESSION['iddepartamento'] == 9) {
                    $item = null;
                    $valor = null;
                    $usergeneral = ControladorUsuarios::ctrMostrarUsuario($item, $valor);
                    if ($usergeneral) {
                      foreach ($usergeneral as $usuario) {
                        if ($usuario['estado'] == 1) {
                          echo '<tr> 
                          <td>' . $usuario['nombre'] . ' ' . $usuario['apellidos'] . '</td>
                          <td>' . $usuario['email'] . '</td>
                          <td>' . $usuario['departamento'] . '</td>
                          <td><button class="btn btn-s btn-warning btnListarCheckList" idusuario="' . $usuario["idusuario"] . '" iddepartamento="' . $usuario["iddepartamento"] . '" idtipousuario="' . $usuario["idtipousuario"] . '" onclick="mostrarformCL(true)"><i class="far fa-list-alt"></i></button></td>
                          </tr>';
                        }
                      }
                    }
                  }
                  ?>
                </tbody>
                <tfoot style="background-color:lightgray; font-size: 20px;">
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Área</th>
                  <th>Opción</th>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="card-body panel-body" id="formularioCheckList">
            <form id="frmFiltroChecklist">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 col-lg-3">
                    <label>Seleccione el estado:</label>
                    <input class="form-control" type="hidden" name="idusuario" id="idusuario2">
                    <select name="idestadochecklist" id="idestadochecklist" class="form-control select2" required>
                      <option value="0">Todos</option>
                      <?php
                      $estadosChecklist = ChecklistModelo::mdlListarEstadoCheckList();
                      if ($estadosChecklist) {
                        foreach ($estadosChecklist as $estadoChecklist) {
                          echo '<option value="' . $estadoChecklist["idestadochecklist"] . '">' . $estadoChecklist["nombre"] . '</option>';
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-12 col-lg-3">
                    <label>Seleccione Fecha Desde</label>
                    <input type="date" class="form-control" name="fechadesde" id="fechadesde" required>
                  </div>
                  <div class="col-12 col-lg-3">
                    <label>Seleccione Fecha Hasta</label>
                    <input type="date" class="form-control" name="fechahasta" id="fechahasta" required>
                  </div>
                  <div class="col-12 col-lg-3 mt-1" align="center">
                    <button type="button" value="filtrar" class="btn btn-outline-danger" id="btnFiltrarChecklist" name="btnFiltrarChecklist" style="margin-top: 10%; margin-left: 4%"><i class="fas fa-search"></i> Buscar Checklist</button>
                    <button type="button" class="btn btn-outline-success btnAgregarCL" style="margin-top: 10%; margin-left: 5%" data-toggle="modal" data-target="#modalCheckList"><i class="fas fa-plus"> Añadir</i></button>
                  </div>
                </div>
              </div>
            </form>
            <hr>
            <table id="mostrarCheckList" class="table table-striped tablaDataCheckList dt-responsive">
              <thead style="background-color:lightgray; font-size: 20px;">
                <th class="no-exportar">Opciones</th>
                <th>Actividad</th>
                <th>Fecha</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Estado</th>
              </thead>
              <tbody>
              </tbody>
              <tfoot style="background-color:lightgray; font-size: 20px;">
                <th class="no-exportar">Opciones</th>
                <th>Actividad</th>
                <th>Fecha</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Estado</th>
              </tfoot>
            </table>
            <div>
              <button class="btn btn-danger" id="btnCancelarCheckJefe" type="button"><i class="fa fa-arrow-circle-left"></i> Volver</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalCheckList" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <form id="frmChecklist" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><strong>Check List</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="input-group">
              <div class="row">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label>Actividades del día: </label>
                  <input type="date" name="fecha" class="form-control-fc">
                  <input class="form-control" type="hidden" name="idusuario" id="idusuario">
                  <input class="form-control" type="hidden" name="idtipousuario" id="idtipousuario">
                  <input class="form-control" type="hidden" name="iddepartamento" id="iddepartamento">
                  <button class="btn btn-warning float-sm-right btnAgregarActividad" type="button"><i class="fas fa-check-double"></i> Agregar</button>
                </div>
                <hr class="col-10 bg-dark">
                <div class="container-fluid" id="modalBodyActividades">
                  <section class="row">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <label>Actividad </label>
                      <textarea name="detalle[]" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <label>Estado</label>
                      <select name="idestadochecklist[]" class="custom-select select-estado-actividad" data-live-search="true" required>
                        <?php
                        $estadosChecklist = ChecklistModelo::mdlListarEstadoCheckList();
                        foreach ($estadosChecklist as $estadoChecklist) {
                          echo '<option value="' . $estadoChecklist["idestadochecklist"] . '">' . $estadoChecklist["nombre"] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12">
                      <label>Hora Inicio</label>
                      <input type="time" name="horainicio[]" class="form-control" min="8:00">
                    </div>
                    <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12">
                      <label>Hora Fin</label>
                      <input type="time" name="horafin[]" class="form-control">
                    </div>
                    <div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-12">
                      <label>Opciones</label>
                      <button class="form-control btn btn-danger float-sm-right btn-eliminar-actividad" type="button"><i class="fas fa-trash-alt"></i> Eliminar</button>
                    </div>
                    <hr class="col-10 bg-dark">
                  </section>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="btnGuardarActividades" type="button" class="btn btn-primary border"><i class="fas fa-lg fa-save"></i> Guardar</button>
          <button id="btnSalirActividad" type="button" class="btn btn-light border" data-dismiss="modal"><i class="far fa-times-circle"></i> Salir</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="modalEditarActividad" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <form id="frmEditarChecklist" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><strong>Editar Actividad</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="input-group">
              <div class="row">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label>Actividad</label>
                  <input class="form-control" type="hidden" name="iddetallechecklist" id="iddetallechecklist">
                  <textarea id="detalle" name="detalle" class="form-control"></textarea>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <label>Estado</label>
                  <select id="idestadochecklist2" name="idestadochecklist" class="custom-select select-estado-actividad" data-live-search="true" required>
                    <?php
                    foreach ($estadosChecklist as $estadoChecklist) {
                      echo '<option value="' . $estadoChecklist["idestadochecklist"] . '">' . $estadoChecklist["nombre"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <label>Hora Inicio</label>
                  <input type="time" id="horainicio" name="horainicio" class="form-control" min="8:00">
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <label>Hora Fin</label>
                  <input type="time" id="horafin" name="horafin" class="form-control">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="btnEditarActividad" type="button" class="btn btn-primary btnEditarActividad"><i class="fas fa-lg fa-save"></i> Guardar</button>
          <button id="btnSalirEditarActividad" type="button" class="btn btn-light border" data-dismiss="modal"><i class="far fa-times-circle"></i> Salir</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="modalVerActividad" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title"><strong>Ver Actividad</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <textarea id="detalle2" name="detalle" class="form-control" rows="5" placeholder="Descripicion" disabled></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="btnSalirVerActividad" type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>