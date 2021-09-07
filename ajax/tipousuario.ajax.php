<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/tipousuario.controlador.php";
require_once "../modelos/tipousuario.modelo.php";

class AjaxTipoUsuario
{

	public $nombre;

	public function ajaxEditarTipoUsuario()
	{
		$item = "nombre";
		$valor = $this->nombre;
		$respuesta = ControladorTipoUsuario::ctrMostrarTipoUsuario($item, $valor);
		echo json_encode($respuesta);
	}

	public $nombreEdit;
	public $estadoEdit;

	public function ajaxActivarTipoUsuario()
	{
		$tabla = "tipousuario";
		$item1 = "estado";
		$valor1 = $this->estadoEdit;
		$item2 = "nombre";
		$valor2 = $this->nombreEdit;
		$respuesta = ModeloTipoUsuario::mdlActualizarTipoUsuario($tabla, $item1, $valor1, $item2, $valor2);
	}
}


/* Editar usuario*/
if (isset($_POST["nombre"])) {
	$editar = new AjaxTipoUsuario();
	$editar->nombre = $_POST["nombre"];
	$editar->ajaxEditarTipoUsuario();
}

/* Activar usuario*/
if (isset($_POST['estado'])) {
	$estado = new AjaxTipoUsuario();
	$estado->estadoEdit = $_POST['estado'];
	$estado->nombreEdit = $_POST['nombre'];
	$estado->ajaxActivarTipoUsuario();
}
