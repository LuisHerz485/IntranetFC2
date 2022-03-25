<?php
//controlador de credenciales de afp
class controladorfacturas
{
    public static function ctrListarFacturas():mixed
    {
        return modelofacturas::mdlListarFacturas();
    }

    //registrar credenciales de factura controlador
    public static function ctrRegistrarFactura():bool
    {
        if (isset($_POST["idcliente"], $_POST["portal"],$_POST["usuariofacturas"], $_POST["contrasefacturas"])) {
            $idcliente = ControladorValidacion::validarID($_POST["idcliente"]);
            $usuariofacturas = $_POST["usuariofacturas"];
            $contrasefacturas = $_POST["contrasefacturas"];
            $portal = $_POST["portal"];
            if ($idcliente && $portal && $usuariofacturas && $contrasefacturas) {
                return modelofacturas::mdlRegistrarFactura($idcliente, $portal, $usuariofacturas, $contrasefacturas);
            }
        }
        return false;
    }

    //editar credenciales de afp controlador
    public static function ctreditarafp():bool
    {
        if (isset($_POST["idcliente"], $_POST["usuarioafp"], $_POST["contraseafp"], $_POST["idafp"])) {
            $idafp= ControladorValidacion::validarID($_POST["idafp"]);
            $idcliente = ControladorValidacion::validarID($_POST["idcliente"]);
            $usuarioafp = $_POST["usuarioafp"];
            $contraseafp = $_POST["contraseafp"];
            if ($idcliente && $usuarioafp && $contraseafp) {
                return modeloafp::mdleditarafp($idcliente, $usuarioafp, $contraseafp,$idafp);
            }
        }
        return false;
    }
    
    public static function ctrEliminarFactura():int|false
    {
        $data= ControladorValidacion::validar([
            "idfacturas"=>"enteroPositivo"
        ]);
        if(is_array($data) && !in_array(false,$data,true)){
            return modelofacturas::mdlEliminarFactura($data);
        }
        return false;
    }
}