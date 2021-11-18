<?php
require_once "conexion-v2.php";

class ModeloLiquidaciones
{
    public static function mdlRegistrarLiquidaciones(array $datos): int|false
    {
        $idliquidaciones = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idliquidaciones = $conexion->insert("INSERT INTO liquidacionimpuestos (ventas_netas, ventas_no_gravadas, exportaciones_facturada, exportaciones_embarcadas, ingreso_bruto, nota_credito, nota_debito, ingreso_neto, comp_nacion_grava, comp_importa_grava, comp_nacion_no_grava, comp_importa_no_grava, total_compras, total_impuesto, saldo_afavor, impuesto_resultante, coeficiente, pagos_previos, impuesto_renta, fechavencimiento, periodo, saldo_afavor_renta, tributo_apagar_renta, idregimen, idcliente, id_elaborador) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CONCAT( ?,'-01'), ?, ?, ?, ?, ?);
            ", $datos);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $idliquidaciones;
    }

    public static function mdlActualizarLiquidaciones(array $datos): int|false
    {
        $filasactualizadas = 0;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filasactualizadas = $conexion->updateOrDelete("UPDATE liquidacionimpuestos SET ventas_netas=?, idregimen=?, ventas_no_gravadas=?, exportaciones_facturada=?, exportaciones_embarcadas=?, ingreso_bruto=?, nota_credito=?,nota_debito=?, ingreso_neto=?, comp_nacion_grava=?, comp_importa_grava=?,comp_nacion_no_grava=?, comp_importa_no_grava=?,  total_compras=?, total_impuesto=?, saldo_afavor=?, impuesto_resultante=?, coeficiente=?, pagos_previos=?, impuesto_renta=?, fechavencimiento=?, periodo=CONCAT( ?,'-01'), saldo_afavor_renta=?, tributo_apagar_renta=?, idcliente=? WHERE id_liquidacion=?", $datos);
        } catch (PDOException $e) {
            echo $e->getMessage();
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
            $filasactualizadas = $conexion->updateOrDelete("UPDATE liquidacionimpuestos SET id_revisor=? WHERE id_liquidacion=?", $datos);
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

    public static function mdlListarRegimenesTributario(): mixed
    {
        $regimenTributario = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $regimenTributario = $conexion->getData("SELECT idregimen, nombreregimen FROM regimentributario");
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $regimenTributario;
    }

    public static function mdlListarLiquidaciones(): mixed
    {
        $liquidaciones = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $liquidaciones = $conexion->getData("SELECT L.id_liquidacion, L.ventas_netas, L.idregimen,L.ventas_no_gravadas, L.exportaciones_facturada, L.exportaciones_embarcadas,
            L.ingreso_bruto, L.nota_credito,L.nota_debito, L.ingreso_neto, L.comp_nacion_grava, L.saldo_afavor_renta, L.tributo_apagar_renta, L.comp_importa_grava,L.comp_nacion_no_grava, L.comp_importa_no_grava,L.total_compras, L.impuesto_resultante, L.saldo_afavor, L.impuesto_resultante, L.coeficiente, L.pagos_previos,
            L.impuesto_renta, L.fechavencimiento, L.periodo, L.idcliente, L.id_elaborador, L.id_revisor FROM liquidacionimpuestos L 
            INNER JOIN regimentributario R ON L.idregimen=R.idregimen
            INNER JOIN cliente C ON L.idcliente=C.idcliente 
            INNER JOIN usuario U ON L.id_elaborador =U.idusuario 
            LEFT JOIN usuario UR ON L.id_revisor=UR.idusuario");
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $liquidaciones;
    }

    public static function mdlBuscarLiquidaciones(int $idLiquidaciones): mixed
    {
        $liquidaciones = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $liquidaciones = $conexion->getData("SELECT L.id_liquidacion, L.ventas_netas, L.idregimen, C.razonsocial,C.ruc,R.nombreregimen,
            L.ventas_no_gravadas, L.exportaciones_facturada, L.exportaciones_embarcadas, L.saldo_afavor_renta, L.tributo_apagar_renta, UPPER (CONCAT(U.nombre,' ',U.apellidos)) as elaborador,
            IF(L.id_revisor is null,'- NO REVISADO -', UPPER(CONCAT( UR.nombre,' ',UR.apellidos))) as revisor,
            L.ingreso_bruto, L.nota_credito,L.nota_debito, L.ingreso_neto, L.comp_nacion_grava, L.comp_importa_grava,L.comp_nacion_no_grava, L.comp_importa_no_grava,
            L.total_compras, L.total_impuesto, L.impuesto_resultante, L.saldo_afavor, L.impuesto_resultante, L.coeficiente, L.pagos_previos,
            L.impuesto_renta, L.fechavencimiento, L.periodo, L.idcliente, L.id_elaborador, L.id_revisor
            FROM liquidacionimpuestos L 
            INNER JOIN regimentributario R ON L.idregimen=R.idregimen
            INNER JOIN cliente C ON L.idcliente=C.idcliente 
            INNER JOIN usuario U ON L.id_elaborador =U.idusuario 
            LEFT JOIN usuario UR ON L.id_revisor=UR.idusuario
            WHERE L.id_liquidacion = ?", [$idLiquidaciones]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $liquidaciones;
    }
    public static function mdlBuscarLiquidacionesxClientes(int $idcliente): mixed
    {
        $liquidaciones = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $liquidaciones = $conexion->getData("SELECT L.id_liquidacion, L.ventas_netas, L.idregimen, 
            L.ventas_no_gravadas, L.exportaciones_facturada, L.exportaciones_embarcadas, L.saldo_afavor_renta, L.tributo_apagar_renta, 
            L.ingreso_bruto, L.nota_credito,L.nota_debito, L.ingreso_neto, L.comp_nacion_grava, L.comp_importa_grava,L.comp_nacion_no_grava, L.comp_importa_no_grava,
            L.total_compras, L.impuesto_resultante, L.saldo_afavor, L.impuesto_resultante, L.coeficiente, L.pagos_previos,
            L.impuesto_renta, L.fechavencimiento, L.periodo, L.idcliente, L.id_elaborador, L.id_revisor
            FROM liquidacionimpuestos L 
            INNER JOIN regimentributario R ON L.idregimen=R.idregimen
            INNER JOIN cliente C ON L.idcliente=C.idcliente 
            INNER JOIN usuario U ON L.id_elaborador =U.idusuario 
            LEFT JOIN usuario UR ON L.id_revisor=UR.idusuario
            WHERE C.idcliente = ?", [$idcliente]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $liquidaciones;
    }
    public static function mdlBuscarLiquidacionesxMes(string $mesyanyo): mixed
    {
        $liquidaciones = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $liquidaciones = $conexion->getData("SELECT C.razonsocial, L.id_liquidacion, L.ventas_netas, L.idregimen, 
            L.ventas_no_gravadas, L.exportaciones_facturada, L.exportaciones_embarcadas, L.saldo_afavor_renta, L.tributo_apagar_renta, 
            L.ingreso_bruto, L.nota_credito,L.nota_debito, L.ingreso_neto, L.comp_nacion_grava, L.comp_importa_grava,L.comp_nacion_no_grava, L.comp_importa_no_grava,
            L.total_compras, L.impuesto_resultante, L.saldo_afavor, L.impuesto_resultante, L.coeficiente, L.pagos_previos,
            L.impuesto_renta, L.fechavencimiento, L.periodo, L.idcliente, L.id_elaborador, L.id_revisor,R.nombreregimen
            FROM liquidacionimpuestos L 
            INNER JOIN regimentributario R ON L.idregimen=R.idregimen
            INNER JOIN cliente C ON L.idcliente=C.idcliente 
            INNER JOIN usuario U ON L.id_elaborador =U.idusuario 
            LEFT JOIN usuario UR ON L.id_revisor=UR.idusuario
            WHERE ( DATE_FORMAT(L.periodo, \"%Y-%m\") = ? )", [$mesyanyo]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $liquidaciones;
    }

    public static function mdlConsultarMeses(string $mesyanyo, int $idcliente): mixed
    {
        $liquidaciones = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $liquidaciones = $conexion->getData("SELECT ELT(MONTH(periodo), 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre') mes, MONTH(periodo) as num_mes, saldo_afavor as impuesto_igv, IF(impuesto_renta<0,0,impuesto_renta) AS impuesto_renta 
            FROM liquidacionimpuestos WHERE idcliente = ? AND (periodo BETWEEN DATE(DATE_SUB(CONCAT(?,'-01'),INTERVAL 2 MONTH)) AND CONCAT(?,'-01'))
            GROUP BY mes ORDER BY MONTH(periodo) desc", [$idcliente, $mesyanyo, $mesyanyo]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $liquidaciones;
    }

    public static function mdlExisteLiquidacion(string $periodo, int $idcliente): bool
    {
        $liquidaciones = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $liquidaciones = $conexion->getData("SELECT id_liquidacion
            FROM liquidacionimpuestos WHERE periodo=CONCAT(?,'-01') AND idcliente=? LIMIT 1", [$periodo, $idcliente]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return boolval($liquidaciones);
    }
}
