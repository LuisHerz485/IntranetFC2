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

              </div>
              <br/>
              <div id="tbllistado">
                <table  class="table table-striped tablaDataTable dt-responsive">
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
                          <th scope="row"><button class="btn btn-warning btn-xs btnEditarUsuario" onclick="mostrarform(true)" login="'.$value['login'].'"><i class="fas fa-pencil-alt"></i></button> <button class="btn btn-info btn-xs btnContra" login="'.$value['login'].'" data-toggle="modal" data-target="#modalContra"><i class="fas fa-key"></i></button></th>
                          <td>'.$value['nombre'].'</td>
                          <td>'.$value['apellidos'].'</td>
                          <td>'.$value['login'].'</td>
                          <td>'.$value['email'].'</td>';
                          if($value["imagen"]!=""){
                            echo '<td><img src="'.$value['imagen'].'" width="50px"></td>';
                          }else{
                            echo '<td><img src="vistas/dist/img/avatar.png" width="50px"></td>';
                          }
                          echo'<td>'.$value['fechacreado'].'</td>';
                          if($value['estado']!="1"){
                            echo'<td><button class="btn btn-danger btn-xs btnActivar" login="'.$value["login"].'" estado="1">Inactivo</button></td>';
                          }else{
                            echo'<td><button class="btn btn-success btn-xs btnActivar" login="'.$value["login"].'" estado="0">Activo</button></td>';
                          }
                        echo'</tr>';
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
              <form action="" name="formulario" id="formulario" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="">Tipo usuario(*):</label>
                    <select name="idtipousuario" id="idtipousuario" class="form-control select-picker" required>
                    <option value="0">Seleccione ...</option>
                    <?php 
                      $item = 1;
                      $valor = null;
                      $tipousuario = ControladorTipoUsuario::ctrMostrarTipoUsuario($item,$valor);
                      foreach($tipousuario as $key => $value){ 
                        echo '<option value="'.$value['idtipousuario'].'">'.$value['nombre'].'</option>';
                      }
                    ?>
                    </select>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="">Departamento(*):</label>
                    <select name="iddepartamento" id="iddepartamento" class="form-control select-picker" required>
                    <option value="0">Seleccione ...</option>
                    <?php 
                      $item = 1;
                      $valor = null;
                      $departamento = ControladorDepartamento::ctrMostrarDepartamento($item,$valor);
                      foreach($departamento as $key => $value){ 
                        echo '<option value="'.$value['iddepartamento'].'">'.$value['nombre'].'</option>';
                      }
                    ?>
                    </select>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="">Nombre(*):</label>
                    <input class="form-control" type="hidden" name="editar" id="editar" value="no">
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
                  <div class="form-group col-lg-6 col-md-6 col-xs-12" id="claves" name="claves">
                    <label for="">Clave de ingreso(*):</label>
                    <input class="form-control" type="password" name="clave" id="clave" maxlength="64" placeholder="Clave">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12" id="claves1">
                    <label for="">Clave de asistencia(*):</label>
                    <button class="btn btn-info" type="button" onclick="generar(6);" >Generar</button>
                    <input class="form-control" type="text" name="codigo_persona" id="codigo_persona" maxlength="64" placeholder="Clave">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label class="panel" for="">Imagen:</label>
                    <input type="file" class="nuevaFoto center-block" name="nuevaFoto" id="nuevaFoto">
                    <input class="form-control" type="hidden" name="fotoaux" id="fotoaux">
                    <p class="center-block">Peso maximo de la foto 2Mb</p>
                    <img src="vistas/dist/img/avatar.png" class="thumbnail center-block previsualizar" alt="" width="150px" id="imagenmuestra" name="imagenmuestra">
                  </div>
                  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                    <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                  </div>
                  <?php
                    $crearusuario = new ControladorUsuarios();
                    $crearusuario -> ctrCrearUsuario();
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

<!-- Modal Contraseña -->
<div class="modal fade" id="modalContra" role="dialog">
  <div class="modal-dialog">
    <form role="form" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cambio de contraseña</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fas fa-key"></i></span>
              <input class="form-control" type="hidden" name="idusuario1" id="idusuario1">
              <input type="password" name="contra" id="contra" class="form-control input-lg" placeholder="Contraseña" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <?php
          $contrausuario = new ControladorUsuarios();
          $contrausuario -> ctrEditarContra();
        ?>
      </div>
    </form>
  </div>
</div>

<!-- /.content-wrapper -->