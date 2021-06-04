<?php

require_once "../controladores/agenda.controlador.php";
require_once "../modelos/agenda.modelo.php";
require_once "../modelos/representante.modelo.php";

class AjaxAgenda{

	public $idclienteA;

	public function ajaxEditarMostrarAgenda(){
		$item = "idcliente";
		$valor = $this->idclienteA;
		$respuesta = ControladorAgenda::ctrMostrarAgendaCliente($item, $valor);
		echo json_encode($respuesta);
	}

    public $idclienteAg;
    public $nombrecompleto;
    public $detallecargo;
    public $telefono1;
    public $telefono2;
    public $correo1;
    public $correo2;
	public $editarAg;
    public $idrepresentante;

	public function ajaxEditarAgregarAgenda(){
		$accion = $this->editarAg;
		if($accion == "no"){
			$valor1 = $this->idclienteAg;
			$valor2 = $this->nombrecompleto;
			$valor3 = $this->detallecargo;
			$valor4 = $this->telefono1;
			$valor5 = $this->telefono2;
			$valor6 = $this->correo1;
			$valor7 = $this->correo2;
			$respuesta = ModeloRepresentante::mdlAgregarRepresentante($valor2, $valor3);
			$respuesta2 = ModeloAgenda::mdlAgregarAgenda($valor1, $respuesta['idrepresentante'], $valor4, $valor5, $valor6, $valor7);
		}else{
			$valor1 = $this->idclienteAg;
			$valor2 = $this->nombrecompleto;
			$valor3 = $this->detallecargo;
			$valor4 = $this->telefono1;
			$valor5 = $this->telefono2;
			$valor6 = $this->correo1;
			$valor7 = $this->correo2;
			$valor8 = $this->idrepresentante;
			$respuesta = ModeloRepresentante::mdlEditarRepresentante($valor2, $valor3, $valor8);
			$respuesta2 = ModeloAgenda::mdlEditarAgenda($valor1, $valor8, $valor4, $valor5, $valor6, $valor7);
		}
		echo json_encode($respuesta);
	}

	public $idrepre;

	public function ajaxEditarRepresentante(){
        $tabla = "agenda";
		$item = "A.idrepresentante";
		$valor = $this->idrepre;
		$respuesta = ModeloAgenda::mdlMostrarAgendaCliente($tabla, $item, $valor);
		echo json_encode($respuesta);
	}

}

/* Mostrar agenda*/
if(isset($_POST["idclienteA"])){
	$mostrarA = new AjaxAgenda();
	$mostrarA -> idclienteA = $_POST["idclienteA"];
	$mostrarA -> ajaxEditarMostrarAgenda();
}


/* Agregar/Editar agenda*/
if(isset($_POST["idclienteAg"])){
	$agregarA = new AjaxAgenda();
	$agregarA -> idclienteAg = $_POST["idclienteAg"];
    $agregarA -> nombrecompleto = $_POST["nombrecompleto"];
    $agregarA -> detallecargo = $_POST["detallecargo"];
    $agregarA -> telefono1 = $_POST["telefono1"];
    $agregarA -> telefono2 = $_POST["telefono2"];
    $agregarA -> correo1 = $_POST["correo1"];
    $agregarA -> correo2 = $_POST["correo2"];
	$agregarA -> editarAg = $_POST["editarAg"];
    $agregarA -> idrepresentante = $_POST["idrepresentante"];
	$agregarA -> ajaxEditarAgregarAgenda();
}

if(isset($_POST["idrepre"])){
	$editar = new AjaxAgenda();
	$editar -> idrepre = $_POST["idrepre"];
	$editar -> ajaxEditarRepresentante();
}
