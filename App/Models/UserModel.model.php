<?php

/**
 * 用户模型
 * 添加 ->signup($res)
 * 登陆 ->signin($res)
 * 登出 ->signout($res)
 *
 */
class UserModel extends Model
{


    public function signin($parmas=array())
    {
        //$dc = $this->S->user->signin($this->post['uname'],$this->post['pwd'])->json();            //查看操作json
        $this->S->user->signin($this->post['uname'],$this->post['pwd']);
        St::AjaxReturn();
    }

    public function signout()
    {
        return $this->S->user->signout();
    }



//    public function __construct(){
//        parent::__construct();
//    }
//
//    public function _init()
//    {
//        $this->get = \Seter\Seter::getInstance()->request->get;
//        $this->post = \Seter\Seter::getInstance()->request->post;
//        $this->cookie = \Seter\Seter::getInstance()->request->cookie;
//    }
//
//    public function AjaxReturn()
//    {
//        echo json_encode($this->json);
//        exit;
//    }










//+=========================================================
//状态
//+=========================================================

    public function DefaultCoderes()
    {
        return [
            '0'     => 'ini',
            '200'   => '操作成功',
        ];
    }

//+=========================================================
//+=========================================================
//状态返回 下面内容
//+=========================================================
//+=========================================================
//    public function jsoncode($code = 0)
//    {
//        $this->json = [
//            'code'  => $code,
//            'msg'   => $this->DefaultCoderes()[$code]
//        ];
//        return true;
//    }
//
//
//    //结果输出修饰
//    //返回操作结果    或者      给结果赋值
//    public function res($data = '')
//    {
//        if(!empty($data))  $this->json['data'] = $data;
//        return $this->json['data'];
//    }
//
//    //返回json数组
//    public function json()
//    {
//        return $this->json;
//    }
//
//    //返回json串
//    public function AjaxReturn()
//    {
//        echo json_encode($this->json);
//        exit;
//    }
//
//    //返回操作bool
//    public function bool()
//    {
//        return intval($this->json['code']>0)?true:false;
//        exit;
//    }

}
