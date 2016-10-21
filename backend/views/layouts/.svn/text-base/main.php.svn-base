<?php
use yii\helpers\Url;

?>
<!doctype html>
<html class="no-js fixed-layout">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>123SLG-后台管理系统</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="csrf-param" content="_csrf-backend">
    <meta name="csrf-token" content="<?php echo \Yii::$app->request->getCsrfToken(); ?>">
    <link rel="icon" type="image/png" href="/static/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/static/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="stylesheet" href="/static/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/static/css/admin.css">
    <!--[if lt IE 9]>
    <script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="/static/js/amazeui.ie8polyfill.min.js"></script>
    <![endif]-->

    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="/static/js/jquery.min.js"></script>
    <!--<![endif]-->
    <script src="/static/js/amazeui.min.js"></script>
    <script src="/static/js/app.js"></script>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <strong>123slg</strong>
        <small>管理后台</small>
    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
            data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span
            class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            <!--            <li><a href="javascript:;"><span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning">5</span></a></li>-->
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
                    <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
                    <li><a href="<?php echo Url::to(['site/logout']);?>"><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li>
            <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span
                        class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
        </ul>
    </div>
</header>

<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
        <div class="am-offcanvas-bar admin-offcanvas-bar">
            <ul class="am-list admin-sidebar-list" id="collapase-nav-1">
                <li  class="am-panel">
                    <a data-am-collapse="{parent: '#collapase-nav-1'}" href="/"><i class="am-icon-home am-margin-left-sm"></i> 首页</a>
                </li>

                <li class="am-panel">
                    <a data-am-collapse="{parent: '#collapase-nav-1', target: '#user-nav'}">
                        <i class="am-icon-users am-margin-left-sm"></i> 运营管理 <i class="am-icon-angle-right am-fr am-margin-right"></i>
                    </a>
                    <ul class="am-list am-collapse admin-sidebar-sub" id="user-nav">
                        <li><a href="<?php echo Url::to(['/game/index']); ?>" class="am-cf"><span class="am-icon-check"></span>游戏管理<span
                                    class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
                        <li><a href="<?php echo Url::to(['/pay/index']); ?>"><span class="am-icon-puzzle-piece"></span>充值记录</a></li>
                        <li><a href="<?php echo Url::to(['/pay/self']); ?>"><span class="am-icon-puzzle-piece"></span>内充记录</a></li>
                        <li><a href="<?php echo Url::to(['/member/index']) ?>"><span class="am-icon-th"></span>会员管理</a></li>
                        <li><a href="<?php echo Url::to(['/self/pay']); ?>"><span class="am-icon-calendar"></span>自助充值</a></li>
                        <li><a href="<?php echo Url::to(['/link/index']) ?>"><span class="am-icon-bug"></span>友情链接</a></li>
                        <li><a href="admin-gallery.html"><span class="am-icon-th"></span>礼包管理</a></li>
                        <li><a href="<?php echo Url::to(['/wheel/index']) ?>"><span class="am-icon-th"></span>首页轮播图</a></li>
                    </ul>
                </li>

                <li class="am-panel">
                    <a data-am-collapse="{parent: '#collapase-nav-1', target: '#company-nav'}">
                        <i class="am-icon-table am-margin-left-sm"></i>渠道管理<i class="am-icon-angle-right am-fr am-margin-right"></i>
                    </a>
                    <ul class="am-list am-collapse admin-sidebar-sub" id="company-nav">
                        <li><a href="<?php echo Url::to(['/cps/index'])?>"><span class="am-icon-deaf"></span>推广渠道</a></li>
                        <li><a href="<?php echo Url::to(['/cps/link'])?>"><span class="am-icon-first-order"></span>推广链接</a></li>
                        <li><a href="<?php echo Url::to(['/cps/first-search'])?>"><span class="am-icon-deaf"></span>首充查询</a></li>
                    </ul>
                </li>
<!--                <li class="am-panel">-->
<!--                    <a data-am-collapse="{parent: '#collapase-nav-1', target: '#role-nav'}">-->
<!--                        <i class="am-icon-table am-margin-left-sm"></i> 角色管理 <i class="am-icon-angle-right am-fr am-margin-right"></i>-->
<!--                    </a>-->
<!--                    <ul class="am-list am-collapse admin-sidebar-sub" id="role-nav">-->
<!--                        <li><a href="#/roleAdd"><span class="am-icon-table am-margin-left-sm"></span> 添加角色 </a></li>-->
<!--                        <li><a href="#/roleList/0"><span class="am-icon-table am-margin-left-sm"></span> 角色列表 </a></li>-->
<!--                    </ul>-->
<!--                </li>-->
            </ul>

            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p><span class="am-icon-bookmark"></span> 公告</p>
                    <p>时光静好，与君语；细水流年，与君同。—— Amaze UI</p>
                </div>
            </div>

            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p><span class="am-icon-tag"></span> wiki</p>
                    <p>Welcome to the Amaze UI wiki!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar end -->

    <!-- content start -->
    <?php echo $content; ?>
    <!-- content end -->

</div>
<div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">提示信息</div>
        <div class="am-modal-bd" id="content">
            Hello world！
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn">确定</span>
        </div>
    </div>
</div>
<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu"
   data-am-offcanvas="{target: '#admin-offcanvas'}"></a>
</body>
</html>
