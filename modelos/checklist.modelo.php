<?php

require_once "conexion-v2.php";

class ChecklistModelo
{

    /**
     * Retorna el codigo del checklist que ha sido ingresado, si sucede algun error retorna un null
     */
    public static function registrarChecklist(int $idtipousuario, int $iddepartamento,  int $idusuario, string $fecha): ?int
    {
        $idchecklist = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $idchecklist = $conexion->insert("INSERT INTO checklist(idtipousuario, iddepartamento, idusuario, fecha) VALUES (?,?,?,?)", [$idtipousuario, $iddepartamento, $idusuario, $fecha]);
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
     * Ejemplo: [ "(1,1,'detalle1','17:33:00','17:34:00')", "(1,1,'detalle2','17:33:00','17:34:00')" ]
     */
    public static function registrarDetalleChecklist(array $actividadesValues): bool
    {
        $registrado = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $registrado = $conexion->execute("INSERT INTO detallechecklist( idchecklist, idestadochecklist, detalle, horainicio, horafin) VALUES " . implode(',', $actividadesValues));
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
     * Retorna un array con los Estado de los Checklist, si sucede algun error retorna un null
     */
    public static function listarEstadoCheckList(): mixed
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
}
