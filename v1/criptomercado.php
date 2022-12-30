<?php
$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
$parameters = [
  'start' => '1',
  'limit' => '25',
  'convert' => 'USD'
];

$headers = [
  'Accepts: application/json',
  'X-CMC_PRO_API_KEY: TU_CLAVE_API_DE_COINMARKETCAP'
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

// Una vez que tenemos la data, vamos a recorrer el array para tomar los datos que nos interesan
// la estructura del array es la siguiente:
//[0] => stdClass Object
//                (
//                    [id] => 1
//                    [name] => Bitcoin
//                    [symbol] => BTC
//                    [slug] => bitcoin
//                    [num_market_pairs] => 9904
//                    [date_added] => 2013-04-28T00:00:00.000Z
//                    [tags] => Array
//                        (
//                           [0] => mineable
//                            [1] => pow
//                            [2] => sha-256
//                            [3] => store-of-value
//                            [4] => state-channel
//                            [5] => coinbase-ventures-portfolio
//                            [6] => three-arrows-capital-portfolio
//                            [7] => polychain-capital-portfolio
//                            [8] => binance-labs-portfolio
//                            [9] => blockchain-capital-portfolio
//                            [10] => boostvc-portfolio
//                            [11] => cms-holdings-portfolio
//                            [12] => dcg-portfolio
//                            [13] => dragonfly-capital-portfolio
//                            [14] => electric-capital-portfolio
//                            [15] => fabric-ventures-portfolio
//                            [16] => framework-ventures-portfolio
//                            [17] => galaxy-digital-portfolio
//                            [18] => huobi-capital-portfolio
//                            [19] => alameda-research-portfolio
//                            [20] => a16z-portfolio
//                            [21] => 1confirmation-portfolio
//                            [22] => winklevoss-capital-portfolio
//                            [23] => usv-portfolio
//                            [24] => placeholder-ventures-portfolio
//                            [25] => pantera-capital-portfolio
//                            [26] => multicoin-capital-portfolio
//                            [27] => paradigm-portfolio
//                        )
//
//                    [max_supply] => 21000000
//                    [circulating_supply] => 19241450
//                    [total_supply] => 19241450
//                    [platform] => 
//                    [cmc_rank] => 1
//                    [self_reported_circulating_supply] => 
//                    [self_reported_market_cap] => 
//                    [tvl_ratio] => 
//                    [last_updated] => 2022-12-23T14:03:00.000Z
//                    [quote] => stdClass Object
//                        (
//                            [USD] => stdClass Object
//                                (
//                                    [price] => 16858.085711622
//                                   [volume_24h] => 17476879151.361
//                                    [volume_change_24h] => 22.3723
//                                    [percent_change_1h] => -0.11191323
//                                    [percent_change_24h] => 0.39690505
//                                    [percent_change_7d] => -0.6997075
//                                    [percent_change_30d] => 2.64541658
//                                    [percent_change_60d] => -12.87344049
//                                    [percent_change_90d] => -11.85745568
//                                    [market_cap] => 324374013315.9
//                                    [market_cap_dominance] => 39.8973
//                                    [fully_diluted_market_cap] => 354019799944.07
//                                    [tvl] => 
//                                    [last_updated] => 2022-12-23T14:03:00.000Z
//                                )
//
//                        )
//
//                )


// nos conectamos a la BDD
require_once('conexDBB.php');

//Como vamos a grabar la informacion en bloques de 20 filas y para evitar errores, creare un codigo aleatorio
//el cual vinculare con cada registro en bloque, cuando haga la consultam reviso ese codigo y hago el llamdo
//a todos los registros que coincidan

function codigo($length = 10) { 
  return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
} 

$codigo = codigo();
$fecha = date('Y/m/d');


$sql =mysqli_query($conexion, "INSERT INTO `ccat` (codigo, fecha) 
							     values ('$codigo','$fecha')");


//Comienzo el recorrido por el array y almaceno la informacion en la base de datos
for ($i=0; $i<=19; $i++) {
    $rank = $data['data'][$i]["cmc_rank"];
    $nombre = $data['data'][$i]["name"];
    $simbolo =$data['data'][$i]["symbol"];
    $max_supply =$data['data'][$i]["max_supply"];
    $precio =$data['data'][$i]['quote']['USD']["price"];
    $vol24hr =$data['data'][$i]['quote']['USD']["volume_24h"];
    $cambio1hr=$data['data'][$i]['quote']['USD']["percent_change_1h"];
    $dominancia = $data['data'][$i]['quote']['USD']["market_cap_dominance"];
    $capitalizacion = $data['data'][$i]['quote']['USD']["market_cap"];

    $sql1 =mysqli_query($conexion, "INSERT INTO `criptomercado` (codigo, rank,	nombre,	simbolo,	max_supply,	precio,	volumen24h,	cambio1hr,	marketcap,	dominancia) 
							     values ('$codigo','$rank', '$nombre', '$simbolo', '$max_supply', '$precio', '$vol24hr', '$cambio1hr', '$capitalizacion', '$dominancia')");

//Cuando se active la ejecución automatica eliminar esta linea
echo $nombre, " ha sido almacenado con exito <br><br>";

}
mysqli_close($conexion);
?>