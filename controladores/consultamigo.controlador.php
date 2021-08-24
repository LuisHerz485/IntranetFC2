<?php



    function tipodecambio(){

        $curl = curl_init();

        $data = [
            
            'token' => 'jvmpi55cxYXITezZ6p1DHvgFNupBf7gauXGwp06ox1oIXRNdTbdz0sk2GesY'
            
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
            //var_dump($response, true);
            $resultado = json_decode($response, true);
            return $resultado;
            
        }
    
    

    }


    
    
    
    
?>