<?php

require_once "../controladores/cobranza.controlador.php";
require_once "../modelos/cobranza.modelo.php";
require_once "../modelos/detallecobranza.modelo.php";

class AjaxCobranza{

	public $idcliente;

	public function ajaxMostrarCobranza(){
		$valor = $this -> idcliente;
		$respuesta = ModeloCobranza::mdlMostrarCobranza($valor);
		echo json_encode($respuesta);
	}

	public $idlocalcliente;
	public $idcliente1;
	public $idubicacion;
	public $fecha_vencimiento;
	public $descripcion;
	public $idcobranza;
	public $idplan;
	public $precio;
	public $nota;

	public function ajaxAgregarCobranza(){
		$valor1 = $this -> idlocalcliente;
		$valor2 = $this -> idcliente1;
		$valor3 = $this -> idubicacion;
		$valor4 = $this -> fecha_vencimiento;
		$valor5 = $this -> descripcion;
		$valor6 = $this -> idcobranza;
		$valor7 = $this -> idplan;
		$valor8 = $this -> precio;
		$valor9 = $this -> nota;

		$respuesta = ModeloCobranza::mdlAgregarCobranza($valor1,$valor2,$valor3,$valor4,$valor5);
		$respuesta1 = ModeloDetalleCobranza::mdlAgregarDetCobranza($valor6,$valor7,$valor8,$valor9);
	}


}

/* Mostrar Cobranza */
if(isset($_POST["idcliente"])){
	$mostrarCo = new AjaxCobranza();
	$mostrarCo -> idcliente = $_POST["idcliente"];
	$mostrarCo -> ajaxMostrarCobranza();
}

/* Agregar Cobranza */
if(isset($_POST["idlocalcliente"])){
	$agregarCo = new AjaxCobranza();
	$agregarCo -> idlocalcliente = $_POST["idlocalcliente"];
	$agregarCo -> idcliente1 = $_POST["idcliente"];
	$agregarCo -> idubicacion = $_POST["idubicacion"];
	$agregarCo -> fecha_vencimiento = $_POST["fecha_vencimiento"];
	$agregarCo -> descripcion = $_POST["descripcion"];
	$agregarDetCo -> idcobranza = $_POST["idcobranza"];
	$agregarDetCo -> idplan = $_POST["idplan"];
	$agregarDetCo -> precio = $_POST["precio"];
	$agregarDetCo -> nota = $_POST["nota"];
	$agregarCo -> ajaxAgregarCobranza();
}


