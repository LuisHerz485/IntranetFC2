<?php
    require_once "controladores/template.controlador.php";
    require_once "controladores/usuarios.controlador.php";

    require_once "modelos/usuarios.modelo.php";
    $template = new ControladorTemplate();
    $template -> ctrTemplate();