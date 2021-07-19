<?php 
	require_once "conexion.php";
	class ModeloDetalleCobranza{
		static public function mdlMostrarDetalleCobranza($valor){
            $stmt = Conexion::conectar()->prepare("SELECT DISTINCT DC.iddetallecobranza as iddetallecobranza, C.idcobranza as idcobranza, P.idplan as idplan, S.idservicio as idservicio, DC.estado as estado, DC.precio as precio, DC.nota as nota
            FROM $tabla DC
            JOIN cobranza C ON C.idcobranza = DC.idcobranza
            JOIN plan P ON P.idplan = DC.idplan
            JOIN servicio S ON S.idservicio = DC.idservicio WHERE DC.idcobranza = :$valor");
            $stmt -> execute();
            return $stmt -> fetchAll();
            $stmt -> close();
            $stmt = null;
		}

        static public function mdlAgregarDetCobranza($valor1,$valor2,$valor3,$valor4){
            $estado = "0";
            $stmt = Conexion::conectar()->prepare("INSERT INTO cobranza(idplan, idservicio, precio, estado, nota) VALUES (:idplan, :idservicio, :precio, :fechavencimiento, :estado, :nota)");
            $stmt -> bindParam(":idplan", $valor1,PDO::PARAM_STR);
            $stmt -> bindParam(":idservicio", $valor2,PDO::PARAM_STR);
            $stmt -> bindParam(":precio", $valor3,PDO::PARAM_STR);
            $stmt -> bindParam(":estado",$estado,PDO::PARAM_STR);
            $stmt -> bindParam(":nota",$valor4,PDO::PARAM_STR);
            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
    
            $stmt -> close();
            $stmt = null;
        } 

        static public function mdlActualizarDetalleCobranza($tabla,$item1,$valor1,$item2,$valor2){
			$stmt = conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
			$stmt -> bindParam(":".$item1,$valor1,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;
		}

		static public function mdlConsultarDetalleCobranza($iddetallecobranza){ 
            $stmt = Conexion::conectar()->prepare("SELECT * FROM detallecobranza WHERE iddetallecobranza = \"$iddetallecobranza\"");
            $stmt -> execute();
            return $stmt -> fetch();
            
            $stmt -> close();
            $stmt = null;
        }

        static public function mdlMostrarServicio($tabla,$item,$valor){
            if($item!= null){
                if($item === 1){
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER by ASC");
                    $stmt -> execute();
                    return $stmt -> fetchAll();
                }else{
                    $stmt = Conexion::conectar()->prepare("SELECT *  FROM $tabla WHERE $item = :$item");
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


        /*static public function mdlMostrarPlan(){
            
        }*/
	}