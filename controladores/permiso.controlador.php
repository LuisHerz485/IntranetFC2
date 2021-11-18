<?php

class ControladorPermiso
{
    public static function ctrRegistrarPermiso(): bool
    {
        if (isset($_POST["idusuario"], $_POST["idtipopermiso"], $_POST["detalle"], $_POST["fechainicio"], $_POST["fechafin"], $_POST["tipopermiso"])) {

            $idusuario = ControladorValidacion::validarID($_POST["idusuario"]);
            $idtipopermiso = ControladorValidacion::validarID($_POST["idtipopermiso"]);
            $detalle = $_POST["detalle"];
            $fechainicio = $_POST["fechainicio"];
            $fechafin = $_POST["fechafin"];
            $nombre = $_SESSION["nombre"];
            $apellidos = $_SESSION["apellidos"];
            $tipopermiso = $_POST["tipopermiso"];
            $file_path = $_FILES['evidenciaPermiso']['tmp_name'];
            $file_name = $_FILES['evidenciaPermiso']['name'];
            if (
                $idusuario && $idtipopermiso
                && ControladorValidacion::longitud($detalle, 500, 10)
                && ControladorValidacion::formatoFechaHoraMinutos($fechainicio)
                && ControladorValidacion::formatoFechaHoraMinutos($fechafin)
            ) {
                if (ModeloPermiso::mdlRegistrarPermiso($idusuario, $idtipopermiso, $detalle, $fechainicio, $fechafin)) {
                    if (isset($file_path) && !empty($file_path)) {
                        //cambiar correo
                        return ControladorEmail::ctrEnviarMail(self::ctrMensajeEnvio($detalle, $tipopermiso, str_replace("T", " ", $fechainicio), str_replace("T", " ", $fechafin)),  $nombre . " " . $apellidos . " solicita un permiso ", "recursoshumanos@fccontadores.com", $file_path, $file_name);
                    } else {
                        return ControladorEmail::ctrEnviarMail(self::ctrMensajeEnvio($detalle, $tipopermiso, str_replace("T", " ", $fechainicio), str_replace("T", " ", $fechafin)),  $nombre . " " . $apellidos . " solicita un permiso ", "recursoshumanos@fccontadores.com");
                    }
                }
            }
        }
        return false;
    }

    public static function ctrEditarPermiso(): bool
    {
        if (isset($_POST["idpermiso"], $_POST["idtipopermiso"], $_POST["detalle"], $_POST["fechainicio"], $_POST["fechafin"])) {
            $idpermiso = ControladorValidacion::validarID($_POST["idpermiso"]);
            $idtipopermiso = ControladorValidacion::validarID($_POST["idtipopermiso"]);
            $detalle = $_POST["detalle"];
            $fechainicio = $_POST["fechainicio"];
            $fechafin = $_POST["fechafin"];
            if (
                $idtipopermiso && $idpermiso
                && ControladorValidacion::longitud($detalle, 500, 10)
                && ControladorValidacion::formatoFechaHoraMinutos($fechainicio)
                && ControladorValidacion::formatoFechaHoraMinutos($fechafin)
            ) {
                return ModeloPermiso::mdlEditarPermiso($idpermiso, $idtipopermiso, $detalle, $fechainicio, $fechafin);
            }
        }
        return false;
    }

    public static function ctrBuscarPermiso(): mixed
    {
        if (isset($_POST["idpermiso"])) {
            $idpermiso = ControladorValidacion::validarID($_POST["idpermiso"]);
            if ($idpermiso) {
                return ModeloPermiso::mdlListarPermisoPorId($idpermiso);
            }
        }
        return false;
    }

    public static function ctrFiltroPermiso(): mixed
    {
        if (isset($_POST["idestadopermiso"], $_POST["fechadesde"], $_POST["fechahasta"])) {
            $idestadopermiso = ControladorValidacion::validarID($_POST["idestadopermiso"]);
            $fechadesde = $_POST["fechadesde"];
            $fechahasta = $_POST["fechahasta"];
            if (ControladorValidacion::formatoFecha($fechadesde) && ControladorValidacion::formatoFecha($fechahasta)) {
                if ($idestadopermiso) {
                    return ModeloPermiso::mdlListarPermisosFiltros($fechadesde, $fechahasta, $idestadopermiso);
                } else {
                    return ModeloPermiso::mdlListarPermisosFiltrarRangoFecha($fechadesde, $fechahasta);
                }
            }
        }
        return false;
    }

    public static function ctrEditarEstado(): bool
    {
        if (isset($_POST["idpermiso"], $_POST["idestadopermiso"], $_SESSION["idusuario"], $_POST["observacion"])) {
            $idrevisor = ControladorValidacion::validarID($_SESSION["idusuario"]);
            $idpermiso = ControladorValidacion::validarID($_POST["idpermiso"]);
            $idestadopermiso = ControladorValidacion::validarID($_POST["idestadopermiso"]);
            $observacion = $_POST["observacion"];

            if ($idpermiso && $idrevisor && $idestadopermiso && ControladorValidacion::longitud($observacion, 300)) {
                return ModeloPermiso::mdlEditarEstadoPermiso($idpermiso, $idestadopermiso, $idrevisor, $observacion);
            }
        }
        return false;
    }

    public static function ctrCantidadPermisosPendientes(): ?int
    {
        return ModeloPermiso::mdlCantidadPermisosPendientes();
    }
    private static function ctrMensajeEnvio($detalle, $tipopermiso, $fechainicio, $fechafin)
    {
        return '
        <html >
        <head>
        <style type="text/css">
            body{background-image: url(https://ia601500.us.archive.org/34/items/watermark_202109/watermark.png);  padding: 2% 5% 2% 5%;}
            centrado{width: 100%; height: 100%;}
            img{width: 20%; height:20%; padding-top:6%;padding-bottom:2%;}
            h1{font-size: 20px; margin-botton: 5px;}
            p{font-size: 18px; color: #292929;}
            button{width:150px; font-size: 17px; background: #1565C0;}
            button:hover{background-color: #000080; text-decoration: none;}
            a{color: white; text-decoration: none;}
        </style>
        </head>
        <body>
        <div class = "centrado">
            <img src="https://ia601403.us.archive.org/12/items/logo_20210924_20210924_1644/logo.png" alt="logo">
            <h1><b>TIPO DE PERMISO: ' . $tipopermiso . '</b></h1>
            <p><b>FECHA INICIO: </b>' . $fechainicio . '</p>
            <p><b>FECHA FIN: </b>' . $fechafin . '</p><br>
            <p><b>MENSAJE: </b></p><p>' . $detalle . '</p><br>
            <button role="button" kind="primary"><a href="https://intranet.fccontadores.com/permisos-pendientes">Ir a la Intranet</button>
        </div>
        </body>
        </html>
        ';
    }
}
