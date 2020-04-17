<?php
// [TODO] Copiare risultato del browser su http://json.parser.online.fr/


$result = getToken();
$json = json_decode($result, true);
$access_token = $json["access_token"];
$token_type = $json["token_type"];

echo $access_token;

/* Examples of usage */
//echo getResult("/v1/search?q=top&type=playlist&market=IT",$token_type, $access_token);
//echo "<hr>";
//echo getResult("/v1/search?q=top%2020&type=playlist",$token_type, $access_token);
//echo "<hr>";
//echo getResult("/v1/search?q=global&type=playlist",$token_type, $access_token);
//echo "<hr>";
//echo getResult("/v1/search?q=carlbrave&type=playlist",$token_type, $access_token);
//echo "<hr>";
//echo getResult("/v1/browse/categories",$token_type, $access_token);
//echo "<hr>";
//echo getResult("/v1/browse/new-releases",$token_type, $access_token);
//echo "<hr>";
//echo getResult("/v1/recommendations",$token_type, $access_token);
//echo "<hr>";
//echo getResult("/v1/browse/featured-playlists",$token_type, $access_token);
//echo "<hr>";

/*
    $json = json_decode($result,true); // true, create an associative array
*/

/* [TODO] Parse with json_decode for access_token, token_type, etc.. */
/* Return a json string with Spotify application token */
function getToken(){
    /* Spotify Application Client ID and Secret Key */
    $client_id     = 'a351932160f74239bb1a1459e88819f7';
    $client_secret = 'cc456cf809e64324a526cc27fad02063';

    /* Get Spotify Authorization Token */
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


/* get a spotify _endpoint, a _token_type and an _access_token */
/* return a JSON string with the query's result */
/* [TODO] for simple decode go to http://json.parser.online.fr/ */

function getResult($endpoint, $token_type, $access_token){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,            'https://api.spotify.com'.$endpoint );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Authorization: '.$token_type.' '.$access_token));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}






?>