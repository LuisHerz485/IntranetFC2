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
            <li class="breadcrumb-item"><a href="#">Administración</a></li>
            <li class="breadcrumb-item active">Check List</li>
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
            <h3 class="card-title">Check List - Personal</h3>
          </div>
          <div class="card-body panel-body" id="formularioCheckListColaborador">
            <form method=POST id="frmFiltroChecklist">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-3">
                    <label>Seleccione el estado:</label>
                    <select name="idestadochecklist" id="idestadochecklist" class="form-control select2" required>
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
                  <div class="col-3">
                    <label>Seleccione Fecha Desde</label>
                    <input type="date" class="form-control" name="fechadesde" id="fechadesde" required>
                  </div>
                  <div class="col-3">
                    <label>Seleccione Fecha Hasta</label>
                    <input type="date" class="form-control" name="fechahasta" id="fechahasta" required>
                  </div>
                  <div class="col-3">
                    <label>Opciones</label>
                    <button type="button" value="filtrar" class="btn btn-primary  btn-block" id="btnFiltrarChecklist" name="btnFiltrarChecklist"><i class="fas fa-search"></i> Filtrar</button>
                  </div>
                </div>
              </div>
            </form>
            <hr>
            <table id="mostrarCheckList" class="table table-striped tablaDataCheckList dt-responsive">
              <thead>
                <th>Actividad</th>
                <th>Fecha</th>
                <th>Tiempo</th>
                <th>Estado</th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>