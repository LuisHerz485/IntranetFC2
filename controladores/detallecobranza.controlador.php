<?php 
	class ControladorDetalleCobranza{
		static public function ctrMostrarServicio($item,$valor){
			$tabla = "servicio";
			$respuesta = ModeloDetalleCobranza::mdlMostrarServicio($tabla,$item,$valor);
			return $respuesta;
		}/*

		static public function ctrCrearDetalleCobranza(){
			if(isset($_POST['nota'])){
			    if(preg_match('/^[a-zA-Z0-9ñÑaáéÉíÍóÓúÚ ]+$/', $_POST['nota'])){

					$tabla = "detallecobranza";
				    $datos = array("iddetallecotizacion" => $_POST['iddetallecotizacion'],
				    			"idcotizacion" => $_POST['idcotizacion'],
                                "idplan" => $_POST['idplan'],
                                "idservicio" => $_POST['idservicio'],
                                "estado" => 1,
                                "precio" => $_POST['precio'],
				    			"nota" => $_POST['nota']);

				    if($_POST['editar'] === "no"){
						$respuesta = ModeloDetalleCobranza::mdlIngresarDetalleCobranza($tabla,$datos);
						if($respuesta =="ok"){
							echo"<script>
								Swal.fire({ 
									title:	'Success!',
									text:	'¡Detalle cobranza agregado correctamente!',
									icon:	'success',
									confirmButtonText:	'Ok'
									}).then((result)=>{
										if(result.value){
											window.location='  ';
										}
									})
								</script>";
						}
					}else{
						$respuesta = ModeloDetalleCobranza::mdlEditarDetalleCobranza($tabla,$datos);
						if($respuesta =="ok"){
							echo"<script>
								Swal.fire({ 
									title: 'Success!',
									text: '¡El detalle cotizacion se modificó correctamente!',
									icon: 'success',
									confirmButtonText:'Ok'
									}).then((result)=>{
										if(result.value){
											window.location='  ';
										}
									})
							</script>";
						}
					} 
				}
			}
		}*/
	}