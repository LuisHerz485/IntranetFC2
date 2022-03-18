<?php
require_once "conexion-v2.php";

class ModeloPruebas
{
    public static function mdlRegistrarPruebas(array $datos): int|false
    {
        $idpruebas = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idpruebas = $conexion->insert("INSERT INTO 
                pruebapdf (
                efectivo,
                inversiones,
                totalactivo,
                fechacoti,
                id_elaborador,
                periodo,
                idcliente) 
                VALUES
                (?,?,?,?,?,CONCAT( ?,'-01'),?)", $datos);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $idpruebas;
    }

    public static function mdlActualizarPruebas(array $datos): int|false
    {
        $filasactualizadas = 0;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filasactualizadas = $conexion->updateOrDelete("UPDATE 
            pruebapdf SET 
            efectivo=?,
            inversiones=?,
            totalactivo=?,
            fechacoti=?,
            periodo=CONCAT( ?,'-01'),
            idcliente=? 
            WHERE id_prueba=?", $datos);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $filasactualizadas;
    }

    public static function mdlRegistrarRevision(array $datos): int|false
    {
        $filasactualizadas = 0;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filasactualizadas = $conexion->updateOrDelete("UPDATE pruebapdf SET id_revisor=? WHERE id_prueba=?", $datos);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $filasactualizadas;
    }

    public static function mdlListarPruebas():mixed
    {
        $pruebas = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $pruebas = $conexion->getData("SELECT
                P.id_prueba,
                P.efectivo,
                P.inversiones,
                P.totalactivo,
                P.fechacoti,
                P.id_elaborador, UPPER(CONCAT(U.nombre,' ',U.apellidos)) as elaborador,
                P.id_revisor, IF(P.id_revisor is null,'- NO REVISADO -', UPPER(CONCAT( UR.nombre,' ',UR.apellidos))) as revisor,
                P.periodo,
                P.idcliente,
                C.ruc,
                C.razonsocial,
                P.fecha_registro,
                P.fecha_actualizacion
                FROM pruebapdf P
                INNER JOIN cliente C ON P.idcliente=C.idcliente 
                INNER JOIN usuario U ON P.id_elaborador = U.idusuario  
                LEFT JOIN usuario UR ON P.id_revisor = UR.idusuario");
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $pruebas;
    }

    public static function mdlBuscarPrueba(int $id_prueba): mixed
    {
        $pruebas = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $pruebas = $conexion->getDataSingle("SELECT 
            P.id_prueba,
            P.efectivo,
            P.inversiones,
            P.totalactivo,
            P.fechacoti, 
            P.id_elaborador, UPPER(CONCAT(U.nombre,' ',U.apellidos)) as elaborador,
            P.id_revisor, IF(P.id_revisor is null,'- NO REVISADO -', UPPER(CONCAT( UR.nombre,' ',UR.apellidos))) as revisor,
            P.periodo,
            P.idcliente, 
            C.ruc, 
            C.razonsocial,
            P.fecha_registro,
            P.fecha_actualizacion
            FROM pruebapdf P 
            INNER JOIN cliente C ON P.idcliente=C.idcliente 
            INNER JOIN usuario U ON P.id_elaborador = U.idusuario  
            LEFT JOIN usuario UR ON P.id_revisor=UR.idusuario 
            WHERE P.id_prueba = ?", [$id_prueba]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $pruebas;
    }

    public static function mdlBuscarPruebasxClientes(int $idcliente): mixed
    {
        $pruebas = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $pruebas = $conexion->getData("SELECT 
                P.id_prueba,
                P.efectivo,
                P.inversiones,
                P.totalactivo,
                P.fechacoti,
                P.id_elaborador, UPPER(CONCAT(U.nombre,' ',U.apellidos)) as elaborador, 
                P.id_revisor, IF(P.id_revisor is null,'- NO REVISADO -', UPPER(CONCAT( UR.nombre,' ',UR.apellidos))) as revisor,
                P.idcliente,
                C.ruc,
                C.razonsocial,
                P.fecha_registro,
                P.fecha_actualizacion
                FROM pruebapdf P 
                INNER JOIN cliente C ON P.idcliente = C.idcliente 
                INNER JOIN usuario U ON P.id_elaborador = U.idusuario  
                LEFT JOIN usuario UR ON P.id_revisor = UR.idusuario 
                WHERE C.idcliente = ?", [$idcliente]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $pruebas;
    }

    // Listar x MES
    public static function mdlBuscarPruebasxMes(string $mesyanyo): mixed
    {
        $pruebas = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            
            $pruebas = $conexion->getData("SELECT
                P.id_prueba,
                P.efectivo,
                P.inversiones,
                P.totalactivo,
                P.fechacoti,
                P.id_elaborador, UPPER(CONCAT(U.nombre,' ',U.apellidos)) as elaborador,
                P.id_revisor, IF(P.id_revisor is null,'- NO REVISADO -', UPPER(CONCAT( UR.nombre,' ',UR.apellidos))) as revisor,
                P.periodo,
                P.idcliente,
                C.ruc, 
                C.razonsocial,
                P.fecha_registro,
                P.fecha_actualizacion
                FROM pruebapdf P 
                INNER JOIN cliente C ON P.idcliente = C.idcliente 
                INNER JOIN usuario U ON P.id_elaborador = U.idusuario  
                LEFT JOIN usuario UR ON P.id_revisor = UR.idusuario
                WHERE DATE_FORMAT(P.periodo, \"%Y-%m\") = ? ", [$mesyanyo]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $pruebas;
    }

    public static function mdlConsultarMeses(string $mesyanyo, int $idcliente): mixed
    {
        $pruebas = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $pruebas = $conexion->getData("SELECT ELT(MONTH(periodo), 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre') mes, MONTH(periodo) as num_mes, importe_apagar as impuesto_igv, IF(impuesto_renta<0,0,impuesto_renta) AS impuesto_renta FROM liquidacionimpuestos WHERE idcliente = ? AND (periodo BETWEEN DATE(DATE_SUB(CONCAT(?,'-01'),INTERVAL 2 MONTH)) AND CONCAT(?,'-01')) GROUP BY mes ORDER BY MONTH(periodo) DESC", [$idcliente, $mesyanyo, $mesyanyo]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $pruebas;
    }

    public static function mdlExistePrueba(string $periodo, int $idcliente): bool
    {
        $pruebas = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $pruebas = $conexion->getData("SELECT id_prueba FROM pruebapdf WHERE periodo=CONCAT(?,'-01') AND idcliente=? LIMIT 1", [$periodo, $idcliente]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return boolval($pruebas);
    }
}
?>