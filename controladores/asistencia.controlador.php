<?php
    class ControladorAsistencia{
        static public function ctrMostrarAsistencia($item,$valor){
			$tabla = "asistencia";
			$respuesta = ModeloAsistencia::mdlMostrarAsistencia($tabla,$item,$valor);
			return $respuesta;
		}

		static public function ctrEditarDetalleAsistencia(){
			if(isset($_POST['idasistencia'])){
			    if(preg_match('/^[a-zA-Z0-9ñÑaáéÉíÍóÓúÚ ]+|(^$)/', $_POST['detalle'])){

					$tabla = "asistencia";

				    $datos = array("idasistencia" => $_POST['idasistencia'],
                                "detalle" => $_POST['detalle'],
								"estado" => $_POST['estado']);

					$respuesta = ModeloAsistencia::mdlIngresarDetalleAsitencia($tabla,$datos);
					if($respuesta =="ok"){
						echo"<script>
							Swal.fire({ 
								title: 'Success!',
								text: '¡Detalle agregado correctamente!',
								icon: 'success',
								confirmButtonText:'Ok'
								}).then((result)=>{
									if(result.value){
										window.location='asistencia';
									}
								})
							</script>";
					} 
                }else{
                    echo ("<script>
					Swal.fire({
		            title: 'Error!',
        			text: '¡No puedes usar caracteres especiales!',
					icon: 'error',
					confirmButtonText: 'Ok'
					});
				</script>");
			    }
			}
		}

		static public function ctrMarcarAsistencia(){
			if(isset($_POST['codigopersona'])){
				$respuesta = ModeloUsuarios::mdlConsultarUsuario($_POST['codigopersona']);

				if($respuesta['idusuario'] != ""){
					$respuesta3 = ModeloAsistencia::mdlConsultarAsistencia($respuesta['idusuario']);
					$tabla = "asistencia";

					$idusuario = $respuesta['idusuario'];
					
					if($respuesta3['tipo'] != ""){
						if($respuesta3['tipo'] === "Entrada"){
							echo "<script>
							var idusuario = ".$idusuario."
							var tipo = 'Salida'
							var datos = new FormData();
							datos.append('idusuario', idusuario);
							datos.append('tipo', tipo);
								Swal.fire({
									title: '¿Estas seguro?',
									text: 'Usted va a marcar su salida!',
									icon: 'warning',
									showCancelButton: true,
									confirmButtonColor: '#3085d6',
									cancelButtonColor: '#d33',
									confirmButtonText: 'Si, marcar!'
								}).then((result) => {
									if (result.isConfirmed) {
										$.ajax({
											url: 'ajax/asistencia.ajax.php',
											method: 'POST',
											data: datos,
											cache: false,
											contentType: false,
											processData: false,
											success: function(respuesta) {
												Swal.fire('Tu salida ha sido registrada ".$respuesta['nombre']." ".$respuesta['apellidos']."!', '', 'success')
											}
										})
									}else{
										Swal.fire('Asistencia no marcada', '', 'info')
									}
								})
							</script>";
						}
						if($respuesta3['tipo'] === "Salida"){
							echo "<script>
							var idusuario = ".$idusuario."
							var tipo = 'Entrada'
							var datos = new FormData();
							datos.append('idusuario', idusuario);
							datos.append('tipo', tipo);
								Swal.fire({
									title: '¿Estas seguro?',
									text: 'Usted va a marcar su entrada!',
									icon: 'warning',
									showCancelButton: true,
									confirmButtonColor: '#3085d6',
									cancelButtonColor: '#d33',
									confirmButtonText: 'Si, marcar!'
								}).then((result) => {
									if (result.isConfirmed) {
										$.ajax({
											url: 'ajax/asistencia.ajax.php',
											method: 'POST',
											data: datos,
											cache: false,
											contentType: false,
											processData: false,
											success: function(respuesta) {
												Swal.fire('Tu entrada ha sido registrada ".$respuesta['nombre']." ".$respuesta['apellidos']."!', '', 'success')
											}
										})
									}else{
										Swal.fire('Asistencia no marcada', '', 'info')
									}
								})
							</script>";			
						}
					}else{
						echo "<script>
							var idusuario = ".$idusuario."
							var tipo = 'Entrada'
							var datos = new FormData();
							datos.append('idusuario', idusuario);
							datos.append('tipo', tipo);
								Swal.fire({
									title: '¿Estas seguro?',
									text: 'Usted va a marcar su primera entrada!',
									icon: 'warning',
									showCancelButton: true,
									confirmButtonColor: '#3085d6',
									cancelButtonColor: '#d33',
									confirmButtonText: 'Si, marcar!'
								}).then((result) => {
									if (result.isConfirmed) {
										$.ajax({
											url: 'ajax/asistencia.ajax.php',
											method: 'POST',
											data: datos,
											cache: false,
											contentType: false,
											processData: false,
											success: function(respuesta) {
												Swal.fire('Tu entrada ha sido registrada ".$respuesta['nombre']." ".$respuesta['apellidos']."!', '', 'success')
											}
										})
									}else{
										Swal.fire('Asistencia no marcada', '', 'info')
									}
								})
						</script>";	
					}
				}else{
					echo ("<script>
						Swal.fire({
						title: 'Error!',
						text: '¡No existe ningun colaboradores con ese codigo!',
						icon: 'error',
						confirmButtonText: 'Ok'
						});
					</script>");
				}
			}
			
		}
		
    }
