<?php
/*modelo para cuentas por pagar */
require_once "conexion.php";
require_once "conexion-v2.php";

class modelocuentasporpagar{

    //listar cuentas por pagar
    public static function mdlListarCuentasPorPagar(): mixed
    {
        $cuentasporpagar = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $cuentasporpagar = $conexion->getData("SELECT t.idtipodoccuentapp, cp.idcuentaporpagar, cp.ruc, cp.proovedor, t.tipodoc, cp.serie, cp.numdoc, cp.fechaemision, cp.base, cp.igv, cp.total, cp.estatus, cp.vencimiento, cp.fechapago FROM cuentasporpagar cp
            INNER JOIN tipodoccuentapp t WHERE cp.idtipodoccuentapp = t.idtipodoccuentapp");
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $cuentasporpagar;
    }

    //listar tipos de documentos
    public static function mdllistartipodoccuentaporpagar():mixed
    {
        $tipodoc = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $tipodoc = $conexion->getData("SELECT idtipodoccuentapp, tipodoc FROM tipodoccuentapp WHERE idtipodoccuentapp <> 0");
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $tipodoc;
    }
    //registrar cuentas por pagar
    public static function mdlregistrarcuentasporpagar(string $ruc, string $razonsocial, string $tipodoc, string $serie,  string $numdoc, string $fechaemision, string $base, string $igv, string $total, string $estatus, string $vencimiento, string $fechapago): int|false
    {
        $idcuentaporpagar = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idcuentaporpagar = $conexion->insert("INSERT INTO cuentasporpagar (ruc, proovedor,idtipodoccuentapp, serie, numdoc, fechaemision, base, igv, total, estatus, vencimiento, fechapago) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)",[$ruc, $razonsocial, $tipodoc, $serie, $numdoc, $fechaemision, $base, $igv, $total, $estatus, $vencimiento, $fechapago]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $idcuentaporpagar;
    }

    //eliminar cuentas por pagar modelo
    public static function mdleliminarcuentaporpagar(array $datos): int|false
    {
        $idcuentaporpagar = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idcuentaporpagar = $conexion->updateorDelete("DELETE FROM cuentasporpagar WHERE idcuentaporpagar = ?;", $datos);
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $idcuentaporpagar;
    }

    //editar cuentas por pagar modelo
    public static function mdleditarcuentaporpagar(string $ruc, string $razonsocial, string $tipodoc, string $serie,  string $numdoc, string $fechaemision, string $base, string $igv, string $total, string $estatus, string $vencimiento, string $fechapago, int $idcuentaporpagar): int|false
    {
        $filaactualizada = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filaactualizada = $conexion->updateorDelete("UPDATE cuentasporpagar SET ruc = ?, proovedor = ?, idtipodoccuentapp = ?, serie = ?, numdoc = ?, fechaemision = ?, base = ?, igv = ?, total = ?, estatus = ?, vencimiento = ?, fechapago = ? WHERE idcuentaporpagar = ?;", [$ruc, $razonsocial, $tipodoc, $serie, $numdoc, $fechaemision, $base, $igv, $total, $estatus, $vencimiento, $fechapago,$idcuentaporpagar]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $filaactualizada;
    }

    //listar cuentas por pagar por tipo de documento
    public static function mdlfiltrartipodoc(int $idtipodoc): mixed
    {
        $cuentasporpagar = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $cuentasporpagar = $conexion->getData("SELECT t.idtipodoccuentapp, cp.idcuentaporpagar, cp.ruc, cp.proovedor, t.tipodoc, cp.serie, cp.numdoc, cp.fechaemision, cp.base, cp.igv, cp.total, cp.estatus, cp.vencimiento, cp.fechapago FROM cuentasporpagar cp
            INNER JOIN tipodoccuentapp t WHERE cp.idtipodoccuentapp = t.idtipodoccuentapp AND t.idtipodoccuentapp = ?", [$idtipodoc]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $cuentasporpagar;
    }

}