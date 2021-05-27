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
		
    }
