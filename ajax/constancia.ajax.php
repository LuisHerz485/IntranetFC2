<?php

require_once "../modelos/constancia.modelo.php";

class AjaxConstancia{

	public $idcobranza;

	public function ajaxMostrarConstancia(){
		$valor = $this -> idcobranza;
		$respuesta = ModeloConstancia::mdlMostrarConstancia($valor);
		echo json_encode($respuesta);
	}

	public $idconstancia;

	public function ajaxMostrarHistorialPago(){
		$valor = $this -> idconstancia;
		$respuesta = ModeloConstancia::mdlMostrarHistorialPago($valor);
		echo json_encode($respuesta);
	}

	public $fecha_ingreso;
	public function ajaxMostrarIngresoMes(){
		$valor = $this -> fecha_ingreso;
		$respuesta = ModeloConstancia::mdlMostrarIngresoMes($valor);
		echo json_encode($respuesta);
	}

	public $iddetallecobranza;
	public $fecha_pago;
	public $tipo_pago;
	public $monto_const;
	public $nota_const;

	public function ajaxAgregarConstancia(){
		$valor1 = $this -> idcobranza;
		$valor2 = $this -> iddetallecobranza;
		$valor3 = $this -> fecha_pago;
		$valor4 = $this -> tipo_pago;
		$valor5 = $this -> monto_const;
		$valor6 = $this -> nota_const;
		$respuesta1 = ModeloConstancia::mdlIngresarConstancia($valor1,$valor2,$valor3,$valor4,$valor5,$valor6);
	}
}

/* Mostrar Constancia */
if(isset($_POST["idcobranza"])){
	$mostrarConst = new AjaxConstancia();
	$mostrarConst -> idcobranza = $_POST["idcobranza"];
	$mostrarConst -> ajaxMostrarConstancia();
}

/* Mostrar Historial de pagos de cobranza */
if(isset($_POST["idconstancia"])){
	$mostrarHis = new AjaxConstancia();
	$mostrarHis -> idconstancia = $_POST["idconstancia"];
	$mostrarHis -> ajaxMostrarHistorialPago();
}

/* Mostrar Ingreso general de pagos por mes */
if(isset($_POST["fecha_ingreso"])){
	$mostrarHis = new AjaxConstancia();
	$mostrarHis -> fecha_ingreso = $_POST["fecha_ingreso"];
	$mostrarHis -> ajaxMostrarIngresoMes();
}

/* Agregar Constancia*/
if(isset($_POST["iddetallecobranza"])){
	$agregarConst = new AjaxConstancia();
	$agregarConst -> idcobranza = $_POST["idcobranza"];
	$agregarConst -> iddetallecobranza = $_POST["iddetallecobranza"];
	$agregarConst -> fecha_pago = $_POST["fecha_pago"];
	$agregarConst -> tipo_pago = $_POST["tipo_pago"];
	$agregarConst -> monto_const = $_POST["monto_const"];
	$agregarConst -> nota_const = $_POST["nota_const"];
	$agregarConst -> ajaxAgregarConstancia();
}