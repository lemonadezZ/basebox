#!/usr/bin/env php
<?php

include './vendor/autoload.php';

define ('__ENV__',__CONF__.'/'.conf('environment'));

$apiGateway = new Swoole\Http\Server(conf('bind_address'),conf('port'));

//api 设置
$apiGateway->set(include __ENV__.'/server.php');

//启动服务
$apiGateway->on('Start',function()use($apiGateway){
  file_put_contents(__ROOT__.'/tmp/master_pid',$apiGateway->master_pid);
});
//关闭服务
$apiGateway->on('Shutdown',function()use($apiGateway){
  unlink(__ROOT__.'/tmp/master_pid');
});

//开始调度监听
$apiGateway->on('Request',function($req,$res){
//  var_dump($req->server['request_method']);
  logstr($req->server['request_method'].' '.$req->server['request_uri']);
    $data=[];
    $data=Api\V0\User::Get();
    $res->end($data);
});

if(conf('debug')){
  logstr("启动前预处理");
  include __ROOT__.'/prestart.php';
  logstr("启动服务器".conf('bind_address').':'.conf('port')."");
  logstr("预览:".conf('server').':'.conf('port')."");
}
//启动服务器
$apiGateway->start();

