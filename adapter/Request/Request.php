<?php
namespace Adapter\Dispatch;

class Request
{
  static $code=1;
  static function fail(){
    Request::$code=0;
    return ;
  }
  static function success($data){
    Request::$code=1;
    return $data;
  }
}
