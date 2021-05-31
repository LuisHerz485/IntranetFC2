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
				$usuario = new ModeloUsuarios();
				$respuesta = $usuario->mdlConsultarUsuario($_POST['codigopersona']);
				$asistencia = new ModeloAsistencia();
				$respuesta3  = $asistencia->mdlConsultarAsistencia($respuesta['idusuario']);
				$tabla = "asistencia";
				
				echo "<script>alert(".$respuesta3['idusuario'].")</script>";
				
				if($respuesta3['tipo']!=""){
					if($respuesta3['tipo'] === "Entrada"){

							echo "<script>
								Swal.fire({
									title : 'Estas seguro?',
									text : 'Usted va a marcar su salida!',
									icon : 'warning',
									confirmButtonColor: '#3085d6',
  									cancelButtonColor: '#d33',
  									confirmButtonText: 'Si, marcar!'
								}).then((result) =>{

									if(result.isConfirmed){" .
										$salida = ModeloAsistencia::mdlMarcarAsistencia($tabla, $respuesta3['idusuario'],'Salida')
									 . "
											Swal.fire(
      										'Marcado!',
      										'Tu salida ha sido registrada!',
      										'success'
    										)
										}
									})
							</script>";	

							
						}

						if($respuesta3['tipo'] === "Salida"){
							echo "<script>
								Swal.fire({
									title : 'Estas seguro?',
									text : 'Usted va a marcar su entrada!',
									icon : 'warning',
									confirmButtonColor: '#3085d6',
  									cancelButtonColor: '#d33',
  									confirmButtonText: 'Si, marcar!'
								}).then((result) =>{

									if(result.isConfirmed){" .

									$entrada = ModeloAsistencia::mdlMarcarAsistencia($tabla, $respuesta3['idusuario'], 'Entrada') . "
											Swal.fire(
      										'Marcado!',
      										'Tu entrada ha sido registrada!',
      										'success'
    										)
										}
									})
							</script>";	
							
						}
				}else{
					echo "<script>alert(".$respuesta['idusuario'].")</script>";
					echo "<script>
								Swal.fire({
									title : 'Mi primera asistencia!',
									text : 'Usted va a marcar su entrada!',
									icon : 'warning',
									confirmButtonColor: '#3085d6',
  									cancelButtonColor: '#d33',
  									confirmButtonText: 'Si, marcar!'
								}).then((result) =>{

									if(result.isConfirmed){" .

									$entrada = ModeloAsistencia::mdlMarcarAsistencia($tabla, $respuesta['idusuario'], 'Entrada') . "
											Swal.fire(
      										'Marcado!',
      										'Tu entrada ha sido registrada!',
      										'success'
    										)
										}
									})
							</script>";
				}

						

/*
						else{
							    echo ("<script>
									Swal.fire({
		           				 	title: 'Error!',
        							text: '¡No existe ningun colaboradores con ese codigo!',
									icon: 'error',
									confirmButtonText: 'Ok'
									});
									</script>");
						}*/
				}
			
		}
		
    }
