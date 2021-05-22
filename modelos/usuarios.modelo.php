<?php
    require_once "conexion.php";

    class ModeloUsuarios{
        static public function mdlMostrarUsuarios($tabla,$item,$valor){
            if($item!= null){
                if($item === 1){
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER by nombre DESC LIMIT 1");
                    $stmt -> execute();
                    return $stmt -> fetch();
                }else{
                    $stmt = Conexion::conectar()->prepare("SELECT U.estado as estado, U.nombre AS nombre, U.apellidos AS apellidos, u.login AS usuario, u.password1 as password1, u.imagen as imagen, tu.nombre as tipousuario FROM $tabla U JOIN tipousuario TU ON U.idtipousuario = TU.idtipousuario WHERE $item = :$item");
                    $stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                }
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                $stmt -> execute();
                return $stmt -> fetchAll();
            }
            $stmt -> close();
            $stmt = null;
        }

        static public function mdlIngresarUsuario($tabla,$datos){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(iddepartamento,idtipousuario,nombre,apellidos,login,email,password1,imagen,estado,codigopersona) VALUES (:iddepartamento,:idtipousuario,:nombre,:apellidos,:login,:email,:password1,:imagen,:estado,:codigopersona)");
            $stmt -> bindParam(":iddepartamento", $datos["iddepartamento"],PDO::PARAM_STR);
            $stmt -> bindParam(":idtipousuario", $datos["idtipousuario"],PDO::PARAM_STR);
            $stmt -> bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
            $stmt -> bindParam(":apellidos", $datos["apellidos"],PDO::PARAM_STR);
            $stmt -> bindParam(":login",$datos['login'],PDO::PARAM_STR);
            $stmt -> bindParam(":email", $datos["email"],PDO::PARAM_STR);
            $stmt -> bindParam(":password1", $datos["clave"],PDO::PARAM_STR);
            $stmt -> bindParam(":imagen",$datos['imagen'],PDO::PARAM_STR);
            $stmt -> bindParam(":estado",$datos['estado'],PDO::PARAM_STR);
            $stmt -> bindParam(":codigopersona",$datos['codigo_persona'],PDO::PARAM_STR);
            
            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
    
            $stmt -> close();
            $stmt = null;
        }

    }