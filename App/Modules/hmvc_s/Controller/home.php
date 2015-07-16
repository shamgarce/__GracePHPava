<?php


/**
 * ?  “访客”
 * @  “已授权“
 */
class home extends BaseController {

    /**
     * 综合页
     */
    public function doIndex(){
        $this->Redirect('/s/home/login');
    }

    public function doMain()
    {
//        echo $this->user->islogin();
//        echo $this->user->isguest();
//        D( $this->user->getuserinfo());
//        echo $this->user->isadmin();




        $this->display('',[
            'title'=>'主界面'

        ]);
    }

    //退出登陆
    public function doSignout()
    {
        $this->model->UserModel->signout();
        $this->Redirect(C('userlogin'));
    }

    //denglu
    public function doLogin(){
        if($this->ispost){
            $this->model->UserModel->signin();
        }
        $this->display('',[
            'title'=>'登陆',
        ]);       //默认的index.php
    }

    //?ref=main.php

}
