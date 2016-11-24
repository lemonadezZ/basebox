<?php
namespace Adapter\Response;

class Response
{
  static $code=1;
  static $body="";
  static function fail($msg=""){
    return self::encode(['code'=>1,'msg'=>$msg]);
  }
  static function success($data=""){ 
    return self::encode(['code'=>0,'data'=>$data]);
  }
  static function encode($body){
    return json_encode($body);
  }
}
