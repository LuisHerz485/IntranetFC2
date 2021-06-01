<?php

require_once "../controladores/asistencia.controlador.php";
require_once "../modelos/asistencia.modelo.php";

class AjaxAsistencia{

	public $codigo;
    public $fecha;

	public function ajaxEditarDetalleAsistencia(){
		$tabla = "asistencia";
		$item1 = "u.codigopersona";
		$valor1 = $this -> codigo;
		$item2 = "a.fechahora";
		$valor2 = $this -> fecha;
		$respuesta = ModeloAsistencia::mdlMostrarDetalleAsistencia($tabla,$item1,$valor1,$item2,$valor2);
		echo json_encode($respuesta);
	}

	public $idusuario;
    public $tipo;

	public function ajaxMarcarAsistencia(){
		$tabla = "asistencia";
		$valor1 = $this -> idusuario;
		$valor2 = $this -> tipo;
		$respuesta = ModeloAsistencia::mdlMarcarAsistencia($tabla,$valor1,$valor2);
		echo json_encode($respuesta);
	}
}


/* Editar detalle asistencia */
if(isset($_POST["codigo"])){
	$editar = new AjaxAsistencia();
	$editar -> codigo = $_POST["codigo"];
    $editar -> fecha = $_POST["fecha"];
	$editar -> ajaxEditarDetalleAsistencia();
}

/* Editar marcar asistencia */
if(isset($_POST["idusuario"])){
	$editar = new AjaxAsistencia();
	$editar -> idusuario = $_POST["idusuario"];
    $editar -> tipo = $_POST["tipo"];
	$editar -> ajaxMarcarAsistencia();
}


