<?php

require_once("autoload.php");


$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
$parameters = [
  'start' => '1',
  'limit' => '25',
  'convert' => 'USD'
];

$headers = [
  'Accepts: application/json',
  'X-CMC_PRO_API_KEY: TU CLAVE DE COINMARKETCAP'
];
$qs = http_build_query($parameters); // query string encode the parameters
$request = "{$url}?{$qs}"; // create the request URL


$curl = curl_init(); // Get cURL resource
// Set cURL options
curl_setopt_array($curl, array(
  CURLOPT_URL => $request,            // set the request URL
  CURLOPT_HTTPHEADER => $headers,     // set the headers 
  CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
));

$response = curl_exec($curl); // Send the request, save the response

$data = json_decode($response,true); // almacenamos la data

curl_close($curl); // Close request


$objdata = new criptomoneda();

$code = $objdata->createCode(6);

$objdata->insControl($code);
// Aqui guardamos 20 registros en la base de datos, pueden guardarse todos los disponibles en coinmarketcap
// actualmente hay mas de 5k de criptomonedas registradas, tambien se puede cambiar la data que se quiera almacenar    
for ($i=0; $i<=19; $i++) {
    $rank = $data['data'][$i]["cmc_rank"];
    $nombre = $data['data'][$i]["name"];
    $simbolo =$data['data'][$i]["symbol"];
    $max_supply =$data['data'][$i]["max_supply"];
    $precio =$data['data'][$i]['quote']['USD']["price"];
    $circulante =$data['data'][$i]["circulating_supply"];
    $vol24hr =$data['data'][$i]['quote']['USD']["volume_24h"];
    $cambio1hr=$data['data'][$i]['quote']['USD']["percent_change_1h"];
    $dominancia = $data['data'][$i]['quote']['USD']["market_cap_dominance"];
    $capitalizacion = $data['data'][$i]['quote']['USD']["market_cap"];

    
    if (empty($max_supply)){
        $max_supply = 0;
    }

    $strInsert = $objdata->insCripto($code, $rank, $nombre, $simbolo, $max_supply, $precio, $circulante, $vol24hr, $cambio1hr, $capitalizacion, $dominancia);

    $max_supply = "";
    echo $nombre."  ".$strInsert."<br><br>";

}




?>