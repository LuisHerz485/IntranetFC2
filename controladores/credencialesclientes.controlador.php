<?php
// controlador de crendecilaes de clientes

class controladorcredencialesclientes
{
    public static function ctrlistarcredencialesclientes():mixed
    {
        return modelocredencialesclientes::mdlcredencialesclientes();
    }
}