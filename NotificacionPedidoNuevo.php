<?php
//TOKEN QUE NOS DA FACEBOOK
$token = 'EAAR3sCL6qRoBACSsbgdjDiAJjt6fjBUuRTZBrXDZCDQJuyUPOZBZCAzoBKvShjYny1ZBv4ZCsq76p8HCeIjZB584B2K51Hmn19qa8YsqZBQccAQp7hW5D0mK11elsSpSEwHHOuQZCIhfZAFCqLkxL9lEOdZCkHumnCncFPP1lcLA3qPpvML1Px3OgU2qArdkELq060ZBoC6kCtU8MgZDZD';
//NUESTRO TELEFONO
$telefono = '573137917541';
//URL A DONDE SE MANDARA EL MENSAJE
$url = 'https://graph.facebook.com/v16.0/101733012575647/messages';

//CONFIGURACION DEL MENSAJE
$mensaje = ''
    . '{'
    . '"messaging_product": "whatsapp", '
    . '"to": "' . $telefono . '", '
    . '"type": "template", '
    . '"template": '
    . '{'
    . '     "name": "hello_world",'
    . '     "language":{ "code": "en_US" } '
    . '} '
    . '}';
//DECLARAMOS LAS CABECERAS
$header = array("Authorization: Bearer " . $token, "Content-Type: application/json",);
//INICIAMOS EL CURL
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POSTFIELDS, $mensaje);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//OBTENEMOS LA RESPUESTA DEL ENVIO DE INFORMACION
$response = json_decode(curl_exec($curl), true);
//IMPRIMIMOS LA RESPUESTA 
print_r($response);
//OBTENEMOS EL CODIGO DE LA RESPUESTA
$status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//CERRAMOS EL CURL
curl_close($curl);
