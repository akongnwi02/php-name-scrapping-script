<?php

function ping($config)
{
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
        CURLOPT_URL => $config->server_url.'/ping',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'x-api-key: '.$config->api_key,
            'x-api-version: v1'
        ),
    ));
    
    curl_exec($curl);
    
    if (!curl_errno($curl)) {
        switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
            case 200:  echo("INFO: Server is up!\n");
                break;
            default: echo sprintf("ERROR: Unexpected HTTP Status Code %s", $http_code);die;
        }
    } else {
        echo "ERROR: Server is down :( \n";die;
    }
    
    curl_close($curl);
}

function search($config, $number)
{
    $url = $config->server_url . '/lookup?cident='.$number;
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'x-api-key: '.$config->api_key,
            'x-api-version: v1'
        ),
    ));
    
    curl_exec($curl);
    
    curl_close($curl);
}