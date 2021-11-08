<?php
require_once "conexion-v2.php";

class ModeloCronogramaSunat
{
    public static function mdlRegistrarCronograma(int $digitoruc, string $fechavencimiento, string $mesano): int|false
    {
        $idcronograma = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idcronograma = $conexion->insert("INSERT INTO cronogramafechas (mesano, digitoruc, fechavencimiento) VALUES(?, ?,?)", [$mesano, $digitoruc, $fechavencimiento]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $idcronograma;
    }
    
    public static function mdlBuscarCronogramaFecha(int $digitoruc): int|bool
    {
        $idcronogramafecha = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idcronogramafecha = $conexion->getDataSingle("SELECT idcronogramafecha FROM cronogramafecha WHERE digitoruc=? AND  DATE_FORMAT(mesano, \"%Y-%m\") =  DATE_FORMAT(CURDATE(), \"%Y-%m\")", [$digitoruc]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $idcronogramafecha;
    }

    public static function mdlConsularCronogramaxAnyo(string $anyo): mixed
    {
        $cronograma = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $cronograma = $conexion->getData("SELECT  ELT(MONTH(mesano), 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre') as mes,MAX(CASE WHEN digitoruc = 0 THEN fechavencimiento END) as Ruc0, MAX(CASE WHEN digitoruc = 1 THEN fechavencimiento END) as Ruc1,MAX(CASE WHEN digitoruc = 2 THEN fechavencimiento END) as Ruc2y3,MAX(CASE WHEN digitoruc = 4 THEN fechavencimiento END) as Ruc4y5,MAX(CASE WHEN digitoruc = 6 THEN fechavencimiento END) as Ruc6y7,MAX(CASE WHEN digitoruc = 8 THEN fechavencimiento END) as Ruc8y9 FROM cronogramafechas  WHERE YEAR(mesano)=? GROUP BY mes
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
