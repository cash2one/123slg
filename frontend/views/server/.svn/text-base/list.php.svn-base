<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $game->gamename;?>务器列表页</title>
    <link rel="stylesheet" type="text/css" href="/css/game.css">
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="/data/<?php echo $game['id']?>.json"></script>
</head>
<body>
<!-- 大背景开始 .s_body { height: 1200px; background: url("../images/game/big_bj.jpg") no-repeat left center; }-->
<div class="s_body" style="height: 1200px; background: url('../images/game/big_<?php echo $game['enname'];?>.jpg') no-repeat left center;">
    <a class="logo" href="" target="_blank">斗三国</a>
    <div class="s_wrap">
        <!-- 头部导航条开始 -->
        <div class="head_nav clear">
            <a href="" target="_blank"><span class="head_nav01">进入官网</span></a>
            <a href="" target="_blank"><span class="head_nav02">领取礼包</span></a>
            <a href="http://www.123slg.com/pay/index" target="_blank"><span class="head_nav03">用户充值</span></a>
            <a href="" target="_blank" style="border-right:none;"><span class="head_nav04">游戏论坛</span></a>
        </div>
        <div class="logn_head">用户登录</div>
        <div class="logn_state">
            <a href="javascript:show_login();" class="start_btn" style="display:none;" id="login"></a>
            <div class="logn_info" style="display:none;">
                <h3>您好<i>，</i><span></span><i>，</i><a target="_blank" href="/ucenter/account/">完善资料</a><i>，</i><a href="javascript:login_out();">注销</a></h3>
                <p></p>
            </div>
        </div>
        <div class="list_head">服务器列表</div>
        <div class="server_title clear">
        </div>
        <!-- 区服推荐列表 -->
        <div class="server_box" id="scroll">
            <ul class="server_list"></ul>
        </div>
    </div>
</div>
<!--[if IE 6]>
<script src="/js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript" ></script>
<script type="text/javascript">
    DD_belatedPNG.fix('.head_nav01,.head_nav02,.head_nav03,.head_nav04,.start_btn,.server_title,.server_list li');
</script>
<![endif]-->

<script type="text/javascript">var servers = qfarr<?php echo $game['id'];?>; var gid = <?php echo $game['id'];?>; var gname = '<?php echo $game['gamename'];?>';</script>
<script type="text/javascript" src="/js/game.js"></script>

</body>
</html>

