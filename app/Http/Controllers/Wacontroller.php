<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Wacontroller extends Controller
{
    public function enviar(){
       
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://graph.facebook.com/v15.0/101085519599774/messages',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "messaging_product": "whatsapp",
    "to": "573217513641",
    "type": "template",
    "template": {
        "name": "hello_world",
        "language": {
            "code": "en_US"
        }
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer EAABeVhzB3iMBAGOiHovWua765mYnzMF7AZBeoQdNECZAonsCddkZCCfThIZBc9hpZBrMtnX598VGZCC2auoDVvfd84J8jE4de2PBvRb80FztpnIOH7W455Tj1Ec98MpOJgydgicbYjnkWYCHiAEaszPputWVws1UCIhNuFjXUGqlVlHLWfmdKNlYWqvZAkKbvriB0q9jqbOBQZDZD'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

    }
}
