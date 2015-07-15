<?php
$data = [
    'title' => $title.' DEMO',
];

View::tplInclude('Public/header_s', $data); ?>
<div class="bs-docs-header" id="content">
    <div class="container">
        <h1>简介</h1>
        <p>对GracePHP进行进一步说明</p>
    </div>
</div>
<div class="container bs-docs-container">
    <div class="row">
        <div class="col-md-3">
            <div class="bs-docs-sidebar hidden-print hidden-xs hidden-sm" role="complementary">
                <ul class="nav bs-sidenav">

                    <li><a href="#router">路由</a></li>
                    <li><a href="#const">常量</a></li>
                    <li><a href="#function">函数</a></li>
                    <li><a href="#class">类加载</a></li>
                    <li><a href="#log">日志</a></li>
                    <li><a href="#redirect">跳转</a></li>
                    <li><a href="#json">JSON输出</a></li>
                    <li><a href="#widget">Widget</a></li>
                    <li><a href="#view">视图</a></li>
                    <li><a href="#fetch">缓冲区</a></li>
                    <li><a href="#model">模型</a></li>

                </ul>
                <a class="back-to-top" href="#top">
                    返回顶部
                </a>
            </div>
        </div>
        <div class="col-md-9" role="main">



            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="router">Router</h1>
                </div>
                <p class="lead">路由</p>
<pre><code class="language-php">
http://domainhost/index.php?m=mm.cc.aa      //访问mm模块cc控制器的aa方法
http://domainhost/index.php?m=cc.aa         //访问cc控制器的aa方法
http://domainhost/index.php?m=mm&c=cc&a=aa  //访问mm模块cc控制器的aa方法
http://domainhost/mm/cc/aa                  //访问mm模块cc控制器的aa方法
http://domainhost/cc/aa                     //访问cc控制器的aa方法
</code></pre>
                <p>注意 ：
                </p>
                <p>模块在App/conf.php中进行设置
                </p>
                <p>本例地址为 App/Conf.php
                </p>
                <p>模块名称不能和控制器名称相同
                </p>
            </div>




            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="const">常量</h1>
                </div>
                <p class="lead">系统常量</p>
<pre><code class="language-php">// System Start Time
define('START_TIME', $_SERVER['REQUEST_TIME_FLOAT']);

// System Start Memory
define('START_MEMORY_USAGE', memory_get_usage());

// Extension of all PHP files
define('EXT', '.php');

// Directory separator (Unix-Style works on all OS)
define('DS', '/');

// Absolute path to the system folder
define('SP', realpath(__DIR__). '/');

// Is this an AJAX request?
define('AJAX_REQUEST', strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest');

// The current TLD address, scheme, and port
define('DOMAIN', (strtolower(getenv('HTTPS')) == 'on' ? 'https' : 'http') . '://'
. getenv('HTTP_HOST') . (($p = getenv('SERVER_PORT')) != 80 AND $p != 443 ? ":$p" : ''));

// The current site path
define('PATH', parse_url(getenv('REQUEST_URI'), PHP_URL_PATH));
</code></pre>
                输出结果
                <p>START_TIME: <?=START_TIME?></p>
                <p>START_MEMORY_USAGE: <?=START_MEMORY_USAGE?></p>
                <p>EXT: <?=EXT?></p>
                <p>DS: <?=DS?></p>
                <p>SP: <?=SP?></p>
                <p>AJAX_REQUEST: <?=AJAX_REQUEST?></p>
                <p>DOMAIN: <?=DOMAIN?></p>
                <p>PATH: <?=PATH?></p>

            </div>





            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="function">函数</h1>
                </div>
                <p class="lead">快捷函数 :  C D W M R T</p>
                <p class="lead">函数 :  RULES
                    truepath
                    includeIfExist
                    GetIP
                    halt
                    error404
                    error500
                    errormsg
                </p>

<pre><code class="language-php">
/**
* 获取和设置配置参数 支持批量定义
* 如果$key是关联型数组，则会按K-V的形式写入配置
* 如果$key是数字索引数组，则返回对应的配置数组
* 如果C() 返回所有已经设置的数据
* @param string|array $key 配置变量
* @param array|null $value 配置值
* @return array|null
*/
function C($key = '',$value=null){
}

/**
* 取代print_r()的条数函数
* @param $arr
*/
function D($arr = []){
}

/**
* 调用Widget
* @param string $name widget名
* @param array $data 传递给widget的变量列表，key为变量名，value为变量值
* @return void
*/
function W($name, $data = array()){
}

/**
* 获取数据库实例
* @return DB
*/
function M(){
}

/**
* 页面跳转
*/
function R($url, $time=0, $msg='') {
}

/**
* 返回当前时间戳 毫秒
* @return float
*/
function T(){
}

/**
* @return array|mixed
* 返回RBAC::AccessRules
*/
function RULES(){}

/**
* 返回资源的绝对定位地址
* @param $path
* @return mixed|string
*/
function truepath($path) {}

/**
* 终止程序运行
* @param string $str 终止原因
* @param bool $display 是否显示调用栈，默认不显示
* @return void
*/
function halt($str, $display=false){}

/**
* 404错误页面
* 页面内容 C('error_page_404');设置
*/
function error404(){}

/**
* 500错误页面
* 设置C('error_page_500');
*/
function error500(){}

/**
* 提示信息页面
* @param string $msg
* 页面设置 C('error_page_msg');
*/
function errormsg($msg = ''){}

/**
* 获取IP地址
* @param type null
* @return string like '12.70.0.1'
*/
function GetIP(){}

/**
* 如果文件存在就include进来
* @param string $path 文件路径
* @return void
*/
function includeIfExist($path){}
</code></pre>
            </div>



            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="class">类加载</h1>
                </div>
                <p class="lead">类文件放在Lib目录中可以自动加载，文件名为$classname.class.php</p>
                <p class="lead">对于模块中，首先检查模块Lib目录中是否有该类，没有到则到App/Lib目录中查找</p>
<pre><code class="language-php">
$app    = new Demoapp();
$appbase= new Demoappbase();
echo < pre >;
echo $app->hello();
echo $appbase->hello();
echo 'ok';</code></pre>

            </div>



            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="log">日志</h1>
                </div>
                <p class="lead">日志以文件的形式存放在Log目录下</p>
                <p class="lead">对于模块中，存放在模块的Log目录下</p>
<pre><code class="language-php">
Log::fatal('something');
Log::warn('something');
Log::notice('something');
Log::debug('something');
Log::sql('something');
echo '请到Log文件夹查看效果。';</code></pre>

            </div>



            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="redirect">跳转</h1>
                </div>
                <p class="lead">在controller方法中调用</p>
                <pre><code class="language-php">$this->redirect('http://www.baidu.com'); //302跳转到百度</code></pre>
            </div>

            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="json">JSON输出</h1>
                </div>
                <p class="lead">在controller方法中调用</p>
                <pre><code class="language-php">$ret = array(
    'result' => true,
    'data'   => 123,
);
$this->AjaxReturn($ret);</code></pre>
            </div>



            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="widget">widget</h1>
                </div>
                <p class="lead">在视图中调用</p>
                <pre><code class="language-php">W('Test', $parms);</code></pre>

                <p>这段代码调用目录Widget/TestWidget.class.php文件，引用其invoke方法，输出内容</p>
                <p>视图是Widget/Tpl/TestWidget.php</p>
                <p>$parms是参数，可以在视图中访问$data引用</p>

            </div>


            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="view">视图</h1>
                </div>
                <p class="lead">在controller方法中调用</p>
                <pre><code class="language-php">class home extends BaseController {
    $data = [
        'title'=>'GracePHP',
    ];
    //$this->display('',$data);       //默认的模板home/index.php
    $this->display('test',$data);       //模板home/test.php
}</code></pre>
                <p>控制器对应的模板是View目录下$controller/$action</p>
                <p>例如 index.php?c=home&a=index 默认模板是 View/home/index.php</p>
            </div>


            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="fetch">缓冲区</h1>
                </div>
                <p class="lead">在controller方法中调用</p>
                <pre><code class="language-php">class home extends BaseController {
    $data = [
        'title'=>'GracePHP',
    ];
    //$page = $this->fetch('',$data);       //默认的模板home/index.php
    $page = $this->fetch('test',$data);       //模板home/test.php
    echo $page;
}</code></pre>
                <p>该方法跟view方法一致，只是不直接输出内容，用于生成文章之类的操作</p>
            </div>



            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="model">模型</h1>
                </div>
                <p class="lead">在controller方法中调用</p>
                <pre><code class="language-php">$this->model->modeltest->say();</code></pre>
                <p>如果在模块中，系统会在模块的Models目录中寻找modeltest.model.php文件，找到则调用</p>
                <p>如果没有找到，则会在App/Models目录中继续寻找</p>
                <p>在模型中</p>
<pre><code class="language-php">$this->get = \Seter\Seter::getInstance()->request->get;
$this->post = \Seter\Seter::getInstance()->request->post;
$this->cookie = \Seter\Seter::getInstance()->request->cookie;</code></pre>
<p>上面三条语句已经在方法_init中被默认执行，可以进行重写，或者直接调用</p>
            </div>








        </div>
    </div>

</div>








<?php View::tplInclude('Public/footer'); ?>
