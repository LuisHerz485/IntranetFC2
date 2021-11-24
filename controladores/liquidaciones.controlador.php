<?php

class ControladorLiquidaciones
{

    public static function ctrRegistrarLiquidacion(): int|false
    {
        $data = ControladorValidacion::validar([
            "ventas_netas" => "flotante",
            "ventas_no_gravadas" => "flotante",
            "exportaciones_facturada" => "flotante",
            "exportaciones_embarcadas" => "flotante",
            "nota_credito" => "flotante",
            "nota_debito" => "flotante",
            "comp_nacion_grava" => "flotante",
            "comp_importa_grava" => "flotante",
            "comp_nacion_no_grava" => "flotante",
            "comp_importa_no_grava" => "flotante",
            "saldo_afavor_anterior" => "flotante",
            "coeficiente" => "flotante",
            "saldo_afavor_renta" => "flotante",
            "pagos_previos" => "flotante",
            "fechavencimiento" => "fecha",
            "periodo" => "fechaMes",
            "idregimen" => "enteroPositivo",
            "idcliente" => "enteroPositivo",
            "id_elaborador" => "enteroPositivo",
            "importe_apagar" => "flotante",
            "impuesto_renta" => "flotante",
            "percepciones_periodo" => "flotante",
            "percepciones_periodo_ant" => "flotante",
            "saldo_percepciones_no_apl" => "flotante",
            "retenciones_declaradas" => "flotante",
            "retenciones_declaradas_ant" => "flotante",
            "saldo_retenciones_no_apl" => "flotante",
            "pagos_previos_compras" => "flotante",
        ]);
        if (is_array($data) && !in_array(false, $data, true)) {
            if (!ModeloLiquidaciones::mdlExisteLiquidacion($_POST["periodo"], $_POST["idcliente"])) {
                return ModeloLiquidaciones::mdlRegistrarLiquidaciones($data);
            }
        }
        return false;
    }

    public static function ctrEditarLiquidacion(): int|false
    {
        $data = ControladorValidacion::validar([
            "ventas_netas" => "flotante",
            "ventas_no_gravadas" => "flotante",
            "exportaciones_facturada" => "flotante",
            "exportaciones_embarcadas" => "flotante",
            "nota_credito" => "flotante",
            "nota_debito" => "flotante",
            "comp_nacion_grava" => "flotante",
            "comp_importa_grava" => "flotante",
            "comp_nacion_no_grava" => "flotante",
            "comp_importa_no_grava" => "flotante",
            "saldo_afavor_anterior" => "flotante",
            "coeficiente" => "flotante",
            "saldo_afavor_renta" => "flotante",
            "pagos_previos" => "flotante",
            "fechavencimiento" => "fecha",
            "periodo" => "fechaMes",
            "idregimen" => "enteroPositivo",
            "idcliente" => "enteroPositivo",
            "importe_apagar" => "flotante",
            "impuesto_renta" => "flotante",
            "percepciones_periodo" => "flotante",
            "percepciones_periodo_ant" => "flotante",
            "saldo_percepciones_no_apl" => "flotante",
            "retenciones_declaradas" => "flotante",
            "retenciones_declaradas_ant" => "flotante",
            "saldo_retenciones_no_apl" => "flotante",
            "pagos_previos_compras" => "flotante",
            "id_liquidacion" => "enteroPositivo",
        ]);
        if (is_array($data) && !in_array(false, $data, true)) {
            return ModeloLiquidaciones::mdlActualizarLiquidaciones($data);
        }
        return false;
    }

    public static function ctrRegistrarRevision(): mixed
    {
        $_POST["id_revisor"] = $_SESSION["idusuario"];
        $data = ControladorValidacion::validar([
            "id_revisor" => "enteroPositivo",
            "id_liquidacion" => "enteroPositivo",
        ]);
        if (is_array($data) && !in_array(false, $data, true)) {
            return ModeloLiquidaciones::mdlRegistrarRevision($data);
        }
        return false;
    }


    public static function ctrBuscarLiquidacion(): mixed
    {
        if (isset($_POST["id_liquidacion"])) {
            if ($idliquidaciones = ControladorValidacion::validarID($_POST["id_liquidacion"])) {
                return ModeloLiquidaciones::mdlBuscarLiquidacion($idliquidaciones);
            }
        }
        return false;
    }

    public static function ctrBuscarLiquidacionxClientes(): mixed
    {
        if (isset($_POST["idcliente"])) {
            if ($idcliente = ControladorValidacion::validarID($_POST["idcliente"])) {
                return ModeloLiquidaciones::mdlBuscarLiquidacionesxClientes($idcliente);
            }
        }
        return false;
    }

    public static function ctrBuscarLiquidacionesxMes(): mixed
    {
        if (isset($_POST["mesyanyo"])) {
            if ($mesyanyo = ControladorValidacion::fechaMes($_POST["mesyanyo"])) {
                return ModeloLiquidaciones::mdlBuscarLiquidacionesxMes($mesyanyo);
            }
        }
        return false;
    }

    public static function ctrListarLiquidaciones(): mixed
    {
        return ModeloLiquidaciones::mdlListarLiquidaciones();
    }

    public static function ctrListarRegimenesTributario(): mixed
    {
        return ModeloLiquidaciones::mdlListarRegimenesTributario();
    }


    public static function ctrListarResumen(): mixed
    {
        if (isset($_POST["periodo"], $_POST["idcliente"])) {
            $idcliente = ControladorValidacion::validarID($_POST["idcliente"]);
            $mesyanyo = ControladorValidacion::fechaMes($_POST["periodo"]);
            if ($mesyanyo && $idcliente) {
                $resultado = ModeloLiquidaciones::mdlConsultarMeses($mesyanyo, $idcliente);
                $cantidad = count($resultado);
                if ($cantidad == 3) {
                    return $resultado;
                } else {
                    $mes = intval(explode("-", $mesyanyo)[1]);
                    $meses = ["", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                    if (isset($resultado[0]) && $resultado[0]["num_mes"] != $mes) {
                        array_unshift($resultado, ["mes" => $meses[$mes], "num_mes" => $mes, "impuesto_igv" => 0, "impuesto_renta" => 0]);
                        if (isset($resultado[1]) && $resultado[1]["num_mes"] != $mes - 1) {
                            $mes--;
                            array_unshift($resultado, ["mes" => $meses[$mes], "num_mes" => $mes, "impuesto_igv" => 0, "impuesto_renta" => 0]);
                            if ($resultado[0]["num_mes"] < $resultado[1]["num_mes"]) {
                                $aux = $resultado[0];
                                $resultado[0] = $resultado[1];
                                $resultado[1] = $aux;
                            }
                            $cantidad++;
                        }
                        $cantidad++;
                    }
                    $mes -= $cantidad;
                    while ($cantidad < 3) {
                        if ($mes <= 0) $mes = 12;
                        array_push($resultado, ["mes" => $meses[$mes], "num_mes" => $mes, "impuesto_igv" => 0, "impuesto_renta" => 0]);
                        $mes--;
                        $cantidad++;
                    }
                    return $resultado;
                }
            }
        }
        return false;
    }
}
