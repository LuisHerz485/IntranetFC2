<div class="login-box">
  <div class="login-logo">
    <img src="vistas/img/sello/logo.png" alt="" class="" width="60%"><br>
    <a href="#" class="text-dark"><strong class="h1 text-red">Login</strong><b> Clientes</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <b class="login-box-msg">Ingrese sus datos para iniciar sesión <i class="fas fa-exclamation-circle text-red"></i></b>

      <form action="#" method="post" class="pt-4">
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user text-dark"></span>
            </div>
          </div> 
          <input type="text" class="form-control" placeholder="Usuario" name="usuario">
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock text-dark"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
          </div>
          <!-- /.col -->
          <div class="col-6">
             <button type="submit" class="btn btn-danger btn-block"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</button>
          </div>
          <!-- /.col -->
        </div>

        <?php
            $login = new ControladorClientes();
            $login -> ctrIngresar();
        ?>
        
      </form>
      <br />
      <div class="lockscreen-footer text-center">
				<a href="inicio" class="text-red"><strong><i class="fas fa-chevron-circle-left"></i> Atrás</strong></a>
      </div>
    <!-- /.login-card-body -->
  </div>
</div>