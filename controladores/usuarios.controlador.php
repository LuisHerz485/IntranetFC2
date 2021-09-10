<?php
class ControladorUsuarios
{
	static public function ctrIngresar()
	{
		if (isset($_POST['usuario'])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáÁéíóúÁÉÍÓÚ]+$/', $_POST['usuario']) && preg_match('/^[a-zA-Z0-9ñÑáÁéíóúÁÉÍÓÚ!#$%&\/()=?¡*-_+.]+$/', $_POST['password'])) {
				$tabla = "usuario";
				$item = "login";
				$valor = $_POST['usuario'];
				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				$clavehash = hash("SHA256", $_POST['password']);

				if ($respuesta && $respuesta['usuario'] == $_POST['usuario'] && $respuesta['password1'] == $clavehash) {
					if ($respuesta['idtipousuario'] == 1 || $respuesta['idtipousuario'] == 2 || $respuesta['idtipousuario'] == 3 || $respuesta['idtipousuario'] == 4 || $respuesta['idtipousuario'] == 5) {
						if ($respuesta['estado'] == 1) {
							$_SESSION['iniciarSesion'] = "ok";
							$_SESSION['cliente'] = "no";
							$_SESSION['idusuario'] = $respuesta['idusuario'];
							$_SESSION['nombre'] = $respuesta['nombre'];
							$_SESSION['apellidos'] = $respuesta['apellidos'];
							$_SESSION['login'] = $respuesta['usuario'];
							$_SESSION['tipousuario'] = $respuesta['tipousuario'];
							$_SESSION['iddepartamento'] = $respuesta['iddepartamento'];
							$_SESSION['idtipousuario'] = $respuesta['idtipousuario'];
							$_SESSION['estado'] = $respuesta['estado'];
							$_SESSION['imagen'] = $respuesta['imagen'];
							echo '<script>
										window.location="escritorio";
									</script>';
						} else {
							echo ("<br /><div class='alert alert-danger'>Usuario inactivo, contacte al administrador del sistema</div>");
						}
					} else {
						echo ("<br /><div class='alert alert-danger'>Usuario sin acceso al sistema, contacte al administrador del sistema</div>");
					}
				} else {
					echo ("<br /><div class='alert alert-danger'>Usuario y/o contraseña incorrecta</div>");
				}
			} else {
				echo ("<br /><div class='alert alert-danger'>Caracteres especiales no permitidos por el sistema</div>");
			}
		}
	}

	static public function ctrMostrarUsuario($item, $valor)
	{
		$tabla = "usuario";
		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
		return $respuesta;
	}

	static public function ctrCrearUsuario()
	{
		if (isset($_POST['nombre'])) {
			if (
				preg_match('/^[a-zA-Z0-9ñÑaáÁéÉíÍóÓúÚ ]+$/', $_POST['nombre']) &&
				preg_match('/^[a-zA-Z0-9ñÑaáÁéÉíÍóÓúÚ ]+$/', $_POST['apellidos'])
			) {

				$ruta = "";
				if (isset($_FILES['nuevaFoto']['tmp_name']) && !empty($_FILES['nuevaFoto']['tmp_name'])) {
					list($ancho, $alto) = getimagesize($_FILES['nuevaFoto']['tmp_name']);
					$nuevoancho = 500;
					$nuevoalto = 500;
					//Crear directorio
					$directorio = "vistas/img/usuarios";

					//De acuerdo al tipo de imagen se hace el proceso de recorte de la foto
					if ($_FILES['nuevaFoto']['type'] == "image/jpeg") {
						$ruta = $directorio . "/" . $_POST['login'] . ".jpg";
						$origen = imagecreatefromjpeg($_FILES['nuevaFoto']['tmp_name']);
						$destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
						imagejpeg($destino, $ruta);
					}
					if ($_FILES['nuevaFoto']['type'] == "image/png") {
						$ruta = $directorio . "/" . $_POST['login'] . ".png";
						$origen = imagecreatefrompng($_FILES['nuevaFoto']['tmp_name']);
						$destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
						imagepng($destino, $ruta);
					}
				} else {
					$ruta = $_POST['fotoaux'];
				}

				$tabla = "usuario";
				//Hash SHA256 para la contraseña
				$clavehash = hash("SHA256", $_POST['clave']);
				$datos = array(
					"idusuario" => $_POST['idusuario'],
					"idtipousuario" => $_POST['idtipousuario'],
					"iddepartamento" => $_POST['iddepartamento'],
					"nombre" => $_POST['nombre'],
					"apellidos" => $_POST['apellidos'],
					"email" => $_POST['email'],
					"login" => $_POST['login'],
					"clave" => $clavehash,
					"codigo_persona" => $_POST['codigo_persona'],
					"imagen" => $ruta,
					"estado" => 1
				);

				if ($_POST['editar'] === "no") {
					$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);
					if ($respuesta == "ok") {
						echo "<script>
								Swal.fire({ 
									title: 'Correcto!',
									text: '¡El usuario se creo correctamente!',
									icon: 'success',
									confirmButtonText:'Ok'
									}).then((result)=>{
										if(result.value){
											window.location='usuarios';
										}
									})
							</script>";
					}
				} else {
					$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);
					if ($respuesta == "ok") {
						echo "<script>
								Swal.fire({ 
									title: 'Actualizado!',
									text: '¡El usuario se modificó correctamente!',
									icon: 'Actualiazado',
									confirmButtonText:'Ok'
									}).then((result)=>{
										if(result.value){
											window.location='usuarios';
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

	static public function ctrEditarContra()
	{
		if (isset($_POST['contra'])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ!#$%&\/()=?¡*-_+.]+$/', $_POST['contra'])) {
				$tabla = "usuario";

				//Hash SHA256 para la contraseña
				$clavehash = hash("SHA256", $_POST['contra']);

				$datos = array(
					"idusuario" => $_POST['idusuario1'],
					"password1" => $clavehash
				);

				$respuesta = ModeloUsuarios::mdlEditarContra($tabla, $datos);
				if ($respuesta == "ok") {
					echo "<script>
							Swal.fire({ 
								title: 'Actualizado!',
								text: '¡La contraseña fue modificada correctamente!',
								icon: 'success',
								confirmButtonText:'Ok'
								}).then((result)=>{
									if(result.value){
										window.location='usuarios';
									}
								})
						</script>";
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
