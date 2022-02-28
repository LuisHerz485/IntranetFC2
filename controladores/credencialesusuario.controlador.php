<?php
//controlador de credenciales de usuario

class controladorcredencialesusuario
{
    public static function ctrlistarcredencialesusuario():mixed
    {
        return modelocredencialesusuario::mdlcredencialesusuario();
    }
}