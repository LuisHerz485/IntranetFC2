<?php
class ControladorValidacion
{

    /**
     * Valida que el parametro tenga el formato Y-m-d\TH:i  Ejemplo: 2021-09-17T10:18
     */
    public static function formatoFechaHoraMinutos(string $fecha, string $formato = 'Y-m-d\TH:i'): bool
    {
        $d = DateTime::createFromFormat($formato, $fecha);
        return boolval($d);
    }

    /**
     * Valida que el parametro tenga el formato H:i  Ejemplo: 10:18 
     */
    public static function formatoHoraMinutos(string $fecha): bool
    {
        return self::formatoFechaHoraMinutos($fecha, 'H:i');
    }


    public static function formatoFechaMes(string $fecha): bool
    {
        return self::formatoFechaHoraMinutos($fecha, 'Y-m');
    }

    /**
     * Valida que el parametro tenga el formato Y-m-d  Ejemplo: 2021-09-17
     */
    public static function formatoFecha(string $fecha): bool
    {
        return self::formatoFechaHoraMinutos($fecha, 'Y-m-d');
    }

    /**
     * Valida la longitud del texto
     * @param string $texto
     * @param int $hasta El Maximo de longitud del texto
     * @param int $desde El Minimo de longitud del texto por defecto es 0
     */
    public static function longitud(string $texto, int $hasta, int $desde = 0): bool
    {
        $longitud = strlen($texto);
        return $longitud >= $desde && $longitud <= $hasta;
    }
    /**
     * Valida que el parametro numero sea un entero mayor que cero
     * @return int El parametro numero convertido a int
     * @return bool Retorna false si no se pudo convertir a int positivo
     */
    public static function validarID(string $numero): int|bool
    {
        $num = intval($numero);
        return ($num > 0) ? $num : false;
    }
    /**
     * Valida que el parametro numero sea un float mayor igual que cero
     * @return float El parametro numero convertido a float
     * @return bool Retorna false si no se pudo convertir correctamente a float
     */
    public static function validarPrecio(string $numero): float|bool
    {
        $num = floatval($numero);
        return ($num >= 0 && strlen($numero) == strlen($num)) ? $num : false;
    }

    /**
     * Valida que el parametro numero sea un float mayor igual que cero
     * @return float El parametro numero convertido a float
     * @return bool Retorna false si no se pudo convertir correctamente a float
     */
    public static function flotante(string $numero): float|bool
    {
        return (is_numeric($numero)) ? floatval($numero) : false;
    }

    public static function entero(string $numero): string|bool
    {
        return (is_numeric($numero)) ? intval($numero) : false;
    }

    public static function enteroPositivo(string $numero): string|bool
    {
        $num = intval($numero);
        return ($num > 0) ? $num : false;
    }

    public static function fecha(string $fecha): string|bool
    {
        return (ControladorValidacion::formatoFecha($fecha)) ? $fecha : false;
    }

    public static function fechaMes(string $fecha): string|bool
    {
        return (ControladorValidacion::formatoFechaMes($fecha)) ? $fecha : false;
    }

    public static function longitud1000(string $texto): string|bool
    {
        return (ControladorValidacion::longitud($texto, 1000)) ? $texto : false;
    }

    /**
     * @param array $campos Ejemplo:  ["campo1"=>"tipoDeValidacion", "campo2"=>"tipoDeValidacion"]
     */
    public static function validar(array $campos): array|bool
    {
        $data = [];
        foreach ($campos as $campo => $tipoValidacion) {
            if (isset($_POST[$campo])) {
                $data[] = ControladorValidacion::$tipoValidacion($_POST[$campo]);
            } else {
                return false;
            }
        }
        return $data;
    }
}
