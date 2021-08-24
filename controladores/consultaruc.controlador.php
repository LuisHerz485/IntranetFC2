<?php

function consultaruc($numeroruc){
        
    $curl = curl_init();
   
    $data = [
        'token' => 'jvmpi55cxYXITezZ6p1DHvgFNupBf7gauXGwp06ox1oIXRNdTbdz0sk2GesY',
        'ruc' => $numeroruc
    ];

    $post_data = http_build_query($data);

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.migo.pe/api/v1/ruc",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $post_data,
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
     //echo $response;
     $resultado = json_decode($response, true);
     //var_dump($resultado);
     
     if($resultado){
        echo  "<script>
        Swal.fire({ 
            title:	'Datos SUNAT:',
            html: '<strong>RUC: </strong>' + '".$resultado['ruc']."' + '<br>' +
                    '<strong>Nombre o Razon Social: </strong>' + '".$resultado['nombre_o_razon_social']."' + '<br>' +
                    '<strong>Estado de Contribuyente: </strong>' + '".$resultado['estado_del_contribuyente']."' + '<br>' +
                    '<strong>Condicion de Domicilio: </strong>' + '".$resultado['condicion_de_domicilio']."' + '<br>' + 
                    '<strong>Direccion: </strong>' + '".$resultado['direccion']."' + '<br>' +
                    '<strong>Distrito: </strong>' + '".$resultado['distrito']."' + '<br>' +
                    '<strong>Provincia: </strong>' + '".$resultado['provincia']."' + '<br>' +
                    '<strong>Departamento: </strong>' + '".$resultado['departamento']."' + '<br>' +
                    '<strong>Fecha de Actualizacion: </strong>' + '".$resultado['actualizado_en']."' + '<br>' ,
            
            icon:	'success',
            confirmButtonText:	'Ok'
            }).then((result)=>{
                if(result.value){
                    window.location='consulta';
                }
            })
        </script>";
        

     }else{
        echo  "<script>
        Swal.fire({
        title: 'Error!',
        text: '¡No se encontro ningun RUC con este numero!',
        icon: 'error',
        confirmButtonText: 'Ok'
        });
        </script>";

        
     }

    
    }


}

?>