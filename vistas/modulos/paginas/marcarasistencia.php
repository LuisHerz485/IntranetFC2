
	<?php 
		/*Restriccion de acceso mobil*/
		function isMobile(){

			return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up.browser|up.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
		}	

		if(isMobile()){

	?>
				<meta http-equiv="refresh" content="0; URL='https://fccontadores.com'"/>	

	<?php
		}

		else{
	?>
				<div class="lockscreen-wrapper";>

				<div class="login-box">
					<div class="login-logo">
						<a href="#"><b>Registrar</b> Asistencia</a>
					</div>
				
					<div class="login-box-body">
						<div class="card">
						<div class="card-body login-card-body">
							<p class="login-box-msg">Ingresa tu codigo para marcar tu entrada y salida </p>
							<form action="#" method="POST">
								<div class="form-group">
						            <div class="input-group-append"> 
						              <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fas fa-user"></i></span>
						              <input type="text" name="codigopersona" id="codigopersona" class="form-control input-lg" placeholder="Codigo de Asistencia" autofocus="autofocus" required>
						            </div>
						        </div>
								<div>
									<button type="submit" class="btn btn-primary btn-block">Marcar</button>
								</div>


									<?php 
											$marcarAsistencia = new ControladorAsistencia();
											$marcarAsistencia -> ctrMarcarAsistencia(); 
											
									?>
							</form>

							<!-- Configuracion de fecha-->
							<div class="text-center" style="font-size:15pt;">
								<div class="lockscreen-name">
									<p></p>
									<?php 

										echo date('d') . ' / '
										. date('m') . ' / '
										. date('Y');
									?>

								</div>
							</div>

							<!-- Configuracion de reloj -->

							<div class="text-center" style="font-size:15pt;">
								<div class="lockscreen-name">
									<span id="hours" class="hours"></span> :
									<span id="minutes" class="minutes"></span> :
									<span id="seconds" class="seconds"></span>
								</div>

							</div>
						</div>
						</div>


					</div>
				</div>
	<?php

		}


	?>
	<!--Datos ocultos (NO ELIMINAR)-->
	<div class="date" style="visibility: hidden;">
		<span id="weekDay" class="weekDay"></span>, 
		<span id="day" class="day"></span> de
		<span id="month" class="month"></span> del
		<span id="year" class="year"></span>
	</div>

	<!--Clock-->
	



