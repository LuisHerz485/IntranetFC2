<?php
class ControladorCobranza
{

	static public function ctrMostrarPagos($valor)
	{
		$tabla = "cobranza";
		$respuesta = ModeloCobranza::mdlMostrarPagosPendientes($tabla, $valor);
		return $respuesta;
	}
}
