<?php
define('codigo', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InNpc3RlbWFzLmZjY29udGFkb3Jlc0BnbWFpbC5jb20ifQ.hBw8HgualxM1Tp9Qw1RM23cB0D7iueaUWTW1A4hAP1M');

function consultaruc($numeroruc): void
{
    $curl = curl_init();

    $data = [
        'token' => codigo,
        'ruc' => $numeroruc
    ];

    $post_data = http_build_query($data);

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://dniruc.apisperu.com/api/v1/ruc/" . $data['ruc'] . "?token=" . $data['token'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_SSL_VERIFYPEER => false,
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

        if ($resultado) {
            echo  "<script>
                        Swal.fire({ 
                            title:	'Datos SUNAT:',
                            html: '<strong>RUC: </strong>' + '" . $resultado['ruc'] . "' + '<br>' +
                                    '<strong>Nombre o Razón Social: </strong>' + '" . $resultado['razonSocial'] . "' + '<br>' +
                                    '<strong>Distrito: </strong>' + '" .  $resultado['distrito'] . "' + '<br>' + 
                                    '<strong>Provincia: </strong>' + '" . $resultado['provincia'] . "' + '<br>' + 
                                    '<strong>Departamento: </strong>' + '" . $resultado['departamento'] . "' + '<br>' + 
                                    '<strong>Direccion Completa: </strong>' + '" . $resultado['direccion'] . "' + '<br>' + 
                                    '<strong>Estado de Contribuyente: </strong>' + '" . $resultado['estado'] . "' + '<br>' + 
                                    '<strong>Condición de Domicilio: </strong>' + '" . $resultado['condicion'] . "' + '<br>' ,
                            icon:	'success',
                            confirmButtonText:	'Ok'
                            }).then((result)=>{
                                if(result.value){
                                    window.location='consultaruc';
                                }
                            })
                        </script>";
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
        CURLOPT_URL => "https://dniruc.apisperu.com/api/v1/dni/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_SSL_VERIFYPEER => false,
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
            echo  "<script>
                Swal.fire({ 
                title:	'Datos RENIEC:',
                html: '<strong>DNI: </strong>' + '" . $resultado['dni'] . var_dump($resultado) . "' + '<br>' +
                      '<strong>Nombre Completo: </strong>' + '" . $resultado['apellidoPaterno'] . " " . $resultado['apellidoMaterno'] . "," . $resultado['nombre'] . "',
                icon:	'success',
                confirmButtonText:	'Ok'
                }).then((result)=>{
                    if(result.value){
                        window.location='consultadni';
                    }
                })
            </script>";
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

function ConsulraRuc_razonSocial($numeroruc): string
{
    $curl = curl_init();

    $data = [
        'token' => codigo,
        'ruc' => $numeroruc
    ];

    $post_data = http_build_query($data);

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://dniruc.apisperu.com/api/v1/ruc/" . $data['ruc'] . "?token=" . $data['token'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_SSL_VERIFYPEER => false,
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return  "cURL Error #:" . $err;
    } else {
        //echo $response;
        $resultado = json_decode($response, true);
        return $resultado['razonSocial'];
    }
}
