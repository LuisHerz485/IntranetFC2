<?php 
require_once "conexion.php";
require_once "conexion-v2.php";

class ModeloPasaje
{
    public static function mdlRegistrarPasaje(array $datos): int|false
    {
        $idpasaje = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idpasaje = $conexion->insert("INSERT INTO pasajes (idusuario, gastos, ida, vuelta, dias, semana, mensual, detalle, fechacreacion) VALUES(? ,? ,?, ?, ?, ?, ?, ?, ?);
            ", $datos);
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
    return $idpasaje;
}

    public static function mdlEditarPasaje(array $datos): int|false
    {
        $filasActualizadas = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filasActualizadas = $conexion->updateOrDelete("UPDATE pasajes SET idusuario=?, gastos=?, ida=?, vuelta=?, dias=?, semana=?, mensual=?, detalle=?, fechacreacion=? WHERE idpasajes=?;
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

    public static function mdlListarPasaje(): mixed
    {
        $pasajes = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $pasajes = $conexion->getData("SELECT PA.idpasajes, PA.idusuario, PA.gastos, PA.ida, PA.vuelta, PA.semana, PA.mensual, PA.dias, PA.detalle, PA.fechacreacion, CONCAT(U.nombre,'',U.apellidos) AS nombrecompleto, D.nombre	AS departamento FROM pasajes AS PA INNER JOIN usuario U ON U.idusuario = PA.idusuario INNER JOIN departamento D ON D.iddepartamento = U.iddepartamento");
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $pasajes;
    }

    public static function mdlBuscarPasajePorID(): mixed
    {
        $unpasaje = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $planillas = $conexion->getDataSingle("SELECT PA.idpasajes, PA.idusuario, PA.gastos, PA.ida, PA.vuelta, PA.semana, PA.mensual, PA.dias, PA.detalle, PA.fechacreacion, CONCAT(U.nombre,'',U.apellidos) AS nombrecompleto, D.nombre	AS departamento FROM pasajes AS PA INNER JOIN usuario U ON U.idusuario = PA.idusuario INNER JOIN departamento D ON D.iddepartamento = U.iddepartamento WHERE P.idpasajes = ?", $datos);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $unpasaje;
    }

    public static function mdlBuscarPasajePorDepartamento(array $datos): mixed
    {
        $pasajes = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $pasajes = $conexion->getData("SELECT PA.idpasajes, PA.idusuario, PA.gastos, PA.ida, PA.vuelta, PA.semana, PA.mensual, PA.dias, PA.detalle, PA.fechacreacion, CONCAT(U.nombre,'',U.apellidos) AS nombrecompleto, D.nombre	AS departamento FROM pasajes AS PA INNER JOIN usuario U ON U.idusuario = PA.idusuario INNER JOIN departamento D ON D.iddepartamento = U.iddepartamento WHERE U.iddepartamento = ?", $datos);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $pasajes;
    }

    public static function mdlBuscarPasajeDeUnUsuario(array $datos): mixed
    {
        $pasajes = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $pasajes = $conexion->getData("SELECT PA.idpasajes, PA.idusuario, PA.gastos, PA.ida, PA.vuelta, PA.semana, PA.mensual, PA.dias, PA.detalle, PA.fechacreacion, CONCAT(U.nombre,'',U.apellidos) AS nombrecompleto, D.nombre	AS departamento FROM pasajes AS PA INNER JOIN usuario U ON U.idusuario = PA.idusuario INNER JOIN departamento D ON D.iddepartamento = U.iddepartamento WHERE U.idusuario = ?", $datos);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $pasajes;
    }

    public static function mdlBuscarPasajeDeUnUsuarioPorFecha(array $datos): mixed
    {
        $pasajes = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $pasajes = $conexion->getData("SELECT PA.idpasajes, PA.idusuario, PA.gastos, PA.ida, PA.vuelta, PA.semana, PA.mensual, PA.dias, PA.detalle, PA.fechacreacion, CONCAT(U.nombre,'',U.apellidos) AS nombrecompleto, D.nombre	AS departamento FROM pasajes AS PA INNER JOIN usuario U ON U.idusuario = PA.idusuario INNER JOIN departamento D ON D.iddepartamento = U.iddepartamento WHERE PA.fechacreacion = ?", $datos);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $pasajes;
    }

    
    public static function mdlMontoTotalPasajes(): mixed
    {
        $pasajes = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $pasajes = $conexion->getDataSingleProp("SELECT SUM(mensual) as totalsumatoria FROM pasajes" , "totalsumatoria");
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $pasajes;
    }
}