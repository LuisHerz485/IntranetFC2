<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/cobranza.controlador.php";
require_once "../modelos/cobranza.modelo.php";
require_once "../modelos/detallecobranza.modelo.php";

class AjaxCobranza
{
	//variable para obtener cobranza de un cliente en especifico
	public $idcliente;
	//funcion para mostrar la cobranza de un cliente
	public function ajaxMostrarCobranza()
	{
		$valor = $this->idcliente;
		$respuesta = ModeloCobranza::mdlMostrarCobranza($valor);
		echo json_encode($respuesta);
	}

	//variable para agregar cobranza a un cliente
	public $idlocalcliente;
	public $idcliente1;
	public $idubicacion;
	public $fecha_vencimiento;
	public $fecha_emision;
	public $descripcion;
	public $idplan;
	public $precio;
	public $nota;
	//funcion donde se agrega una cobranza a un cliente -> se usa llena la tabla cobranza y detallecobranza 
	public function ajaxAgregarCobranza()
	{
		$valor1 = $this->idlocalcliente;
		$valor2 = $this->idcliente1;
		$valor3 = $this->idubicacion;
		$valor4 = $this->fecha_vencimiento;
		$valor5 = $this->descripcion;
		$valor6 = $this->idplan;
		$valor7 = $this->precio;
		$valor8 = $this->nota;
		$valor9 = $this->fecha_emision;

		$respuesta = ModeloCobranza::mdlAgregarCobranza($valor1, $valor2, $valor3, $valor4, $valor5, $valor9);
		$respuesta1 = ModeloDetalleCobranza::mdlAgregarDetCobranza($respuesta, $valor6, $valor7, $valor8);
	}
	//variable para cambiar el estado de una cobranza -> pendiente - pagado - A deuda - Vencido
	public $activarCobranza;
	public $activarId;
	//funcion que nos permite actualizar el estado de la cobranza en las tablas cobranza y detalle cobranza
	public function ajaxActivarCobranza()
	{
		$tabla = "cobranza";
		$tabla1 = "detallecobranza";
		$item1 = "estado";
		$valor1 = $this->activarCobranza;
		$item2 = "idcobranza";
		$valor2 = $this->activarId;
		$respuesta = ModeloCobranza::mdlActualizarCobranza($tabla, $item1, $valor1, $item2, $valor2);
		$respuesta1 = ModeloDetalleCobranza::mdlActualizarDetalleCobranza($tabla1, $item1, $valor1, $item2, $valor2);
	}

	//varibale que se usa para buscar un mes correspondiente, que se usara en una funcion para mostrar las cobranza pendiente
	public $fecha_busqueda;
	//funcion el cual buscara todas las cobranza de acuerdo variable fecha_bsuqueda
	public function ajaxMostrarPagosPendientes()
	{
		$valor10 = $this->fecha_busqueda;
		$respuesta = ControladorCobranza::ctrMostrarPagos($valor10);
		echo json_encode($respuesta);
	}
}


/* Mostrar Cobranza */
if (isset($_POST["idcliente"])) {
	$mostrarCo = new AjaxCobranza();
	$mostrarCo->idcliente = $_POST["idcliente"];
	$mostrarCo->ajaxMostrarCobranza();
}

/* Mostrar Cobranzas Pendientes*/
if (isset($_POST["fecha_busqueda"])) {
	$mostrarPP = new AjaxCobranza();
	$mostrarPP->fecha_busqueda = $_POST["fecha_busqueda"];
	$mostrarPP->ajaxMostrarPagosPendientes();
}

/* Agregar Cobranza */
if (isset($_POST["idlocalcliente"])) {
	$agregarCo = new AjaxCobranza();
	$agregarCo->idlocalcliente = $_POST["idlocalcliente"];
	$agregarCo->idcliente1 = $_POST["idcliente"];
	$agregarCo->idubicacion = $_POST["idubicacion"];
	$agregarCo->fecha_vencimiento = $_POST["fecha_vencimiento"];
	$agregarCo->fecha_emision = $_POST["fecha_emision"];
	$agregarCo->descripcion = $_POST["descripcion"];
	$agregarCo->idplan = $_POST["idplan"];
	$agregarCo->precio = $_POST["precio"];
	$agregarCo->nota = $_POST["nota"];
	$agregarCo->ajaxAgregarCobranza();
}

/* Activar cobranza*/
if (isset($_POST['estado'])) {
	$estado = new AjaxCobranza();
	$estado->activarCobranza = $_POST['estado'];
	$estado->activarId = $_POST['idcobranza'];
	$estado->ajaxActivarCobranza();
}
