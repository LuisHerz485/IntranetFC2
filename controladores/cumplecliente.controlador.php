<?php

// controlador cumplea単os cliente

class controladorcumplecliente{

    public static function ctrRegistrarCumplecliente(): int|false
    {
        $data = controladorvalidacion::validar([
            "idcliente" => "enteroPositivo",
            "fechacumplecliente" => "Fecha",

        ]);
        if (is_array($data) && !in_array(false, $data, true)) {
            return modelocumplecliente::mdlRegistrarCumpleCliente($data);
        }
        return false;
    }
    public static function ctrEditarCumplecliente(): int|false
    {
        $data = controladorvalidacion::validar([
            "idcliente" => "enteroPositivo",
            "fechacumplecliente" => "Fecha",
            "idcumplecliente" => "enteroPositivo",
        ]);
        
        if (is_array($data) && !in_array(false, $data, true)) {
            return modelocumplecliente::mdlEditarCumpleCliente($data);
        }
        return false;
    }
    public static function ctrListarCumplecliente(): mixed
    {
        return modelocumplecliente::mdlListarCumpleCliente();
    }
    public static function ctrBuscarCumpleclientePorID(): mixed
    {
        $data = controladorvalidacion::validar([
            "idcumplecliente" => "enteroPositivo",
        ]);
    
        if (is_array($data) && !in_array(false, $data, true)) {
            return modelocumplecliente::mdlBuscarCumpleclientePorID($data);
        }
    
        return null;
    }
    public static function ctrBuscarCumpleclienteDeUnCliente(): mixed
    {
        $data = controladorvalidacion::validar([
            "idcliente" => "enteroPositivo",
        ]);
    
        if (is_array($data) && !in_array(false, $data, true)) {
            return modelocumplecliente::mdlBuscarCumpledeunCliente($data);
        }
    
        return null;
    }
    public static function crtBuscarCumpleclienteporfecha(): mixed
    {
        $data = controladorvalidacion::validar([
            "fechacumplecliente" => "Fecha",
        ]);
    
        if (is_array($data) && !in_array(false, $data, true)) {
            return modelocumplecliente::mdlBuscarCumpleClienteporfecha($data);
        }
    
        return null;
    }
}