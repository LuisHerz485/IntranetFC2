<?php

class ControladorChecklist
{
    public static function ctrRegistrarChecklist(): bool
    {
        if (isset($_POST["idtipousuario"], $_POST["iddepartamento"], $_POST["idusuario"], $_POST["fecha"],  $_POST["idestadochecklist"], $_POST["detalle"], $_POST["horainicio"], $_POST["horafin"])) {
            $idtipousuario = ControladorValidacion::validarID($_POST["idtipousuario"]);
            $iddepartamento = ControladorValidacion::validarID($_POST["iddepartamento"]);
            $idusuario = ControladorValidacion::validarID($_POST["idusuario"]);
            $fecha = $_POST["fecha"];
            $cantidad = count($_POST["detalle"]);
            $actividades = [];
            for ($i = 0; $i < $cantidad; $i++) {
                if (
                    ControladorValidacion::longitud($_POST["detalle"][$i], 200, 10)
                    && ControladorValidacion::formatoHoraMinutos($_POST["horainicio"][$i])
                    && ControladorValidacion::formatoHoraMinutos($_POST["horafin"][$i])
                ) {
                    $actividades[] = "( ?, " . $_POST["idestadochecklist"][$i] . ",'" . $_POST["detalle"][$i] . "','" . $_POST["horainicio"][$i] . "','" . $_POST["horafin"][$i] . "')";
                } else {
                    return false;
                }
            }
            if (ControladorValidacion::formatoFecha($fecha) && $idtipousuario && $iddepartamento && $idusuario && $cantidad) {
                $idchecklist = ChecklistModelo::mdlRegistrarChecklist($idtipousuario, $iddepartamento, $idusuario, $fecha);
                if ($idchecklist) {
                    return  ChecklistModelo::mdlRegistrarDetalleChecklist(
                        $actividades,
                        str_split(str_repeat($idchecklist, $cantidad), strlen($idchecklist))
                    );
                }
            }
        }
        return false;
    }
    public static function ctrEditarDetalleChecklist(): bool
    {
        if (isset($_POST["iddetallechecklist"], $_POST["idestadochecklist"], $_POST["detalle"], $_POST["horainicio"], $_POST["horafin"])) {
            $iddetallechecklist = ControladorValidacion::validarID($_POST["iddetallechecklist"]);
            $idestadochecklist = ControladorValidacion::validarID($_POST["idestadochecklist"]);
            $detalle = $_POST["detalle"];
            $horainicio = $_POST["horainicio"];
            $horafin = $_POST["horafin"];
            if (
                $iddetallechecklist   && $idestadochecklist
                && ControladorValidacion::longitud($detalle, 200, 10)
                && ControladorValidacion::formatoHoraMinutos($horainicio)
                && ControladorValidacion::formatoHoraMinutos($horafin)
            ) {
                return ChecklistModelo::mdlEditarDetalleChecklist($idestadochecklist, $detalle, $horainicio, $horafin, $iddetallechecklist);
            }
        }
        return false;
    }

    public static function ctrCheckListActividades():mixed
    {
        if(isset($_POST["idestadochecklist"],$_POST["idusuario"],$_POST["fechadesde"],$_POST["fechahasta"])){
            $idusuario = ControladorValidacion::validarID($_POST["idusuario"]);
            $idestadochecklist = ControladorValidacion::validarID($_POST["idestadochecklist"]);
            $fechadesde=$_POST["fechadesde"];
            $fechahasta=$_POST["fechahasta"];
            if($idusuario && $idestadochecklist
             && ControladorValidacion::formatoFecha($fechadesde) 
             && ControladorValidacion::formatoFecha($fechahasta))
             {
               return ChecklistModelo::mdlListarCheckListActividades($idusuario,$idestadochecklist,$fechadesde,$fechahasta);
             }
        }
        return false;
    }
}
