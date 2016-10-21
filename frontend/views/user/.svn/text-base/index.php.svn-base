<?php
use yii\helpers\Url;

?>
<div class="centerContent">
    <div id="tabs" class=" hallTab">
        <ul class="svrttl">
            <li><a class="size14 firstLi" href="#tabs-1" onclick="changeTab(0)">用户信息</a></li>
            <li><a class="size14" href="#tabs-2" onclick="changeTab(1)">邮箱绑定</a></li>
            <!--            <li><a class="size14" href="#tabs-3" onclick="changeTab(2)">手机绑定</a></li>-->
            <li><a class="size14 tabBorderRight" href="#tabs-4" onclick="changeTab(3)">密码修改</a></li>
        </ul>
        <div id="tabs-1" class="halllist" style="height:280px;">
            <div>
                <form class="" action="" method="post" autocomplete="off">
                    <fieldset>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td></td>
                                <td>
                                    <table class="update" width="63%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td rowspan="5" class="type_manage" width="135"><span></span></td>
                                            <td width="83" class="tc">账　　号：</td>
                                            <td width="165"><?php echo isset($_SESSION['user']['username']) ? $_SESSION['user']['username'] : ''; ?></td>
                                            <td width="86">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="tc">密码管理：</td>
                                            <td><a
                                                    href="javascript:void(0);" onclick="changeTab(3)"
                                                    style="text-decoration: underline;" class="info_aColor">修改密码</a>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="tc">安全邮箱：</td>
                                            <td>
                                                <?php if (isset($_SESSION['user']['isbind']) && $_SESSION['user']['isbind'] == 1) { ?>
                                                    <span><?php echo $reg_email; ?></span>
                                                <?php } else { ?>
                                                    <span style="color: red;">您尚未绑定邮箱！</span>
                                                <?php } ?>
                                            </td>
                                            <td><a
                                                    href="javascript:void(0);" onclick="changeTab(1)"
                                                    style="text-decoration: underline;" class="info_aColor">
                                                    <?php if (isset($_SESSION['user']['isbind']) && $_SESSION['user']['isbind'] == 1) {
                                                        echo "邮箱解绑";
                                                    } else {
                                                        echo "邮箱绑定";
                                                    }
                                                    ?>
                                                </a>
                                            </td>
                                        </tr>
                                        <!--                                        <tr>-->
                                        <!--                                            <td class="tc">绑定手机：</td>-->
                                        <!--                                            <td><span style="color: red;">您尚未绑定手机！</span></td>-->
                                        <!--                                            <td><a-->
                                        <!--                                                    href="javascript:void(0);" onclick="changeTab(2)"-->
                                        <!--                                                    style="text-decoration: underline;" class="info_aColor">手机绑定</a>-->
                                        <!--                                            </td>-->
                                        <!--                                        </tr>-->
                                        <tr>
                                            <td class="tc">安全级别：</td>
                                            <td>
                                                <?php if (isset($_SESSION['user']['isbind']) && $_SESSION['user']['isbind'] == 1) {
                                                    echo "高";
                                                } else {
                                                    echo "低";
                                                }
                                                ?>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" height="20"></td>
                                        </tr>
                                        <tr>
                                            <td width="100%" height="0" colspan="4"
                                                style="border-top:1px dashed #ccc; line-height:0; padding:0;">
                                                &nbsp;</td>
                                        </tr>
                                        <?php if (isset($_SESSION['user']['real_name']) && $_SESSION['user']['real_name'] == '' &&
                                            isset($_SESSION['user']['idCard']) &&
                                            $_SESSION['user']['idCard'] == ''
                                        ) { ?>
                                            <tr>
                                                <td class="type_info"><span></span></td>
                                                <td>　</td>
                                                <td height="60">
                                                    <a href="<?php echo Url::to(['user/idcard']) ?>"
                                                       style="text-decoration: underline;" class="info_aColor">立即认证</a>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" align="center" style="padding:10px 68px;">
                                                    未提供防沉迷资料，或防沉迷登记信息为未成年的帐号，将被纳入防沉迷范围，其游戏收益将受一定影响！
                                                </td>
                                            </tr>
                                        <?php } else { ?>
                                            <tr>
                                                <td rowspan="2" class="type_info"><span></span></td>
                                                <td class="tc">真实姓名：</td>
                                                <td colspan="2"><?php echo isset($_SESSION['user']['real_name']) ? $_SESSION['user']['real_name'] : ''; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="tc">身份证号：</td>
                                                <td colspan="2">

                                                    <?php echo $idCard; ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
                <script type="text/javascript">
                    function changeTab(index) {
                        var id = index + 1;
                        var curr = $(".ui-state-default.ui-corner-top.ui-tabs-active.ui-state-active");
                        curr.attr('aria-selected', 'false');
                        curr.attr('tabindex', '-1');
                        curr.removeClass('ui-tabs-active');
                        curr.removeClass('ui-state-active');
                        $('.svrttl li').eq(index).attr('aria-selected', 'true');
                        $('.svrttl li').eq(index).attr('tabindex', '0');
                        $('.svrttl li').eq(index).addClass('ui-tabs-active');
                        $('.svrttl li').eq(index).addClass('ui-state-active');

                        var t = $(".halllist.ui-tabs-panel.ui-widget-content.ui-corner-bottom[aria-hidden='false']");
                        t.attr("aria-expanded", "false");
                        t.attr('aria-hidden', 'true');
                        t.hide();
                        $('#tabs-' + id).attr('aria-expanded', 'true');
                        $('#tabs-' + id).attr('aria-hidden', 'false');
                        $('#tabs-' + id).show();
                    }
                </script>

            </div>
        </div>
        <div id="tabs-2" class="halllist" style="height:280px;">
            <div>
                <form class="" action="" method="post" autocomplete="off">
                    <fieldset>
                        <?php if (isset($_SESSION['user']['isbind']) && $_SESSION['user']['isbind'] == 1) { ?>
                            <table class="update" border="0" cellpadding="0" cellspacing="0" width="50%">
                                <tbody>
                                <tr>
                                    <td class="tr" height="40" width="30"></td>
                                    <td style="text-align:center;">已绑定邮箱:

                                        <?php echo $reg_email; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="javascript:void(0);" onclick="unbind()"
                                           style="text-decoration: underline;">解绑邮箱</a>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="inputBack" colspan="3">
                                        <input name="redirectUrl" value="index.jsp" type="hidden">
                                        <a class="allSubmitBtn congSubmit" style="color:white;width:100%;"
                                           href="<?php echo Url::to(['user/index']) ?>">返回</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <table class="update" width="50%" border="0" cellspacing="0" cellpadding="0" id="index">
                                <tr>
                                    <td width="18">&nbsp;</td>
                                    <td colspan="2">使用注册邮箱:

                                        <?php echo $reg_email; ?>绑定
                                    </td>
                                </tr>
                                <tr>
                                    <td width="100%" class="mailBtn" colspan="3">
                                        <input type="hidden" name="redirectUrl" value="index.jsp"/>
                                        <a class="allSubmitBtn" style="margin-left:34px;color:white;"
                                           href="javascript:void(0);"
                                           onclick="bindEmail('<?php echo isset($_SESSION['user']['reg_email']) ? $_SESSION['user']['reg_email'] : ''; ?>')">立即绑定</a>
                                        <a class="allSubmitBtn2" style="color:white;float:left"
                                           href="javascript:void(0);"
                                           onclick="emailNext('update','index')">修改邮箱</a>
                                    </td>
                                </tr>
                            </table>
                            <table style="margin:0 auto;display: none;" border="0" cellpadding="0" cellspacing="0"
                                   width="50%" id="update">
                                <tbody>
                                <tr style="text-align:left;" class="congTitle">
                                    <td class="tr" height="25" width="70">&nbsp;</td>
                                    <td colspan="2"><b style="font-size:24px;font-weight:bold;" class="ml30">修改邮箱</b>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tr" height="25" width="70">&nbsp;</td>
                                    <td colspan="2"><span style="color:red;"></span></td>
                                </tr>

                                <tr>
                                    <td class="tr" height="40" width="70"><span class="rd">*</span>新邮箱:</td>
                                    <td width="230"><input name="email" class="inputTxt _newEmail" type="text"></td>
                                    <td></td>
                                </tr>
                                <!--                            <tr>-->
                                <!--                                <td class="tr" height="40" width="70"><span class="rd">*</span>验证码:</td>-->
                                <!--                                <td width="230"><input name="emailCode" class="inputTxt _emailCode" type="text"></td>-->
                                <!--                                <td><a href="">-->
                                <?php //echo \yii\captcha\Captcha::widget(['name'=>'captchaimg','captchaAction'=>'/site/captcha','imageOptions'=>['id'=>'captchaimg', 'title'=>'换一个', 'alt'=>'换一个', 'style'=>'cursor:pointer;margin-top:10px; height: 22px;'],'template'=>'{image}']); ?><!--</a></td>-->
                                <!--                            </tr>-->
                                <tr>
                                    <td height="40" width="70">&nbsp;</td>
                                    <td class="inputBack" width="230">
                                        <input name="redirectUrl" value="" type="hidden">
                                        <input value="提交修改" onclick="changeEmail();" class="allSubmitBtn ml5"
                                               style="float:left;display:inline;" type="button">
                                        <a class="allSubmitBtn2" href="<?php echo Url::to(['user/index']) ?>"
                                           style="float:left;display:inline;color:white;">返回</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        <?php } ?>
                    </fieldset>
                </form>
                <div style="color:blue; text-align:center; padding:25px 0;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;提示：邮箱是您<span
                        style="color:red">找回密码的有效</span>方法，请认真填写并<span style="color:red">立即绑定</span>，邮箱认证让账号更安全。
                </div>

            </div>
        </div>
        <!--        <div id="tabs-3" class="halllist" style="height:280px;">-->
        <!--            <div>-->
        <!--                <form action="user!bindMobile.action" method="post" autocomplete="off">-->
        <!--                    <fieldset>-->
        <!--                        <table class="update" width="50%" border="0" cellspacing="0" cellpadding="0">-->
        <!---->
        <!---->
        <!--                            <tr>-->
        <!--                                <td id="yzmResult" colspan="3" style="color:#f00; padding:0 0 0 70px;"></td>-->
        <!--                            </tr>-->
        <!--                            <tr>-->
        <!--                                <td class="tr" width="73" height="40"><span class="rd">*</span>手机号:</td>-->
        <!--                                <td width="230"><input type="text" name="mobile" class="inputTxt _mobileNum"/></td>-->
        <!--                                <td></td>-->
        <!--                            </tr>-->
        <!---->
        <!--                            <tr id="robotCode">-->
        <!--                                <td class="tr" height="40"><span class="rd">*</span>验证码:</td>-->
        <!--                                <td width="230"><input type="text" name="checkCode" class="inputTxt _vailCode"/></td>-->
        <!--                                <td><a onclick="changeimg('mobile_code')" href="#"><img id="mobile_code"-->
        <!--                                                                                        src="code.action"/>换一张</a></td>-->
        <!--                            </tr>-->
        <!--                            <tr>-->
        <!--                                <td class="tr" height="40"><span class="rd">*</span>短信码:</td>-->
        <!--                                <td width="230"><input name="yzm" type="text" class="inputTxt _messageCode"/></td>-->
        <!--                                <td><input class="allSubmitBtn  _getYZM" type="button" value="获取短信码" id="yzm"/></td>-->
        <!--                            </tr>-->
        <!--                            <tr>-->
        <!--                                <td height="40">&nbsp;</td>-->
        <!--                                <td class="inputBack" width="230">-->
        <!--                                    <input type="hidden" name="redirectUrl" value="index.jsp"/>-->
        <!--                                    <input type="button" value="提交修改" onclick="bindMobile()" class="allSubmitBtn ml5"-->
        <!--                                           style="float:left;display:inline;"/>-->
        <!--                                    <a href="index.jsp" class="allSubmitBtn2"-->
        <!--                                       style="float:left;display:inline;color:white;">返回</a>-->
        <!--                                </td>-->
        <!--                                <td></td>-->
        <!--                            </tr>-->
        <!---->
        <!---->
        <!--                        </table>-->
        <!--                    </fieldset>-->
        <!--                </form>-->
        <!--                <div style="color:blue; text-align:center; padding:25px 0;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;提示：手机号是您<span-->
        <!--                        style="color:red">找回密码的有效</span>方法，请认真填写并<span style="color:red">立即绑定</span>，手机号认证让账号更安全。-->
        <!--                </div>-->
        <!---->
        <!---->
        <!--                <script type="text/javascript">-->
        <!--                    function bindMobile() {-->
        <!--                        var mobileNum = $("._mobileNum");-->
        <!--                        var vailCode = $("._vailCode");-->
        <!--                        var messageCode = $("._messageCode");-->
        <!---->
        <!--                        if ($.trim(mobileNum.val()) == '') {-->
        <!--                            mobileNum.parent().next().html('手机号不能为空!').css('color', 'red');-->
        <!--                            return;-->
        <!--                        } else if (isNaN(mobileNum.val())) {-->
        <!--                            mobileNum.parent().next().html('请正确填写手机号码!').css('color', 'red');-->
        <!--                            return;-->
        <!--                        } else if (!isNaN(mobileNum.val()) && ((mobileNum.val()).length != 11)) {-->
        <!--                            mobileNum.parent().next().html('请正确填写手机号码!').css('color', 'red');-->
        <!--                            return;-->
        <!--                        } else {-->
        <!--                            mobileNum.parent().next().html('√').css('color', 'green');-->
        <!--                        }-->
        <!---->
        <!--                        $.post("user!bindMobile.action", {-->
        <!--                            mobile: mobileNum.val(),-->
        <!--                            checkCode: vailCode.val(),-->
        <!--                            yzm: messageCode.val()-->
        <!--                        }, function (html) {-->
        <!--                            $('#tabs-3 div').text('').append(html);-->
        <!--                        });-->
        <!--                    }-->
        <!--                    //手机-->
        <!--                    function userMobile() {-->
        <!--                        var mobile = $('.loginWrap input[name="mobile"]');-->
        <!--                        if ($.trim(mobile.val()) == '') {-->
        <!--                            mobile.parent().next().html('手机号不能为空!').css('color', 'red');-->
        <!--                            return;-->
        <!--                        } else if (isNaN(mobile.val())) {-->
        <!--                            mobile.parent().next().html('请正确填写手机号码!').css('color', 'red');-->
        <!--                            return;-->
        <!--                        } else if (!isNaN(mobile.val()) && ((mobile.val()).length != 11)) {-->
        <!--                            mobile.parent().next().html('请正确填写手机号码!').css('color', 'red');-->
        <!--                            return;-->
        <!--                        } else {-->
        <!--                            mobile.parent().next().html('√').css('color', 'green');-->
        <!--                        }-->
        <!--                    }-->
        <!--                    $('input[name="mobile"]').blur(function () {-->
        <!--                        userMobile();-->
        <!--                    });-->
        <!--                    //获取验证码-->
        <!--                    $('#yzm').click(function () {-->
        <!--                        var mobileVal = $("._mobileNum").val();-->
        <!--                        var checkCode = $("._vailCode").val();-->
        <!--                        var _this = $(this);-->
        <!--                        if (!isNaN(mobileVal) && (mobileVal.length == 11)) {-->
        <!--                            $.post('sendMobileCode.action', {mobile: mobileVal, checkCode: checkCode}, function (data) {-->
        <!--                                if (data.result.success == true) {-->
        <!--                                    if (_this.val() == '获取短信码') {-->
        <!--                                        var yzm = $('#yzm').val();-->
        <!--                                        if (isNaN(yzm)) {-->
        <!--                                            _this.attr("disabled", true);-->
        <!--                                            countDown(60);-->
        <!--                                            _this.attr("disabled", false);-->
        <!--                                            $('#yzmResult').html("");-->
        <!--                                            $('#robotCode').attr("style", "display:none");-->
        <!--                                        } else {-->
        <!--                                            $('#yzmResult').html("");-->
        <!--                                            $('#robotCode').attr("style", "display:none");-->
        <!--                                            return;-->
        <!--                                        }-->
        <!--                                        $('#yzmResult').html("");-->
        <!--                                        $('#robotCode').attr("style", "display:none");-->
        <!--                                    }-->
        <!--                                } else {-->
        <!--                                    $('#yzmResult').html(data.result.msg);-->
        <!--                                    changeimg('mobile_code');-->
        <!--                                    $('#robotCode').attr("style", "");-->
        <!--                                    //$('#robotCode').attr("style","display:block");-->
        <!---->
        <!--                                }-->
        <!--                            }, 'json');-->
        <!---->
        <!--                        } else {-->
        <!--                            alert('填写信息有误！');-->
        <!--                        }-->
        <!--                    });-->
        <!--                </script>-->
        <!---->
        <!--            </div>-->
        <!--        </div>-->
        <div id="tabs-4" class="halllist" style="height:280px;">
            <div>
                <form class="loginWrap loginUserWrap" action="" method="post" autocomplete="off">
                    <fieldset>
                        <table class="update" width="55%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="tr" width="84" height="40"><span class="rd">*</span>原始密码:</td>
                                <td width="230"><input type="password" name="oldPswd" class="inputTxt _oldPwd"/></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="tr" height="40"><span class="rd">*</span>新密码:</td>
                                <td><input type="password" name="password" class="inputTxt _newPwd"/></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="tr" height="40"><span class="rd">*</span>确认密码:</td>
                                <td><input type="password" name="password2" class="inputTxt _newPwd2"/></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td height="40">&nbsp;</td>
                                <td>
                                    <input type="button" value="提交修改"
                                           class=" ChangeCode ml5 allSubmitBtn" id="ChangeCode"/>
                                    <a class="allSubmitBtn2" href="<?php echo Url::to(['user/index']) ?>"
                                       style="float:left;color:white;">返回</a>
                                </td>

                            </tr>
                        </table>
                    </fieldset>
                </form>
                <script type="text/javascript">
                    $('input[name="oldPswd"]').blur(function () {
                        var password = $('.loginUserWrap input[name="oldPswd"]');
                        if ($.trim(password.val()) == '' || password.val().length < 5 || password.val().length > 15) {
                            password.parent().next().html('密码不能为空，需由5到15个字符组成!').css('color', 'red');
                            return;
                        } else {
                            password.parent().next().html('√').css('color', 'green');
                        }
                    });
                    $('input[name="password"]').blur(function () {
                        var password = $('.loginUserWrap input[name="password"]');
                        if ($.trim(password.val()) == '' || password.val().length < 5 || password.val().length > 15) {
                            password.parent().next().html('密码不能为空，需由5到15个字符组成!').css('color', 'red');
                            return;
                        } else {
                            password.parent().next().html('√').css('color', 'green');
                        }
                    });

                    $('input[name="password2"]').blur(function () {
                        var password = $('.loginUserWrap input[name="password"]');
                        var password2 = $('.loginUserWrap input[name="password2"]');
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

                    $(function () {
                        $("#ChangeCode").click(function () {
                            var oldPswd = $('.loginWrap input[name="oldPswd"]');
                            if ($.trim(oldPswd.val()) == '') {
                                oldPswd.parent().next().html('原密码不能为空!').css('color', 'red');
                                return false;
                            } else {
                                oldPswd.parent().next().html('&nbsp;').css('color', 'red');
                            }

                            var password = $('.loginWrap input[name="password"]');
                            if ($.trim(password.val()) == '') {
                                password.parent().next().html('新密码不能为空!').css('color', 'red');
                                return false;
                            } else {
                                password.parent().next().html('&nbsp;').css('color', 'red');
                            }

                            var password2 = $('.loginWrap input[name="password2"]');
                            if ($.trim(password2.val()) == '') {
                                password2.parent().next().html('密码不能为空!').css('color', 'red');
                                return false;
                            } else {
                                password2.parent().next().html('&nbsp;').css('color', 'red');
                            }

                            if (password2.val() == password.val()) {
                                password2.parent().next().html('&nbsp;').css('color', 'red');
                            } else {
                                password2.parent().next().html('两次密码不一致！').css('color', 'red');
                                return false;
                            }

                            $.ajax({
                                type: 'get',
                                url: '<?php echo Url::to(['site/restpass']);?>',
                                data: {
                                    'oldpass': oldPswd.val(),
                                    'password': password.val(),
                                    'password2': password2.val()
                                },
                                dataType: 'json',
                                success: function (data) {
                                    if (data['error'] == 0) {
                                        alert(data['error_msg']);
                                        window.location.reload();
                                    } else {
                                        alert(data['error_msg']);
                                        return false;
                                    }
                                }
                            });
                        });
                    });
                </script>

            </div>
        </div>
    </div>
</div>
</div>

