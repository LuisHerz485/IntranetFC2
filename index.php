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
require_once "controladores/tipoarchivo.controlador.php";
require_once "controladores/archivo.controlador.php";
require_once "controladores/local.controlador.php";
require_once "controladores/cobranza.controlador.php";
require_once "controladores/detallecobranza.controlador.php";
require_once "controladores/consultamigo.controlador.php";
require_once "controladores/checklist.controlador.php";
require_once "controladores/tiposervicio.controlador.php";



require_once "modelos/usuarios.modelo.php";
require_once "modelos/departamento.modelo.php";
require_once "modelos/tipousuario.modelo.php";
require_once "modelos/asistencia.modelo.php";
require_once "modelos/reportes.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/agenda.modelo.php";
require_once "modelos/representante.modelo.php";
require_once "modelos/tipoarchivo.modelo.php";
require_once "modelos/archivo.modelo.php";
require_once "modelos/local.modelo.php";
require_once "modelos/cobranza.modelo.php";
require_once "modelos/detallecobranza.modelo.php";
require_once "modelos/checklist.modelo.php";
require_once "modelos/tiposervicio.modelo.php";
require_once "modelos/permiso.modelo.php";

$template = new ControladorTemplate();
$template->ctrTemplate();
