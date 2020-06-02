<?php
// acquisisce da spotify il token per fare richieste agli endpoint

$result = getToken();
$json = json_decode($result, true);
$access_token = $json["access_token"];
$token_type = $json["token_type"];

echo $access_token;

/*
* Ritorna un token Spotify per l'accesso ai servizi
*/
function getToken(){
    /* Spotify API client id e secret */
    $client_id     = 'a351932160f74239bb1a1459e88819f7';
    $client_secret = 'cc456cf809e64324a526cc27fad02063';

    /* Richiesta curl*/
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,            'https://accounts.spotify.com/api/token' );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt($ch, CURLOPT_POST,           1 );
    curl_setopt($ch, CURLOPT_POSTFIELDS,     'grant_type=client_credentials' );
    curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret)));

    $result=curl_exec($ch);
    curl_close($ch);

    return $result;
}
