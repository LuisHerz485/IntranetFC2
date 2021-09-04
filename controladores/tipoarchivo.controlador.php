<?php
class ControladorTipoArchivo
{
	static public function ctrMostrarTipoArchivo($item, $valor)
	{
		$tabla = "tipoarchivo";
		$respuesta = ModeloTipoArchivo::mdlMostrarTipoArchivo($tabla, $item, $valor);
		return $respuesta;
	}
}
