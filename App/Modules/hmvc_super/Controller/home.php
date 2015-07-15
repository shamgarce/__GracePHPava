<?php


/**
 * ?  “访客”
 * @  “已授权“
 */
class home extends BaseController {

    public $islogin = false;
    public $isadmin = false;

    public function behaviors()
    {

        return [
            'access' => [
                'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['login', 'signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * 综合页
     */
    public function doIndex(){
        $data = [
            'title'=>'GracePHP',
        ];
        $this->display('',$data);       //默认的index.php
    }

    public function doObj(){
        $data = [
            'title'=>'GracePHP',
        ];
        $this->display('',$data);       //默认的index.php
    }


    /**
     * 综合页
     */
    public function doDis(){
        $data = [
            'title'=>'GracePHP',
        ];
        $this->display('',$data);       //默认的index.php
    }

    /**
     * 函数和常量
     */
    public function doFun(){
//        echo PATH;
        $data = [
            'te' => 'te1',
            'title'=>'GracePHP函数',
        ];
        $this->display('',$data);       //默认的index.php
    }


}
