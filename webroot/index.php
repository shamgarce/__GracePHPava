<?php
/**
 * https://github.com/shampeak/GracePhp
 */

error_reporting(E_ALL ^ E_NOTICE);      //抑制错误
include '../Grace/GracePHP.class.php';
$config = ['APP_PATH'    => '../App/'];
GracePHP::getInstance($config)->run();



