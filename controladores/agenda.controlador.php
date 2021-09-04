<?php
class ControladorAgenda
{
	static public function ctrMostrarAgendaCliente($item, $valor)
	{
		$tabla = "agenda";
		$respuesta = ModeloAgenda::mdlMostrarAgendaCliente($tabla, $item, $valor);
		return $respuesta;
	}
}
