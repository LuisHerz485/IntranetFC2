<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/tiposervicio.controlador.php";
require_once "../modelos/tiposervicio.modelo.php";

class AjaxTipoServicio
{

	public $idcategoriaservicio;
	public $idservicio;
	public function ajaxMostrarTipoServicio()
	{
		$valor = $this->idcategoriaservicio;
		$respuesta = ControladorTipoServicio::ctrMostrarTipoServicio($valor);
		echo json_encode($respuesta);
	}

	public function ajaxMostrarServicio()
	{
		$valor = $this->idservicio;
		$respuesta = ControladorTipoServicio::ctrMostrarServicio($valor);
		echo json_encode($respuesta);
	}
}

if (isset($_POST["idservicio"])) {
	$editar = new AjaxTipoServicio();
	$editar->idservicio = $_POST["idservicio"];
	$editar->ajaxMostrarServicio();
}

if (isset($_POST["idcategoriaservicio"])) {
	$mostrar = new AjaxTipoServicio();
	$mostrar->idcategoriaservicio = $_POST["idcategoriaservicio"];
	$mostrar->ajaxMostrarTipoServicio();
}
