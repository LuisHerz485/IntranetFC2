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
            <li class="breadcrumb-item active h5">Consulta</li></b>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-danger">
          <div class="card-header">
            <div class="row">
              <div>
                <b class="h4">Consulta - Checklist</b>
              </div>
              <div class="col" align="right">
                <abbr title="Ayuda"><button class="btn btn-warning btn-circle" data-toggle="modal" data-target="#modalAyudaCheckAdmi"><i class="fas fa-question-circle"></i></button></abbr>
              </div>
            </div>
          </div>
          <div class="card-body panel-body" id="formularioCheckListColaborador">
            <form method=POST id="frmFiltroChecklistAdmin">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 col-lg-3">
                    <label>Seleccione el Colaborador:</label>
                    <select name="idusuario" class="form-control select2" required>
                      <?php
                      if ($usuarios = ModeloUsuarios::mdlMostrarUsuariosNombre()) {
                        foreach ($usuarios as $usuario) {
                          echo '<option value="' . $usuario['idusuario'] . '">' . $usuario['nombre'] . ' ' . $usuario['apellidos'] . '</option>';
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
                  <div class="col-12 col-lg-3 mt-2" align="right">
                    <button type="button" value="filtrar" class="btn btn-outline-danger" id="btnFiltrarChecklistAdmin" name="btnFiltrarChecklistAdmin"><i class="fas fa-search"></i> Buscar Checklist</button>
                  </div>
                </div>
              </div>
            </form>
            <hr>
            <table id="mostrarCheckList" class="table table-striped tablaDataCheckList dt-responsive">
              <thead>
                <th class="no-exportar">Opciones</th>
                <th>Actividad</th>
                <th>Fecha</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Estado</th>
              </thead>
              <tbody>
              </tbody>
              <tfoot>
                <th class="no-exportar">Opciones</th>
                <th>Actividad</th>
                <th>Fecha</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Estado</th>
              </tfoot>
            </table>
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
                  <input class="form-control" type="hidden" name="idusuario" id="idusuario" value="<?php echo $_SESSION['idusuario']; ?>">
                  <input class="form-control" type="hidden" name="idtipousuario" id="idtipousuario" value="<?php echo $_SESSION['idtipousuario']; ?>">
                  <input class="form-control" type="hidden" name="iddepartamento" id="iddepartamento" value="<?php echo $_SESSION['iddepartamento']; ?>">
                  <button class="btn btn-warning float-sm-right btnAgregarActividad" type="button"><i class="fas fa-plus"></i>Agregar</button>
                </div>
                <hr class="col-10 bg-dark">
                <div class="container-fluid" id="modalBodyActividades">
                  <section class="row">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <label>Actividad</label>
                      <textarea name="detalle[]" class="form-control" maxlength="500" required></textarea>
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
                      <button class="form-control btn btn-danger float-sm-right btn-eliminar-actividad" type="button"><i class="fas fa-trash-alt"></i>Eliminar</button>
                    </div>
                    <hr class="col-10 bg-dark">
                  </section>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="btnGuardarActividades" type="button" class="btn btn-info">Guardar</button>
          <button id="btnSalirActividad" type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
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

<div class="modal fade" id="modalAyudaCheckAdmi" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h4 class="modal-title text-yellow"><strong>Sección Ayuda <i class="far fa-question-circle"></i></strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <strong class="">Bienvenido a la sección ayuda de "Consulta CheckList"</strong>
              <ul>
                <li>Esta sección nos brindará información sobre los checklist de un colaborador en especifico de la empresa. </li>
                <ol type="I">
                  <li> Se debe buscar el nombre del colaborador del cual se desea saber el checklist.</li>
                  <li> Se busca un rango en especifico de fechas para generar la lista de checklist.</li>
                  <li> Luego se selecciona el botón "Buscar checklis" (se encuentra en la parte extrema superior derecha).</li>
                </ol>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-yellow" al>
        <b><i class="fas fa-info-circle"></i> Para más orientación ir a la sección "Ayuda" del menú principal</b>
      </div>
    </div>
  </div>
</div>