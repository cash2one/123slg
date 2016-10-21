<div class="centerContent">
    <div class="gameCenterContent">
        <div id="tabs" class=" hallTab">
            <div id="tabs-1" class="halllist">
                <div style="height:277px;">
                    <form class="loginWrap" action="" method="post" autocomplete="off">
                        <fieldset>
                            <table width="50%" style="margin:0 auto;" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <th class="congTitle" style="text-align:left;" colspan="3" height="60"><b
                                            class="ml30">找回密码</b></th>
                                </tr>
                                <tr>
                                    <td class="tr" width="70" height="25">&nbsp;</td>
                                    <td colspan="2"><span style="color:red;"></span></td>
                                </tr>

                                <tr>
                                    <td id="yzmResult" colspan="3" style="color:#f00; padding:0 0 0 70px;"></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <table>
                                            <tr>
                                                <td class="tr" width="70" height="40"><span class="rd">*</span>用户名:</td>
                                                <td width="230"><input name="username" type="text" class="inputTxt"/>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <table id="mail">
                                            <tr>
                                                <td class="tr" width="70" height="40"><span class="rd">*</span>邮　箱:</td>
                                                <td width="230"><input name="email" type="text" class="inputTxt"/></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <table>
                                            <tr>
                                                <td class="tr" width="70" height="40"></td>
                                                <td class="inputBack" colspan="2">
                                                    <input class="allSubmitBtn" style="color:white;"
                                                           id="submitTofindPsw" type="button" value="找回密码"
                                                           class="inputBtnLostPass ml5"
                                                           style="float:left;display:inline;"/>
                                                    <a class="allSubmitBtn2" style="color:white;" href=""
                                                       style="float:left;display:inline;margin-left:30px;">返回</a>
                                                </td>
                                            </tr>
                                        </table>
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
</div>
<script type="text/javascript">
    $(function () {
//用户名
        function userName() {
            //var emailReg =  /^([a-zA-Z0-9_\-.])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
            var username = $('.loginWrap input[name="username"]');
            if ($.trim(username.val()) == '') {
                username.parent().next().html('用户名不能为空').css('color', 'red');
                return;
            } else {
                username.parent().next().html('√').css('color', 'green');
            }
        }

        $('input[name="username"]').blur(function () {
            userName();
        });
//邮箱
        function userMail() {
            var emailReg = /^([a-zA-Z0-9_\-.])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
            var email = $('.loginWrap input[name="email"]');
            if ($.trim(email.val()) == '') {
                email.parent().next().html('邮箱不能为空!').css('color', 'red');
                return;
            } else if (!emailReg.test(email.val())) {
                email.parent().next().html('例:"user@example.com"').css('color', 'red');
                return;
            } else {
                email.parent().next().html('√').css('color', 'green');
            }
        }

        $('input[name="email"]').blur(function () {
            userMail();
        });

        $('#submitTofindPsw').click(function () {
            checkMail();
        });

        function checkMail() {
            var username = $('.loginWrap input[name="username"]').val();
            var email = $('.loginWrap input[name="email"]');
            $.get('/site/findpass', {
                username: username,
                email: email.val()
            }, function (data) {
                console.log(data);
                if (data['error'] == 0) {
                    window.location.href = data['url'];
                } else {
                    $('#yzmResult').html(data['error_msg']);
                }
            }, 'json');

        }
    });
    //找回密码
    $('.inputBtnLostPass').bind('click', function () {
        userName();
        userMail();
    });
</script>

