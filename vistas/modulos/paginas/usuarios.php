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
              <li class="breadcrumb-item"><a href="#">Administración de Usuarios</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
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
              <h3 class="card-title">Usuarios&emsp;<button class="btn btn-success" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-plus-circle"></i> Añadir</button></h3>
            </div>
            <div class="card-body panel-body" id="listadoregistros">
              <div class="dt-buttons">
                <a class="btn btn-default" tabindex="0" aria-controls="tbllistado" href="#"><span>Copy</span></a>
                <a class="btn btn-default" tabindex="0" aria-controls="tbllistado" href="#"><span>Excel</span></a>
                <a class="btn btn-default" tabindex="0" aria-controls="tbllistado" href="#"><span>PDF</span></a>
              </div>
              <br/>
              <div id="tbllistado">
                <table class="table table-striped tablaDataTable dt-responsive">
                  <thead>
                    <th>Opciones</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th>Fecha/Registro</th>
                    <th>Estado</th>
                  </thead>
                  <tbody>
                  <?php 
                      $item = null;
                      $valor = null;
                      $usuarios = ControladorUsuarios::ctrMostrarUsuario($item,$valor);
                      foreach($usuarios as $key => $value){
                        echo '<tr>
                          <th scope="row"><button class="btn btn-warning btn-xs btnDetalleTicket" idTicket=""><i class="fas fa-pencil-alt"></i></button> <button class="btn btn-info btn-xs btnDetalleTicket" idTicket=""><i class="fas fa-key"></i></button></th>
                          <td>'.$value['nombre'].'</td>
                          <td>'.$value['apellidos'].'</td>
                          <td>'.$value['login'].'</td>
                          <td>'.$value['email'].'</td>
                          <td>'.$value['imagen'].'</td>
                          <td>'.$value['fechacreado'].'</td>
                          <td>'.$value['estado'].'</td>
                          </tr>';
                      }
                  ?>
                  </tbody>
                  <tfoot>
                    <th>Opciones</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th>Fecha/Registro</th>
                    <th>Estado</th>
                  </tfoot>   
                </table>
              </div>
            </div>
            <div class="card-body panel-body" id="formularioregistros">
              <form action="" name="formulario" id="formulario" method="POST">
                <div class="row">
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="">Tipo usuario(*):</label>
                    <select name="idtipousuario" id="idtipousuario" class="form-control select-picker" required>
                    <option value="">Seleccione ...</option>
                    <?php 
                      $item = 1;
                      $valor = null;
                      $tipousuario = ControladorTipoUsuario::ctrMostrarTipoUsuario($item,$valor);
                      foreach($tipousuario as $key => $value){ 
                        echo '<option  value="'.$value['idtipousuario'].'">'.$value['nombre'].'</option>';
                      }
                    ?>
                    </select>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="">Departamento(*):</label>
                    <select name="iddepartamento" id="iddepartamento" class="form-control select-picker" required>
                    <option value="">Seleccione ...</option>
                    <?php 
                      $item = 1;
                      $valor = null;
                      $departamento = ControladorDepartamento::ctrMostrarDepartamento($item,$valor);
                      foreach($departamento as $key => $value){ 
                        echo '<option  value="'.$value['iddepartamento'].'">'.$value['nombre'].'</option>';
                      }
                    ?>
                    </select>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="">Nombre(*):</label>
                    <input class="form-control" type="hidden" name="idusuario" id="idusuario">
                    <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="">Apellidos(*):</label>
                    <input class="form-control" type="text" name="apellidos" id="apellidos" maxlength="100" placeholder="Apellidos" required>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="">Email: </label>
                    <input class="form-control" type="email" name="email" id="email" maxlength="70" placeholder="email">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="">Login(*):</label>
                    <input class="form-control" type="text" name="login" id="login" maxlength="20" placeholder="nombre de usuario" required>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12" id="claves">
                    <label for="">Clave de ingreso(*):</label>
                    <input class="form-control" type="password" name="clave" id="clave" maxlength="64" placeholder="Clave">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12" id="claves">
                    <label for="">Clave de asistencia(*):</label>
                    <button class="btn btn-info" type="button" onclick="generar(6);" >Generar</button>
                    <input class="form-control" type="text" name="codigo_persona" id="codigo_persona" maxlength="64" placeholder="Clave">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="">Imagen:</label>
                    <input class="form-control filestyle" data-buttonText="Seleccionar foto" type="file" name="imagen" id="imagen">
                    <input type="hidden" name="imagenactual" id="imagenactual">
                    <img src="" alt="" width="150px" id="imagenmuestra">
                  </div>
                  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>  Guardar</button>
                    <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
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