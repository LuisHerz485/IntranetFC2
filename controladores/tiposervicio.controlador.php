<?php

class ControladorTipoServicio
{
	static public function ctrMostrarServicio($valor)
	{
		$tabla = "servicio";
		$respuesta = ModeloTipoServicio::mdlMostrarServicio($tabla, $valor);
		return $respuesta;
	}

	static public function ctrMostrarTipoServicio($valor)
	{
		$tabla = "servicio";
		$respuesta = ModeloTipoServicio::mdlMostrarTipoServicio($tabla, $valor);
		return $respuesta;
	}

	static public function ctrMostrarCategoriaServicio($item, $valor)
	{
		$tabla = "categoriaservicio";
		$respuesta = ModeloTipoServicio::mdlMostrarCategoriaServicio($tabla, $item, $valor);
		return $respuesta;
	}

	static public function ctrCrearTipoServicio()
	{
		if (isset($_POST['nombre'])) {
			$idservicio = ControladorValidacion::validarID($_POST['idservicio']);
			$idcategoriaservicio = ControladorValidacion::validarID($_POST['idcategoriaservicio']);
			$precio = ControladorValidacion::validarPrecio($_POST['precio']);
			if (
				preg_match('/^[a-zA-Z0-9ñÑaáÁéÉíÍóÓúÚ.\/ ]+$/', $_POST['nombre']) &&
				preg_match('/^[a-zA-Z0-9ñÑaáÁéÉíÍóÓúÚ.\/ ]+$/', $_POST['descripcion']) &&
				$idservicio && $idcategoriaservicio
			) {

				$tabla = "servicio";

				$datos = array(
					"idservicio" => $idservicio,
					"idcategoriaservicio" => $idcategoriaservicio,
					"nombre" => $_POST['nombre'],
					"descripcion" => $_POST['descripcion'],
					"precio" => $precio
				);

				if ($_POST['editar'] === "no") {
					$respuesta = ModeloTipoServicio::mdlIngresarTipoServicio($tabla, $datos);
					if ($respuesta == "ok") {
						echo "<script>
								Swal.fire({ 
									title: 'Success!',
									text: '¡Tipo Servicio creado correctamente!',
									icon: 'success',
									confirmButtonText:'Ok'
									}).then((result)=>{
										if(result.value){
											window.location='servicios';
										}
									})
							</script>";
					}
				} else {
					$respuesta = ModeloTipoServicio::mdlEditarTipoServicio($tabla, $datos);
					if ($respuesta == "ok") {
						echo "<script>
								Swal.fire({ 
									title: 'Success!',
									text: '¡El Tipo Servicio se modificó correctamente!',
									icon: 'success',
									confirmButtonText:'Ok'
									}).then((result)=>{
										if(result.value){
											window.location='servicios';
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

	static public function ctrEditarTipoServicio()
	{
		if (isset($_POST['nombreS'])) {
			$idservicio = ControladorValidacion::validarID($_POST['idservicioS']);
			$idcategoriaservicio = ControladorValidacion::validarID($_POST['idcategoriaservicioS']);
			$precio = ControladorValidacion::validarPrecio($_POST['precioS']);
			if (
				preg_match('/^[a-zA-Z0-9ñÑaáÁéÉíÍóÓúÚ.\/ ]+$/', $_POST['nombreS']) &&
				preg_match('/^[a-zA-Z0-9ñÑaáÁéÉíÍóÓúÚ.\/ ]+$/', $_POST['descripcionS']) &&
				$idservicio && $idcategoriaservicio && $precio
			) {

				$tabla = "servicio";

				$datos = array(
					"idservicio" => $idservicio,
					"idcategoriaservicio" => $idcategoriaservicio,
					"nombre" => $_POST['nombreS'],
					"descripcion" => $_POST['descripcionS'],
					"precio" => $precio
				);

				if ($_POST['editarS'] === "si") {

					$respuesta = ModeloTipoServicio::mdlEditarTipoServicio($tabla, $datos);
					if ($respuesta == "ok") {
						echo "<script>
								Swal.fire({ 
									title: 'Success!',
									text: '¡El Tipo Servicio se modificó correctamente!',
									icon: 'success',
									confirmButtonText:'Ok'
									}).then((result)=>{
										if(result.value){
											window.location='servicios';
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
