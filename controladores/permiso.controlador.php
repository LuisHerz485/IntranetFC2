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
        if (isset($_POST["idpermiso"], $_POST["idtipopermiso"], $_POST["detalle"], $_POST["fechainicio"], $_POST["fechafin"])) {
            $idpermiso = ControladorValidacion::validarID($_POST["idpermiso"]);
            $idtipopermiso = ControladorValidacion::validarID($_POST["idtipopermiso"]);
            $detalle = $_POST["detalle"];
            $fechainicio = $_POST["fechainicio"];
            $fechafin = $_POST["fechafin"];
            if (
                $idtipopermiso && $idpermiso
                && ControladorValidacion::longitud($detalle, 500, 10)
                && ControladorValidacion::formatoFechaHoraMinutos($fechainicio)
                && ControladorValidacion::formatoFechaHoraMinutos($fechafin)
            ) {
                return ModeloPermiso::mdlEditarPermiso($idpermiso, $idtipopermiso, $detalle, $fechainicio, $fechafin);
            }
        }
        return false;
    }

    public static function ctrBuscarPermiso(): mixed
    {
        if (isset($_POST["idpermiso"])) {
            $idpermiso = ControladorValidacion::validarID($_POST["idpermiso"]);
            if ($idpermiso) {
                return ModeloPermiso::mdlListarPermisoPorId($idpermiso);
            }
        }
        return false;
    }
    public static function ctrFiltroPermiso(): mixed
    {
        if (isset($_POST["idestadopermiso"], $_POST["fechadesde"], $_POST["fechahasta"])) {
            $idestadopermiso = ControladorValidacion::validarID($_POST["idestadopermiso"]);
            $fechadesde = $_POST["fechadesde"];
            $fechahasta = $_POST["fechahasta"];
            if (ControladorValidacion::formatoFecha($fechadesde) && ControladorValidacion::formatoFecha($fechahasta)) {
                if ($idestadopermiso) {
                    return ModeloPermiso::mdlListarPermisosFiltros($fechadesde, $fechahasta, $idestadopermiso);
                } else {
                    return ModeloPermiso::mdlListarPermisosFiltrarRangoFecha($fechadesde, $fechahasta);
                }
            }
        }
        return false;
    }
    public static function ctrEditarEstado(): bool
    {
        if (isset($_POST["idpermiso"], $_POST["idestadopermiso"])) {
            $idpermiso = ControladorValidacion::validarID($_POST["idpermiso"]);
            $idestadopermiso = ControladorValidacion::validarID($_POST["idestadopermiso"]);
            if ($idpermiso && $idestadopermiso) {
                return ModeloPermiso::mdlEditarEstadoPermiso($idpermiso, $idestadopermiso);
            }
        }
        return false;
    }
}
