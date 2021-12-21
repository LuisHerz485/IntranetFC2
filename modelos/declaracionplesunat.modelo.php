<?php
require_once "conexion-v2.php";

class ModeloDeclaracionSunatPle
{

    public static function mdlConsularDeclaracionSunatPle(string $mesyano, int $idestado, int $idtipodeclaracion): mixed
    {
        $declaracion = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $declaracion = $conexion->getData("SELECT PLE.iddeclaracionple AS iddeclaracionple , CL.ruc 
            AS ruc, CL.razonsocial 
            AS clientes, CLB.fechavencimiento 
            AS fechavencimiento,B.idestado 
            AS idestado, B.estado,B.fechadeclarada,B.numOrden
            FROM declaracionple PLE 
            JOIN cliente CL ON PLE.idcliente = CL.idcliente 
            JOIN cronogramalibroselectronicos CLB ON PLE.idcronogramalibroselectronicos = CLB.idcronogramalibroselectronicos 
                        INNER JOIN (SELECT D.iddeclaracionsunatple as iddeclaracionsunatple,D.fechadeclarada as fechadeclarada,numeroOrden as numOrden, D.idestado as idestado,E.estado as estado 
                        FROM detalledeclaracionsunatple D
                        JOIN estadodeclaracion E ON D.idestado=E.idestadodeclaracion 
                        JOIN tipodeclaracion T ON D.idtipodeclaracionsunat=T.idtipodeclaracion 
                        WHERE E.idestadodeclaracion=? AND T.idtipodeclaracion=?) B ON PLE.iddeclaracionple =B.iddeclaracionsunatple
                         WHERE ( DATE_FORMAT(CLB.mesano, \"%Y-%m\") = ? )", [$idestado, $idtipodeclaracion, $mesyano]);
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
    public static function mdlConsularDeclaracionesSunatPle(string $mesyano, int $idtipodeclaracion): mixed
    {
        $declaracion = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $declaracion = $conexion->getData("SELECT PLE.iddeclaracionple AS iddeclaracionple , CL.ruc 
            AS ruc, CL.razonsocial 
            AS clientes, CLB.fechavencimiento 
            AS fechavencimiento,B.idestado 
            AS idestado, B.estado 
            AS estado,B.fechadeclarada 
            AS fechadeclarada,B.numOrden 
            AS numOrden, B.iddetalledeclaracionsunatple
            FROM declaracionple PLE 
            JOIN cliente CL ON PLE.idcliente = CL.idcliente 
            JOIN cronogramalibroselectronicos CLB ON PLE.idcronogramalibroselectronicos = CLB.idcronogramalibroselectronicos 
                        LEFT JOIN (SELECT D.iddetalledeclaracionsunatple as iddetalledeclaracionsunatple, D.iddeclaracionsunatple as iddeclaracionsunatple,D.fechadeclarada as fechadeclarada,numeroOrden as numOrden, D.idestado as idestado,E.estado as estado 
                        FROM detalledeclaracionsunatple D
                        JOIN estadodeclaracion E ON D.idestado=E.idestadodeclaracion 
                        JOIN tipodeclaracion T ON D.idtipodeclaracionsunat=T.idtipodeclaracion 
                        WHERE T.idtipodeclaracion=?) B ON PLE.iddeclaracionple =B.iddeclaracionsunatple
                        WHERE ( DATE_FORMAT(CLB.mesano, \"%Y-%m\") = ? )", [$idtipodeclaracion, $mesyano]);
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

    public static function mdlConsularDeclaracionesSunatClientesPle(string $anyo, string $idclientes, int $idtipodeclaracion): mixed
    {
        $declaracion = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $declaracion = $conexion->getData("SELECT  ELT(MONTH(CLB.mesano), 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre') 
            as mes, CLB.fechavencimiento 
            AS fechavencimiento,B.estado,B.fechadeclarada,B.numOrden 
            FROM declaracionple PLE JOIN cliente CL ON PLE.idcliente = CL.idcliente 
            JOIN cronogramalibroselectronicos CLB ON PLE.idcronogramalibroselectronicos = CLB.idcronogramalibroselectronicos 
            LEFT JOIN (SELECT D.iddeclaracionsunatple as iddeclaracionsunatple,D.fechadeclarada as fechadeclarada,numeroOrden as numOrden,E.estado as estado 
            FROM detalledeclaracionsunatple D 
            JOIN estadodeclaracion E ON D.idestado=E.idestadodeclaracion 
            JOIN tipodeclaracion T ON D.idtipodeclaracionsunat=T.idtipodeclaracion 
            WHERE  T.idtipodeclaracion=?)  B ON PLE.iddeclaracionple =B.iddeclaracionsunatple
            WHERE ( YEAR (CLB.mesano) = ?) AND PLE.idcliente = ?", [$idtipodeclaracion, $anyo, $idclientes]);
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
    public static function mdllistarEstadosDeclaracion(): mixed
    {
        $declaracion = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $declaracion = $conexion->getData("SELECT idestadodeclaracion, estado FROM estadodeclaracion WHERE idestadodeclaracion <> 0");
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

    public static function mdlRegistrarDetalleDeclaracionSunatPle(int $iddeclaracionPle, int $estado, string $fechadeclarada, string $numerorden, string $idusuario, int $tipodeclaracion): int|bool
    {
        $filasActualizadas = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filasActualizadas = $conexion->updateOrDelete("INSERT INTO detalledeclaracionsunatple (iddeclaracionsunatple, fechadeclarada, numeroOrden, idusuario, idtipodeclaracionsunat, idestado) VALUES(?,?,?,?,?, ?)", [$iddeclaracionPle, $fechadeclarada, $numerorden, $idusuario, $tipodeclaracion, $estado]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return  $filasActualizadas;
    }
    public static function mdlActualizarDeclaracionSunatPle(int $iddetalledeclaracionPle, int $idestado, string $fechadeclarada, string $numerorden,  int $idtipodeclaracion): int|bool
    {
        $filasActualizadas = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filasActualizadas = $conexion->updateOrDelete("UPDATE detalledeclaracionsunatple SET fechadeclarada=?, numeroOrden=?, idtipodeclaracionsunat=?, idestado=? WHERE iddetalledeclaracionsunatple=?", [$fechadeclarada, $numerorden, $idtipodeclaracion, $idestado, $iddetalledeclaracionPle]);
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
