<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'https://api.enacol.cv/api/v1/',
    // You can set any number of default request options.
    'timeout'  => 2.0,
]);

$headers = [
        'Cache-Control' => 'no-cache',
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer YwXxd4G3LDF56gVQx8SBpsF6E9I32h7InGjCAyIj',
        'Accept-' => '*/*',
        'Accept-Encoding' => 'gzip, deflate, br',
        'Connection' => 'keep-alive',
        'Cookie' => 'XSRF-TOKEN=eyJpdiI6ImtMYlZGWlp6bnZPZExGRXM0SVFYb0E9PSIsInZhbHVlIjoiMHhWSmRtMmhGS29VNkVzZkNEczRPMXZKMU05ZTVXTjJIbkhrNld3T2FyeDBQSkJvQXlMUzhScVBwZDVMZUlVRnhaRmNubHdjU1hKV2NzTk5YRnM3Snkxd1R5NGlCSkU4aHdHdk5hMVpEOXk2cXM3K0hnM3N4aEVwRGxFQlRHZ00iLCJtYWMiOiIyOGM0M2MyZWQ4YzI5MGZmMGRhNjlhMDI2MDQ1ZmM3NGM3ZDI2NWJlOGI0MTJjN2RhMWY1NjQ0ZGUwMzRlODYxIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6Ikc5dDJaemZYQWJnaVpJcHU1dDJmM0E9PSIsInZhbHVlIjoiUU15NlgyLzc3VkV2Vk00aWdXWkRvY2NObUE5SjJDQzdCL0s1a1Voc3FUQU9QRWsrUlNrUUF2MGkvbEV5OHFKZWlnSUJQYzJTck1Ma1ZhVWNtS3lzUDc0cVpCRkdpVkdQZ1NxYjBGUW8xRzRkYVNNdmZDbUpqY0daaURtT0xYb1UiLCJtYWMiOiI5MjRkNTQxMzZkOTdkMzY5NGRjODNkNDA0MDg5ZmU5NDZjZmFhNjk3YzRjMDhjOTNmZGM0ODIzODhmNzQ2MmNlIiwidGFnIjoiIn0%3D',
    ];

$body = '{"posto":21,"nome_posto":"PV TESTE","serie":"A","numero_doc":2021452,"numero_venda":2078945,"data":"2021/12/21 15:15","codigo_produto":1,"produto":"gasolina", "quantidade":45.2,"preco_unitario":145.7,"valor":12152.1,"nif":"123456789","nome":"Cliente Dois","morada":"Casa palha","mop":"123"}';

$request = new Request('POST', 'transaction', $headers, $body);

$response = $client->send($request, ['timeout' => 2]);

$code = $response->getStatusCode(); // 200
$reason = $response->getReasonPhrase(); // OK

// Check if a header exists.
if ($response->hasHeader('Content-Length')) {
    echo "It exists";
}

// Get all of the response headers.
foreach ($response->getHeaders() as $name => $values) {
    echo $name . ': ' . implode(', ', $values) . "\r\n";
}

if( $code == '200' )
{
    $body = $response->getBody();
    // Implicitly cast the body to a string and echo it
    echo $body;
}