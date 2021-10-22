<?php

class ControladorHorario
{
    public static function ctrRegistrarHorario(): bool
    {
        if (isset($_POST["horainicio"], $_POST["horafin"], $_POST["idhorario"])) {
            $horainicio = date("H:i", strtotime($_POST["horainicio"]));
            $horafin = date("H:i", strtotime($_POST["horafin"]));
            if (ControladorValidacion::formatoHoraMinutos($horainicio) && ControladorValidacion::formatoHoraMinutos($horafin)) {
                $idhorarioexistente = ModeloHorario::mdlExisteHorario($horainicio, $horafin);
                if ($idhorarioexistente["idhorario"]) {
                    ModeloHorario::mdlHabilitarHorario($idhorarioexistente["idhorario"]);
                    return ModeloHorario::mdlActulizarEstados($idhorarioexistente["idhorario"]);
                } else {
                    $idhorariocreado = ModeloHorario::mdlRegistrarHorario($horainicio, $horafin);
                    if ($idhorariocreado) {
                        return ModeloHorario::mdlActulizarEstados($idhorariocreado);
                    }
                }
            }
        }
        return false;
    }
    public static function ctrConsultarHorario(): mixed
    {
        $horarioActual = ModeloHorario::mdlConsultarHorario();
        if ($horarioActual) {
            return array_replace($horarioActual, ["horaInicio" => date("g:i A", strtotime($horarioActual["horaInicio"])), "horafin" => date("g:i A", strtotime($horarioActual["horafin"]))]);
        }
        return false;
    }
}
