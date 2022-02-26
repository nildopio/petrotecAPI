<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

try{

    $client = new Client( ['verify' => false,] );

    $headers = [
            'Cache-Control' => 'no-cache',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer [TOKEN]',
            'Accept-' => '*/*',
            'Accept-Encoding' => 'gzip, deflate, br',
            'Connection' => 'keep-alive',
            'Cookie' => 'XSRF-TOKEN=eyJpdiI6ImtMYlZGWlp6bnZPZExGRXM0SVFYb0E9PSIsInZhbHVlIjoiMHhWSmRtMmhGS29VNkVzZkNEczRPMXZKMU05ZTVXTjJIbkhrNld3T2FyeDBQSkJvQXlMUzhScVBwZDVMZUlVRnhaRmNubHdjU1hKV2NzTk5YRnM3Snkxd1R5NGlCSkU4aHdHdk5hMVpEOXk2cXM3K0hnM3N4aEVwRGxFQlRHZ00iLCJtYWMiOiIyOGM0M2MyZWQ4YzI5MGZmMGRhNjlhMDI2MDQ1ZmM3NGM3ZDI2NWJlOGI0MTJjN2RhMWY1NjQ0ZGUwMzRlODYxIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6Ikc5dDJaemZYQWJnaVpJcHU1dDJmM0E9PSIsInZhbHVlIjoiUU15NlgyLzc3VkV2Vk00aWdXWkRvY2NObUE5SjJDQzdCL0s1a1Voc3FUQU9QRWsrUlNrUUF2MGkvbEV5OHFKZWlnSUJQYzJTck1Ma1ZhVWNtS3lzUDc0cVpCRkdpVkdQZ1NxYjBGUW8xRzRkYVNNdmZDbUpqY0daaURtT0xYb1UiLCJtYWMiOiI5MjRkNTQxMzZkOTdkMzY5NGRjODNkNDA0MDg5ZmU5NDZjZmFhNjk3YzRjMDhjOTNmZGM0ODIzODhmNzQ2MmNlIiwidGFnIjoiIn0%3D',
        ];

    $body_sent = '{"posto":21,"nome_posto":"PV TESTE","serie":"A","numero_doc":2021452,"numero_venda":2078945,"data":"'.date("Y-m-d H:i:s").'","codigo_produto":1,"produto":"gasolina", "quantidade":45.2,"preco_unitario":145.7,"valor":12152.1,"nif":"123456789","nome":"Cliente Dois","morada":"Casa palha","mop":"123"}';

    $request = new Request('POST', 'https://api.enacol.cv/api/v1/transaction', $headers, $body_sent);

    $response = $client->send($request, ['timeout' => 2]);

    $code = $response->getStatusCode(); // 200

    if( $code == '200' )
    {
        $body = $response->getBody();
        // Implicitly cast the body to a string and echo it
        echo '<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Resposta da API</title>
</head>

<body>
<p>transação enviada:</p>'.$body_sent.'
<br />
<p>Resposta:</p>'.json_decode($body)->message.'
</body>

</html>';
        //echo $body;
    }

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}