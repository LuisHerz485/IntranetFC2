<?php
require_once "conexion-v2.php";

class ModeloDeclaracionSunat
{
    public static function mdlRegistrarDeclaracionSunat($mesyano): int|false
    {
        $insertar = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $insertar = $conexion->insert("INSERT INTO declaracionsunat (iddeclaracionsunat,idcliente,idcronogramafecha)
            SELECT @i := @i + 1 as contador,idcliente,(SELECT idcronogramafecha FROM cronogramafechas WHERE digitoruc= SUBSTRING(ruc, LENGTH(ruc)) AND (DATE_FORMAT(mesano, \"%Y-%m\") =  DATE_FORMAT(?, \"%Y-%m\")) as idcronogramafecha
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


    public static function mdlConsularDeclaracionSunat(string $mesyano, int $idestado): mixed
    {
        $declaracion = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $declaracion = $conexion->getData("SELECT DS.iddeclaracionsunat as iddeclaracionsunat,CL.ruc as ruc, CL.razonsocial as clientes, CF.fechavencimiento as fechavencimiento, ED.estado as estado,DS.fechadeclarada as fechadeclarada, DS.numOrden as numOrden FROM declaracionsunat DS JOIN cliente CL ON DS.idcliente = CL.idcliente JOIN cronogramafechas CF ON DS.idcronogramafecha = CF.idcronogramafecha JOIN estadodeclaracion ED ON DS.idestado = ED.idestadodeclaracion WHERE (DATE_FORMAT(CF.mesano, \"%Y-%m\") =  ?) AND DS.idestado =?", [$mesyano, $idestado]);
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
    public static function mdlConsularDeclaracionesSunat(string $mesyano): mixed
    {
        $declaracion = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $declaracion = $conexion->getData("SELECT DS.iddeclaracionsunat as iddeclaracionsunat,CL.ruc as ruc, CL.razonsocial as clientes, CF.fechavencimiento as fechavencimiento, ED.estado as estado,DS.fechadeclarada as fechadeclarada, DS.numOrden as numOrden FROM declaracionsunat DS JOIN cliente CL ON DS.idcliente = CL.idcliente JOIN cronogramafechas CF ON DS.idcronogramafecha = CF.idcronogramafecha JOIN estadodeclaracion ED ON DS.idestado = ED.idestadodeclaracion WHERE (DATE_FORMAT(CF.mesano, \"%Y-%m\") =  ?) ", [$mesyano]);
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
            $declaracion = $conexion->getData("SELECT idestadodeclaracion, estado FROM estadodeclaracion");
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

    public static function mdlEditarDeclaracionSunat(int $iddeclaracionSunat, int $estado, string $fechadeclarada, string $numerorden, string $idusuario): int|bool
    {
        $filasActualizadas = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filasActualizadas = $conexion->updateOrDelete("UPDATE declaracionsunat SET fechadeclarada =?,idusuario=?,idestado=?,numOrden=?  WHERE iddeclaracionsunat=?", [$fechadeclarada, $idusuario, $estado, $numerorden, $iddeclaracionSunat]);
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
