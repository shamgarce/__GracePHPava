<?php

class home extends Controller {
    public function doIndex(){
        //默认跳转到s模块
        $this->redirect("/s");
    }

}
