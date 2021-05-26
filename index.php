<?php
    require_once "controladores/template.controlador.php";
    require_once "controladores/usuarios.controlador.php";
    require_once "controladores/departamento.controlador.php";
    require_once "controladores/tipousuario.controlador.php";
    require_once "controladores/asistencia.controlador.php";

    require_once "modelos/usuarios.modelo.php";
    require_once "modelos/departamento.modelo.php";
    require_once "modelos/tipousuario.modelo.php";
    require_once "modelos/asistencia.modelo.php";
    $template = new ControladorTemplate();
    $template -> ctrTemplate();