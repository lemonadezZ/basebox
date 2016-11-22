<?php

function env($str){
  static $conf=null;
  if(is_null($conf)){
    $conf=include __ROOT__.'/conf/app.php';
  }
  return $conf[$str];
}
