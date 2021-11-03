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
}
