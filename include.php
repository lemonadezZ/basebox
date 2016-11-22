<?php
define ('__ROOT__',__DIR__);
define ('__CONF__',__ROOT__.'/conf');
include __ROOT__.'/helper/function.php';
define ('__ENV__',__CONF__.'/'.env('environment'));
include 'vendor/autoload.php';
