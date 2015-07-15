<?php
/**
//$this->S->user()->login();
//$this->S->user()->logout();
//$this->S->user()->regsign();
//$this->S->user()->islogin();
//$this->S->user->login('irones','irones');
//echo $this->user->isguest();
//print_r($this->S->jsonarr);
 */
namespace Seter\Library;
//用户模型
/*
 * 暂时的功能局限到获取自己的信息
 * //========================================
    ->regsign("username",$usinfo)   //注册新用户
    ->ver("user","password")        //验证用户是否正确
    ->delete("username")            //删除用户
    ->changepwassword("username","newpassword") //更改密码
    ->editinfo($res) //更改密码
    ->logout()    登出
    ->info()      获取用户信息
    ->groupinfo()
    ->isguest()
    ->isadmin()
    ->viewtable()
 * */
class User
{

//    public $loginurl    = '/u/home.login';
//    public $logout      = '/u/home.loginout';
//    public $logingo     = '/u/home.index';
    /*
     * =============================================================
     *     //针对当前用户
     * =============================================================
     * */
    public $tablename = '';
    public $uid = '';

    public $fileduname = '';     //'uname';
    public $filedtname = '';      //'tname';
    public $filedpwd = '';  //'pwd';
    public $filedauthkey = '';

    public $filedgroupid = '';
    public $filedenable = '';
    public $filedaccessToken = '';

    public $filedloginip = '';//'logip';
    public $filedlogintm = '';//'logtime';
    public $filedregtime = '';//'logtime';

    //* =============================================================
    //this for person
//    public $identity = array();
    public $isguest = true;
    public $isadmin = false;

    public $row = [];

    public $jsonarr = [];

//
//
//    public function test()
//    {
//        //echo $this->fileduname;
//    }

    public function UserDefaultField()
    {
        return [
            'tablename' => 'dy_user',
            'uid' => 'uid',
            'fileduname' => 'uname',
            'filedtname' => 'tname',
            'filedpwd' => 'pwd',
            'filedauthkey' => 'authkey',            //组织不同系统用户
            'filedgroupid' => 'groupid',
            'filedenable' => 'enable',
            'filedaccessToken' => 'accessToken',    //授权
            'filedloginip' => 'logip',
            'filedlogintm' => 'logtime',
            'filedregtime' => 'regtime',
        ];
    }

    public function __construct()
    {
        $this->S = \Seter\Seter::getInstance();
        $userfield = C('User')['UserField']?:[];
        $field = array_merge($this->UserDefaultField(), $userfield);
        foreach ($field as $key => $value) {
            $this->$key = $value;
        }
        $this->isguest = $this->isguest();          //是否访客【未登录】
        $this->islogin = $this->islogin();          //是否登陆
        $this->isadmin = $this->isadmin();          //是否管理员
        $this->myinfo = $this->myinfo();            //我的信息
    }


    public function regsign($regsign = array())
    {

    }



    //登陆
    public function login($uname,$pwd)
    {
        $tablename = $this->tablename;
        if($this->Isnotempty($uname) && $this->Isnotempty($pwd)){
           // D($row);
            $this->checkname($uname);
            $row = $this->row;
            if(empty($row)){
                $this->jsonarr = array(
                    'code'=>-200,
                    'msg'=>'户名不存在',
                );
                return false;
            }else{
                if($row[$this->filedpwd] == $this->passwordhash($pwd)){
                    //禁用的用户
                    if($row[$this->filedenable]!=1){
                        $this->jsonarr = array(
                            'code'=>-200,
                            'msg'=>'无效用户',
                        );
                        return false;
                    }
                    //更改登陆信息
                    $ar = array(
                        $this->filedlogintm  =>  \GetIP(),
                        $this->filedregtime  =>  \T(),
                    );
                    //更改数据库激励
                    $this->S->table->$tablename->where($this->fileduname." = '{$uname}'")->update($ar);
                    //日志记录

                    //dolog
                    //算法验证保证COOKIE安全
                    //$filedauthkey  $filedgroupid
                    // 604800 = 7*24*60*60
                    //路径 //可以通用
                    $tm = time();
                    $signature = $this->signnature($row[$this->fileduname].$row[$this->filedtname].$row[$this->filedauthkey].$row[$this->filedgroupid].$tm);;
                    setCookie('vuser_uname',$row[$this->fileduname],$tm+604800,'/');
                    setCookie('vuser_tname',$row[$this->filedtname],$tm+604800,'/');
                    setCookie('vuser_authkey',$row[$this->filedauthkey],$tm+604800,'/');
                    setCookie('vuser_groupid',$row[$this->filedgroupid],$tm+604800,'/');
                    setCookie('vuser_tm',$tm,$tm+604800,'/');                     //记录时间
                    setCookie('vuser_signature',$signature,$tm+604800,'/');      //签名算法
                    return true;
                }else{
                    $this->jsonarr = array(
                        'code'=>-200,
                        'msg'=>'密码错',
                    );
                    return false;
                }


            }
        }else{
            $this->jsonarr = array(
                'code'=>-200,
                'msg'=>'用户名密码不能为空',
            );
            return false;
        }
    }


    //登出
    public function logout()
    {
        $tm = time();
        setCookie('vuser_uname',$this->fileduname,$tm-1,'/');
        setCookie('vuser_tname',$this->filedtname,$tm-1,'/');
        setCookie('vuser_authkey',$this->filedauthkey,$tm-1,'/');
        setCookie('vuser_groupid',$this->filedgroupid,$tm-1,'/');
        setCookie('vuser_tm',$tm,$tm-1,'/');                     //记录时间
        setCookie('vuser_signature','1234',$tm-1,'/');      //签名算法
        return true;
    }

    /**
     * 验证用户名秒是否正确
     */
//    public function Validator()
//    {
//        return true;
//    }

    /**
     * @return mixed
     * 获取我的用户信息
     */
    public function myinfo()
    {
        $uname = \Sham::saddslashes($this->S->request->cookie['vuser_uname']);
        $this->checkname($uname);
        $row = $this->row;
        unset($row[$this->filedpwd]);
        return $row;
    }

    public function islogin()
    {
        $uname      = $this->S->request->cookie['vuser_uname'];
        $tname      = $this->S->request->cookie['vuser_tname'];
        $authkey    = $this->S->request->cookie['vuser_authkey'];
        $groupid    = $this->S->request->cookie['vuser_groupid'];
        $tm         = $this->S->request->cookie['vuser_tm'];             //记录时间
        $signature  = $this->S->request->cookie['vuser_signature'];      //签名算法
        if($signature == $this->signnature($uname.$tname.$authkey.$groupid.$tm)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @return bool
     * 是否访客
     */
    public function isguest()
    {
        return !$this->islogin();
    }

    /**
     * @return bool是否管理员
     */
    public function isadmin()
    {
        if($this->isguest()){
            return false;
        }else{
            $groupid    = $this->S->request->cookie['vuser_groupid'];
            $ar = C('User')['AdminGroupid']?:[];
            if(in_array($groupid,$ar)){
                return true;
            }else{
                return false;
            }
        }
        return false;
    }


    //是否空 存在返回true
    public function Isnotempty($str)
    {
        if(empty($str)){
            return false;
        }else{
            return true;
        }
    }

    public function passwordhash($password = '')
    {
        return $password;
    }

    /**
     * @param string $uname
     * 监测用户名是否存在
     */
    public function checkname($uname = '')
    {
        $uname = \Sham::saddslashes($uname);
        $tablename = $this->tablename;
        $row = $this->S->table->$tablename->where($this->fileduname." = '{$uname}'")->getrow();
        $this->row = $row;
    }

    //签名验证
    public function signnature($tr = '')
    {
        return md5(md5(md5(md5($tr))));
    }



    //用户表标准格式
    public function columns()
    {
        /*
mysql> show columns from dy_user;
+-------------+-------------+------+-----+---------+----------------+
| Field       | Type        | Null | Key | Default | Extra          |
+-------------+-------------+------+-----+---------+----------------+
| uid         | int(11)     | NO   | PRI | NULL    | auto_increment |
| uname       | varchar(32) | NO   | MUL | NULL    |                |
| tname       | varchar(32) | YES  |     | NULL    |                |
| pwd         | varchar(32) | YES  |     | NULL    |                |
| groupid     | int(11)     | YES  | MUL | NULL    |                |
| authkey     | varchar(64) | YES  |     | NULL    |                |
| accessToken | varchar(64) | YES  |     | NULL    |                |
| logtime     | int(11)     | YES  |     | NULL    |                |
| logip       | varchar(32) | YES  |     | NULL    |                |
| enable      | tinyint(1)  | YES  | MUL | 1       |                |
| regtime     | int(11)     | YES  |     | NULL    |                |
+-------------+-------------+------+-----+---------+----------------+
11 rows in set (0.02 sec)

CREATE TABLE IF NOT EXISTS `dy_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(32) NOT NULL,
  `tname` varchar(32) DEFAULT NULL,
  `pwd` varchar(32) DEFAULT NULL,
  `groupid` int(11) DEFAULT NULL,
  `authkey` varchar(64) DEFAULT NULL,
  `accessToken` varchar(64) DEFAULT NULL,
  `logtime` int(11) DEFAULT NULL,
  `logip` varchar(32) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT '1',
  `regtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `enable` (`enable`),
  KEY `groupid` (`groupid`),
  KEY `uname` (`uname`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0;
        */
    }


}

