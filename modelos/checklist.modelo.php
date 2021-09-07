<?php

require_once "conexion-v2.php";

class ChecklistModelo
{

    /**
     * Retorna el codigo del checklist que ha sido ingresado, si sucede algun error retorna un null
     */
    public static function mdlRegistrarChecklist(int $idtipousuario, int $iddepartamento,  int $idusuario, string $fecha): int|bool
    {
        $idchecklist = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idchecklist = $conexion->insert(
                "INSERT INTO checklist(idtipousuario, iddepartamento, idusuario, fecha) VALUES (?,?,?,?)",
                [$idtipousuario, $iddepartamento, $idusuario, $fecha]
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

    public static function mdlEditarDetalleChecklist(int $idestadochecklist, string $detalle, string $horainicio, string $horafin, int $iddetallechecklist): bool
    {
        $actualizado = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $actualizado = $conexion->updateOrDelete(
                "UPDATE detallechecklist SET idestadochecklist=? detalle=? horainicio=? horafin=? WHERE iddetallechecklist=?",
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
}
