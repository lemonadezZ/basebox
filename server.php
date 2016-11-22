<?php

include 'include.php';

echo env('debug');
$apiGateway = new Swoole\Http\Server("0.0.0.0",8081);

$apiGateway->set(include './conf/local/server.php');

$apiGateway->on('Request',function($req,$res){
    $res->end('apigateway');
});

$apiGateway->start();

