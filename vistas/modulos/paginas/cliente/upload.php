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
              <li class="breadcrumb-item"><a href="#">Mis Archivos</a></li>
              <li class="breadcrumb-item active">Subir archivos</li>
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
              <h3 class="card-title">Subida de Archivo</h3>
            </div>
            <div class="card-body panel-body text-center" id="listadoregistrosD">
              <h1><strong>Sube tus archivos</strong></h1>
              <form name="upload" id="upload" method="POST" enctype="multipart/form-data" >
                <br/>
                <h3>Elige tus archivos:</h3>
                <input type="file" name="archivos[]" multiple="">	
                <?php
                  $subirarchivo = new ControladorUpload();
                  $subirarchivo -> ctrSubirArchivo();
                ?>
                <br/>
                <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-save"></i> Subir</button>
              </form>
            </div>
          </div>
        </div>           
      </div>
    </div>
  </div>
</div>

<!-- /.content-wrapper -->

