<?php
    class ControladorTipoServicio{
        static public function ctrMostrarServicio($valor){
			$tabla = "servicio";
			$respuesta = ModeloTipoServicio::mdlMostrarServicio($tabla,$valor);
			return $respuesta;
		}
		
		static public function ctrMostrarTipoServicio($valor){
			$tabla = "servicio";
			$respuesta = ModeloTipoServicio::mdlMostrarTipoServicio($tabla,$valor);
			return $respuesta;
		}
		
		static public function ctrMostrarCategoriaServicio($item,$valor){
			$tabla = "categoriaservicio";
			$respuesta = ModeloTipoServicio::mdlMostrarCategoriaServicio($tabla,$item,$valor);
			return $respuesta;
		}

		static public function ctrCrearTipoServicio(){
			if(isset($_POST['nombre'])){
			    if(preg_match('/^[a-zA-Z0-9ñÑaáÁéÉíÍóÓúÚ.\/ ]+$/', $_POST['nombre'])&&
			    preg_match('/^[a-zA-Z0-9ñÑaáÁéÉíÍóÓúÚ.\/ ]+$/', $_POST['descripcion'])){

					$tabla = "servicio";

				    $datos = array("idservicio" => $_POST['idservicio'],
				    			"idcategoriaservicio"=>$_POST['idcategoriaservicio'],
								"nombre" => $_POST['nombre'],
                                "descripcion" => $_POST['descripcion'],
								"precio" => $_POST['precio']);

					if($_POST['editar'] === "no"){
						$respuesta = ModeloTipoServicio::mdlIngresarTipoServicio($tabla,$datos);
						if($respuesta =="ok"){
							echo"<script>
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
					}else{
						$respuesta = ModeloTipoServicio::mdlEditarTipoServicio($tabla,$datos);
						if($respuesta =="ok"){
							echo"<script>
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

		static public function ctrEditarTipoServicio(){
			if(isset($_POST['nombreS'])){
			    if(preg_match('/^[a-zA-Z0-9ñÑaáÁéÉíÍóÓúÚ.\/ ]+$/', $_POST['nombreS'])&&
			    preg_match('/^[a-zA-Z0-9ñÑaáÁéÉíÍóÓúÚ.\/ ]+$/', $_POST['descripcionS'])){

					$tabla = "servicio";

				    $datos = array("idservicio" => $_POST['idservicioS'],
				    			"idcategoriaservicio"=>$_POST['idcategoriaservicioS'],
								"nombre" => $_POST['nombreS'],
                                "descripcion" => $_POST['descripcionS'],
								"precio" => $_POST['precioS']);

					if($_POST['editarS'] === "si"){
						
						$respuesta = ModeloTipoServicio::mdlEditarTipoServicio($tabla,$datos);
						if($respuesta =="ok"){
							echo"<script>
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