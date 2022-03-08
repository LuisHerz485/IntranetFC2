<?php

header('Content-Type: application/json');
$link = new PDO("mysql:host=147.135.6.159;dbname=fccontad_intranet_fc_dev", "fccontad", "l2WDJ3@@bI2_X4gVQ?112189");

$accion=(isset($_GET['accion']))?$_GET['accion']:'leer';
switch($accion){
    case'agregar':
        //instrucciones para agregar
        $sentenciaSQL=$link->prepare("INSERT INTO eventos (title,descripcion,color,textColor,start,end) 
        VALUES (:title,:descripcion,:color,:textColor,:start,:end)");
        $respuesta = $sentenciaSQL->execute(array(
            "title"=>$_POST['title'],
            "descripcion"=>$_POST['descripcion'],
            "color"=>$_POST['color'],
            "textColor"=>$_POST['textColor'],
            "start"=>$_POST['start'],
            "end"=>$_POST['end']
        ));
        echo json_encode($respuesta);
        break;
    case 'eliminar':

            // Instruccion de eliminar
            $respuesta = false;
    
            // Si durante la ejeccion del codigo se ha enviado correctamente el ID
            if(isset($_POST['id'])){
                // Si, actualizacion y eliminacion en la BD
                // :ID valor reemplazable dentro de la sentencia SQL
                $sentenciaSQL = $link->prepare("DELETE FROM eventos where ID=:ID");
    
                $respuesta = $sentenciaSQL->execute(array("ID"=>$_POST['id']));
            }
    
            // Si esta respuesta es verdadera el calendario se va a actualizar de manera inmediata
            echo json_encode($respuesta);
    
            break;
    
    case 'modificar':
    
            // Instruccion de modificar
            // Actualiza la tabla eventos asignando los siguientes valores:
            $sentenciaSQL = $link->prepare("UPDATE eventos SET
                title = :title,
                descripcion = :descripcion,
                color = :color,
                textColor = :textColor,
                start = :start,
                end = :end
                WHERE ID = :ID
            ");
    
            $respuesta = $sentenciaSQL->execute(array(
                "ID" => $_POST['id'],
                "title" => $_POST['title'],
                "descripcion" => $_POST['descripcion'],
                "color" => $_POST['color'],
                "textColor" => $_POST['textColor'],
                "start" => $_POST['start'],
                "end" => $_POST['end']
            ));
    
            echo json_encode($respuesta);
    
            break;
    default:
    //seleecionar todos los eventos
        $sentenciaSQL=$link->prepare("SELECT * FROM eventos");
        $sentenciaSQL->execute();

        $resultado=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
    
        break;

}




?>