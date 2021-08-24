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
              <li class="breadcrumb-item"><a href="#">Asistencia</a></li>
              <li class="breadcrumb-item active">Reportes</li>
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
              <h3 class="card-title">Consulta de Cobranza General</h3>
            </div>
            <div class="card-body panel-body" id="listadoregistrosR">
            <div class="row">
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <label>Fecha</label>
                  <input type="month" class="form-control" name="fecha_busquedaC" id="fecha_busquedaC">
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <button class="btn btn-warning btn-s btnFiltro"><strong><i class="far fa-eye"></i> Mostrar</strong></button>
                </div>
              </div>
            <div id="tbllistadoCobranza">
                <table id="mostrarCobranza" class="table table-striped tablaDataCobranza dt-responsive">
                  <thead>
                    <th class="no-exportar">Opciones</th>
                    <th>RUC</th>
                    <th>Razón Social</th>
                    <th>Plan</th>
                    <th>Monto</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Estado</th>
                  </thead>
                  <tbody>
                    
                  </tbody>
                  <tfoot>
                    <th>Opciones</th>
                    <th>RUC</th>
                    <th>Razón Social</th>
                    <th>Plan</th>
                    <th>Monto</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Estado</th>
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

<!-- /.content-wrapper -->

