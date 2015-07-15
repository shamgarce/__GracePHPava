<?php
$data = [
    'title' => $title.' DEMO',
];

View::tplInclude('Public/header_s', $data); ?>
<div class="bs-docs-header" id="content">
    <div class="container">
        <h1>对象</h1>
        <p>简要介绍GracePHP中的主要对象</p>
    </div>
</div>
<div class="container bs-docs-container">
    <div class="row">
        <div class="col-md-3">
            <div class="bs-docs-sidebar hidden-print hidden-xs hidden-sm" role="complementary">
                <ul class="nav bs-sidenav">


                    <li><a href="#den">调用</a></li>
                    <li><a href="#request">Request</a></li>
                    <li><a href="#db">db</a></li>
                    <li><a href="#table">table</a></li>
                    <li><a href="#model">model</a></li>
                    <li><a href="#sys">sys</a></li>
                    <li><a href="#error">error</a></li>
                    <li><a href="#user">user</a></li>
                    <li><a href="#rdbc">rdbc</a></li>





                </ul>
                <a class="back-to-top" href="#top">
                    返回顶部
                </a>
            </div>
        </div>
        <div class="col-md-9" role="main">



            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="den">调用方式</h1>
                </div>
                <p class="lead">这里介绍的对象都可以用$this->直接调用 或者单例调用</p>
                <p>调用</p>
<pre><code class="language-php">//在controller中调用
$this->db;
$this->table;
$this->request;
$this->model;

$this->user;
$this->rbac;

//单例调用
\Seter\Seter::getInstance()->db;
\Seter\Seter::getInstance()->table;
\Seter\Seter::getInstance()->request;
\Seter\Seter::getInstance()->model;

\Seter\Seter::getInstance()->user;
\Seter\Seter::getInstance()->rbac;</code></pre>

            </div>


            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="request">request</h1>
                </div>
                <p class="lead">request对象  取代系统的 $_GET $_POST $_COOKIE</p>
                <p>调用</p>
<pre><code class="language-php">//在controller中调用
$this->get = $this->request->get
$this->post = $this->request->post
$this->cookie = $this->request->cookie

//调用
echo $this->request->get['c'];
</code></pre>

            </div>


            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="db">db</h1>
                </div>
                <p>配置 -> App/Conf.php</p>
<pre><code class="language-php">'modules' => [

    ...

    'mysql'=>[
        'default'=>[
            "hostname"  =>  '127.0.0.1',
            "username"  =>  'root',
            "password"  =>  'root3309',
            "database"  =>  'gracephpdb',
            "charset"   =>  'utf8',
            "pconnect"  =>  0,
            "quiet"     =>  0
        ],
    ]

    ...
];</code></pre>

                <p>应用</p>
<pre><code class="language-php">//获取表中某一个值
$one = $this->db->getone("select uname from dy_user");
//获取一条记录
$row = $this->db->getrow("select * from dy_user limit 1");
//获取一列数据
$col = $this->db->getcol("select uname from dy_user");
//获取所有数据
$all = $this->db->getone("select * from dy_user");
//获取数据映射
$map = $this->db->getone("select id,uname from dy_user");
//执行一条sql语句
$this->db->query($sql);
$this->db->gsql($sql);      //过程缓存
//选择数据库
$this->db->select_database($dbname);
//添加记录
$this->db->autoExecute('dy_user',$row,'INSERT');
//更新记录
$this->db->autoExecute('dy_user',$row,'UPDATE',"where id = 9");
//获取刚才insert数据的id值
$insertid = $this->db->insert_id();</code></pre>
            </div>



            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="table">table</h1>
                </div>
                <p>table把数据库的表对象化，进行了封装, 采用链式操作</p>

<pre><code class="language-php">$tablename = 'dy_user';
$where = "id = 3";
$limit = "9";   //or $limit = "0,9";
$order = "id desc";
$group = "groupid";

//select
$this->table->$tablename->getall();
$this->table->$tablename->where($where)->getall();
$this->table->$tablename->where($where)->limit($limit)->getall();
$this->table->$tablename->where($where)->limit($limit)->order($order)->getall();
$this->table->$tablename->where($where)->limit($limit)->order($order)->group($group)->getall();

//
$this->table->$tablename->colm('id')->getone();
$this->table->$tablename->colm('id')->where($where)->getone();

//获取数据映射
$this->table->$tablename->colm('id,uname')->getmap();
$this->table->$tablename->colm('id,uname')->where($where)->getmap();
$this->table->$tablename->colm('id,uname')->where($where)->limit($limit)->getmap();
$this->table->$tablename->colm('id,uname')->where($where)->limit($limit)->order($order)->getmap();
$this->table->$tablename->colm('id,uname')->where($where)->limit($limit)->order($order)->group($group)->getmap();

//获取数据条数
$this->table->$tablename->getcount();
$this->table->$tablename->where($where)->getcount();

//获取列数据
$this->table->$tablename->colm('id')->getcol();
$this->table->$tablename->colm('id')->where($where)->getcol();
$this->table->$tablename->colm('id')->where($where)->limit($limit)->getcol();
$this->table->$tablename->colm('id')->where($where)->limit($limit)->order($order)->getcol();
$this->table->$tablename->colm('id')->where($where)->limit($limit)->order($order)->group($group)->getcol();

$this->table->$tablename->getrow();
$this->table->$tablename->where($where)->getrow();

//update
$this->table->$tablename->where($where)->update($res);//方法里面自带saddslashes

//delete
$this->table->$tablename->where($where)->delete();

//insert
$this->table->$tablename->insert($res);             //方法里面自带saddslashes

//获取最后一条insert的数据
$this->table->$tablename->getinsertid();</code></pre>



            </div>



            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="model">model</h1>
                </div>
                <p>
                    这里面的模型设计比较简单，会在模块下查找模型，没找到会到App/Models下继续查找；
                </p>
                <p>
                    成熟，可多次复用的模型可以放到App/Models 进行多次复用
                </p>
                <p>
                    模型默认的方法会把request中get post cookie 这三个数据直接赋过去用this->进行调用
                </p>
            </div>



            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="sys">sys</h1>
                </div>
                <p class="lead">
                    设计中。</p>
            </div>



            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="error">error</h1>
                </div>
                <p class="lead">
                    设计中！</p>
            </div>




            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="user">user</h1>
                </div>
                <p class="lead">
                    设计中</p>
            </div>



            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="rdbc">rdbc</h1>
                </div>
                <p class="lead">
                   设计中</p>
            </div>

        </div>
    </div>

</div>


<?php View::tplInclude('Public/footer'); ?>
