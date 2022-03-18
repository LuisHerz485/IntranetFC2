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
            $idliquidaciones = $conexion->insert("INSERT INTO liquidacionimpuestos (
                ventas_netas, 
                ventas_no_gravadas,
                exportaciones_facturada,
                exportaciones_embarcadas,
                nota_credito,
                nota_debito,
                comp_nacion_grava,
                comp_importa_grava,
                comp_nacion_no_grava,
                comp_importa_no_grava,
                saldo_afavor_anterior,
                coeficiente,
                saldo_afavor_renta,
                pagos_previos,
                fechavencimiento,
                periodo,
                idregimen,
                idcliente,
                id_elaborador,
                importe_apagar,
                impuesto_renta,
                percepciones_periodo,
                percepciones_periodo_ant,
                saldo_percepciones_no_apl,
                retenciones_declaradas,
                retenciones_declaradas_ant,
                saldo_retenciones_no_apl,
                pagos_previos_compras) 
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CONCAT( ?,'-01'), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", $datos);
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
            $filasactualizadas = $conexion->updateOrDelete("UPDATE liquidacionimpuestos SET ventas_netas=?, ventas_no_gravadas=?, exportaciones_facturada=?, exportaciones_embarcadas=?, nota_credito=?, nota_debito=?, comp_nacion_grava=?, comp_importa_grava=?, comp_nacion_no_grava=?, comp_importa_no_grava=?, saldo_afavor_anterior=?, coeficiente=?, saldo_afavor_renta=?, pagos_previos=?, fechavencimiento=?, periodo=CONCAT( ?,'-01'), idregimen=?, idcliente=?, importe_apagar=?, impuesto_renta=?, percepciones_periodo=?, percepciones_periodo_ant=?, saldo_percepciones_no_apl=?, retenciones_declaradas=?, retenciones_declaradas_ant=?, saldo_retenciones_no_apl=?, pagos_previos_compras=?  WHERE id_liquidacion=?", $datos);
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
            $liquidaciones = $conexion->getData("SELECT L.id_liquidacion, L.ventas_netas, L.ventas_no_gravadas, L.exportaciones_facturada, L.exportaciones_embarcadas, L.nota_credito, L.nota_debito, L.comp_nacion_grava, L.comp_importa_grava, L.comp_nacion_no_grava, L.comp_importa_no_grava, L.saldo_afavor_anterior, L.coeficiente, L.saldo_afavor_renta, L.pagos_previos, L.fechavencimiento, L.periodo, L.idregimen, R.nombreregimen, L.idcliente, C.ruc, C.razonsocial, L.id_elaborador, UPPER(CONCAT(U.nombre,' ',U.apellidos)) as elaborador, L.id_revisor, IF(L.id_revisor is null,'- NO REVISADO -', UPPER(CONCAT( UR.nombre,' ',UR.apellidos))) as revisor, L.fecha_registro, L.fecha_actualizacion, L.importe_apagar, L.impuesto_renta, L.percepciones_periodo, L.percepciones_periodo_ant, L.saldo_percepciones_no_apl, L.retenciones_declaradas, L.retenciones_declaradas_ant, L.saldo_retenciones_no_apl, L.pagos_previos_compras FROM liquidacionimpuestos L 
            INNER JOIN regimentributario R ON L.idregimen = R.idregimen 
            INNER JOIN cliente C ON L.idcliente=C.idcliente 
            INNER JOIN usuario U ON L.id_elaborador = U.idusuario  
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

    public static function mdlBuscarLiquidacion(int $id_liquidacion): mixed
    {
        $liquidaciones = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $liquidaciones = $conexion->getDataSingle("SELECT L.id_liquidacion, L.ventas_netas, L.ventas_no_gravadas, L.exportaciones_facturada, L.exportaciones_embarcadas, L.nota_credito, L.nota_debito, L.comp_nacion_grava, L.comp_importa_grava, L.comp_nacion_no_grava, L.comp_importa_no_grava, L.saldo_afavor_anterior, L.coeficiente, L.saldo_afavor_renta, L.pagos_previos, L.fechavencimiento, L.periodo, L.idregimen, R.nombreregimen, L.idcliente, C.ruc, C.razonsocial, L.id_elaborador, UPPER(CONCAT(U.nombre,' ',U.apellidos)) as elaborador, L.id_revisor, IF(L.id_revisor is null,'- NO REVISADO -', UPPER(CONCAT( UR.nombre,' ',UR.apellidos))) as revisor, L.fecha_registro, L.fecha_actualizacion, L.importe_apagar, L.impuesto_renta, L.percepciones_periodo, L.percepciones_periodo_ant, L.saldo_percepciones_no_apl, L.retenciones_declaradas, L.retenciones_declaradas_ant, L.saldo_retenciones_no_apl, L.pagos_previos_compras FROM liquidacionimpuestos L INNER JOIN regimentributario R ON L.idregimen = R.idregimen INNER JOIN cliente C ON L.idcliente=C.idcliente INNER JOIN usuario U ON L.id_elaborador = U.idusuario  LEFT JOIN usuario UR ON L.id_revisor=UR.idusuario WHERE L.id_liquidacion = ?", [$id_liquidacion]);
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
            $liquidaciones = $conexion->getData("SELECT L.id_liquidacion, L.ventas_netas, L.ventas_no_gravadas, L.exportaciones_facturada, L.exportaciones_embarcadas, L.nota_credito, L.nota_debito, L.comp_nacion_grava, L.comp_importa_grava, L.comp_nacion_no_grava, L.comp_importa_no_grava, L.saldo_afavor_anterior, L.coeficiente, L.saldo_afavor_renta, L.pagos_previos, L.fechavencimiento, L.periodo, L.idregimen, R.nombreregimen, L.idcliente, C.ruc, C.razonsocial, L.id_elaborador, UPPER(CONCAT(U.nombre,' ',U.apellidos)) as elaborador, L.id_revisor, IF(L.id_revisor is null,'- NO REVISADO -', UPPER(CONCAT( UR.nombre,' ',UR.apellidos))) as revisor, L.fecha_registro, L.fecha_actualizacion, L.importe_apagar, L.impuesto_renta, L.percepciones_periodo, L.percepciones_periodo_ant, L.saldo_percepciones_no_apl, L.retenciones_declaradas, L.retenciones_declaradas_ant, L.saldo_retenciones_no_apl, L.pagos_previos_compras FROM liquidacionimpuestos L INNER JOIN regimentributario R ON L.idregimen = R.idregimen INNER JOIN cliente C ON L.idcliente=C.idcliente INNER JOIN usuario U ON L.id_elaborador = U.idusuario  LEFT JOIN usuario UR ON L.id_revisor=UR.idusuario WHERE C.idcliente = ?", [$idcliente]);
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
            $liquidaciones = $conexion->getData("SELECT L.id_liquidacion, L.ventas_netas, L.ventas_no_gravadas, L.exportaciones_facturada, L.exportaciones_embarcadas, L.nota_credito, L.nota_debito, L.comp_nacion_grava, L.comp_importa_grava, L.comp_nacion_no_grava, L.comp_importa_no_grava, L.saldo_afavor_anterior, L.coeficiente, L.saldo_afavor_renta, L.pagos_previos, L.fechavencimiento, L.periodo, L.idregimen, R.nombreregimen, L.idcliente, C.ruc, C.razonsocial, L.id_elaborador, UPPER(CONCAT(U.nombre,' ',U.apellidos)) as elaborador, L.id_revisor, IF(L.id_revisor is null,'- NO REVISADO -', UPPER(CONCAT( UR.nombre,' ',UR.apellidos))) as revisor, L.fecha_registro, L.fecha_actualizacion, L.importe_apagar, L.impuesto_renta, L.percepciones_periodo, L.percepciones_periodo_ant, L.saldo_percepciones_no_apl, L.retenciones_declaradas, L.retenciones_declaradas_ant, L.saldo_retenciones_no_apl, L.pagos_previos_compras FROM liquidacionimpuestos L INNER JOIN regimentributario R ON L.idregimen = R.idregimen INNER JOIN cliente C ON L.idcliente=C.idcliente INNER JOIN usuario U ON L.id_elaborador = U.idusuario  LEFT JOIN usuario UR ON L.id_revisor=UR.idusuario WHERE DATE_FORMAT(L.periodo, \"%Y-%m\") = ? ", [$mesyanyo]);
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
            $liquidaciones = $conexion->getData("SELECT ELT(MONTH(periodo), 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre') mes, MONTH(periodo) as num_mes, importe_apagar as impuesto_igv, IF(impuesto_renta<0,0,impuesto_renta) AS impuesto_renta FROM liquidacionimpuestos WHERE idcliente = ? AND (periodo BETWEEN DATE(DATE_SUB(CONCAT(?,'-01'),INTERVAL 2 MONTH)) AND CONCAT(?,'-01')) GROUP BY mes ORDER BY MONTH(periodo) DESC", [$idcliente, $mesyanyo, $mesyanyo]);
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
            $liquidaciones = $conexion->getData("SELECT id_liquidacion FROM liquidacionimpuestos WHERE periodo=CONCAT(?,'-01') AND idcliente=? LIMIT 1", [$periodo, $idcliente]);
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
