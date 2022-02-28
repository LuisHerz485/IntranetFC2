<?php

require_once "./validarsesion.php";
require_once "../controladores/validacion.controlador.php";
require_once "../controladores/clientes.controlador.php";
require_once "../controladores/consultapiperu.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes
{
	public $activarEstado;
	public $activarIdCliente;
	public function ajaxActivarCliente()
	{
		$tabla = "cliente";
		$item1 = "estado";
		$valor1 = $this->activarEstado;
		$item2 = "idcliente";
		$valor2 = $this->activarIdCliente;
		$respuesta = ModeloClientes::mdlActualizarCliente($tabla, $item1, $valor1, $item2, $valor2);
	}

	public $idcliente;
	public function ajaxEditarCliente()
	{
		$item = "idcliente";
		$valor = $this->idcliente;
		$respuesta = ControladorClientes::ctrMostrarCliente($item, $valor);
		echo json_encode($respuesta);
	}
	public function ajaxteditarfechacontrato()
	{
		$item = "fechacontrato";
		$valor = $this->idcliente;
		$respuesta = ControladorClientes::ctreditarfecha($item, $valor);
		echo json_encode($respuesta);
	}
}

if (isset($_POST['estado'])) {
	http_response_code(200);
	$estado = new AjaxClientes();
	$estado->activarEstado = $_POST['estado'];
	$estado->activarIdCliente = $_POST['idcliente'];
	$estado->ajaxActivarCliente();
}

if (isset($_POST["idcliente"])) {
	http_response_code(200);
	$editar = new AjaxClientes();
	$editar->idcliente = $_POST["idcliente"];
	$editar->ajaxEditarCliente();
}

if (isset($_POST["opcion"])) {
	switch ($_POST["opcion"]) {
		case "ConsultaRazonSocial": {
				http_response_code(200);
				echo json_encode(["respuesta" => ConsulraRuc_razonSocial($_POST["ruc"])]);
				break;
			}
		default: {
				break;
			}
	}
}

if (isset($_POST["opcion"])) {
	switch ($_POST["opcion"]) {
        case "MontoTotalColaborador": {
            $respuesta = ControladorClientes::ctrEditarRegimen();
            if ($respuesta !== null) {
                http_response_code(200);
                echo json_encode(["respuesta" => $respuesta]);
            }
            break;
        }
	}
}
