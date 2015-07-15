<?php

//hook

class BaseController extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

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

//    //action before
    protected function _init(){
        header("Content-Type:text/html; charset=utf-8");
        //$this->rbac->run($this->getaccessRules());          //角色行为控制
    }
//
//    /**
//     * 基于用户角色的权限控制
//     */
//    protected function getaccessRules()
//    {
//        $this->accessRules['Module']    = $this->router['Module'];
//        $this->accessRules['Controller']= $this->router['Controller'];
//        $this->accessRules['Action']    = $this->router['Action'];
//        $this->accessRules['Isguest'] = 1;
//        $this->accessRules['rules']     = RULES();
//        $this->accessRules['behaviors'] =  $this->behaviors();
////        $this->res['IsAdmin'] = 1;
////        $this->res['groupid'] = 32;
////        $this->res['uname'] = 32;
//        return $this->accessRules;
//    }

//  扩展内容包括
//  内容包括
/**
 * 属性 ispost
 *
 * db
 * table
 * cache
 * user
 * router
 * input
 * model
 * library
 * helper
 * log
 * trace
 * cache
 * ldb
 * debug
 * S
 */

} 
