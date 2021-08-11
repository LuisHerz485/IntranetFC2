<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes{

    public $activarEstado;
	public $activarIdCliente;

	public function ajaxActivarCliente(){
		$tabla = "cliente";
		$item1 = "estado";
		$valor1 = $this -> activarEstado;
		$item2 = "idcliente";
		$valor2 = $this -> activarIdCliente;
		$respuesta = ModeloClientes::mdlActualizarCliente($tabla,$item1,$valor1,$item2,$valor2);
	}

	public $idcliente;

	public function ajaxEditarCliente(){
		$item = "idcliente";
		$valor = $this->idcliente;
		$respuesta = ControladorClientes::ctrMostrarCliente($item, $valor);
		echo json_encode($respuesta);
	}

	public function ajaxMostrar(){
		$item = "idcliente";
		$valor1 = $this->idcliente;
		$respuesta = ControladorClientes::ctrMostrarCliente($item, $valor1);
		echo json_encode($respuesta);
	}
}

/* Activar cliente*/
if(isset($_POST['estado'])){
    $estado = new AjaxClientes();
    $estado -> activarEstado = $_POST['estado'];
    $estado -> activarIdCliente = $_POST['idcliente'];
    $estado ->ajaxActivarCliente();
}

/* Editar cliente*/
if(isset($_POST["idcliente"])){
	$editar = new AjaxClientes();
	$editar -> idcliente = $_POST["idcliente"];
	$editar -> ajaxEditarCliente();
}
