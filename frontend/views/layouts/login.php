<?php
use yii\helpers\Url;
?>
<div class="newLeft">
    <div class="centerLog" id="login_before">
        <form action="" autocomplete="off" method="post" class="loginForm fl">
            <div class="ttl size14">通行证</div>
            <p>
                <input class="in1 username" type="text" value="请输入账号" id="username" name="username"onfocus="if(this.value==this.defaultValue) this.value=&quot;&quot;;" onblur="if(this.value==&quot;&quot;) this.value=this.defaultValue"/>
                <input class="in1 username"  fs="请输入密码"type="password" value="" id="password" name="password"/>
            <p>
                <input type="checkbox" id="remember" name="remember" checked/>下次自动登录
                <a class="in2" href="<?php echo Url::to(['site/findpass'])?>">忘记密码？</a>
            </p>
            <p class="p3"><a href="javascript:void(0)" class="a1 loginBtn" onclick="login()">登录</a><a href="<?php echo Url::to(['site/register'])?>" class="a2">免费注册</a></p>
        </form>
    </div>
    <div class="centerLog already" id="login_after" style="display: none">
        <div class="ttl size14">通行证</div>
        <div class="welcomeWrapper">
            <p class="welcome" id="welcome"></p>
            <ul>
                <li class="fl"><a href="" class="a1_info">完善资料</a></li>
                <li class="fr"><a href="" class="a2_psw">修改密码</a></li>
                <li class="clr fl"><a href="" class="a3_phone">手机绑定</a></li>
                <li class="fr"><a href="javascript:void(0)" class="a4_quit" onclick="logout()">安全退出</a></li>
            </ul>
            <p class="welcome">最近玩过的游戏</p>
            <div id="last_game">

            </div>
        </div>
    </div>
</div>