<?php
require_once "conexion-v2.php";

class ModeloPermiso
{
    /** 
     * Registra los permisos de los usuarios 
     */
    public static function mdlRegistrarPermiso(int $idusuario, int $idtipopermiso, string $detalle, string $fechainicio, string $fechafin): int|false
    {
        $idpermiso = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idpermiso = $conexion->insert("INSERT INTO permiso (idusuario, idtipopermiso, idestadopermiso, detalle, fechainicio, fechafin) VALUES(?, ?, 1, ?, ?, ?)", [$idusuario, $idtipopermiso, $detalle, $fechainicio, $fechafin]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $idpermiso;
    }

    /**
     * Actualiza el permiso por su id
     */
    public static function mdlEditarPermiso(int $idpermiso, int $idtipopermiso, int $idestadopermiso, string $detalle, string $fechainicio, string $fechafin): int|false
    {
        $filasActualizadas = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filasActualizadas = $conexion->updateOrDelete("UPDATE permiso SET idtipopermiso =?,idestadopermiso=?,detalle=?,fechainicio=?,fechafin=? WHERE idpermiso=?", [$idtipopermiso, $idestadopermiso, $detalle, $fechainicio, $fechafin, $idpermiso]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $filasActualizadas;
    }

    /**
     * Actualiza solo estado de los permisos
     */
    public static function mdlEditarEstadoPermiso(int $idpermiso, int $idestadopermiso): int|false
    {
        $filasActualizadas = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filasActualizadas = $conexion->updateOrDelete("UPDATE permiso SET idestadopermiso=? WHERE idpermiso=?", [$idestadopermiso, $idpermiso]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $filasActualizadas;
    }

    /**
     * Retorna una lista de los tipos de permisos con los campos "idtipopermiao","nombrepermiso".
     */
    public static function mdlListarTiposPermisos(): mixed
    {
        $tiposPermisos = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $tiposPermisos = $conexion->getData("SELECT idtipopermiso,nombrepermiso FROM tipopermiso");
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $tiposPermisos;
    }

    /**
     * Retorna una lista de estados de los permisos con los campos "idestadopermiso","nombreestadopermiso".
     */
    public static function mdlListarEstadosPermisos(): mixed
    {
        $estadosPermisos = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $estadosPermisos = $conexion->getData("SELECT idestadopermiso, nombreestadopermiso FROM estadopermiso");
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $estadosPermisos;
    }

    /**
     * Retorna una lista general de permisos con los campos: 
     * "nombre", "apellido","tipopermiso","detalle","fechacreacion","fechainicio","fechafin","estadopermiso"
     */
    public static function mdlListarPermisos(): mixed
    {
        $permisos = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $permisos = $conexion->getData("SELECT U.nombre as nombre,U.apellidos as apellido,TP.nombrepermiso as tipopermiso,P.detalle as detalle,P.fechacreacion as fechacreacion,P.fechainicio as fechainicio,
            P.fechafin as fechafin, EP.nombreestadopermiso as estadopermiso 
            FROM permiso P
            JOIN tipopermiso TP ON P.idtipopermiso=TP.idtipopermiso
            JOIN estadopermiso EP ON P.idestadopermiso=EP.idestadopermiso
            JOIN usuario U ON P.idusuario=U.idusuario");
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $permisos;
    }

    /**
     * Retorna una lista de permisos de un ususario con los campos: 
     * "tipopermiso","detalle","fechacreacion","fechainicio","fechafin","estadopermiso","fecharevision"
     */
    public static function mdlListarPermisosxUsuarios(int $idusuario): mixed
    {
        $permisosUsuarios = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $permisosUsuarios = $conexion->getData("SELECT TP.nombrepermiso as tipopermiso,P.detalle as detalle,P.fechacreacion as fechacreacion,P.fechainicio as fechainicio,P.fechafin as fechafin,EP.nombreestadopermiso as estadopermiso,P.fecharevision as fecharevision
            FROM permiso P
            JOIN tipopermiso TP ON P.idtipopermiso=TP.idtipopermiso
            JOIN estadopermiso EP ON P.idestadopermiso=EP.idestadopermiso
            JOIN usuario U ON P.idusuario=U.idusuario
            WHERE U.idusuario= ?", [$idusuario]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $permisosUsuarios;
    }

    /**
     * Retorna la cantidad de permisos que tienen el estado de pendiente
     */
    public static function mdlCantidadPermisosPendientes(): ?int
    {
        $cantidadPermisos = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $cantidadPermisos = $conexion->getDataSingleProp("SELECT count(idpermiso) as cantidadpermisos
            FROM permiso WHERE idestadopermiso= 1", "cantidadpermisos");
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $cantidadPermisos;
    }

    /**
     * Valida un permiso que  tiene el estado de pendiente
     */
    public static function mdlValidarPermisos(int $idpermiso): ?int
    {
        $isPendiente = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $isPendiente = $conexion->getDataSingleProp("SELECT count(idpermiso) as cantidadpermisos
            FROM permiso WHERE idestadopermiso= 1 and idpermiso=?", "cantidadpermisos", [$idpermiso]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $isPendiente;
    }
}
