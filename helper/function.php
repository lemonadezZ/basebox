<?php

function env($str){
  static $conf=null;
  if(is_null($conf)){
    //加载默认配置文件
    $defaultconf=include __CONF__.'/app.php';
    //加载当前环境配置文件
    $envconf=include __CONF__.'/'.$defaultconf['environment'].'/app.php';
    $conf=array_merge($defaultconf,$envconf);
  }
  return $conf[$str];
}

function dd($p){
  print_r($p);
}

function logstr($p){
}
