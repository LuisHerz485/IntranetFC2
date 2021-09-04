<?php
class ControladorContancia
{
	static public function ctrMostrarConstancia($item, $valor)
	{
		$tabla = "cobranza";
		$respuesta = ModeloConstancia::mdlMostrarConstancia($tabla, $item, $valor);
		return $respuesta;
	}

	static public function ctrCrearConstancia()
	{
		if (isset($_POST['nota'])) {
			if (preg_match('/^[a-zA-Z0-9ñÑaáÁéÉíÍóÓúÚ ]+$/', $_POST['nota'])) {

				$tabla = "constancia";
				$datos = array(
					"idcotizacion" => $_POST['idcotizacion'],
					"idlocalcliente" => $_POST['idlocalcliente'],
					"idcliente" => $_POST['idcliente'],
					"idubicacion" => $_POST['idubicacion'],
					"fechaemision" => $_POST['fechaemision'],
					"fechavencimiento" => $_POST['fechavencimiento'],
					"estado" => 1,
					"descripcion" => $_POST['descripcion']
				);

				if ($_POST['editar'] === "no") {/*
					$respuesta = ModeloConstancia::mdlIngresarConstancia($tabla, $datos);
					if ($respuesta == "ok") {
						echo "<script>
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
					}*/
				} else {/*
					$respuesta = ModeloConstancia::mdlEditarConstancia($tabla, $datos);
					if ($respuesta == "ok") {
						echo "<script>
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
					}*/
				}
			}
		}
	}
}
