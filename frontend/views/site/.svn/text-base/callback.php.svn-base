<?php
use yii\helpers\Url;

?>
<div class="centerContent">
    <div id="tabs" class=" hallTab">
        <ul class="svrttl">
            <li><a class="size14 firstLi tabA tabBorderRight" href="#tabs-1">登录</a></li>
        </ul>
        <div id="tabs-1" class="halllist">
            <div style="height:280px;">
                <form class="loginWrap" method="post" action="" autocomplete="off">
                    <fieldset>
                        <table class="loginDialog" width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                            </tr>

                            <tr>
                                <td class="tr" width="70" height="40"><span class="rd">*</span>用户名:</td>
                                <td width="230"><input type="text" id="username" name="username" class="inputTxt"/></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="tr" height="40"><span class="rd">*</span>密　码:</td>
                                <td><input type="password" id="password" name="password" class="inputTxt"/></td>
                                <td class="tl"><a href="" style="text-decoration:underline">忘记密码?</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tr" height="40">&nbsp;</td>
                                <td><input type="checkbox" id="remember" name="remember" checked/>
                                    <label for="saveCookie"><span>一个月内自动登录</span></label></td>
                                <td class="tl">&nbsp;</td>
                            </tr>
                            <tr>
                                <td height="40">&nbsp;</td>
                                <td colspan="2">
                                    <input type="submit" value="登录" class="allSubmitBtn mr15 ml5"
                                           style="display:block;float:left;" id="logbtn"/>
                                    <a href="<?php echo Url::to(['site/register']) ?>"
                                       class="inputBtnRegister allSubmitBtn2"
                                       style="width:95px;display:block;color:white;float:left;">注册新用户</a>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(function () {
        $("#logbtn").click(function (e) {
            e.preventDefault();
            var username = $("#username");
            var password = $("#password");
            if (username.val() == '' || username.val() == null) {
                alert('用户名不能为空！');
                username.focus();
                return false;
            }
            if (password.val() == '' || password.val() == null) {
                alert('密码不能为空！');
                password.focus();
                return false;
            }

            $.ajax({
                type: 'get',
                url: '<?php echo Url::to(['site/callback'])?>',
                data: {
                    'username': username.val(),
                    'password': password.val()
                },
                dataType: 'json',
                success: function (data) {
                    if (data['error'] == 2002) {
                        window.location.href = '<?php echo $url; ?>';
                    } else {
                        alert(data['error_msg']);
                        return false;
                    }
                }
            });
        });
    });
</script>
