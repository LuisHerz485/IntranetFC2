<?php
class ControladorDeclaracionSunat
{
    public static function ctrConsultarDeclaracionSunat(): mixed
    {
        if (isset($_POST["mesanyo"], $_POST["idestadodeclaracion"], $_POST["idtipodeclaracion"])) {

            $mesanyo = $_POST["mesanyo"];
            $idtipodeclaracion = ControladorValidacion::validarID($_POST["idtipodeclaracion"]);
            $idestadodeclaracion = $_POST["idestadodeclaracion"];
            if (ControladorValidacion::formatoFechaMes($mesanyo) && $idestadodeclaracion >= 0 && $idtipodeclaracion) {
                if ($idestadodeclaracion == 0) {
                    return ModeloDeclaracionSunat::mdlConsularDeclaracionesSunat($mesanyo, $idtipodeclaracion);
                } else {
                    return ModeloDeclaracionSunat::mdlConsularDeclaracionSunat($mesanyo, $idestadodeclaracion, $idtipodeclaracion);
                }
            }
        }
        return false;
    }
    public static function ctrConsultarDeclaracionSunatClientes(): mixed
    {
        if (isset($_POST["anyo"], $_POST["idcliente"], $_POST["idtipodeclaracion"])) {
            $anyo = $_POST["anyo"];
            $idtipodeclaracion = ControladorValidacion::validarID($_POST["idtipodeclaracion"]);
            $idcliente = ControladorValidacion::validarID($_POST["idcliente"]);
            if ($idcliente &&  !empty($anyo)) {
                return ModeloDeclaracionSunat::mdlConsularDeclaracionesSunatClientes($anyo, $idcliente, $idtipodeclaracion);
            }
        }
        return false;
    }

    public static function ctrRegistrarDeclaracionSunat(): mixed
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
                    return ModeloDeclaracionSunat::mdlRegistrarDetalleDeclaracionSunat($iddeclaracion, 2, $_POST["fechadeclarada"], $numerorden, $idusuario, $idtipodeclaracion);
                } else {
                    return ModeloDeclaracionSunat::mdlRegistrarDetalleDeclaracionSunat($iddeclaracion, 3, $_POST["fechadeclarada"], $numerorden, $idusuario, $idtipodeclaracion);
                }
            }
        }
        return false;
    }

    public static function ctrActualizarDeclaracionSunat(): mixed
    {
        if (isset($_POST["iddetalledeclaracion"], $_POST["iddeclaracionS"], $_POST["idestado"], $_POST["fechadeclarada"], $_POST["numOrden"], $_POST["idtipodeclaracion"])) {
            $iddetalledeclaracionSunat =  ControladorValidacion::validarID($_POST["iddetalledeclaracion"]);
            $idestado =  ControladorValidacion::validarID($_POST["idestado"]);
            $numerorden = $_POST["numOrden"];
            $iddeclaracion = ControladorValidacion::validarID($_POST["iddeclaracionS"]);
            $idtipodeclaracion = ControladorValidacion::validarID($_POST["idtipodeclaracion"]);
            if ($iddetalledeclaracionSunat && $iddeclaracion && $idtipodeclaracion && $idestado && ControladorValidacion::formatoFecha($_POST["fechadeclarada"]) && !empty($numerorden)) {
                return ModeloDeclaracionSunat::mdlActualizarDeclaracionSunat($iddetalledeclaracionSunat, $idestado, $_POST["fechadeclarada"], $numerorden,  $idtipodeclaracion);
            }
        }
        return false;
    }
}
