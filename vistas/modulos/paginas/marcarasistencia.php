<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Asistencia | FC Contadores</title>
</head>

<link rel="stylesheet" href="vistas/template.php">
<body>
	<div class="lockscreen-wrapper";>
	
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
				<div class="lockscreen-logo">
					<a href="#"><div style="width: 400px; no-repeat;"></div></a>
				</div>

				<div class="lockscreen-name" style="font-size: 20pt">REGISTRAR ASISTENCIA</div>

				<div class="login-box">
					<div class="login-box-body">
						<div class="form-group has feedback">
							<form action="" class="" name="formulario" id="formulario" method="POST">
								<div class="form group has-feedback">
									

								</div>

							</form>
						</div>
					</div>
				</div>
	<?php

		}

	?>

	
</body>
</html>