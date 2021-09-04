<?php
require_once "conexion-v2.php";

class ModeloPermiso
{
    /** 
     * Registra los permisos de los usuarios 
     */
    public static function registrarPermiso(int $idusuario, int $idtipopermiso, string $detalle, string $fechainicio, string $fechafin): ?int
    {
        $idpermiso = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idpermiso = $conexion->insert("INSERT INTO permiso (idusuario,idtipopermiso,idestadopermiso,detalle,fechainicio,fechafin) VALUES(?, ?, 1, ?, ?, ?)", [$idusuario, $idtipopermiso, $detalle, $fechainicio, $fechafin]);
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
    public static function actualizarPermiso(int $idpermiso, int $idtipopermiso, int $idestadopermiso, string $detalle, string $fechainicio, string $fechafin): ?int
    {
        $filasActualizadas = null;
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
    public static function actualizarEstadoPermiso(int $idpermiso, int $idestadopermiso): ?int
    {
        $filasActualizadas = null;
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
     * Retorna una lista de los tipos de permisos
     */
    public static function listarTiposPermisos(): mixed
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
     * Retorna una lista de estados de los permisos
     */
    public static function listarEstadosPermisos(): mixed
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
     * Retorna una lista general de permisos con los nombres de las personas que lo han relizado y demas atributos
     */
    public static function listarPermisos(): mixed
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
     * Retorna una lista de permisos de un ususario
     */
    public static function listarPermisosxUsuarios(int $idusuario): mixed
    {
        $permisosUsuarios = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $permisosUsuarios = $conexion->getData("SELECT TP.nombrepermiso as tipopermiso,P.detalle as detalle,P.fechacreacion as fechacreacion,P.fechainicio as fechainicio,P.fechafin as fechafin,EP.nombreestadopermiso as estadopermiso,P.fecharevision
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
    public static function cantidadPermisosPendientes(): ?int
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
    public static function validarPermisos(int $idpermiso): ?int
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
