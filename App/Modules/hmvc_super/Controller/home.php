<?php


/**
 * ?  “访客”
 * @  “已授权“
 */
class home extends BaseController {

    public $islogin = false;
    public $isadmin = false;



    /**
     * 综合页
     */
    public function doIndex(){
        $data = [
            'title'=>'GracePHP',
        ];
        $this->display('',$data);       //默认的index.php
    }

    public function doLogin(){
        $this->display('',[
            'title'=>'登陆',
        ]);       //默认的index.php
    }

    //?ref=main.php

}
