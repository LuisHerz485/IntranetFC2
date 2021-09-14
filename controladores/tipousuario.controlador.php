<?php
class ControladorTipoUsuario
{
	static public function ctrMostrarTipoUsuario($item, $valor)
	{
		$tabla = "tipousuario";
		$respuesta = ModeloTipoUsuario::mdlMostrarTipoUsuario($tabla, $item, $valor);
		return $respuesta;
	}

	static public function ctrCrearTipoUsuario()
	{
		if (isset($_POST['nombre'])) {
			if (
				preg_match('/^[a-zA-Z0-9ñÑaáÁéÉíÍóÓúÚ ]+$/', $_POST['nombre']) &&
				preg_match('/^[a-zA-Z0-9ñÑaáÁéÉíÍóÓúÚ ]+$/', $_POST['descripcion'])
			) {

				$tabla = "tipousuario";

				$datos = array(
					"idtipousuario" => $_POST['idtipousuario'],
					"nombre" => $_POST['nombre'],
					"descripcion" => $_POST['descripcion'],
					"estado" => 1
				);

				if ($_POST['editarTU'] === "no") {
					$respuesta = ModeloTipoUsuario::mdlIngresarTipoUsuario($tabla, $datos);
					if ($respuesta == "ok") {
						echo "<script>
								Swal.fire({ 
									title: 'Correcto!',
									text: '¡Tipo Usuario creado correctamente!',
									icon: 'success',
									confirmButtonText:'Ok'
									});
							</script>";
					}
				} else {
					$respuesta = ModeloTipoUsuario::mdlEditarTipoUsuario($tabla, $datos);
					if ($respuesta == "ok") {
						echo "<script>
								Swal.fire({ 
									title: 'Actualizado!',
									text: '¡El Tipo Usuario se modificó correctamente!',
									icon: 'success',
									confirmButtonText:'Ok'
									});
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
