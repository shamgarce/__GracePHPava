<?php

class home extends Controller {

    public function doTest()
    {
        echo '<pre>';
        /**
         * 内置对象
         * db
         * request
         * model
         *
         */
        echo $this->request->get['d'];

//        $rcone = $this->table->dy_user->getall();
//        D($rcone);

//        D($this->request->post);
//        D($this->request->get);
//        D($this->request->cookie);




//        $rcone = $this->db->getone("select * from dy_user");
//        $rcrow = $this->db->getrow("select * from dy_user");
//        $rccol = $this->db->getcol("select * from dy_user");
//        $rcmap = $this->db->getmap("select * from dy_user");
//        D($rcone);
//        D($rcrow);
//        D($rccol);
//        D($rcmap);


        echo '<hr>mark</pre>';
    }
    public function doIndex(){
        $this->redirect("index.php?m=super");
        $data = [
            'title'=>'GracePHP',
        ];
        $this->display('',$data);
    }

}
