<?php
class ControladorPlanilla
{
    public static function ctrRegistrarPlanilla(): int|false
    {
        $data = ControladorValidacion::validar([
            "honorario" => "flotante",
            "remuneraciondiaria" => "flotante",
            "remuneracionmensual" => "flotante",
            "fechaingreso" => "fecha",
            "fechafin" => "fecha",
            "idusuario" => "enteroPositivo",
            "idestadoplanilla" => "enteroPositivo",
            "montodescuento" => "flotante",
            "observacion" => "longitud1000",
        ]);

        if (is_array($data) && !in_array(false, $data, true)) {
            return ModeloPlanilla::mdlRegistrarPlanilla($data);
        }

        return false;
    }

    public static function ctrEditarPlanilla(): int|false
    {
        $data = ControladorValidacion::validar([
            "honorario" => "flotante",
            "remuneraciondiaria" => "flotante",
            "remuneracionmensual" => "flotante",
            "fechaingreso" => "fecha",
            "fechafin" => "fecha",
            "idusuario" => "enteroPositivo",
            "idestadoplanilla" => "enteroPositivo",
            "montodescuento" => "flotante",
            "observacion" => "longitud1000",
            "idplanilla" => "enteroPositivo",
        ]);

        if (is_array($data) && !in_array(false, $data, true)) {
            return ModeloPlanilla::mdlEditarPlanilla($data);
        }

        return false;
    }

    public static function ctrListarEstadosPlanillas(): mixed
    {
        return ModeloPlanilla::mdlListarEstadosPlanillas();
    }

    public static function ctrListarPlanillas(): mixed
    {
        return ModeloPlanilla::mdlListarPlanillas();
    }

    public static function ctrBuscarPlanillaPorID(): mixed
    {
        $data = ControladorValidacion::validar([
            "idplanilla" => "enteroPositivo",
        ]);

        if (is_array($data) && !in_array(false, $data, true)) {
            return ModeloPlanilla::mdlBuscarPlanillaPorID($data);
        }

        return null;
    }

    public static function ctrBuscarPlanillaPorDepartamento(): mixed
    {
        $data = ControladorValidacion::validar([
            "iddepartamento" => "enteroPositivo",
        ]);

        if (is_array($data) && !in_array(false, $data, true)) {
            return ModeloPlanilla::mdlBuscarPlanillaPorDepartamento($data);
        }

        return null;
    }

    public static function ctrBuscarPlanillaDeUnUsuario(): mixed
    {
        $data = ControladorValidacion::validar([
            "idusuario" => "enteroPositivo",
        ]);

        if (is_array($data) && !in_array(false, $data, true)) {
            return ModeloPlanilla::mdlBuscarPlanillaDeUnUsuario($data);
        }

        return null;
    }
}
