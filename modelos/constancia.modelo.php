<?php 
	require_once "conexion.php";
	class ModeloConstancia{
        static public function mdlMostrarConstancia($valor){
            $stmt = Conexion::conectar()->prepare("SELECT DISTINCT CO.idconstancia as idconstancia, CO.idcobranza as idcobranza, CO.iddetallecobranza as iddetallecobranza, CO.fechapago as fecha_pago, CO.tipopago as tipo_pago, CO.monto as monto_const, CO.nota as nota_const
                FROM constancia CO
                WHERE CO.idcobranza = $valor");
            $stmt -> execute();
            return $stmt -> fetchAll();
            $stmt -> close();
            $stmt = null;
        }

		/*static public function mdlMostrarConstancia($tabla,$item,$valor){
            if($item!= null){
                if($item === 1){
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER by nombre ASC");
                    $stmt -> execute();
                    return $stmt -> fetchAll();
                }else{
                    $stmt = Conexion::conectar()->prepare("SELECT CS.idconstancia as idconstancia, C.idcobranza as idcobranza, DC.iddetallecobranza as iddetallecobranza, CS.fechapago as fechapago, CS.tipopago as tipopago, CS.monto as monto, CS.nota as nota
                    FROM $tabla CS
                    JOIN cobranza C ON CS.idcobranza = C.idcobranza
                    JOIN detalleconstancia DC ON CS.iddetallecobranza = DC.iddetallecobranza WHERE $item = :$item");
                    $stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                }
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT CS.idconstancia as idconstancia, C.idcobranza as idcobranza, DC.iddetallecobranza as iddetallecobranza, CS.fechapago as fechapago, CS.tipopago as tipopago, CS.monto as monto, CS.nota as nota
                    FROM $tabla CS
                    JOIN cobranza C ON CS.idcobranza = C.idcobranza
                    JOIN detalleconstancia DC ON CS.iddetallecobranza = DC.iddetallecobranza");
                $stmt -> execute();
                return $stmt -> fetchAll();
            }
            $stmt -> close();
            $stmt = null;
		}*/
         static public function mdlIngresarConstancia($valor1,$valor2,$valor3,$valor4,$valor5,$valor6){
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("INSERT INTO constancia(idcobranza, iddetallecobranza, fechapago, tipopago, monto, nota) VALUES ( :idcobranza, :iddetallecobranza, :fechapago, :tipopago, :monto, :nota)");
            $stmt -> bindParam(":idcobranza", $valor1,PDO::PARAM_STR);
            $stmt -> bindParam(":iddetallecobranza", $valor2,PDO::PARAM_STR);
            $stmt -> bindParam(":fechapago", $valor3,PDO::PARAM_STR);
            $stmt -> bindParam(":tipopago",$valor4,PDO::PARAM_STR);
            $stmt -> bindParam(":monto", $valor5,PDO::PARAM_STR);
            $stmt -> bindParam(":nota",$valor6,PDO::PARAM_STR);
            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
    
            $stmt -> close();
            $stmt = null;
        } 
/*
        static public function mdlActualizarConstancia($tabla,$item1,$valor1,$item2,$valor2){
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

		static public function mdlConsultarConstancia($idconstacia){ 
            $stmt = Conexion::conectar()->prepare("SELECT * FROM constancia WHERE idconstacia = \"$idconstacia\"");
            $stmt -> execute();
            return $stmt -> fetch();
            
            $stmt -> close();
            $stmt = null;
        }*/
	}