<?php 
require_once "conexion.php";
require_once "conexion-v2.php";

class ModeloCumpleanos
{
    public static function mdlRegistrarCumpleanos(array $datos): int|false
    {
        $idcumpleanos = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idcumpleanos = $conexion->insert("INSERT INTO cumpleanos (idusuario, fechacumple) VALUES(? ,?);
            ", $datos);
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
    return $idcumpleanos;
    }
    public static function mdlEditarCumpleanos(array $datos): int|false
    {
        $filasActualizadas = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filasActualizadas = $conexion->updateOrDelete("UPDATE cumpleanos SET idusuario=?, fechacumple=? WHERE idcumpleanos=?;
            ", $datos);
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $filasActualizadas;
    }

    public static function mdlListarCumpleanos(): mixed
    {
        $cumpleanos = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $cumpleanos = $conexion->getData("SELECT CU.idcumpleanos, CU.idusuario, CU.fechacumple, CONCAT(U.nombre,'',U.apellidos) AS nombrecompleto, U.imagen FROM cumpleanos AS CU INNER JOIN usuario U ON U.idusuario = CU.idusuario where U.estado =1");
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $cumpleanos;
    }

    public static function mdlBuscarCumpleanosPorID(array $datos): mixed
    {
        $uncumpleanos = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $uncumpleanos = $conexion->getDataSingle("SELECT CU.idcumpleanos, , CU.fechacumple, CONCAT(U.nombre,'',U.apellidos) AS nombrecompleto, U.imagen FROM cumpleanos AS CU INNER JOIN usuario U ON U.idusuario = CU.idusuario WHERE CU.idcumpleanos = ?", $datos);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $uncumpleanos;
    }

    public static function mdlBuscarCumpleanosDeUnUsuario(array $datos): mixed
    {
        $cumpleanos = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $cumpleanos = $conexion->getData("SELECT CU.idcumpleanos, , CU.fechacumple, CONCAT(U.nombre,'',U.apellidos) AS nombrecompleto, U.imagen FROM cumpleanos AS CU INNER JOIN usuario U ON U.idusuario = CU.idusuario WHERE U.idusuario = ?", $datos);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $cumpleanos;
    }

    public static function mdlBuscarPasajeDeUnCumpleanosPorFecha(array $datos): mixed
    {
        $cumpleanos = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $cumpleanos = $conexion->getData("SELECT CU.idcumpleanos, CONCAT(U.nombre,'',U.apellidos) AS nombrecompleto, CU.fechacumple, U.imagen FROM cumpleanos AS CU INNER JOIN usuario U ON U.idusuario = CU.idusuario WHERE CU.fechacumple = ?", $datos);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $cumpleanos;
    }
}