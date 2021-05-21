<?php
    class ControladorUsuarios{
        static public function ctrIngresar(){
            if(isset($_POST['usuario'])){
                if(preg_match('/^[a-zA-Z0-9]+$/',$_POST['usuario']) && preg_match('/^[a-zA-Z0-9]+$/',$_POST['password'])){
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
							$_SESSION['imagen']= "vistas/dist/img/user2-160x160.jpg";
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
			$tabla = "departamento";
			$respuesta = ModeloDepartamento::mdlMostrarDepartamento($tabla,$item,$valor);
			return $respuesta;
		}

        
    
    
    }

