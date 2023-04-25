<?php

    require("./v.ini.php");

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic U1d1VXFHd2JkampPNlZBcVNCQXhCMmxsQ0JmRzhiczQ6NFdkbjRtYlE4Z2pnYXlhUQ==',
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response);

    $access_token = $result->access_token;
    //echo $access_token;

?>