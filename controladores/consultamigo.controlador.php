<?php
define('codigo', 'vD9L90MFecktKQVRruIBfpg2Vfif4K7Szmq9inCFep3fWA6YTMjFfSVn5oNz');


function tipodecambio(): mixed
{

    $curl = curl_init();
    $data = [
        'token' => codigo
    ];
    $post_data = http_build_query($data);

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.migo.pe/api/v1/exchange/latest",
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
        return json_decode($response, true);
    }
}

function consultaruc($numeroruc): void
{

    $curl = curl_init();

    $data = [
        'token' => codigo,
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

        if ($resultado && $resultado["success"]) {
            if ($resultado["success"]) {
                echo  "<script>
                        Swal.fire({ 
                            title:	'Datos SUNAT:',
                            html: '<strong>RUC: </strong>' + '" . $resultado['ruc'] . "' + '<br>' +
                                    '<strong>Nombre o Razón Social: </strong>' + '" . $resultado['nombre_o_razon_social'] . "' + '<br>' +
                                    '<strong>Estado de Contribuyente: </strong>' + '" . $resultado['estado_del_contribuyente'] . "' + '<br>' +
                                    '<strong>Condición de Domicilio: </strong>' + '" . $resultado['condicion_de_domicilio'] . "' + '<br>' + 
                                    '<strong>Dirección: </strong>' + '" . $resultado['direccion'] . "' + '<br>' +
                                    '<strong>Distrito: </strong>' + '" . $resultado['distrito'] . "' + '<br>' +
                                    '<strong>Provincia: </strong>' + '" . $resultado['provincia'] . "' + '<br>' +
                                    '<strong>Departamento: </strong>' + '" . $resultado['departamento'] . "' + '<br>' +
                                    '<strong>Fecha de Actualización: </strong>' + '" . $resultado['actualizado_en'] . "' + '<br>' ,
                            
                            icon:	'success',
                            confirmButtonText:	'Ok'
                            }).then((result)=>{
                                if(result.value){
                                    window.location='consultaruc';
                                }
                            })
                        </script>";
            }
        } else {
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


function consultadni($numerodni): void
{
    $curl = curl_init();

    $data = [
        'token' => codigo,
        'dni' => $numerodni
    ];

    $post_data = http_build_query($data);

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.migo.pe/api/v1/dni",
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
        $resultado = json_decode($response, true);;
        if ($resultado) {
            if ($resultado["success"]) {
                echo  "<script>
                Swal.fire({ 
                title:	'Datos RENIEC:',
                html: '<strong>DNI: </strong>' + '" . $resultado['dni'] . var_dump($resultado) . "' + '<br>' +
                      '<strong>Nombre: </strong>' + '" . $resultado['nombre'] . "',
                
                icon:	'success',
                confirmButtonText:	'Ok'
                }).then((result)=>{
                    if(result.value){
                        window.location='consultadni';
                    }
                })
            </script>";
            }
        } else {
            echo  "<script>
                Swal.fire({
                title: 'Error!',
                text: '¡No se encontro ningun DNI con este numero!',
                icon: 'error',
                confirmButtonText: 'Ok'
                });
                </script>";
        }
    }
}
