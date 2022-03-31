<?php

//controlador de cuentas por pagar
class controladorcuentasporpagar
{
    public static function ctrlistarcuentasporpagar(): mixed
    {
        return modelocuentasporpagar::mdlListarCuentasPorPagar();
    }

    //controlador registrar cuentas por pagar

    public static function ctrregistrarcuentasporpagar(): bool
    {
        if(isset($_POST["ruc"],$_POST["razonsocial"],$_POST["tipodoc"],$_POST["serie"],$_POST["numerodoc"],$_POST["fechaemision"],$_POST["base"],$_POST["igv"],$_POST["total"],$_POST["estatus"],$_POST["vencimiento"],$_POST["fechapago"]))
        {
            
            $ruc = $_POST["ruc"];
            $razonsocial = $_POST["razonsocial"];
            $tipodoc = $_POST["tipodoc"];
            $serie = $_POST["serie"];
            $numdoc = $_POST["numerodoc"];
            $fechaemision = $_POST["fechaemision"];
            $base = $_POST["base"];
            $igv = $_POST["igv"];
            $total = $_POST["total"];
            $estatus = $_POST["estatus"];
            $vencimiento = $_POST["vencimiento"];
            $fechapago = $_POST["fechapago"];
            if(
                $ruc && $razonsocial && $tipodoc && $serie && $numdoc && $fechaemision && $base && $igv && $total && $estatus && $vencimiento && $fechapago
                && ControladorValidacion::formatofecha($fechaemision) && ControladorValidacion::formatofecha($fechapago)
            )
            {
                return modelocuentasporpagar::mdlregistrarcuentasporpagar($ruc, $razonsocial, $tipodoc, $serie, $numdoc, $fechaemision, $base, $igv, $total, $estatus, $vencimiento, $fechapago);
            }
        }
        return false;
    }

    public static function ctreliminarcuentaporpagar():int|false
    {
        $data= ControladorValidacion::validar([
            "idcuentapp"=>"enteroPositivo"
        ]);
        if(is_array($data) && !in_array(false,$data,true)){
            return modelocuentasporpagar::mdleliminarcuentaporpagar($data);
        }
        return false;
    }

    public static function ctreditarcuentaporpagar(): bool
    {
        if(isset($_POST["ruc"],$_POST["razonsocial"],$_POST["tipodoc"],$_POST["serie"],$_POST["numerodoc"],$_POST["fechaemision"],$_POST["base"],$_POST["igv"],$_POST["total"],$_POST["estatus"],$_POST["vencimiento"],$_POST["fechapago"],$_POST["idcuentaporpagar"]))
        {
            $ruc = $_POST["ruc"];
            $razonsocial = $_POST["razonsocial"];
            $tipodoc = $_POST["tipodoc"];
            $serie = $_POST["serie"];
            $numdoc = $_POST["numerodoc"];
            $fechaemision = $_POST["fechaemision"];
            $base = $_POST["base"];
            $igv = $_POST["igv"];
            $total = $_POST["total"];
            $estatus = $_POST["estatus"];
            $vencimiento = $_POST["vencimiento"];
            $fechapago = $_POST["fechapago"];
            $idcuentaporpagar = $_POST["idcuentaporpagar"];
            if(
                $ruc && $razonsocial && $tipodoc && $serie && $numdoc && $fechaemision && $base && $igv && $total && $estatus && $vencimiento && $fechapago && $idcuentaporpagar
                && ControladorValidacion::formatofecha($fechaemision) && ControladorValidacion::formatofecha($fechapago)
            )
            {
                return modelocuentasporpagar::mdleditarcuentaporpagar($ruc, $razonsocial, $tipodoc, $serie, $numdoc, $fechaemision, $base, $igv, $total, $estatus, $vencimiento, $fechapago, $idcuentaporpagar);
            }
        }
        return false;
    }
    //listar cuentas por pagar por tipo de documento

    public static function ctrfiltrartipodoc(): mixed
    {
        if(isset($_POST["idtipodoccuentaporpagar"]))
        {
            $idtipodoc = $_POST["idtipodoccuentaporpagar"];
            return modelocuentasporpagar::mdlfiltrartipodoc($idtipodoc);
        }
    }
}
?>