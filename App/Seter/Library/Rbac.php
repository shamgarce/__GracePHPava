<?php

namespace Seter\Library;

class Rbac{
    public $needlogin   = false;
    public $userdeny    = false;

    public function run($rules = '') {
        //$rules = $rules['rules']['access']['rules'];

D($rules);


        $this->deny();

        foreach($rules as $key=>$value){
            if($this->march($value)){
                //got 匹配到
                $this->deny();
            }
        }
    }



    public function deny()
    {
//        errormsg("Access deny");
//        D(C());
////        error404();
////        error500();
//        die('RBAC DENY');
    }

    public function march($rules)
    {
        return $this->Bmarch($rules) && $this->Umarch($rules);
    }

    /**
     * @param $rules
     * @return bool
     * 匹配行为
     */
    public function Bmarch($rules)
    {

        return true;
    }

    /**
     * @param $rules
     * @return bool
     * 匹配用户
     */
    public function Umarch($rules)
    {
        return true;
    }



}

