<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Área Auditorias</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header" style="background-color: rgb(204,0,0);">
            <h3 class="card-title" style="color: white; font-size: 27px;">Auditorias</h3>
          </div>
          <div class="card-body">
            <input class="form-control" type="hidden" name="idcliente" id="idcliente" value="<?php echo $_SESSION['idcliente']; ?>">
            <label for="">Tipo de archivos(*):</label>
            <select name="idtipoarchivo" id="idtipoarchivo" class="form-control select-picker" required>
              <option value="0">Seleccione ...</option>
              <?php
              $item = 3;
              $valor = null;
              $tipoarchivo = ControladorTipoArchivo::ctrMostrarTipoArchivo($item, $valor);
              foreach ($tipoarchivo as $key => $value) {
                echo '<option value="' . $value['idtipoarchivo'] . '">' . $value['descripcion'] . '</option>';
              }
              ?>
            </select>
            <br />
            <button class="btn btn-success btnMostrarArchivos"><strong><i class="far fa-eye"></i> Mostrar</strong></button>
            <br /><br />
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