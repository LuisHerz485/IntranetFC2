<?php
    class ControladorClientes{
        static public function ctrMostrarCliente($item,$valor){
			$tabla = "cliente";
			$respuesta = ModeloClientes::mdlMostrarClientes($tabla,$item,$valor);
			return $respuesta;
		}

        static public function ctrCrearCliente(){
			if(isset($_POST['ruc'])){
			    if(preg_match('/^[a-zA-Z0-9ñÑaáéÉíÍóÓúÚ -.\/]+$/', $_POST['razonsocial'])){
					$ruta="";
					if(isset($_FILES['nuevaFoto']['tmp_name'])&&!empty($_FILES['nuevaFoto']['tmp_name'])){
						list($ancho, $alto) = getimagesize($_FILES['nuevaFoto']['tmp_name']);
						$nuevoancho = 500;
						$nuevoalto = 500;
						//Crear directorio
						$directorio = "vistas/img/clientes";

						//De acuerdo al tipo de imagen se hace el proceso de recorte de la foto
						if($_FILES['nuevaFoto']['type']=="image/jpeg"){
							$ruta = $directorio."/".$_POST['logincliente'].".jpg";
							$origen = imagecreatefromjpeg($_FILES['nuevaFoto']['tmp_name']);
							$destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
							imagejpeg($destino,$ruta);
						}
						if($_FILES['nuevaFoto']['type']=="image/png"){
							$ruta = $directorio."/".$_POST['logincliente'].".png";
							$origen = imagecreatefrompng($_FILES['nuevaFoto']['tmp_name']);
							$destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
							imagepng($destino,$ruta);
						}
					}else{
						$ruta=$_POST['fotoaux'];
					}

					$tabla = "cliente";
					//Hash SHA256 para la contraseña
					$clavehash=hash("SHA256", $_POST['contrasenacliente']);
				    $datos = array("idcliente" => $_POST['idcliente'],
								"ruc" => $_POST['ruc'],
                                "razonsocial" => $_POST['razonsocial'],
                                "logincliente" => $_POST['logincliente'],
								"contrasenacliente" => $clavehash,
								"iddrive" => $_POST['iddrive'],
								"imagen" => $ruta,
                                "tipocliente" => "clienteaccess",
								"estado" => 1);

					if($_POST['editar'] === "no"){
						$respuesta = ModeloClientes::mdlIngresarCliente($tabla,$datos);
						if($respuesta =="ok"){
							echo"<script>
								Swal.fire({ 
									title: 'Success!',
									text: '¡El cliente se creo correctamente!',
									icon: 'success',
									confirmButtonText:'Ok'
									}).then((result)=>{
										if(result.value){
											window.location='clientes';
										}
									})
							</script>";
						}
					}else{
						$respuesta = ModeloClientes::mdlEditarCliente($tabla,$datos);
						if($respuesta =="ok"){
							echo"<script>
								Swal.fire({ 
									title: 'Success!',
									text: '¡El cliente se modificó correctamente!',
									icon: 'success',
									confirmButtonText:'Ok'
									}).then((result)=>{
										if(result.value){
											window.location='clientes';
										}
									})
							</script>";
						}
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
        
		static public function ctrEditarContra(){
			if(isset($_POST['contra'])){
				if(preg_match('/^[a-zA-Z0-9ñÑaáéÉíÍóÓúÚ ]+$/', $_POST['contra'])){
					$tabla = "cliente";

					//Hash SHA256 para la contraseña
					$clavehash = hash("SHA256", $_POST['contra']);
					
					$datos = array("idusuario" => $_POST['idusuario1'],
								"password1" => $clavehash);

					$respuesta = ModeloClientes::mdlEditarContra($tabla,$datos);
					if($respuesta =="ok"){
						echo"<script>
							Swal.fire({ 
								title: 'Success!',
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

