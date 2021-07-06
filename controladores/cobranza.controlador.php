<?php 
	class ControladorCobranza{
		static public function ctrMostrarCobranza($item,$valor){
			$tabla = "cobranza";
			$respuesta = ModeloCobranza::mdlMostrarCobranza($tabla,$item,$valor);
			return $respuesta;
		}

		static public function ctrCrearCobranza(){
			if(isset($_POST['descripcion'])){
			    if(preg_match('/^[a-zA-Z0-9ñÑaáéÉíÍóÓúÚ ]+$/', $_POST['descripcion'])){

					$tabla = "cobranza";
				    $datos = array("idcotizacion" => $_POST['idcotizacion'],
				    			"idlocalcliente" => $_POST['idlocalcliente'],
                                "idcliente" => $_POST['idcliente'],
                                "idubicacion" => $_POST['idubicacion'],
                                "fechaemision" => $_POST['fechaemision'],
                                "fechavencimiento" => $_POST['fechavencimiento'],
								"estado" => 1,
				    			"descripcion" => $_POST['descripcion']);

				    if($_POST['editar'] === "no"){
						$respuesta = ModeloCobranza::mdlIngresarCobranza($tabla,$datos);
						if($respuesta =="ok"){
							echo"<script>
								Swal.fire({ 
									title:	'Success!',
									text:	'¡Cobranza agregado correctamente!',
									icon:	'success',
									confirmButtonText:	'Ok'
									}).then((result)=>{
										if(result.value){
											window.location='generarcobranza';
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
									text: '¡La cotizacion se modificó correctamente!',
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
	}