<?php
//controlador de horarios de colaboradores
class controladorcontratocolab
{
    public static function ctrlistarcontratocolab(): mixed
    {
        return modelocontratocolab::mdllistarcontratocolab();
    }


    //registrar contrato de colaborador
    public static function ctrregistrarcontratocolab(): bool
    {
        if (isset($_POST["idusuario"], $_POST["iniciocontrato"], $_POST["fincontrato"], $_POST["Pago"])) 
        {
            $idusuario = ControladorValidacion::validarID($_POST["idusuario"]);
            $iniciocontrato = $_POST["iniciocontrato"];
            $fincontrato = $_POST["fincontrato"];
            $Pago = $_POST["Pago"];
            if (
                $idusuario && $iniciocontrato && $fincontrato && $Pago
                && ControladorValidacion::formatoFecha($iniciocontrato)
                && ControladorValidacion::formatoFecha($fincontrato)
            ) {
                return modelocontratocolab::mdlregistrarcontratocolab($idusuario, $iniciocontrato, $fincontrato, $Pago);
            }
        }
        return false;
    }
    //editar contrato de colaborador
    public static function ctreditarcontratocolab(): int|false
    {
        $data=ControladorValidacion::validar([
            "idusuario" =>"enteroPositivo",
            "iniciocontrato"=>"Fecha",
            "fincontrato"=>"Fecha",
            "Pago"=>"enteroPositivo",
            "idcontratousuario"=>"enteroPositivo",
        ]);
        if(is_array($data) && !in_array(false,$data, true)){
            return modelocontratocolab::mdleditarcontratocolab($data);
        }
        return false;
    }


    //buscar contrato por id
    public static function ctrbuscarcontratocolabporid():mixed
    {
        $data = contraldorvalidacion::validar([
            "idusuario" => "enteroPositivo",
        ]);
        if(is_array($data) && !in_array(false, $data, true)){
            return modelocontratocolab::mdlbuscarcontratocolab($data);
        }
        return null;
    }
}
?>