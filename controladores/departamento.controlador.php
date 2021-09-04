<?php
class ControladorDepartamento
{
	static public function ctrMostrarDepartamento($item, $valor)
	{
		$tabla = "departamento";
		$respuesta = ModeloDepartamento::mdlMostrarDepartamento($tabla, $item, $valor);
		return $respuesta;
	}

	static public function ctrCrearDepartamento()
	{
		if (isset($_POST['nombre'])) {
			if (
				preg_match('/^[a-zA-Z0-9ñÑaáÁéÉíÍóÓúÚ ]+$/', $_POST['nombre']) &&
				preg_match('/^[a-zA-Z0-9ñÑaáÁéÉíÍóÓúÚ ]+$/', $_POST['descripcion'])
			) {

				$tabla = "departamento";

				$datos = array(
					"iddepartamento" => $_POST['iddepartamento'],
					"nombre" => $_POST['nombre'],
					"descripcion" => $_POST['descripcion'],
					"estado" => 1
				);

				if ($_POST['editarD'] === "no") {
					$respuesta = ModeloDepartamento::mdlIngresarDepartamento($tabla, $datos);
					if ($respuesta == "ok") {
						echo "<script>
								Swal.fire({ 
									title: 'Success!',
									text: '¡Tipo Área se creo correctamente!',
									icon: 'success',
									confirmButtonText:'Ok'
									}).then((result)=>{
										if(result.value){
											window.location='departamento';
										}
									})
							</script>";
					}
				} else {
					$respuesta = ModeloDepartamento::mdlEditarDepartamento($tabla, $datos);
					if ($respuesta == "ok") {
						echo "<script>
								Swal.fire({ 
									title: 'Success!',
									text: '¡El Área se modificó correctamente!',
									icon: 'success',
									confirmButtonText:'Ok'
									}).then((result)=>{
										if(result.value){
											window.location='departamento';
										}
									})
							</script>";
					}
				}
			} else {
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
