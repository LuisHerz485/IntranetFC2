<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes
{
	//variables para saber si esta activo el cliente y saber id activo
	public $activarEstado;
	public $activarIdCliente;
	//funcion para activar el usuario cliente mediante el estado
	public function ajaxActivarCliente()
	{
		$tabla = "cliente";
		$item1 = "estado";
		$valor1 = $this->activarEstado;
		$item2 = "idcliente";
		$valor2 = $this->activarIdCliente;
		$respuesta = ModeloClientes::mdlActualizarCliente($tabla, $item1, $valor1, $item2, $valor2);
	}
	//variable para obtener el idcliente
	public $idcliente;
	//funcion para editar cliente mediante su id
	public function ajaxEditarCliente()
	{
		$item = "idcliente";
		$valor = $this->idcliente;
		$respuesta = ControladorClientes::ctrMostrarCliente($item, $valor);
		echo json_encode($respuesta);
	}
}

/* Activar cliente*/
if (isset($_POST['estado'])) {
	$estado = new AjaxClientes();
	$estado->activarEstado = $_POST['estado'];
	$estado->activarIdCliente = $_POST['idcliente'];
	$estado->ajaxActivarCliente();
}

/* Editar cliente*/
if (isset($_POST["idcliente"])) {
	$editar = new AjaxClientes();
	$editar->idcliente = $_POST["idcliente"];
	$editar->ajaxEditarCliente();
}
