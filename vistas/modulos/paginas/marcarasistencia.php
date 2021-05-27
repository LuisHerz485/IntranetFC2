<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Asistencia | FC Contadores</title>

	  <link rel="shortcut icon" href="../../dist/img/favicon.ico">
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	  <!-- Tempusdominus Bbootstrap 4 -->
	  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	  <!-- iCheck -->
	  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	  <!-- JQVMap -->
	  <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
	  <!-- Theme style -->
	  <link rel="stylesheet" href="../../dist/css/adminlte.css">
	  <!-- overlayScrollbars -->
	  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	  <!-- Daterange picker -->
	  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
	  <!-- summernote -->
	  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.css">
	  <!-- Google Font: Source Sans Pro -->
	  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	  <!-- DataTable -->
	  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
	  <link rel="stylesheet" type="text/css" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	  <!-- Toastr -->
	  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">


		    <!-- jQuery -->
	  <script src="../../plugins/jquery/jquery.min.js"></script>
	  <!-- jQuery UI 1.11.4 -->
	  <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
	  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	  <script>
	  $.widget.bridge('uibutton', $.ui.button)
	  </script>
	  <!-- Bootstrap 4 -->
	  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	  <!-- ChartJS -->
	  <script src="../../plugins/chart.js/Chart.min.js"></script>
	  <!-- Sparkline -->
	  <script src="../../plugins/sparklines/sparkline.js"></script>
	  <!-- JQVMap -->
	  <script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
	  <script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
	  <!-- jQuery Knob Chart -->
	  <script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
	  <!-- daterangepicker -->
	  <script src="../../plugins/moment/moment.min.js"></script>
	  <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
	  <!-- Tempusdominus Bootstrap 4 -->
	  <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	  <!-- Summernote -->
	  <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
	  <!-- overlayScrollbars -->
	  <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	  <!-- AdminLTE App -->
	  <script src="../../dist/js/adminlte.js"></script>
	  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	  <script src="../../dist/js/pages/dashboard.js"></script>
	  <!-- AdminLTE for demo purposes -->
	  <script src="../../dist/js/demo.js"></script>
	  <!-- Toastr -->
	  <script src="../../plugins/toastr/toastr.min.js"></script>
	  <!--Swal alert-->
	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</head>
<body style="background: url('../../dist/img/main-background.jpg')no-repeat; background-size: cover;">
	
	
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
							<form action="" class="" name="formulario" id="formulario" method="POST">
								<div class="form-group">
						            <div class="input-group-append"> 
						              <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fas fa-user"></i></span>
						              <input type="text" name="codigo_persona" id="codigo_persona" class="form-control input-lg" placeholder="Codigo de Asistencia" autofocus="autofocus" required>
						            </div>
						        </div>
								<div>
									<button type="submit" class="btn btn-primary btn-block">Marcar</button>
								</div>
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
	<script src="../../js/clock.js"></script>
	
</body>
</html>