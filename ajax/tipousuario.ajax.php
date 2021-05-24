<?php

require_once "../controladores/tipousuario.controlador.php";
require_once "../modelos/tipousuario.modelo.php";

class AjaxTipoUsuario{

	public $nombre;

	public function ajaxEditarTipoUsuario(){
		$item = "nombre";
		$valor = $this->nombre;
		$respuesta = ControladorTipoUsuario::ctrMostrarTipoUsuario($item, $valor);
		echo json_encode($respuesta);
	}
}


/* Editar usuario*/
if(isset($_POST["nombre"])){
	$editar = new AjaxTipoUsuario();
	$editar -> nombre = $_POST["nombre"];
	$editar -> ajaxEditarTipoUsuario();
}