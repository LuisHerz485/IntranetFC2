<?php
class ControladorClientes
{
	static public function ctrIngresar()
	{
		if (isset($_POST['usuario'])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáÁéíóúÁÉÍÓÚ]+$/', $_POST['usuario']) && preg_match('/^[a-zA-Z0-9ñÑáÁéíóúÁÉÍÓÚ!#$%&\/()=?¡*-_+.]+$/', $_POST['password'])) {
				$tabla = "cliente";
				$item = "logincliente";
				$valor = $_POST['usuario'];
				$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

				$clavehash = hash("SHA256", $_POST['password']);

				if ($respuesta && $respuesta['logincliente'] == $_POST['usuario'] && $respuesta['contrasenacliente'] == $clavehash) {
					if ($respuesta['tipocliente'] == "clienteaccess") {
						if ($respuesta['estado'] ==  1) {
							$_SESSION['iniciarSesion'] = "ok";
							$_SESSION['cliente'] = "si";
							$_SESSION['iddrive'] = $respuesta['iddrive'];
							$_SESSION['nombre'] = $respuesta['razonsocial'];
							$_SESSION['idcliente'] = $respuesta['idcliente'];
							$_SESSION['apellidos'] = "";
							$_SESSION['login'] = $respuesta['logincliente'];
							$_SESSION['tipousuario'] = $respuesta['tipocliente'];
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
				echo ("<br /><div class='alert alert-danger'>No se permite ese tipo de caracteres especiales</div>");
			}
		}
	}

	static public function ctrMostrarCliente($item, $valor)
	{
		$tabla = "cliente";
		$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);
		return $respuesta;
	}

	static public function ctrCrearCliente()
	{
		if (isset($_POST['ruc'])) {
			if (preg_match('/^[a-zA-Z0-9ñÑaÁáéÉíÍóÓúÚ -.\/]+$/', $_POST['razonsocial'])) {
				$ruta = "";
				if (isset($_FILES['nuevaFoto']['tmp_name']) && !empty($_FILES['nuevaFoto']['tmp_name'])) {
					list($ancho, $alto) = getimagesize($_FILES['nuevaFoto']['tmp_name']);
					$nuevoancho = 500;
					$nuevoalto = 500;
					//Crear directorio
					$directorio = "vistas/img/clientes";

					//De acuerdo al tipo de imagen se hace el proceso de recorte de la foto
					if ($_FILES['nuevaFoto']['type'] == "image/jpeg") {
						$ruta = $directorio . "/" . $_POST['logincliente'] . ".jpg";
						$origen = imagecreatefromjpeg($_FILES['nuevaFoto']['tmp_name']);
						$destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
						imagejpeg($destino, $ruta);
					}
					if ($_FILES['nuevaFoto']['type'] == "image/png") {
						$ruta = $directorio . "/" . $_POST['logincliente'] . ".png";
						$origen = imagecreatefrompng($_FILES['nuevaFoto']['tmp_name']);
						$destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
						imagepng($destino, $ruta);
					}
				} else {
					$ruta = (empty($_POST['fotoaux'])) ? "vistas/img/clientes/default-cliente.png" : $_POST['fotoaux'];
				}

				$tabla = "cliente";
				//Hash SHA256 para la contraseña
				$clavehash = hash("SHA256", $_POST['contrasenacliente']);
				$datos = array(
					"idcliente" => $_POST['idcliente'],
					"ruc" => $_POST['ruc'],
					"razonsocial" => $_POST['razonsocial'],
					"logincliente" => $_POST['logincliente'],
					"contrasenacliente" => $clavehash,
					"iddrive" => $_POST['iddrive'],
					"imagen" => $ruta,
					"tipocliente" => "clienteaccess",
					"estado" => 1
				);

				if ($_POST['editarDA'] === "no") {
					$respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);
					ModeloDeclaracionSunat::mdlRegistrarDeclaracionSunat($respuesta);
					if ($respuesta) {

						echo "<script>
								Swal.fire({ 
									title: 'Success!',
									text: '¡El cliente se creo correctamente!',
									icon: 'success',
									confirmButtonText:'Ok'
									});
							</script>";
					}
				} else {
					$respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);
					if ($respuesta == "ok") {
						echo "<script>
								Swal.fire({ 
									title: 'Success!',
									text: '¡El cliente se modificó correctamente!',
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

	static public function ctrEditarContra()
	{
		if (isset($_POST['contra'])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáÁéíóúÁÉÍÓÚ!#$%&\/()=?¡*-_+.]+$/', $_POST['contra'])) {
				$tabla = "cliente";

				//Hash SHA256 para la contraseña
				$clavehash = hash("SHA256", $_POST['contra']);

				$datos = array(
					"idcliente" => $_POST['idusuario1'],
					"contrasenacliente" => $clavehash
				);

				$respuesta = ModeloClientes::mdlEditarContra($tabla, $datos);
				if ($respuesta == "ok") {
					echo "<script>
							Swal.fire({ 
								title: 'Success!',
								text: '¡La contraseña fue modificada correctamente!',
								icon: 'success',
								confirmButtonText:'Ok'
								});
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
