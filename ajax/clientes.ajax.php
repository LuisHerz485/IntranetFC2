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

    public $idclienteA;

	public function ajaxEditarMostrarAgenda(){
		$item = "idcliente";
		$valor = $this->idclienteA;
		$respuesta = ControladorClientes::ctrMostrarAgendaCliente($item, $valor);
		echo json_encode($respuesta);
	}

    public $idclienteAg;
    public $nombrecompleto;
    public $detallecargo;
    public $telefono1;
    public $telefono2;
    public $correo1;
    public $correo2;

	public function ajaxEditarAgregarAgenda(){
		$valor1 = $this->idclienteAg;
        $valor2 = $this->nombrecompleto;
        $valor3 = $this->detallecargo;
        $valor4 = $this->telefono1;
        $valor5 = $this->telefono2;
        $valor6 = $this->correo1;
        $valor7 = $this->correo2;
        $respuesta = ModeloClientes::mdlRepresentante($valor2, $valor3);
		$respuesta2 = ModeloClientes::mdlAgregarAgenda($valor1, $respuesta['idrepresentante'], $valor4, $valor5, $valor6, $valor7);
		echo json_encode($respuesta);
	}
}

/* Activar usuario*/
if(isset($_POST['estado'])){
    $estado = new AjaxClientes();
    $estado -> activarEstado = $_POST['estado'];
    $estado -> activarIdCliente = $_POST['idcliente'];
    $estado ->ajaxActivarCliente();
}

/* Editar usuario*/
if(isset($_POST["idcliente"])){
	$editar = new AjaxClientes();
	$editar -> idcliente = $_POST["idcliente"];
	$editar -> ajaxEditarCliente();
}

/* Mostrar agenda*/
if(isset($_POST["idclienteA"])){
	$mostrarA = new AjaxClientes();
	$mostrarA -> idclienteA = $_POST["idclienteA"];
	$mostrarA -> ajaxEditarMostrarAgenda();
}

/* Agregar agenda*/
if(isset($_POST["idclienteAg"])){
	$agregarA = new AjaxClientes();
	$agregarA -> idclienteAg = $_POST["idclienteAg"];
    $agregarA -> nombrecompleto = $_POST["nombrecompleto"];
    $agregarA -> detallecargo = $_POST["detallecargo"];
    $agregarA -> telefono1 = $_POST["telefono1"];
    $agregarA -> telefono2 = $_POST["telefono2"];
    $agregarA -> correo1 = $_POST["correo1"];
    $agregarA -> correo2 = $_POST["correo2"];
	$agregarA -> ajaxEditarAgregarAgenda();
}