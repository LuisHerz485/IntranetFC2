<?php


require_once "../controladores/validacion.controlador.php";
require_once "../controladores/asistencia.controlador.php";
require_once "../modelos/asistencia.modelo.php";

class AjaxAsistencia
{
	//variables usadas para editar detalle de asistencia
	public $codigo;
	public $fecha;
	//funcion para editar detalle de asistenccia
	public function ajaxEditarDetalleAsistencia()
	{
		$tabla = "asistencia";
		$item1 = "U.codigopersona";
		$valor1 = $this->codigo;
		$item2 = "A.fechahora";
		$valor2 = $this->fecha;
		$respuesta = ModeloAsistencia::mdlMostrarDetalleAsistencia($tabla, $item1, $valor1, $item2, $valor2);
		echo json_encode($respuesta);
	}
	//variable usada para editar - marcar asistencia
	public $idusuario;
	public $tipo;
	//funcion para ditar - marcar asistencia
	public function ajaxMarcarAsistencia()
	{
		$tabla = "asistencia";
		$valor1 = $this->idusuario;
		$valor2 = $this->tipo;
		$respuesta = ModeloAsistencia::mdlMarcarAsistencia($tabla, $valor1, $valor2);
		echo json_encode($respuesta);
	}
}


/* Editar detalle asistencia */
if (isset($_POST["codigo"])) {
	$editar = new AjaxAsistencia();
	$editar->codigo = $_POST["codigo"];
	$editar->fecha = $_POST["fecha"];
	$editar->ajaxEditarDetalleAsistencia();
}

/* Editar marcar asistencia */
if (isset($_POST["idusuario"])) {
	$editar = new AjaxAsistencia();
	$editar->idusuario = $_POST["idusuario"];
	$editar->tipo = $_POST["tipo"];
	$editar->ajaxMarcarAsistencia();
}
