<?php

require_once "../controladores/local.controlador.php";
require_once "../modelos/local.modelo.php";

class AjaxLocal
{

	public $idcliente;

	public function ajaxMostrarDepartamento()
	{
		$valor = $this->idcliente;
		$respuesta = ModeloLocal::mdlMostrarDepartamento($valor);
		echo json_encode($respuesta);
	}

	public $idcliente1;
	public $iddepartamento;

	public function ajaxMostrarDistrito()
	{
		$valor1 = $this->idcliente1;
		$valor2 = $this->iddepartamento;
		$respuesta2 = ModeloLocal::mdlMostrarDistrito($valor1, $valor2);
		echo json_encode($respuesta2);
	}
}


/* Mostrar Departamento */
if (isset($_POST["idcliente"])) {
	$mostrarDe = new AjaxLocal();
	$mostrarDe->idcliente = $_POST["idcliente"];
	$mostrarDe->ajaxMostrarDepartamento();
}

/* Mostrar Distrito y direccion */
if (isset($_POST["iddepartamento"])) {
	$mostrarDi = new AjaxLocal();
	$mostrarDi->idcliente1 = $_POST["idcliente1"];
	$mostrarDi->iddepartamento = $_POST["iddepartamento"];
	$mostrarDi->ajaxMostrarDistrito();
}
