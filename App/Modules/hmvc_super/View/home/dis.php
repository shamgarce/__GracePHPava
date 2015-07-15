<?php
$data = [
    'title' => $title.' DEMO',
];

View::tplInclude('Public/header_s', $data); ?>
<div class="bs-docs-header" id="content">
    <div class="container">
        <h1>简介</h1>
        <p>简要介绍GracePHP，目录结构和Hello World。</p>
    </div>
</div>
<div class="container bs-docs-container">
    <div class="row">
        <div class="col-md-3">
            <div class="bs-docs-sidebar hidden-print hidden-xs hidden-sm" role="complementary">
                <ul class="nav bs-sidenav">





<li><a href="#what">什么是GracePHP</a></li>
<li><a href="#download">下载GracePHP</a></li>
                    <li><a href="#dir">目录结构</a></li>
                    <li><a href="#hello">Hello Gracephp</a></li>
<li><a href="#hmvchello">HMVC:Hello Gracephp</a></li>

                </ul>
                <a class="back-to-top" href="#top">
                    返回顶部
                </a>
            </div>
        </div>
        <div class="col-md-9" role="main">


            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="what">什么是GracePHP</h1>
                </div>
                <p class="lead">
GracePHP是一个超微型PHP框架，尝试用优雅的代码编写，适用于简单系统的快速开发，支持HMVC，提供了简单的路由方式，抛弃了复杂的PHP模板，采用原生PHP语法来渲染页面,同时提供了widget功能，简单且实用。</p>
                <p>目前GracePHP由<a href="http://www.gracephp.com" target='_blank'>shampeak</a>开发维护，如果你希望参与到此项目中来，可以到<a href='https://github.com/shampeak/GracePhp' target='_blank'>Github</a>上Fork项目并提交Pull Request。</p>
            </div>



            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="download">下载GracePHP</h1>
                </div>
                <p class="lead">可以通过github直接下载压缩好的代码文件。</p>
                <p><a class="btn btn-lg btn-primary" href="" >下载稳定版本</a></p>
                <p class="lead">当然也可以通过git直接clone项目,master分支为稳定版本，develop分支为开发版本，可能会有一些实验性的功能。</p>
                <div class="highlight">
                    <p><code>git clone https://github.com/shampeak/GracePhp.git</code></p>
                </div>
            </div>




            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="dir">目录结构</h1>
                </div>
                <div class='highlight'>
  <pre>
  <code class="language-bash">
    ├── App                         #业务代码文件夹，可在配置中指定路径
    │   ├── Controller                      #控制器文件夹
    │   │   └── home.php
    │   ├── Lib                             #类文件地址
    │   ├── Error                           #错误文件模板
    │   ├── Log                             #日志文件夹，需要写权限
    │   ├── View                            #模板文件夹
    │   │   ├── Index                       #对应Index控制器
    │   │   │   └── Index.php
    │   │   └── Public
    │   │       ├── footer.php
    │   │       └── header.php
    │   ├── Widget                          #widget文件夹
    │   │   ├── MenuWidget.class.php
    │   │   └── Tpl                         #widget模板文件夹
    │   │       └── MenuWidget.php
    │   ├── Models                          #模型
    │   ├── Modules                         #存放
    │   │   └── hmvc_demomodule[]           #模块文件夹   在APP/Conf.php中进行配置
    │   ├── Rules.php                       #RBAC
    │   └── Conf.php                        #基础配置信息
    ├── Seter                       #Seter组件
    ├── Grace                       #核心代码
    │   ├── Common.php                      #常量和函数
    │   └── GracePHP.class.php              #核心文件
    └── Web                         #发布地址
    └── Index.php                         #入口文件
  </code></pre>
                </div>
            </div>


            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="dir2">模块中目录结构</h1>
                </div>
                <div class='highlight'>
  <pre><code class="language-bash">
└── hmvc_demomodule                   #模块文件夹
    ├── Controller                      #控制器文件夹
    │   └── home.php
    ├── Lib                             #类文件地址
    ├── Error                           #错误文件模板
    ├── Log                             #日志文件夹，需要写权限
    ├── View                            #模板文件夹
    │   ├── Index                       #对应Index控制器
    │   │   └── Index.php
    │   └── Public
    │       ├── footer.php
    │       └── header.php
    ├── Widget                          #widget文件夹
    │   ├── MenuWidget.class.php
    │   └── Tpl                         #widget模板文件夹
    │       └── MenuWidget.php
    ├── Models                          #模型
    ├── Rules.php                       #RBAC
    └── Conf.php                        #基础配置信息</code></pre>
                </div>
            </div>








            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="hello">Hello World</h1>
                </div>
                <p class="lead">只需增加3个文件，即可输出hello world。</p>
                <p>入口文件：index.php</p>
                <div class='highlight'>
<pre><code class="language-php">&lt;?php
include '../Grace/GracePHP.class.php';      //载入核心文件
$config = ['APP_PATH'    => '../App/'];     //配置
GracePHP::getInstance($config)->run();      //go</code></pre>
                </div>
                <p>默认控制器：App/Controller/home.php</p>
                <div class='highlight'>
              <pre><code class="language-php">&lt;?php
class home extends Controller {
    //默认的index.php
    public function doIndex(){
        $data = [
            'title'=>'GracePHP',
        ];
        $this->display('',$data);
    }
}</code></pre>
                </div>
                <p>模板文件：App/View/home/index.php</p>
                <div class='highlight'>
                    <pre><code class="language-php">&lt;?php echo 'Hello  '.$title;</code></pre>
                </div>
                <p>在浏览器访问index.php，应该会输出</p>
                <div class='highlight'>
                    <pre><code class="language-html">Hello GracePHP</code></pre>
                </div>
            </div>







            <div class="bs-docs-section">
                <div class="page-header">
                    <h1 id="hmvchello">Hello World - hmvc</h1>
                </div>
                <p>入口文件：index.php</p>
                <div class='highlight'>
<pre><code class="language-php">&lt;?php
include '../Grace/GracePHP.class.php';      //载入核心文件
$config = ['APP_PATH'    => '../App/'];     //配置
GracePHP::getInstance($config)->run();      //go</code></pre>
                </div>

                <p>修改配置文件 APP/Conf.php</p>
                <div class='highlight'>
<pre><code class="language-php">&lt;?php
$config = [

    ...

    'modules' => [
        'demo' => 'hmvc_demo',      //模块和映射的路径
    ],

    ...

];</code></pre>
                </div>

                <p>建立模块目录结构</p>
                <div class='highlight'>
<pre><code class="language-php">    └── hmvc_demo                       #模块文件夹
        ├── Controller                      #控制器文件夹
        │   └── home.php
        ├── Lib                             #类文件地址
        ├── Error                           #错误文件模板
        ├── Log                             #日志文件夹，需要写权限
        ├── View                            #模板文件夹
        │   └── home                       #对应Index控制器
        │       └── index.php
        ├── Widget                          #widget文件夹
        ├── Models                          #模型
        ├── Rules.php                       #RBAC
        └── Conf.php                        #基础配置信息
    </code></pre>
                </div>


                <p>默认控制器：App/Modules/hmvc_demo/Controller/home.php</p>
                <div class='highlight'>
              <pre><code class="language-php">&lt;?php
class home extends Controller {
    //默认的index.php
    public function doIndex(){
        $data = [
            'title'=>'GracePHP',
        ];
        $this->display('',$data);
    }
}</code></pre>
                </div>
                <p>模板文件：App/Modules/hmvc_demo/View/home/index.php</p>
                <div class='highlight'>
                    <pre><code class="language-php">&lt;?php echo $content;</code></pre>
                </div>
                <p>在浏览器访问index.php?m=demo，应该会输出</p>
                <div class='highlight'>
                    <pre><code class="language-html">Hello World</code></pre>
                </div>
            </div>












        </div>
    </div>

</div>








<?php View::tplInclude('Public/footer'); ?>
