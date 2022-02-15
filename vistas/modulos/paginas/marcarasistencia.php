<body>
	<div class="limiter">  
    	<div class="container-login100">
      		<div class="wrap-login100">
				<?php
				function isMobile()
				{
					return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up.browser|up.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
				}
				if (isMobile()) {
					echo "<script>window.location='restringido'</script>";
				} else {
				?>

	

				<div class="login100-form"> <!--login100-form crear el espacio privado para el login -->
					<div class="row">
						<div class="lockscreen-wrapper">
							<div class="login-box">
								<div class="login-logo">
									<img src="vistas/img/sello/logo.png" alt="" class="" width="50%"><br>
									<a href="#" class="text-dark"><strong class="h1 text-red">Registrar</strong><b> Asistencia</b></a>
								</div>
								<div class="login-box-body">
									<div class="card">
										<div class="card-body login-card-body">
											<p class="login-box-msg">Ingresa tu código para marcar tu entrada y salida </p>					
											<form action="#" method="POST">
												<div class="input-group mb-3">
													<input type="text" name="codigopersona" id="codigopersona" class="form-control" placeholder="Codigo de Asistencia" autofocus="autofocus" required>
													<div class="input-group-append">
														<div class="input-group-text">
															<span class="fas fa-clipboard-check fa-fw text-dark"></span>
														</div>
													</div>
												</div>
												<div>
													<button type="submit" class="btn btn-danger btn-block">Marcar</button>
												</div>
												<?php
												$marcarAsistencia = new ControladorAsistencia();
												$marcarAsistencia->ctrMarcarAsistencia();
												?>
											</form>
											<div class="text-center" style="font-size:15pt;">
												<div class="lockscreen-name">
													<p></p>
													<?php
													echo date('d / m / Y');
													?>
												</div>
											</div>
											<div class="text-center" id="reloj" style="font-size:15pt;">
												<div class="lockscreen-name">
													<b id="hours" class="hours"></b> :
													<b id="minutes" class="minutes"></b> :
													<b id="seconds" class="seconds"></b>
												</div>
											</div>
											<div class="lockscreen-footer text-center">
												<a href="login"><strong class="m-3 text-red"><i class="fas fa-user-shield"></i> Administrar</strong></a>
											</div>
											<div class="lockscreen-footer text-center">
												<a href="inicio"><strong class="m-3 text-red"><i class="fas fa-chevron-circle-left"></i> Atrás</strong></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<div class="date" style="visibility: hidden;">
								<span id="weekDay" class="weekDay"></span>,
								<span id="day" class="day"></span> de
								<span id="month" class="month"></span> del
								<span id="year" class="year"></span>
							</div>						
						</div>	
					</div>					
				</div>
				
			</div>
			<div class="login100-more" style="background-image: url('vistas/dist/img/Fondoasistencia.jpg');">
			</div>
					
		</div>		
	</div>
</body>