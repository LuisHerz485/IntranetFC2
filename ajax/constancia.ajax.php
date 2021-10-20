<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../modelos/constancia.modelo.php";

class AjaxConstancia
{
	public $idcobranza;
	public function ajaxMostrarConstancia()
	{
		$valor = $this->idcobranza;
		$respuesta = ModeloConstancia::mdlMostrarConstancia($valor);
		echo json_encode($respuesta);
	}

	public $idconstancia;
	public function ajaxMostrarHistorialPago()
	{
		$valor = $this->idconstancia;
		$respuesta = ModeloConstancia::mdlMostrarHistorialPago($valor);
		echo json_encode($respuesta);
	}

	public $fecha_ingreso;
	public function ajaxMostrarIngresoMes()
	{
		$valor = $this->fecha_ingreso;
		$respuesta = ModeloConstancia::mdlMostrarIngresoMes($valor);
		echo json_encode($respuesta);
	}

	public $fecha_anho;
	public $idcliente;
	public function ajaxMsotrarIngresoCliente()
	{
		$valor = $this->fecha_anho;
		$valor1 = $this->idcliente;
		$respuesta = ModeloConstancia::mdlMostrarIngresoAnualCliente($valor, $valor1);
		echo json_encode($respuesta);
	}

	public $fecha_ranking;
	public function ajaxMostrarIngresoRanking()
	{
		$valor = $this->fecha_ranking;
		$respuesta = ModeloConstancia::mdlMostrarIngresoCliente($valor);
		echo json_encode($respuesta);
	}

	public $iddetallecobranza;
	public $fecha_pago;
	public $tipo_pago;
	public $monto_const;
	public $nota_const;
	public function ajaxAgregarConstancia()
	{
		$valor1 = $this->idcobranza;
		$valor2 = $this->iddetallecobranza;
		$valor3 = $this->fecha_pago;
		$valor4 = $this->tipo_pago;
		$valor5 = $this->monto_const;
		$valor6 = $this->nota_const;
		$respuesta1 = ModeloConstancia::mdlIngresarConstancia($valor1, $valor2, $valor3, $valor4, $valor5, $valor6);
	}
}

if (isset($_POST["idcobranza"])) {
	$mostrarConst = new AjaxConstancia();
	$mostrarConst->idcobranza = $_POST["idcobranza"];
	$mostrarConst->ajaxMostrarConstancia();
}

if (isset($_POST["idconstancia"])) {
	$mostrarHis = new AjaxConstancia();
	$mostrarHis->idconstancia = $_POST["idconstancia"];
	$mostrarHis->ajaxMostrarHistorialPago();
}

if (isset($_POST["fecha_ingreso"])) {
	$mostrarIngEmp = new AjaxConstancia();
	$mostrarIngEmp->fecha_ingreso = $_POST["fecha_ingreso"];
	$mostrarIngEmp->ajaxMostrarIngresoMes();
}

if (isset($_POST["idcliente"])) {
	$mostrarIngCli = new AjaxConstancia();
	$mostrarIngCli->idcliente = $_POST["idcliente"];
	$mostrarIngCli->fecha_anho = $_POST["fecha_anho"];
	$mostrarIngCli->ajaxMsotrarIngresoCliente();
}

if (isset($_POST["fecha_ranking"])) {
	$mostrarIngRan = new AjaxConstancia();
	$mostrarIngRan->fecha_ranking = $_POST["fecha_ranking"];
	$mostrarIngRan->ajaxMostrarIngresoRanking();
}

if (isset($_POST["iddetallecobranza"])) {
	$agregarConst = new AjaxConstancia();
	$agregarConst->idcobranza = $_POST["idcobranza"];
	$agregarConst->iddetallecobranza = $_POST["iddetallecobranza"];
	$agregarConst->fecha_pago = $_POST["fecha_pago"];
	$agregarConst->tipo_pago = $_POST["tipo_pago"];
	$agregarConst->monto_const = $_POST["monto_const"];
	$agregarConst->nota_const = $_POST["nota_const"];
	$agregarConst->ajaxAgregarConstancia();
}
