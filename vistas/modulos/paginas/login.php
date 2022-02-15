<body style="background-color: #666666;">
  <div class="limiter">  
    <div class="container-login100">
      <div class="wrap-login100">   
        <form  class="login100-form validate-form" action="#" method="post"> 
          <div class="lockscreen-wrapper">    
            <div aling="right" class="login-box">
              <div id= "cardred" >
                <!-- /.login-logo -->
                <div class="login-logo">
                  <img src="vistas/img/sello/logo.png" alt="" class="" width="60%"><br>
                  <a href="#" class="text-dark"><strong class="h1 text-black">Login</strong><b class="h2 text-red"> Administradores</b></a>
                </div>
                <div class="card"style="background-color: transparent;" >
                  <div class="card-body login-card-body"  style="background-color: transparent;">
                    <p class="login-box-msg" style="color: white; background-color: transparent"><b class="h5 text-red">Ingrese sus Credenciales</b></p>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="usuario">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user-tie fa-fw text-dark"></span>
                            </div>
                          </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-key fa-fw text-dark"></span>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="col-6">
                          <button type="submit" class="btn btn-danger btn-block" style="background-color: rgb(214,0,0);"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</button>
                        </div>
                      </div>
                      <?php
                      $login = new ControladorUsuarios();
                      $login->ctrIngresar();
                      ?>
                    <div class="lockscreen-footer text-center">
                      <a href="marcarasistencia" class="text-red"><strong><i class="fas fa-chevron-circle-left"></i> Atrás</strong></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>   
        <!-- /.imagen de fondo -->
        <div class="login100-more" style="background-image: url('vistas/dist/img/Fondologinadmin.png');">
				</div>   
      </div>
    </div> 
  </div>
</body>