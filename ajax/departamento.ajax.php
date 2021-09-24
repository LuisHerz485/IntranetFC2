<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/departamento.controlador.php";
require_once "../modelos/departamento.modelo.php";

class AjaxDepartamento
{

	public $nombre;

	public function ajaxEditarDepartamento()
	{
		$item = "nombre";
		$valor = $this->nombre;
		$respuesta = ControladorDepartamento::ctrMostrarDepartamento($item, $valor);
		echo json_encode($respuesta);
	}

	public $nombreEdit;
	public $estadoEdit;

	public function ajaxActivarDepartamento()
	{
		$tabla = "departamento";
		$item1 = "estado";
		$valor1 = $this->estadoEdit;
		$item2 = "nombre";
		$valor2 = $this->nombreEdit;
		$respuesta = ModeloDepartamento::mdlActualizarDepartamento($tabla, $item1, $valor1, $item2, $valor2);
	}

	public $idarea;
	public function ajaxMostrarDepartamento()
	{
		$valor = $this->idarea;
		$respuesta = ControladorDepartamento::ctrMostrarDepUser($valor);
		echo json_encode($respuesta);
	}
}


/* Editar usuario*/
if (isset($_POST["nombre"])) {
	$editar = new AjaxDepartamento();
	$editar->nombre = $_POST["nombre"];
	$editar->ajaxEditarDepartamento();
}

/* Activar usuario*/
if (isset($_POST['estado'])) {
	$estado = new AjaxDepartamento();
	$estado->estadoEdit = $_POST['estado'];
	$estado->nombreEdit = $_POST['nombre'];
	$estado->ajaxActivarDepartamento();
}

/* Mostrar */
if (isset($_POST["idarea"])) {
	$mostrar = new AjaxDepartamento();
	$mostrar->idarea = $_POST["idarea"];
	$mostrar->ajaxMostrarDepartamento();
}