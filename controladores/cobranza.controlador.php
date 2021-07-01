<?php 
	class ControladorCobranza{
		static public function ctrMostrarCobranza($item,$valor){
			$tabla = "detallecobranza";
			$respuesta = ModeloCobranza::mdlMostrarCobranza($tabla,$item,$valor);
			return $respuesta;
		}

		static public function ctrCrearCobranza(){
			if(isset($_POST['idcotizacion'])){
					$tabla = "detallecobranza";
				    $datos = array("idcotizacion" => $_POST['idcotizacion'],
                                "idcliente" => $_POST['idcliente'],
                                "idubicacionl" => $_POST['idubicacionl'],
                                "iddetalleservicio" => $_POST['iddetalleservicio'],
                                "idservicio" => $_POST['idservicio'],
                                "idubicacions" => $_POST['idubicacions'],
                                "fechaemision" => $_POST['fechaemision'],
                                "fechavencimiento" => $_POST['fechavencimiento'],
								"estado" => $_POST['estado']);

				    if($_POST['editar'] === "no"){
						$respuesta = ModeloCobranza::mdlIngresarCobranza($tabla,$datos);
						if($respuesta =="ok"){
							echo"<script>
								Swal.fire({ 
									title:	'Success!',
									text:	'¡Detalle agregado correctamente!',
									icon:	'success',
									confirmButtonText:	'Ok'
									}).then((result)=>{
										if(result.value){
											window.location='generarCobranza';
										}
									})
								</script>";
						}
					}else{
						$respuesta = ModeloCobranza::mdlEditarCobranza($tabla,$datos);
						if($respuesta =="ok"){
							echo"<script>
								Swal.fire({ 
									title: 'Success!',
									text: '¡El usuario se modificó correctamente!',
									icon: 'success',
									confirmButtonText:'Ok'
									}).then((result)=>{
										if(result.value){
											window.location='generarCobranza';
										}
									})
							</script>";
						}
					} 
			}
		}
	}