<?php
function isMobile()
{
	return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up.browser|up.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
if (isMobile()) {
	echo "<script>window.location='restringido'</script>";
} else {
?>
	<div class="lockscreen-wrapper">
		<div class="login-box">
			<div class="login-logo">
				<a href="#" class="text-dark"><strong class="h1 text-red">Registrar</strong><b> Asistencia</b></a>
			</div>
			<div class="login-box-body">
				<div class="card">
					<div class="card-body login-card-body">
						<p class="login-box-msg">Ingresa tu código para marcar tu entrada y salida </p>
						<form action="#" method="POST">
							<div class="form-group">
								<div class="input-group-append">
									<span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fas fa-user"></i></span>
									<input type="text" name="codigopersona" id="codigopersona" class="form-control input-lg" placeholder="Codigo de Asistencia" autofocus="autofocus" required>
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
		</div>
	</div>
<?php } ?>
<div class="date" style="visibility: hidden;">
	<span id="weekDay" class="weekDay"></span>,
	<span id="day" class="day"></span> de
	<span id="month" class="month"></span> del
	<span id="year" class="year"></span>
</div>