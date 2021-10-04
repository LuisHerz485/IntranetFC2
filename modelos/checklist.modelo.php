<?php

require_once "conexion-v2.php";

class ChecklistModelo
{

    /**
     * Retorna el codigo del checklist que ha sido ingresado, si sucede algun error retorna un null
     */
    public static function mdlRegistrarChecklist(int $idtipousuario, int $iddepartamento,  int $idusuario, int $idasignador, string $fecha): int|bool
    {
        $idchecklist = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idchecklist = $conexion->insert(
                "INSERT INTO checklist(idtipousuario, iddepartamento, idusuario, idasignador, fecha) VALUES (?,?,?,?,?)",
                [$idtipousuario, $iddepartamento, $idusuario, $idasignador, $fecha]
            );
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $idchecklist;
    }

    /**
     * Retorna true si se registro correctamente el datalle del checklist, si sucede algun error retorna un false
     * 
     * @param array $actividadesValues Un array de strings que contiene los valores a insertar, 
     * cada string contiene (idchecklist, idestadochecklist, detalle, horainicio,  horafin).   
     * Ejemplo: [ "(?,1,'detalle1','17:33:00','17:34:00')", "(?,1,'detalle2','17:33:00','17:34:00')" ]
     * 
     * @param array $ids Un array de los con el idchecklist repetido la cantidad de veces que se tenga detalles de checklist
     */
    public static function mdlRegistrarDetalleChecklist(array $actividadesValues, array $ids): bool
    {
        $registrado = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $registrado = $conexion->execute(
                "INSERT INTO detallechecklist( idchecklist, idestadochecklist, detalle, horainicio, horafin) VALUES " . implode(',', $actividadesValues),
                $ids
            );
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $registrado;
    }

    /**
     * Retorna un array con los Estado de los Checklist con los campos "idestadochecklist","nombre". Si sucede algun error retorna un null
     */
    public static function mdlListarEstadoCheckList(): mixed
    {
        $estadoschecklist = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $estadoschecklist = $conexion->getData("SELECT idestadochecklist, nombre FROM estadochecklist");
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $estadoschecklist;
    }

    /**
     * Edita el el detalle checklist, es decir las actividades
     */
    public static function mdlEditarDetalleChecklist(int $idestadochecklist, string $detalle, string $horainicio, string $horafin, int $iddetallechecklist): bool
    {
        $actualizado = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $actualizado = $conexion->updateOrDelete(
                "UPDATE detallechecklist SET idestadochecklist=?, detalle=?, horainicio=?, horafin=? WHERE iddetallechecklist=?",
                [$idestadochecklist,  $detalle,  $horainicio,  $horafin,  $iddetallechecklist]
            );
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $actualizado;
    }
    /**
     * Retorna un array con los Campos: detalle,horainicio,horafin, fechacreacion, idestadochecklist,nombreestadochecklist
     */
    public static function mdlListarCheckListxUsuario(int $idusuario): mixed
    {
        $actividades = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $actividades = $conexion->getData("SELECT dch.iddetallechecklist AS iddetallechecklist, ch.idusuario AS idusuario, dch.detalle as detalle, dch.horainicio as horainicio, dch.horafin as horafin, ch.fecha as fechacreacion, ech.idestadochecklist as idestadochecklist, ech.nombre as nombreestadochecklist 
             FROM checklist ch 
             JOIN detallechecklist dch ON ch.idchecklist=dch.idchecklist 
             JOIN estadochecklist ech ON dch.idestadochecklist=ech.idestadochecklist 
             WHERE ch.idusuario=? AND dch.idestadochecklist=1", [$idusuario]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $actividades;
    }

    public static function mdlListarCheckListActividades(int $idusuario, int $idestadochecklist, string $fechadesde, string $fechahasta): mixed
    {
        $actividades = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            if ($idestadochecklist == 0) {
                $actividades = $conexion->getData("SELECT dch.iddetallechecklist AS iddetallechecklist, ch.idusuario AS idusuario,ch.idchecklist as idchecklist, dch.idestadochecklist AS idestadochecklist, dch.detalle AS detalle, ch.fecha AS fecha, dch.horainicio AS horainicio, dch.horafin AS horafin, ech.nombre AS nombreestado FROM checklist ch JOIN detallechecklist dch ON ch.idchecklist = dch.idchecklist JOIN estadochecklist ech ON dch.idestadochecklist = ech.idestadochecklist WHERE (ch.idusuario = ?) AND ch.fecha BETWEEN ? AND ? ", [$idusuario, $fechadesde, $fechahasta]);
            } else {
                $actividades = $conexion->getData("SELECT dch.iddetallechecklist AS iddetallechecklist, ch.idusuario AS idusuario,ch.idchecklist as idchecklist, dch.idestadochecklist AS idestadochecklist, dch.detalle AS detalle, ch.fecha AS fecha, dch.horainicio AS horainicio, dch.horafin AS horafin, ech.nombre AS nombreestado FROM checklist ch JOIN detallechecklist dch ON ch.idchecklist = dch.idchecklist JOIN estadochecklist ech ON dch.idestadochecklist = ech.idestadochecklist WHERE (ch.idusuario = ? AND dch.idestadochecklist=?) AND ch.fecha BETWEEN ? AND ? ", [$idusuario, $idestadochecklist, $fechadesde, $fechahasta]);
            }
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $actividades;
    }

    public static function mdlListarCheckListActividadesUsuario(int $idusuario, string $fechadesde, string $fechahasta): mixed
    {
        $actividades = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $actividades = $conexion->getData("SELECT dch.iddetallechecklist AS iddetallechecklist, ch.idusuario AS idusuario,ch.idchecklist as idchecklist, dch.idestadochecklist AS idestadochecklist, dch.detalle AS detalle, ch.fecha AS fecha, dch.horainicio AS horainicio, dch.horafin AS horafin, ech.nombre AS nombreestado FROM checklist ch JOIN detallechecklist dch ON ch.idchecklist = dch.idchecklist JOIN estadochecklist ech ON dch.idestadochecklist = ech.idestadochecklist WHERE (ch.idusuario = ?) AND ch.fecha BETWEEN ? AND ? ", [$idusuario, $fechadesde, $fechahasta]);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $actividades;
    }

    public static function mdlListarCheckListSegunAsignador(int $idasignador, string $fechadesde, string $fechahasta): mixed
    {
        $actividades = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $actividades = $conexion->getData("SELECT dch.iddetallechecklist AS iddetallechecklist, u.nombre AS nombre, u.apellidos AS apellidos, dch.idestadochecklist AS idestadochecklist, dch.detalle AS detalle, ch.fecha AS fecha, dch.horainicio AS horainicio, dch.horafin AS horafin, ech.nombre AS nombreestado FROM checklist ch INNER JOIN detallechecklist dch ON ch.idchecklist = dch.idchecklist INNER JOIN estadochecklist ech ON dch.idestadochecklist = ech.idestadochecklist INNER JOIN usuario u ON ch.idusuario = u.idusuario WHERE ch.idasignador = ? AND ch.fecha BETWEEN ? AND ?", [$idasignador, $fechadesde, $fechahasta]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $actividades;
    }
}
