<?php

class ControladorPermiso
{
    public static function ctrRegistrarPermiso(): bool
    {
        if (isset($_POST["idusuario"], $_POST["idtipopermiso"], $_POST["detalle"], $_POST["fechainicio"], $_POST["fechafin"])) {

            $idusuario = ControladorValidacion::validarID($_POST["idusuario"]);
            $idtipopermiso = ControladorValidacion::validarID($_POST["idtipopermiso"]);
            $detalle = $_POST["detalle"];
            $fechainicio = $_POST["fechainicio"];
            $fechafin = $_POST["fechafin"];
            if (
                $idusuario && $idtipopermiso
                && ControladorValidacion::longitud($detalle, 500, 10)
                && ControladorValidacion::formatoFechaHoraMinutos($fechainicio)
                && ControladorValidacion::formatoFechaHoraMinutos($fechafin)
            ) {
                return ModeloPermiso::mdlRegistrarPermiso($idusuario, $idtipopermiso, $detalle, $fechainicio, $fechafin);
            }
        }
        return false;
    }

    public static function ctrEditarPermiso(): bool
    {
        if (isset($_POST["idpermiso"], $_POST["idusuario"], $_POST["idestadopermiso"], $_POST["idtipopermiso"], $_POST["detalle"], $_POST["fechainicio"], $_POST["fechafin"])) {
            $idpermiso = ControladorValidacion::validarID($_POST["idpermiso"]);
            $idusuario = ControladorValidacion::validarID($_POST["idusuario"]);
            $idestadopermiso = ControladorValidacion::validarID($_POST["idestadopermiso"]);
            $idtipopermiso = ControladorValidacion::validarID($_POST["idtipopermiso"]);
            $detalle = $_POST["detalle"];
            $fechainicio = $_POST["fechainicio"];
            $fechafin = $_POST["fechafin"];
            if (
                $idusuario && $idtipopermiso && $idpermiso
                && ControladorValidacion::longitud($detalle, 500, 10)
                && ControladorValidacion::formatoFechaHoraMinutos($fechainicio)
                && ControladorValidacion::formatoFechaHoraMinutos($fechafin)
            ) {
                return ModeloPermiso::mdlEditarPermiso($idpermiso, $idtipopermiso, $idestadopermiso, $detalle, $fechainicio, $fechafin);
            }
        }
        return false;
    }
}
