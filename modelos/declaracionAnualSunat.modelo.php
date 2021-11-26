<?php
require_once "conexion-v2.php";

class ModeloDeclaracionAnualSunat
{
    public static function mdlConsularDeclaracionesAnualSunat(string $anyo): mixed
    {
        $declaracion = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $declaracion = $conexion->getData("SELECT DA.iddeclaracionsunatanual AS iddeclaracionsunatanual, CL.ruc AS ruc, CL.razonsocial AS clientes, CA.fechavencimiento AS fechavencimiento,B.idestado AS idestado,B.estado AS estado,B.fechadeclarada AS fechadeclarada,B.numOrden AS numOrden,B.iddetalledeclaracionanualsunat FROM declaracionanual DA JOIN cliente CL ON DA.idcliente = CL.idcliente JOIN cronogramaanual CA ON DA.idcronogramaanual = CA.idcronogramaanual
            LEFT JOIN (SELECT DAS.iddetalledeclaracionanualsunat as iddetalledeclaracionanualsunat,DAS.iddeclaracionsunatanual as iddeclaracionsunatanual,DAS.fechadeclarada as fechadeclarada,DAS.numeroOrden as numOrden,DAS.idestado as idestado, E.estado as estado FROM detalledeclaracionanualsunat DAS JOIN estadodeclaracion E ON DAS.idestado=E.idestadodeclaracion) B ON DA.iddeclaracionsunatanual =B.iddeclaracionsunatanual WHERE CA.anyo = ?", [$anyo]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $declaracion;
    }

    public static function mdlConsularDeclaracionAnualSunat(string $anyo, int $idestado): mixed
    {
        $declaracion = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $declaracion = $conexion->getData("SELECT DA.iddeclaracionsunatanual AS iddeclaracionsunatanual, CL.ruc AS ruc, CL.razonsocial AS clientes, CA.fechavencimiento AS fechavencimiento,B.idestado AS idestado, B.estado,B.fechadeclarada,B.numOrden,B.iddetalledeclaracionanualsunat FROM declaracionanual DA JOIN cliente CL ON DA.idcliente = CL.idcliente JOIN cronogramaanual CA ON DA.idcronogramaanual = CA.idcronogramaanual
            INNER JOIN (SELECT DAS.iddetalledeclaracionanualsunat as iddetalledeclaracionanualsunat,DAS.iddeclaracionsunatanual as iddeclaracionsunatanual,DAS.fechadeclarada as fechadeclarada,DAS.numeroOrden as numOrden, DAS.idestado as idestado,E.estado as estado FROM detalledeclaracionanualsunat DAS JOIN estadodeclaracion E ON DAS.idestado=E.idestadodeclaracion WHERE E.idestadodeclaracion= ?)  B ON DA.iddeclaracionsunatanual =B.iddeclaracionsunatanual
             WHERE CA.anyo = ?", [$idestado, $anyo]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $declaracion;
    }

    public static function mdlRegistrarDetalleDeclaracionAnualSunat(int $iddeclaracionsunatanual, int $estado, string $fechadeclarada, string $numerorden, string $idusuario): int|bool
    {
        $filasActualizadas = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filasActualizadas = $conexion->updateOrDelete("INSERT INTO detalledeclaracionanualsunat (iddeclaracionsunatanual, fechadeclarada, numeroOrden, idusuario, idestado) VALUES(?,?,?,?,?)", [$iddeclaracionsunatanual, $fechadeclarada, $numerorden, $idusuario, $estado]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return  $filasActualizadas;
    }

    public static function mdlActualizarDeclaracionAnualSunat(int $iddetalledeclaracionanualsunat, int $idestado, string $fechadeclarada, string $numerorden,): int|bool
    {
        $filasActualizadas = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filasActualizadas = $conexion->updateOrDelete("UPDATE detalledeclaracionanualsunat SET fechadeclarada=?, numeroOrden=?, idestado=? WHERE iddetalledeclaracionanualsunat=?", [$fechadeclarada, $numerorden, $idestado, $iddetalledeclaracionanualsunat]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return  $filasActualizadas;
    }
}
