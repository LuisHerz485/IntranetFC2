<?php
require_once "conexion-v2.php";

class ModeloDeclaracionSunat
{
    public static function mdlRegistrarDeclaracionSunatBloque($mesyano): int|false
    {
        $insertar = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $insertar = $conexion->insert("INSERT INTO declaracionsunat (iddeclaracionsunat,idcliente,idcronogramafecha)
            SELECT @i := @i + 1 as contador,idcliente,(SELECT idcronogramafecha FROM cronogramafechas WHERE digitoruc= SUBSTRING(ruc, LENGTH(ruc)) AND DATE_FORMAT(mesano, \"%Y-%m\") = ? ) as idcronogramafecha
            FROM cliente,(SELECT @i := (SELECT MAX(iddeclaracionsunat) FROM declaracionsunat)) m", [$mesyano]);
        } catch (PDOException $e) {
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return  $insertar;
    }

    public static function mdlRegistrarDeclaracionSunat($idcliente): int|false
    {
        $insertar = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $insertar = $conexion->insert("INSERT INTO declaracionsunat (idcliente, idcronogramafecha) VALUES(?, (SELECT SUBSTRING(ruc, LENGTH(ruc))FROM cliente WHERE idcliente=?))", [$idcliente, $idcliente]);
        } catch (PDOException $e) {
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return  $insertar;
    }



    public static function mdlConsularDeclaracionSunat(string $mesyano, int $idestado, int $idtipodeclaracion): mixed
    {
        $declaracion = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $declaracion = $conexion->getData("SELECT DS.iddeclaracionsunat AS iddeclaracionsunat, CL.ruc AS ruc, CL.razonsocial AS clientes, CF.fechavencimiento AS fechavencimiento,B.estado,B.fechadeclarada,B.numOrden FROM declaracionsunat DS JOIN cliente CL ON DS.idcliente = CL.idcliente JOIN cronogramafechas CF ON DS.idcronogramafecha = CF.idcronogramafecha 
            INNER JOIN (SELECT D.iddeclaracionsunat as iddeclaracionsunat,D.fechadeclarada as fechadeclarada,numeroOrden as numOrden,E.estado as estado FROM detalledeclaracionsunat D JOIN estadodeclaracion E ON D.idestado=E.idestadodeclaracion JOIN tipodeclaracion T ON D.idtipodeclaracionsunat=T.idtipodeclaracion WHERE E.idestadodeclaracion=? AND T.idtipodeclaracion=?)  B ON DS.iddeclaracionsunat =B.iddeclaracionsunat
             WHERE ( DATE_FORMAT(CF.mesano, \"%Y-%m\") = ? )", [$idestado, $idtipodeclaracion, $mesyano]);
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
    public static function mdlConsularDeclaracionesSunat(string $mesyano, int $idtipodeclaracion): mixed
    {
        $declaracion = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $declaracion = $conexion->getData("SELECT DS.iddeclaracionsunat AS iddeclaracionsunat, CL.ruc AS ruc, CL.razonsocial AS clientes, CF.fechavencimiento AS fechavencimiento,B.estado AS estado,B.fechadeclarada AS fechadeclarada,B.numOrden AS numOrden,B.iddetalledeclaracionsunat FROM declaracionsunat DS JOIN cliente CL ON DS.idcliente = CL.idcliente JOIN cronogramafechas CF ON DS.idcronogramafecha = CF.idcronogramafecha 
            LEFT JOIN (SELECT D.iddetalledeclaracionsunat as iddetalledeclaracionsunat,D.iddeclaracionsunat as iddeclaracionsunat,D.fechadeclarada as fechadeclarada,numeroOrden as numOrden,E.estado as estado FROM detalledeclaracionsunat D JOIN estadodeclaracion E ON D.idestado=E.idestadodeclaracion JOIN tipodeclaracion T ON D.idtipodeclaracionsunat=T.idtipodeclaracion WHERE T.idtipodeclaracion=?)  B ON DS.iddeclaracionsunat =B.iddeclaracionsunat
             WHERE ( DATE_FORMAT(CF.mesano, \"%Y-%m\") = ? )", [$idtipodeclaracion, $mesyano]);
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

    public static function mdlConsularDeclaracionesSunatClientes(string $anyo, string $idclientes, int $idtipodeclaracion): mixed
    {
        $declaracion = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $declaracion = $conexion->getData("SELECT  ELT(MONTH(CF.mesano), 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre') as mes, CF.fechavencimiento AS fechavencimiento,B.estado,B.fechadeclarada,B.numOrden FROM declaracionsunat DS JOIN cliente CL ON DS.idcliente = CL.idcliente JOIN cronogramafechas CF ON DS.idcronogramafecha = CF.idcronogramafecha 
            LEFT JOIN (SELECT D.iddeclaracionsunat as iddeclaracionsunat,D.fechadeclarada as fechadeclarada,numeroOrden as numOrden,E.estado as estado FROM detalledeclaracionsunat D JOIN estadodeclaracion E ON D.idestado=E.idestadodeclaracion JOIN tipodeclaracion T ON D.idtipodeclaracionsunat=T.idtipodeclaracion WHERE  T.idtipodeclaracion=?)  B ON DS.iddeclaracionsunat =B.iddeclaracionsunat
            WHERE ( YEAR (CF.mesano) = ?  ) AND DS.idcliente=? ", [$idtipodeclaracion, $anyo, $idclientes]);
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
            $declaracion = $conexion->getData("SELECT idestadodeclaracion, estado FROM estadodeclaracion WHERE idestadodeclaracion <> 1");
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

    public static function mdlRegistrarDetalleDeclaracionSunat(int $iddeclaracionSunat, int $estado, string $fechadeclarada, string $numerorden, string $idusuario, int $tipodeclaracion): int|bool
    {
        $filasActualizadas = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filasActualizadas = $conexion->updateOrDelete("INSERT INTO detalledeclaracionsunat (iddeclaracionsunat, fechadeclarada, numeroOrden, idusuario, idtipodeclaracionsunat, idestado) VALUES(?,?,?,?,?, ?)", [$iddeclaracionSunat, $fechadeclarada, $numerorden, $idusuario, $tipodeclaracion, $estado]);
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
    public static function mdlActualizarDeclaracionSunat(int $iddetalledeclaracionSunat, int $estado, string $fechadeclarada, string $numerorden, string $idusuario, int $tipodeclaracion): int|bool
    {
        $filasActualizadas = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filasActualizadas = $conexion->updateOrDelete("UPDATE detalledeclaracionsunat SET fechadeclarada=?, numeroOrden=?, idusuario=?, idtipodeclaracionsunat=?, idestado=? WHERE iddetalledeclaracionsunat=?", [$fechadeclarada, $numerorden, $idusuario, $tipodeclaracion, $estado, $iddetalledeclaracionSunat]);
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
