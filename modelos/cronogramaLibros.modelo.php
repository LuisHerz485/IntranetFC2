<?php
require_once "conexion-v2.php";

class ModeloCronogramaLibros
{
    public static function mdlRegistrarCronogramaLibros(int $digitoruc, string $fechavencimiento, string $mesano): int|false
    {
        $idcronograma1 = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idcronograma1 = $conexion->insert("INSERT INTO cronogramalibroselectronicos (mesano, digitoruc, fechavencimiento) VALUES(?, ?,?)", [$mesano, $digitoruc, $fechavencimiento]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $idcronograma1;
    }

    public static function mdlBuscarCronogramaFechaLibros(int $digitoruc): int|bool
    {
        $idcronogramafecha1 = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idcronogramafecha1 = $conexion->getDataSingle("SELECT idcronogramalibroselectronicos FROM cronogramalibroselectronicos WHERE digitoruc=? AND  DATE_FORMAT(mesano, \"%Y-%m\") =  DATE_FORMAT(CURDATE(), \"%Y-%m\")", [$digitoruc]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $idcronogramafecha1;
    }

    public static function mdlConsularCronogramaxAnyoLibros(string $anyo): mixed
    {
        $cronograma1 = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $cronograma1 = $conexion->getData("SELECT  ELT(MONTH(mesano), 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre') as mes,MAX(CASE WHEN digitoruc = 0 THEN fechavencimiento END) as Ruc0, MAX(CASE WHEN digitoruc = 1 THEN fechavencimiento END) as Ruc1,MAX(CASE WHEN digitoruc = 2 THEN fechavencimiento END) as Ruc2y3,MAX(CASE WHEN digitoruc = 4 THEN fechavencimiento END) as Ruc4y5,MAX(CASE WHEN digitoruc = 6 THEN fechavencimiento END) as Ruc6y7,MAX(CASE WHEN digitoruc = 8 THEN fechavencimiento END) as Ruc8y9 FROM cronogramalibroselectronicos  WHERE YEAR(mesano)=? GROUP BY mes
            ", [$anyo]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $cronograma1;
    }
}