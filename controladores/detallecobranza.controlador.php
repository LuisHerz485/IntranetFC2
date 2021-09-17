<?php
class ControladorDetalleCobranza
{
	static public function ctrMostrarServicio($item, $valor)
	{
		$tabla = "servicio";
		$respuesta = ModeloDetalleCobranza::mdlMostrarServicio($tabla, $item, $valor);
		return $respuesta;
	}

	static public function ctrMostrarPlanes($item, $valor)
	{
		$tabla = "plan";
		$respuesta = ModeloDetalleCobranza::mdlMostrarPlanes($tabla, $item, $valor);
		return $respuesta;
	}

	static public function ctrMostrarDetCobranza($item, $valor)
	{
		$tabla = "detallecobranza";
		$respuesta = ModeloCobranza::mdlMostrarCobranza($tabla, $item, $valor);
		return $respuesta;
	}
}
