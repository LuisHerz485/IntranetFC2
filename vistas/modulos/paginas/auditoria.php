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
              <li class="breadcrumb-item"><a href="#">Auditorias</a></li>
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
              <h3 class="card-title">Auditorias</h3>
            </div>
            <div class="card-body">
                <input class="form-control" type="hidden" name="idcliente" id="idcliente" value="<?php echo $_SESSION['idcliente']; ?>">
                <label for="">Tipo de archivos(*):</label>
                <select name="idtipoarchivo" id="idtipoarchivo" class="form-control select-picker" required>
                    <option value="0">Seleccione ...</option>
                    <?php
                        $item = 3;
                        $valor = null;
                        $tipoarchivo = ControladorTipoArchivo::ctrMostrarTipoArchivo($item,$valor);
                        foreach($tipoarchivo as $key => $value){ 
                            echo '<option value="'.$value['idtipoarchivo'].'">'.$value['descripcion'].'</option>';
                        }
                    ?>
                </select>
                <br/>
                <button class="btn btn-success btnMostrarArchivos">Mostrar</button>
                <br/><br/>
                <div id="tbllistado">
                    <table id="mostrarArchivo" class="table table-striped tablaDataTableC dt-responsive">
                        <thead>
                            <th>Opciones</th>
                            <th>Archivo</th>
                            <th>Fecha</th>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <th>Opciones</th>
                            <th>Archivo</th>
                            <th>Fecha</th>
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

