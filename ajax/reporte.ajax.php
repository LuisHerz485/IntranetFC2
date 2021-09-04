<?php

require_once "../controladores/reportes.controlador.php";
require_once "../modelos/reportes.modelo.php";

class AjaxReportes
{

	public $idusuario;
	public $fecha_inicio;
	public $fecha_fin;

	public function ajaxMostrarReporte()
	{
		$valor1 = $this->idusuario;
		$valor2 = $this->fecha_inicio;
		$valor3 = $this->fecha_fin;
		$respuesta = ControladorReporte::ctrMostrarReporte($valor1, $valor2, $valor3);
		echo json_encode($respuesta);
	}
}


/* Mostrar Tabla */
if (isset($_POST["idusuario"])) {
	$mostrar = new AjaxReportes();
	$mostrar->idusuario = $_POST["idusuario"];
	$mostrar->fecha_inicio = $_POST["fecha_inicio"];
	$mostrar->fecha_fin = $_POST["fecha_fin"];
	$mostrar->ajaxMostrarReporte();
}
