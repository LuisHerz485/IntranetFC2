<?php

require_once "../controladores/detallecobranza.controlador.php";
require_once "../modelos/detallecobranza.modelo.php";

class AjaxDetCobranza{

	public $idcobranza;

	public function ajaxMostrarDetCobranza(){
		$valor = $this -> idcobranza;
		$respuesta = ModeloDetallecCobranza::mdlMostrarDetalleCobranza($valor);
		echo json_encode($respuesta);
	}

	public $idplan;
	public $idservicio;
	public $precio;
	public $nota;

	public function ajaxAgregarDetCobranza(){
		$valor1 = $this -> idplan;
		$valor2 = $this -> idservicio;
		$valor3 = $this -> precio;
		$valor4 = $this -> nota;
		$respuesta = ModeloCobranza::mdlAgregarDetCobranza($valor1,$valor2,$valor3,$valor4);
	}

	public $iddetallecobranza;

	public function ajaxMostrarDetalleCobranza(){
		$valor = $this -> idcobranza;
		$respuesta = ModeloDetalleCobranza::mdlMostrarDetalleCobranza($valor);
		echo json_encode($respuesta);
	}
}

/* Mostrar Cobranza */
if(isset($_POST["idcobranza"])){
	$mostrarCo = new AjaxDetCobranza();
	$mostrarCo -> idcliente = $_POST["idcobranza"];
	$mostrarCo -> ajaxMostrarDetCobranza();
}

/* Agregar Detalle Cobranza */
if(isset($_POST["idservicio"])){
	$agregarCo = new AjaxDetCobranza();
	$agregarCo -> idplan = $_POST["idplan"];
	$agregarCo -> idservicio = $_POST["idservicio"];
	$agregarCo -> precio = $_POST["precio"];
	$agregarCo -> nota = $_POST["nota"];
	$agregarCo -> ajaxAgregarDetCobranza();
}

/* Mostrar Detalle Cobranza*/
if(isset($_POST["idcobranza"])){
	$mostrar = new AjaxDetCobranza();
	$mostrar -> idcobranza = $_POST["idcobranza"];
	$mostrar -> ajaxMostrarDetalleCobranza();
}
