<?php
require_once "conexion.php";

class ModeloPlanilla
{
    public static function mdlRegistrarPlanilla(array $datos): int|false
    {
        $idplanilla = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idplanilla = $conexion->insert("INSERT INTO planilla (honorario, remuneraciondiaria, remuneracionmensual, fechaingreso, fechafin, idusuario, idestadoplanilla, montodescuento, observacion) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);
            ", $datos);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $idplanilla;
    }

    public static function mdlEditarPlanilla(array $datos): int|false
    {
        $filasActualizadas = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filasActualizadas = $conexion->updateOrDelete("UPDATE planilla SET honorario=?, remuneraciondiaria=?, remuneracionmensual=?, fechaingreso=?, fechafin=?, idusuario=?, idestadoplanilla=?, montodescuento=?, observacion=? WHERE idplanilla=?;
            ", $datos);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $filasActualizadas;
    }

    public static function mdlListarEstadosPlanillas(): mixed
    {
        $estadosPlanillas = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $estadosPlanillas = $conexion->getData("SELECT idestadoplanilla, estadoplanilla FROM estadoplanilla");
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $estadosPlanillas;
    }

    public static function mdlListarPlanillas(): mixed
    {
        $planillas = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $planillas = $conexion->getData("SELECT P.idplanilla, P.honorario, P.remuneraciondiaria, P.remuneracionmensual,  P.montodescuento, P.observacion, P.fechaingreso, P.fechafin, P.idusuario, CONCAT(U.nombre,' ',U.apellidos) AS nombrecompleto, D.nombre AS cargo, P.idestadoplanilla, EP.estadoplanilla FROM planilla AS P INNER JOIN estadoplanilla AS EP ON EP.idestadoplanilla = P.idestadoplanilla  INNER JOIN usuario AS U ON U.idusuario = P.idusuario INNER JOIN departamento AS D ON D.iddepartamento = U.iddepartamento");
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $planillas;
    }

    public static function mdlBuscarPlanillaPorID(array $datos): mixed
    {
        $unaPlanilla = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $unaPlanilla = $conexion->getDataSingle("SELECT P.idplanilla, P.honorario, P.remuneraciondiaria, P.remuneracionmensual, P.montodescuento, P.observacion, P.fechaingreso, P.fechafin, P.idusuario, CONCAT(U.nombre,' ',U.apellidos) AS nombrecompleto, D.nombre AS cargo, P.idestadoplanilla, EP.estadoplanilla FROM planilla AS P INNER JOIN estadoplanilla AS EP ON EP.idestadoplanilla = P.idestadoplanilla  INNER JOIN usuario AS U ON U.idusuario = P.idusuario INNER JOIN departamento AS D ON D.iddepartamento = U.iddepartamento WHERE P.idplanilla = ?", $datos);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $unaPlanilla;
    }

    public static function mdlBuscarPlanillaPorDepartamento(array $datos): mixed
    {
        $planillas = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $planillas = $conexion->getData("SELECT P.idplanilla, P.honorario, P.remuneraciondiaria, P.remuneracionmensual,P.montodescuento, P.observacion,  P.fechaingreso, P.fechafin, P.idusuario, CONCAT(U.nombre,' ',U.apellidos) AS nombrecompleto, D.nombre AS cargo, P.idestadoplanilla, EP.estadoplanilla FROM planilla AS P INNER JOIN estadoplanilla AS EP ON EP.idestadoplanilla = P.idestadoplanilla  INNER JOIN usuario AS U ON U.idusuario = P.idusuario INNER JOIN departamento AS D ON D.iddepartamento = U.iddepartamento WHERE D.iddepartamento = ?", $datos);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $planillas;
    }

    public static function mdlBuscarPlanillaDeUnUsuario(array $datos): mixed
    {
        $planillas = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $planillas = $conexion->getData("SELECT P.idplanilla, P.honorario, P.remuneraciondiaria, P.remuneracionmensual,P.montodescuento, P.observacion,  P.fechaingreso, P.fechafin, P.idusuario, CONCAT(U.nombre,' ',U.apellidos) AS nombrecompleto, D.nombre AS cargo, P.idestadoplanilla, EP.estadoplanilla FROM planilla AS P INNER JOIN estadoplanilla AS EP ON EP.idestadoplanilla = P.idestadoplanilla  INNER JOIN usuario AS U ON U.idusuario = P.idusuario INNER JOIN departamento AS D ON D.iddepartamento = U.iddepartamento WHERE U.idusuario = ?", $datos);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $planillas;
    }
}
