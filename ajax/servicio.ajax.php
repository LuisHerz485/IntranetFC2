<?php

require_once "../controladores/detallecobranza.controlador.php";
require_once "../modelos/detallecobranza.modelo.php";

class AjaxServicio {

	public function ajaxMostrarServicio(){
		$valor = null;
		$item = 1;
		$tabla = "servicio";
		$respuesta = ModeloDetalleCobranza::mdlMostrarServicio($tabla,$item,$valor);
		echo json_encode($respuesta);
	}
}

if(isset($_POST["listar"])){
	$mostrarSe = new AjaxServicio();
	$mostrarSe -> ajaxMostrarServicio();
}