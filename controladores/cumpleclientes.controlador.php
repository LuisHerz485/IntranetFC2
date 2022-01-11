<?php

class ControladorCumpleClientes
{
    public static function ctrRegistrarCumpleClientes(): int|false
    {
        $data = ControladorValidacion::validar([
            "idcliente" => "enteroPositivo",
            "fechacumplecliente" => "Fecha",

        ]);
        if (is_array($data) && !in_array(false, $data, true)) {
            return ModeloCumpleClientes::mdlRegistrarCumpleanosClientes($data);
        }
        return false;
    }

    public static function ctrEditarCumpleaClientes(): int|false
    {
        $data = ControladorValidacion::validar([
            "idcliente" => "enteroPositivo",
            "fechacumplecliente" => "Fecha",
            "idcumplecliente" => "enteroPositivo",
        ]);
        
        if (is_array($data) && !in_array(false, $data, true)) {
            return ModeloCumpleClientes::mdlEditarCumpleClientes($data);
        }
        return false;
    }

    public static function ctrListarCumpleClientes(): mixed
    {
        return ModeloCumpleClientes::mdlListarCumpleClientes();
    }

    public static function ctrBuscarCumpleanosClientesPorID(): mixed
    {
        $data = ControladorValidacion::validar([
            "idcumplecliente" => "enteroPositivo",
        ]);

        if (is_array($data) && !in_array(false, $data, true)) {
            return ModeloCumpleClientes::mdlBuscarCumpleanosClientesPorID($data);
        }

        return null;
    }

    public static function ctrBuscarCumpleanosDeUnCliente(): mixed
    {
        $data = ControladorValidacion::validar([
            "idcliente" => "enteroPositivo",
        ]);

        if (is_array($data) && !in_array(false, $data, true)) {
            return ModeloCumpleClientes::mdlBuscarCumpleanosDeUnCliente($data);
        }

        return null;
    }

    public static function ctrBuscarCumpleClientePorFecha(): mixed
    {
        $data = ControladorValidacion::validar([
            "fechacumplecliente" => "Fecha",
        ]);

        if (is_array($data) && !in_array(false, $data, true)) {
            return ModeloCumpleClientes::mdlBuscarCumpleClientePorFecha($data);
        }

        return null;
    }

}