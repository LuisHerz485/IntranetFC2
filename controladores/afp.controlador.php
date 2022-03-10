<?php
//controlador de credenciales de afp
class controladorafp
{
    public static function ctrlistarafp():mixed
    {
        return modeloafp::mdllistarafp();
    }

    //registrar credenciales de afp controlador
    public static function ctrregistrarafp():bool
    {
        if (isset($_POST["idcliente"], $_POST["usuarioafp"], $_POST["contraseafp"])) {
            $idcliente = ControladorValidacion::validarID($_POST["idcliente"]);
            $usuarioafp = $_POST["usuarioafp"];
            $contraseafp = $_POST["contraseafp"];
            if ($idcliente && $usuarioafp && $contraseafp) {
                return modeloafp::mdlregistrarafp($idcliente, $usuarioafp, $contraseafp);
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
}