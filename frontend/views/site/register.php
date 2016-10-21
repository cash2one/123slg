<?php
use yii\helpers\Url;

?>
    <div class="centerContent">
        <div class="gameCenterContent">
            <div id="tabs" class=" hallTab">
                <ul class="svrttl">
                    <li><a class="size14 firstLi tabA tabBorderRight" href="#tabs-1">用户注册</a></li>
                </ul>
                <div id="tabs-1" class="halllist">
                    <div style=" margin:36px 0;">
                        <form class="" action="" name="registerForm" autocomplete="off" method="post">
                            <fieldset>
                                <!-- register begin-->
                                <div class="register">
                                    <ul>
                                        <li>
                                            <span class="td1"></span>
                                            <span class="td2 hd" style="text-align:left;">注册通行证<span
                                                    class="sp3">(</span><span class="sp1">*</span><span
                                                    class="sp3">)</span><span class="sp2">为必填项</span></span>
                                            <span class="td3"></span>
                                        </li>


                                        <li>
                                            <span class="td1"><span class="rd">*</span>用户名：</span>
                                            <span class="td2"><input type="text" name="username" maxlength="15"
                                                                     value=""/></span>
                                            <span class="td3">用户名由5到15个字符组成.</span>
                                        </li>
                                        <li>
                                            <span class="td1"><span class="rd">*</span>新密码：</span>
                                            <span class="td2"><input type="password" name="password" value=""/></span>
                                            <span class="td3">密码由5到15个字符组成.</span>
                                        </li>
                                        <li>
                                            <span class="td1"><span class="rd">*</span>确认密码：</span>
                                            <span class="td2"><input type="password" name="password2" value=""/></span>

                                            <span class="td3">重复输入，确认您的密码.</span>
                                        </li>
                                        <li>
                                            <span class="td1"><span class="rd">*</span>Email：</span>
                                            <span class="td2"><input type="text" name="email" value=""/></span>
                                            <span class="td3">该邮箱用于取回密码，请认真填写！</span>
                                        </li>

                                        <li>
                                            <span class="td1"></span>
                                            <span class="td2 hd" style="text-align:left;">防沉迷认证<span
                                                    class="sp3">(</span><span class="sp1">*</span><span
                                                    class="sp3">)</span><span class="sp2">为必填项</span></span>
                                        </li>
                                        <li>
                                            <span class="td1"><span class="rd">*</span>真实姓名：</span>
                                            <span class="td2"><input type="text" name="name" value=""/></span>
                                            <span class="td3">请填写您的真实姓名！</span>
                                        </li>
                                        <li>
                                            <span class="td1"><span class="rd">*</span>身份证：</span>
                                            <span class="td2"><input type="text" name="idNum" value=""/></span>
                                            <span class="td3">请填写您的身份证号码！</span>
                                        </li>
                                        <li>

                                            <span class="td1"></span>
			<span class="td2" style="width:218px">
           	 <input type="submit" value="注册" class="allSubmitBtn" style="width:105px;border:0;color:white;"
                    id="regBtn"/>
			<a class="allSubmitBtn2" href="<?php echo Url::to(['/']) ?>" style="float:left;color:white;">返回</a>
			</span>
                                            <span class="td3"></span>

                                        </li>
                                    </ul>
                                </div>
                                <!-- register end-->
                            </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('input[name="username"]').blur(function () {
        var nameReg = /^[\u4e00-\u9fa5a-zA-Z0-9_]{3,15}$/;
        var username = $('input[name="username"]');
        if ($.trim(username.val()) == '' || getRealLength(username.val()) < 5 || getRealLength(username.val()) > 15) {
            username.parent().next().html('用户名不能为空，需由5到15个字符组成!').css('color', 'red');
            return;
        } else if (!nameReg.test(username.val())) {
            username.parent().next().html('用户名只能包含字母，数字，下划线和中文!').css('color', 'red');
            return;
        } else {
            username.parent().next().html('√').css('color', 'green');
        }
        $.get('<?php echo Url::to(['site/check'])?>', {username: username.val(), type: 'user'}, function (rev) {
            if (rev.error != 0) {
                username.parent().next().html(rev.error_msg).css('color', 'red');
            } else {
                username.parent().next().html(rev.error_msg).css('color', 'green');
            }
        }, 'json');
    });
    $('input[name="password"]').blur(function () {
        var password = $('input[name="password"]');
        if ($.trim(password.val()) == '' || password.val().length < 5 || password.val().length > 15) {
            password.parent().next().html('密码不能为空，需由5到15个字符组成!').css('color', 'red');
            return;
        } else {
            password.parent().next().html('√').css('color', 'green');
        }
    });
    $('input[name="password2"]').blur(function () {
        var password = $('input[name="password"]');
        var password2 = $('input[name="password2"]');
        if ($.trim(password2.val()) == '' || password2.val().length < 5 || password2.val().length > 15) {
            password2.parent().next().html('密码不能为空，需由5到15个字符组成!').css('color', 'red');
            return;
        } else {
            password2.parent().next().html('√').css('color', 'green');
        }

        if (password2.val() == password.val()) {
            password2.parent().next().html('√').css('color', 'green');
        } else {
            password2.parent().next().html('两次密码不一致，请检查重新输入！').css('color', 'red');
            return;
        }
    });
    $('input[name="email"]').blur(function () {
        var emailReg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
        var email = $('input[name="email"]');
        if ($.trim(email.val()) == '') {
            email.parent().next().html('该邮箱用于取回密码，请认真填写！').css('color', 'red');
            return;
        } else if (!emailReg.test(email.val())) {
            email.parent().next().html('邮箱格式错误!例:"user@example.com"').css('color', 'red');
            return;
        } else {
            email.parent().next().html('√').css('color', 'green');
        }
        $.get('<?php echo Url::to(['site/check'])?>', {email: email.val(), type: 'email'}, function (rev) {
            if (rev.error != 0) {
                email.parent().next().html(rev.error_msg).css('color', 'red');
            } else {
                email.parent().next().html(rev.error_msg).css('color', 'green');
            }
        }, 'json');

    });
    $('input[name="name"]').blur(function () {
        var name = $('input[name="name"]');
        var nameReg = /^[\u4e00-\u9fa5]{2,6}$/;
        if ($.trim(name.val()) == '' || !nameReg.test(name.val())) {
            name.parent().next().html('请输入您的真实姓名！').css('color', 'red');
            return;
        } else {
            name.parent().next().html('√').css('color', 'green');
        }
    });
    $('input[name="idNum"]').blur(function () {
        var idNum = $('input[name="idNum"]');
        if ($.trim(idNum.val()) == '') {
            idNum.parent().next().html('请输入您的身份证号！').css('color', 'red');
            return;
        } else if (IdCardValidate(idNum.val()) == true) {
            if (isAdout(idNum.val()) == 1) {//1未成年
                idNum.parent().next().html('根据《网游管理规定》，该账号将被防沉迷！').css('color', 'red');
            } else {//0成年
                idNum.parent().next().html('√').css('color', 'green');
            }
        } else {
            idNum.parent().next().html('您输入的身份证号错误，请重新输入！').css('color', 'red');
            return;
        }
    });
    $(function () {
        $('#regBtn').click(function (e) {
            e.preventDefault();
            var emailReg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
            var nameReg = /^[\u4e00-\u9fa5a-zA-Z0-9_]{3,15}$/;
            var chineseReg = /[\u4E00-\u9FA5]|[\uFE30-\uFFA0]/gi;

            var username = $('input[name="username"]');
            if ($.trim(username.val()) == '' || getRealLength(username.val()) < 5 || getRealLength(username.val()) > 15) {
                username.parent().next().html('用户名不能为空，需由5到15个字符组成!').css('color', 'red');
                return false;
            } else {
                username.parent().next().html('√').css('color', 'green');
            }
            var password = $('input[name="password"]');
            if ($.trim(password.val()) == '' || password.val().length < 5 || password.val().length > 15) {
                password.parent().next().html('密码不能为空，需由5到15个字符组成!').css('color', 'red');
                return false;
            } else if (!nameReg.test(username.val())) {
                username.parent().next().html('用户名只能包含字母，数字，下划线和中文!').css('color', 'red');
                return false;
            } else {
                password.parent().next().html('√').css('color', 'green');
            }
            var password2 = $('input[name="password2"]');
            if ($.trim(password2.val()) == '' || password2.val().length < 5 || password2.val().length > 15) {
                password2.parent().next().html('密码不能为空，需由5到15个字符组成!').css('color', 'red');
                return false;
            } else {
                password2.parent().next().html('√').css('color', 'green');
            }

            if (password2.val() == password.val()) {
                password2.parent().next().html('√').css('color', 'green');
            } else {
                password2.parent().next().html('两次密码不一致，请检查重新输入！').css('color', 'red');
                return false;
            }
            var email = $('input[name="email"]');
            if ($.trim(email.val()) == '') {
                email.parent().next().html('该邮箱用于取回密码，请认真填写！').css('color', 'red');
                return false;
            } else if (!emailReg.test(email.val())) {
                email.parent().next().html('邮箱格式错误!例:"user@example.com').css('color', 'red');
                return false;
            } else {
                email.parent().next().html('√').css('color', 'green');
            }
            var name = $('input[name="name"]');
            var nameReg = /^[\u4e00-\u9fa5]{2,6}$/;
            if ($.trim(name.val()) == '' || !nameReg.test(name.val())) {
                name.parent().next().html('请输入您的真实姓名！').css('color', 'red');
                return false;
            } else {
                name.parent().next().html('√').css('color', 'green');
            }
            var idNum = $('input[name="idNum"]');
            if ($.trim(idNum.val()) == '') {
                idNum.parent().next().html('请输入您的身份证号！').css('color', 'red');
                return false;
            } else if (IdCardValidate(idNum.val()) == true) {
                if (isAdout(idNum.val()) == 1) {//1未成年
                    idNum.parent().next().html('根据《网游管理规定》，该账号将被防沉迷！').css('color', 'red');
                } else {//0成年
                    idNum.parent().next().html('√').css('color', 'green');
                }
            } else {
                idNum.parent().next().html('您输入的身份证号错误，请重新输入！').css('color', 'red');
                return false;
            }
            $.ajax({
                type: 'get',
                url: '<?php echo Url::to(['site/register'])?>',
                data: $('form').serialize(),
                dataType: 'json',
                success: function (data) {
                    if (data['error'] == 0) {
                        alert(data['error_msg']);
                        window.location.href = '<?php echo 'http://' . $_SERVER['SERVER_NAME'];?>';
                    } else {
                        alert(data['error_msg']);
                        return false;
                    }
                }
            });
        });
    });
</script>
