<?php
/*modelo de control de horario de colaboradores*/
require_once "conexion.php";
require_once "conexion-v2.php";

class modelocontratocolab{
    //listar contratos de colaboradores
    public static function mdllistarcontratocolab(): mixed{
        $contratocolab = null; 
        $conexion = null;
        try{
            $conexion = new ConexionV2();
            $contratocolab = $conexion->getData("SELECT c.idcontratousuario ,c.idusuario, u.iddepartamento, d.nombre , CONCAT(u.nombre,' ',u.apellidos) AS nombrecompleto,  u.estado, c.iniciocontrato, c.fincontrato, c.Pago FROM contratousuario c 
            INNER JOIN usuario u ON c.idusuario = u.idusuario
            INNER JOIN departamento d ON d.iddepartamento = u.iddepartamento");
        } catch (PDOException $e){
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $contratocolab;
    }
    //registrar contrato de colaborador
    public static function mdlregistrarcontratocolab(int $idusuario,string $iniciocontrato,string $fincontrato,string $Pago): int|false{
        $conexion = null;
        $resultado = false;
        try{
            $conexion = new ConexionV2();
            $resultado = $conexion->insert("INSERT INTO contratousuario (idusuario, iniciocontrato, fincontrato, Pago) 
            VALUES (?,?,?,?)", [$idusuario,$iniciocontrato, $fincontrato, $Pago]);
        } catch (PDOException $e){
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $resultado;
    }
    //editar contrato de colaborador
    public static function mdleditarcontratocolab(array $datos): int|false
    {
        $filasActualizadas = false;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $filasActualizadas = $conexion->updateOrDelete("UPDATE contratousuario SET idusuario=?, iniciocontrato=?, fincontrato=?, Pago=? WHERE idcontratousuario=?;
            ", $datos);
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $filasActualizadas;  
    }


    //buscar contrato de colaborador por id
    public static function mdlbuscarcontratocolab(array $datos): mixed
    {
        $uncontratocolab = null;
        $conexion = null;
        try {
            $conexion = new ConexionV2();
            $uncontratocolab = $conexion->getData("SELECT u.iddepartamento, d.nombre , CONCAT(u.nombre,' ',u.apellidos) AS nombrecompleto,  u.estado, c.iniciocontrato, c.fincontrato, c.Pago FROM contratousuario c 
            INNER JOIN usuario u ON c.idusuario = u.idusuario
            INNER JOIN departamento d ON d.iddepartamento = u.iddepartamento WHERE c.idusuario=?", $datos);
        } catch (PDOException $e) {
            //echo $e->getMessage();
        } finally {
            if ($conexion) {
                $conexion->close();
                $conexion = null;
            }
        }
        return $uncontratocolab;
    }


}
?>



