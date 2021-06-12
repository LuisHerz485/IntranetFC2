<?php

require_once "../controladores/archivo.controlador.php";
require_once "../modelos/archivo.modelo.php";

class AjaxTributaria{

	public $idtipoarchivo;
    public $idcliente;

	public function ajaxMostrarArchivos(){
		$valor1 = $this->idtipoarchivo;
		$valor2 = $this->idcliente;
		$respuesta = ControladorArchivo::ctrMostrarArchivo($valor1, $valor2);
		echo json_encode($respuesta);
	}
}


/* Mostrar Tabla */
if(isset($_POST["idtipoarchivo"])){
	$mostrar = new AjaxTributaria();
	$mostrar -> idtipoarchivo = $_POST["idtipoarchivo"];
    $mostrar -> idcliente = $_POST["idcliente"];
	$mostrar -> ajaxMostrarArchivos();
}
