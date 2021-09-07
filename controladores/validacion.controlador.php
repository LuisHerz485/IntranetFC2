<?php
class ControladorValidacion
{

    /**
     * 
     */
    public static function formatoFechaHoraMinutos(string $fecha, string $formato = 'Y-m-d\TH:i'): bool
    {
        $d = DateTime::createFromFormat($formato, $fecha);
        return $d && $d->format($formato) == $fecha;
    }

    /**
     * 
     */
    public static function formatoHoraMinutos(string $fecha): bool
    {
        return self::formatoFechaHoraMinutos($fecha, 'H:i');
    }

    /**
     * 
     */
    public static function formatoFecha(string $fecha): bool
    {
        return self::formatoFechaHoraMinutos($fecha, 'Y-m-d');
    }

    /**
     * 
     */
    public static function longitud(string $texto, int $hasta, int $desde = 0): bool
    {
        $longitud = strlen($texto);
        return $longitud >= $desde && $longitud <= $hasta;
    }

    /**
     * 
     */
    public static function validarID(string $numero): int|bool
    {
        $num = intval($numero);
        return ($num > 0) ? $num : false;
    }

    /**
     * 
     */
    public static function validarPrecio(string $numero): float|bool
    {
        $num = floatval($numero);
        return ($num >= 0) ? $num : false;
    }
}
