<?php
    class ControladorUsuarios{
        static public function ctrIngresar(){
            if(isset($_POST['usuario'])){
                if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/',$_POST['usuario']) && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/',$_POST['password'])){
                    $tabla = "usuario";
                    $item = "login";
                    $valor = $_POST['usuario'];
                    $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla,$item,$valor);
                    
                    $clavehash=hash("SHA256", $_POST['password']);

                    if($respuesta['usuario']==$_POST['usuario'] && $respuesta['password1']==$clavehash){
                        if($respuesta['estado']==1){
							$_SESSION['iniciarSesion']="ok";
							$_SESSION['nombre']=$respuesta['nombre'];
                            $_SESSION['apellidos']=$respuesta['apellidos'];
							$_SESSION['login']=$respuesta['usuario'];
                            $_SESSION['tipousuario']=$respuesta['tipousuario'];
                            $_SESSION['estado']=$respuesta['estado'];
							$_SESSION['imagen']= $respuesta['imagen'];
							$_SESSION['perfil']= $respuesta['tipousuario'];			  					  
							echo '<script>
								window.location="inicio";
							</script>';
						}else{
							echo("<br /><div class='alert alert-danger'>Usuario inactivo, contacte al administrador del sistema</div>");
						}
                    }else{
                        echo("<br /><div class='alert alert-danger'>Usuario y/o contraseña incorrecta</div>");
                    }
                }
            }
        }

        static public function ctrMostrarUsuario($item,$valor){
			$tabla = "usuario";
			$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor);
			return $respuesta;
		}

        static public function ctrCrearUsuario(){
			if(isset($_POST['nombre'])){
			    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST['nombre'])&&
			    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST['apellidos'])){

					$ruta="";
					if(isset($_FILES['nuevaFoto']['tmp_name'])){
						list($ancho, $alto) = getimagesize($_FILES['nuevaFoto']['tmp_name']);
						$nuevoancho = 500;
						$nuevoalto = 500;
						//Crear directorio
						$directorio = "vistas/img/usuarios";

						//De acuerdo al tipo de imagen se hace el proceso de recorte de la foto
						if($_FILES['nuevaFoto']['type']=="image/jpeg"){
							$aleatorio = mt_rand(100,999);
							$ruta = $directorio."/".$aleatorio.".jpg";
							$origen = imagecreatefromjpeg($_FILES['nuevaFoto']['tmp_name']);
							$destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
							imagejpeg($destino,$ruta);
						}
						if($_FILES['nuevaFoto']['type']=="image/png"){
							$aleatorio = mt_rand(100,999);
							$ruta = $directorio."/".$aleatorio.".png";
							$origen = imagecreatefrompng($_FILES['nuevaFoto']['tmp_name']);
							$destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
							imagepng($destino,$ruta);
						}
					}

					$tabla = "usuario";
					//Hash SHA256 para la contraseña
					$clavehash=hash("SHA256", $_POST['clave']);
				    $datos = array("idtipousuario" => $_POST['idtipousuario'],
                                "iddepartamento" => $_POST['iddepartamento'],
                                "nombre" => $_POST['nombre'],
								"apellidos" => $_POST['apellidos'],
								"email" => $_POST['email'],
								"login" => $_POST['login'],
								"clave" => $clavehash,
								"codigo_persona" => $_POST['codigo_persona'],
								"imagen" => $ruta,
								"estado" => 1);
					$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla,$datos);
				    if($respuesta =="ok"){
                        echo"<script>
							Swal.fire({ 
								title: 'Success!',
								text: '¡El usuario ha sido creado correctamente!',
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

