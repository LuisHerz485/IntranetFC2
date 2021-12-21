<?php
class ControladorDeclaracionSunatPle
{
    public static function ctrConsultarDeclaracionSunatPle(): mixed
    {
        if (isset($_POST["mesanyo"], $_POST["idestadodeclaracion"], $_POST["idtipodeclaracion"])) {

            $mesanyo = $_POST["mesanyo"];
            $idtipodeclaracion = ControladorValidacion::validarID($_POST["idtipodeclaracion"]);
            $idestadodeclaracion = $_POST["idestadodeclaracion"];
            if (ControladorValidacion::formatoFechaMes($mesanyo) && $idestadodeclaracion >= 0 && $idtipodeclaracion) {
                if ($idestadodeclaracion == 0) {
                    return ModeloDeclaracionSunatPle::mdlConsularDeclaracionesSunatPle($mesanyo, $idtipodeclaracion);
                } else {
                    return ModeloDeclaracionSunatPle::mdlConsularDeclaracionSunatPle($mesanyo, $idestadodeclaracion, $idtipodeclaracion);
                }
            }
        }
        return false;
    }
    public static function ctrConsultarDeclaracionSunatPleClientes(): mixed
    {
        if (isset($_POST["anyo"], $_POST["idcliente"], $_POST["idtipodeclaracion"])) {
            $anyo = $_POST["anyo"];
            $idtipodeclaracion = ControladorValidacion::validarID($_POST["idtipodeclaracion"]);
            $idcliente = ControladorValidacion::validarID($_POST["idcliente"]);
            if ($idcliente &&  !empty($anyo)) {
                return ModeloDeclaracionSunatPle::mdlConsularDeclaracionesSunatClientesPle($anyo, $idcliente, $idtipodeclaracion);
            }
        }
        return false;
    }

    public static function ctrRegistrarDeclaracionSunatPle(): mixed
    {
        if (isset($_POST["iddeclaracionS"], $_POST["fechadeclarada"], $_POST["numOrden"], $_SESSION["idusuario"], $_POST["idtipodeclaracion"])) {
            $numerorden = $_POST["numOrden"];
            $idusuario = $_SESSION["idusuario"];
            $iddeclaracion = ControladorValidacion::validarID($_POST["iddeclaracionS"]);
            $fechadeclarada = strtotime($_POST["fechadeclarada"]);
            $fechavencimiento = strtotime($_POST["fechavencimiento"]);
            $idtipodeclaracion = ControladorValidacion::validarID($_POST["idtipodeclaracion"]);
            if ($iddeclaracion && $idtipodeclaracion && ControladorValidacion::formatoFecha($_POST["fechadeclarada"]) && !empty($numerorden)) {
                if ($fechavencimiento >= $fechadeclarada) {
                    return ModeloDeclaracionSunatPle::mdlRegistrarDetalleDeclaracionSunatPle($iddeclaracion, 2, $_POST["fechadeclarada"], $numerorden, $idusuario, $idtipodeclaracion);
                } else {
                    return ModeloDeclaracionSunatPle::mdlRegistrarDetalleDeclaracionSunatPle($iddeclaracion, 3, $_POST["fechadeclarada"], $numerorden, $idusuario, $idtipodeclaracion);
                }
            }
        }
        return false;
    }

    public static function ctrActualizarDeclaracionSunatPle(): mixed
    {
        if (isset($_POST["iddetalledeclaracion"], $_POST["iddeclaracionS"], $_POST["idestado"], $_POST["fechadeclarada"], $_POST["numOrden"], $_POST["idtipodeclaracion"])) {
            $iddetalledeclaracionPle =  ControladorValidacion::validarID($_POST["iddetalledeclaracion"]);
            $idestado =  ControladorValidacion::validarID($_POST["idestado"]);
            $numerorden = $_POST["numOrden"];
            $iddeclaracion = ControladorValidacion::validarID($_POST["iddeclaracionS"]);
            $idtipodeclaracion = ControladorValidacion::validarID($_POST["idtipodeclaracion"]);
            if ($iddetalledeclaracionPle && $iddeclaracion && $idtipodeclaracion && $idestado && ControladorValidacion::formatoFecha($_POST["fechadeclarada"]) && !empty($numerorden)) {
                return ModeloDeclaracionSunatPle::mdlActualizarDeclaracionSunatPle($iddetalledeclaracionPle, $idestado, $_POST["fechadeclarada"], $numerorden,  $idtipodeclaracion);
            }
        }
        return false;
    }
}
