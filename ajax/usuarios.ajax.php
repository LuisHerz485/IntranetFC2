<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

    public $activarUsuario;
	public $activarLogin;

	public function ajaxActivarUsuario(){
		$tabla = "usuario";
		$item1 = "estado";
		$valor1 = $this -> estado;
		$item2 = "login";
		$valor2 = $this -> login;
		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2);
	}

	public $login;

	public function ajaxEditarUsuario(){
		$item = "login";
		$valor = $this->login;
		$respuesta = ControladorUsuarios::ctrMostrarUsuario($item, $valor);
		echo json_encode($respuesta);
	}
}

/* Activar usuario*/
if(isset($_POST['estado'])){
    $estado = new AjaxUsuarios();
    $estado -> estado = $_POST['estado'];
    $estado -> login = $_POST['login'];
    $estado ->ajaxActivarUsuario();
}

/* Editar usuario*/
if(isset($_POST["login"])){
	$editar = new AjaxUsuarios();
	$editar -> login = $_POST["login"];
	$editar -> ajaxEditarUsuario();
}