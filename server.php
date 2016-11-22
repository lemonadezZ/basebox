#!/usr/bin/env php
<?php

include 'include.php';

$apiGateway = new Swoole\Http\Server(env('bind_address'),env('port'));

//api 设置
$apiGateway->set(include __ENV__.'/server.php');

//开始调度监听
$apiGateway->on('Request',function($req,$res){
    $res->end('apigateway'.date('Y-m-d H:i:s',time()));
});

if(env('debug')){
  echo "[".date('Y-m-d H:i:s',time())."] 启动服务器".env('bind_address').':'.env('port')."\n";
}
//启动服务器
$apiGateway->start();

