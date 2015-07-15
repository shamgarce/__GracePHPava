<?php
/**
 * https://github.com/shampeak/GracePhp
 */


include '../Grace/GracePHP.class.php';
//echo truepath('a/Doc/');
$config = ['APP_PATH'    => '../App/'];
GracePHP::getInstance($config)->run();
/**
 * will delete
  model
  library
  helper
  widget

 * 这四个会检查hmvc目录，如果不存在则递归到根目录上
 *
 * */

