<?php
require_once "conexion-v2.php";

class ModeloCronogramaAnualSunat
{
    public static function mdlConsularCronogramaAnual(string $anyo): mixed
    {
        $cronograma = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $cronograma = $conexion->getData("SELECT anyo, digitoruc, fechavencimiento FROM cronogramaanual  WHERE anyo=? 
            ", [$anyo]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $cronograma;
    }
}
