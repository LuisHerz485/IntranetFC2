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
            <li class="breadcrumb-item"><a href="#">Servicios </a></li>
            <li class="breadcrumb-item active">Tipo de servicio</li>
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
            <h3 class="card-title">Tipo de servicios&emsp;<button class="btn btn-success" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-plus-circle"></i> Añadir</button></h3>
          </div>
          <div class="card-body" id="listadoregistros">
            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-6">
              <label for="">Categoria de servicio(*):</label>
              <select name="idcategoriaservicio" id="idcategoriaservicio" class="form-control select-picker select2" required>
                <option value="0">Seleccione categoria...</option>
                <?php
                $item = 1;
                $valor = null;
                $servicio = ControladorTipoServicio::ctrMostrarCategoriaServicio($item, $valor);
                foreach ($servicio as $key => $value) {
                  echo '<option value="' . $value['idcategoriaservicio'] . '">' . $value['nombre'] . '</option>';
                }
                ?>
              </select>
              <br />
              <button class="btn btn-warning btnMostrarArchivosS"><strong><i class="far fa-eye"></i> Mostrar</strong></button>
            </div>
            <div id="tbllistado">
              <table id="mostrarArchivoS" class="table table-striped tablaDataTipoUsuario dt-responsive">
                <thead>
                  <th class="no-exportar">Opciones</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Precio</th>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                  <th>Opciones</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Precio</th>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="card-body panel-body" id="formularioregistros">
            <form action="" name="formulario" id="formulario" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Categoria Servicio(*):</label>
                  <select name="idcategoriaservicio" id="idcategoriaservicio" class="form-control select-picker" required>
                    <option value="0">Seleccione Categoria ...</option>
                    <?php
                    $item = 1;
                    $valor = null;
                    $departamento = ControladorTipoServicio::ctrMostrarCategoriaServicio($item, $valor);
                    foreach ($servicio as $key => $value) {
                      echo '<option value="' . $value['idcategoriaservicio'] . '">' . $value['nombre'] . '</option>';
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Nombre(*):</label>
                  <input class="form-control" type="hidden" name="editar" id="editar" value="no">
                  <input class="form-control" type="hidden" name="idservicio" id="idservicio">
                  <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Descripción(*):</label>
                  <input class="form-control" type="text" name="descripcion" id="descripcion" maxlength="100" placeholder="Descripción" required>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Precio(*):</label>
                  <input class="form-control" type="text" name="precio" id="precio" maxlength="12" placeholder="Precio" required>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                  <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                </div>
                <?php
                $creartipousuario = new ControladorTipoServicio();
                $creartipousuario->ctrCrearTipoServicio();
                ?>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- /.content-wrapper -->
<div class="modal fade" id="modalservicio" role="dialog">
  <div class="modal-dialog modal-lg">
    <form role="form" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><strong>Editar servicio</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="input-group">
              <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Categoria Servicio(*):</label>
                  <select name="idcategoriaservicioS" id="idcategoriaservicioS" class="form-control select-picker" required>
                    <option value="0">Seleccione Categoria ...</option>
                    <?php
                    $item = 1;
                    $valor = null;
                    $departamento = ControladorTipoServicio::ctrMostrarCategoriaServicio($item, $valor);
                    foreach ($servicio as $key => $value) {
                      echo '<option value="' . $value['idcategoriaservicio'] . '">' . $value['nombre'] . '</option>';
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Nombre(*):</label>
                  <input class="form-control" type="hidden" name="editarS" id="editarS" value="no">
                  <input class="form-control" type="hidden" name="idservicioS" id="idservicioS">
                  <input class="form-control" type="text" name="nombreS" id="nombreS" maxlength="100" placeholder="Nombre" required>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Descripción(*):</label>
                  <input class="form-control" type="text" name="descripcionS" id="descripcionS" maxlength="100" placeholder="Descripción" required>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Precio(*):</label>
                  <input class="form-control" type="number" name="precioS" id="precioS" maxlength="12" placeholder="Precio" required>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                  <button class="btn btn-primary" type="submit" id="btnGuardarS"><i class="fa fa-save"></i> Guardar</button>
                </div>
                <?php
                $servicioeditar = new ControladorTipoServicio();
                $servicioeditar->ctrEditarTipoServicio();
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>