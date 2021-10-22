<div class="login-box"> 
    <div class="login-logo">
      <img src="vistas/img/sello/logo.png" alt="" class="" width="60%"><br>
      <a href="#" class="text-dark"><strong class="h1 text-red">Login</strong><b> Administradores</b></a>
    </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingrese sus datos para iniciar sesión</p>

      <form action="#" method="post">
        <div class="input-group mb-3">
          <div class="input-group-text border-0">
            <span class="fas fa-user text-dark"></span>
          </div>
          <input type="text" class="form-control border" placeholder="Usuario" name="usuario">
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control border" placeholder="Password" name="password">
          <div class="input-group-text border-0">
            <span class="fas fa-lock text-dark"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
          </div>
          <div class="col-6">
            <button type="submit" class="btn btn-danger btn-block"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</button>
          </div>
        </div>
        <?php
        $login = new ControladorUsuarios();
        $login->ctrIngresar();
        ?>
      </form>
      
      <div class="lockscreen-footer text-center">
        <a href="marcarasistencia" class="text-red"><strong><i class="fas fa-chevron-circle-left"></i> Atrás</strong></a>
      </div>
    </div>
  </div>
</div>