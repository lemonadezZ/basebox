#!/usr/bin/env php
<?php

include 'include.php';

$apiGateway = new Swoole\Http\Server(env('bind_address'),env('port'));

//api 设置
$apiGateway->set(include __ENV__.'/server.php');

//开始调度监听
$apiGateway->on('Request',function($req,$res){
//  var_dump($req->server['request_method']);
  logstr($req->server['request_method'].' '.$req->server['request_uri']);
    $res->end('apigateway'.date('Y-m-d H:i:s',time()));
});

if(env('debug')){
  logstr("启动前预处理");
  include __ROOT__.'/prestart.php';
  logstr("启动服务器".env('bind_address').':'.env('port')."");
}
//启动服务器
$apiGateway->start();

