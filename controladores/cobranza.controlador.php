<?php
class ControladorCobranza
{

	static public function ctrMostrarPagos($valor)
	{
		$tabla = "cobranza";
		$respuesta = ModeloCobranza::mdlMostrarPagosPendientes($tabla, $valor);
		return $respuesta;
	}

	public static function ctrEliminarCobranzaPorID(): mixed
    {
            $data = ControladorValidacion::validar([
                "idcobranza" => "enteroPositivo",
            ]);

            if (is_array($data) && !in_array(false, $data, true)) { 
                return ModeloCobranza::mdlEliminarCobranza($data);
            }

            return null;
    }
}
