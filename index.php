<?php
    require_once "controladores/template.controlador.php";
    require_once "controladores/usuarios.controlador.php";
    require_once "controladores/departamento.controlador.php";
    require_once "controladores/tipousuario.controlador.php";
    require_once "controladores/asistencia.controlador.php";
    require_once "controladores/reportes.controlador.php";
    require_once "controladores/clientes.controlador.php";
    require_once "controladores/agenda.controlador.php";
    require_once "controladores/upload.controlador.php";
    require_once "controladores/updload.controlador.php";

    require_once "modelos/usuarios.modelo.php";
    require_once "modelos/departamento.modelo.php";
    require_once "modelos/tipousuario.modelo.php";
    require_once "modelos/asistencia.modelo.php";
    require_once "modelos/reportes.modelo.php";
    require_once "modelos/clientes.modelo.php";
    require_once "modelos/agenda.modelo.php";
    require_once "modelos/representante.modelo.php";
    $template = new ControladorTemplate();
    $template -> ctrTemplate();