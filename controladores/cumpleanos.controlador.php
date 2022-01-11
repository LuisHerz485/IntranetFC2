<?php

class ControladorCumpleanos
{

        public static function ctrRegistrarCumpleanos(): int|false
        {
            $data = ControladorValidacion::validar([
                "idusuario" => "enteroPositivo",
                "fechacumple" => "Fecha",

            ]);
            if (is_array($data) && !in_array(false, $data, true)) {
                return ModeloCumpleanos::mdlRegistrarCumpleanos($data);
            }
            return false;
        }

        public static function ctrEditarCumpleanos(): int|false
        {
            $data = ControladorValidacion::validar([
                "idusuario" => "enteroPositivo",
                "fechacumple" => "Fecha",
                "idcumpleanos" => "enteroPositivo",
            ]);
            
            if (is_array($data) && !in_array(false, $data, true)) {
                return ModeloCumpleanos::mdlEditarCumpleanos($data);
            }
            return false;
        }

        public static function ctrListarCumpleanos(): mixed
        {
            return ModeloCumpleanos::mdlListarCumpleanos();
        }

        public static function ctrBuscarCumpleanosPorID(): mixed
        {
            $data = ControladorValidacion::validar([
                "idcumpleanos" => "enteroPositivo",
            ]);
    
            if (is_array($data) && !in_array(false, $data, true)) {
                return ModeloCumpleanos::mdlBuscarCumpleanosPorID($data);
            }
    
            return null;
        }

        public static function ctrBuscarCumpleanosDeUnUsuario(): mixed
        {
            $data = ControladorValidacion::validar([
                "idusuario" => "enteroPositivo",
            ]);
    
            if (is_array($data) && !in_array(false, $data, true)) {
                return ModeloCumpleanos::mdlBuscarCumpleanosDeUnUsuario($data);
            }
    
            return null;
        }

        public static function ctrBuscarPasajeDeUnCumpleanosPorFecha(): mixed
        {
            $data = ControladorValidacion::validar([
                "fechacumple" => "Fecha",
            ]);
    
            if (is_array($data) && !in_array(false, $data, true)) {
                return ModeloCumpleanos::mdlBuscarPasajeDeUnCumpleanosPorFecha($data);
            }
    
            return null;
        }


}