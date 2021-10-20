<?php
class ControladorContancia
{
	static public function ctrMostrarConstancia($item, $valor)
	{
		$tabla = "cobranza";
		$respuesta = ModeloConstancia::mdlMostrarConstancia($tabla, $item, $valor);
		return $respuesta;
	}

	static public function ctrCrearConstancia()
	{
		if (isset($_POST['nota'])) {
			if (preg_match('/^[a-zA-Z0-9ñÑaáÁéÉíÍóÓúÚ ]+$/', $_POST['nota'])) {

				$tabla = "constancia";
				$datos = array(
					"idcotizacion" => $_POST['idcotizacion'],
					"idlocalcliente" => $_POST['idlocalcliente'],
					"idcliente" => $_POST['idcliente'],
					"idubicacion" => $_POST['idubicacion'],
					"fechaemision" => $_POST['fechaemision'],
					"fechavencimiento" => $_POST['fechavencimiento'],
					"estado" => 1,
					"descripcion" => $_POST['descripcion']
				);
			}
		}
	}
}
