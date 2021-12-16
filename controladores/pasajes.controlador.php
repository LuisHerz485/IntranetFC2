<?php 

    class ControladorPasaje
    {
        public static function ctrRegistrarPasaje(): int|false
        {
            $data = ControladorValidacion::validar([
                "idusuario" => "enteroPositivo",
                "gastos" => "flotante",
                "ida" => "flotante",
                "vuelta" => "flotante",
                "dias" => "enteroPositivo",
                "semana" => "flotante",
                "mensual" => "flotante",
                "detalle" => "longitud1000",
                "fechacreacion" => "Fecha",
                "idestadopasaje" => "enteroPositivo",
                "pagomedio" => "flotante",
                "totalpasaje" => "flotante",
                "diasextra" => "flotante",
                "diasmenos" => "flotante",
            ]);
            if (is_array($data) && !in_array(false, $data, true)) {
                return ModeloPasaje::mdlRegistrarPasaje($data);
            }
            return false;
        }

        public static function ctrEditarPasaje(): int|false
        {
            $data = ControladorValidacion::validar([
                "idusuario" => "enteroPositivo",
                "gastos" => "flotante",
                "ida" => "flotante",
                "vuelta" => "flotante",
                "dias" => "enteroPositivo",
                "semana" => "flotante",
                "mensual" => "flotante",
                "detalle" => "longitud1000",
                "fechacreacion" => "Fecha",
                "idestadopasaje" => "enteroPositivo",
                "pagomedio" => "flotante",
                "totalpasaje" => "flotante",
                "diasextra" => "flotante",
                "diasmenos" => "flotante",
                "idpasajes" => "enteroPositivo",
            ]);
            
            if (is_array($data) && !in_array(false, $data, true)) {
                return ModeloPasaje::mdlEditarPasaje($data);
            }
            return false;
        }

        public static function ctrListarEstadosPasajes(): mixed
        {
            return ModeloPasaje::mdlListarEstadosPasajes();
        }

        public static function ctrListarPasaje(): mixed
        {
            return ModeloPasaje::mdlListarPasaje();
        }

        public static function ctrMontoTotalPasajes(): mixed
        {
            return ModeloPasaje::mdlMontoTotalPasajes();
        }

        public static function ctrBuscarPasajePorID(): mixed
        {
            $data = ControladorValidacion::validar([
                "idpasajes" => "enteroPositivo",
            ]);
    
            if (is_array($data) && !in_array(false, $data, true)) {
                return ModeloPasaje::mdlBuscarPasajePorID($data);
            }
    
            return null;
        }

        public static function ctrBuscarPasajePorDepartamento(): mixed
        {
            $data = ControladorValidacion::validar([
                "iddepartamento" => "enteroPositivo",
            ]);
    
            if (is_array($data) && !in_array(false, $data, true)) {
                return ModeloPasaje::mdlBuscarPasajePorDepartamento($data);
            }
    
            return null;
        }

        public static function ctrBuscarPasajeDeUnUsuarioPorFecha(): mixed
        {
            $data = ControladorValidacion::validar([
                "fechacreacion" => "Fecha",
            ]);
    
            if (is_array($data) && !in_array(false, $data, true)) {
                return ModeloPasaje::mdlBuscarPasajeDeUnUsuarioPorFecha($data);
            }
    
            return null;
        }

        public static function ctrBuscarPasajeDeUnUsuario(): mixed
        {
            $data = ControladorValidacion::validar([
                "idusuario" => "enteroPositivo",
            ]);
    
            if (is_array($data) && !in_array(false, $data, true)) {
                return ModeloPasaje::mdlBuscarPasajeDeUnUsuario($data);
            }

            return null;
        }

    }
