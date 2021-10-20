<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios
{

	public $activarUsuario;
	public $activarLogin;
	public function ajaxActivarUsuario()
	{
		$tabla = "usuario";
		$item1 = "estado";
		$valor1 = $this->activarUsuario;
		$item2 = "login";
		$valor2 = $this->activarLogin;
		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
	}

	public $login;
	public function ajaxEditarUsuario()
	{
		$item = "login";
		$valor = $this->login;
		$respuesta = ControladorUsuarios::ctrMostrarUsuario($item, $valor);
		echo json_encode($respuesta);
	}
}

if (isset($_POST['estado'])) {
	$estado = new AjaxUsuarios();
	$estado->activarUsuario = $_POST['estado'];
	$estado->activarLogin = $_POST['login'];
	$estado->ajaxActivarUsuario();
}

if (isset($_POST["login"])) {
	$editar = new AjaxUsuarios();
	$editar->login = $_POST["login"];
	$editar->ajaxEditarUsuario();
}
