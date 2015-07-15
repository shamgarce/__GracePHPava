<?php
$data = [
    'title' => $title,
];

View::tplInclude('Public/header', $data); ?>
<main class="bs-docs-masthead" id="content" role="main">
    <div class="container">
        <h1><?php echo $title;?></h1>
        <p class="lead">微型PHP框架，敏捷开发首选</p>
        <p>   用更优雅的方式写PHP</p>
        <p>本项目由<a href='http://Gracephp.com' target='_blank'>Shampeak</a>开发，遵循MIT协议。</p>
        <p>&copy; 浮点科技</p>
        <p>QQ群 ： 87650914 </p>

        <p>

            <a href="https://github.com/shampeak/GracePhp" target='_blank' class="btn btn-outline-inverse btn-lg" >Fork On Github</a>
            <!--a href="/?m=super&c=home&a=demo" target='_blank' class="btn btn-outline-inverse btn-lg" >DEMO</a>
            <a href="/?m=super&c=home&a=doc" target='_blank' class="btn btn-outline-inverse btn-lg" >文档</a>
            <!-- a href="/super/home/" target='_blank' class="btn btn-outline-inverse btn-lg" >S对象</a -->

            <!-- a href="/super/home/s/" target='_blank' class="btn btn-outline-inverse btn-lg" >S对象</a>
            <a href="/super/?a=router" target='_blank' class="btn btn-outline-inverse btn-lg" >route</a>
            <a href="/super/home/params/123" target='_blank' class="btn btn-outline-inverse btn-lg" >params</a>
            <a href="/super/home/rej" target='_blank' class="btn btn-outline-inverse btn-lg" >依赖注入</a>
            <a href="/super/home/gh" target='_blank' class="btn btn-outline-inverse btn-lg" >规划</a -->

        </p>
    </div>
</main>
<?php View::tplInclude('Public/footer'); ?>
