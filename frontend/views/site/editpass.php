<div class="centerContent">
    <div class="gameCenterContent">
        <div id="tabs" class=" hallTab">
            <div id="tabs-1" class="halllist">
                <div style="height:277px;">
                    <form class="loginWrap" autocomplete="off">
                        <fieldset>
                            <table width="50%" style="margin:0 auto;" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <th class="congTitle" style="text-align:left;" colspan="3" height="45"><b
                                            class="ml30" style="margin-left:30px;">重设密码</b></th>
                                </tr>
                                <tr>
                                    <td class="tr" height="40"><span class="rd">*</span>新密码:</td>
                                    <td><input type="password" name="password" class="inputTxt">
                                        <input type="hidden" name="acl" value="<?php echo $acl; ?>">
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="tr" height="40"><span class="rd">*</span>确认密码:</td>
                                    <td><input type="password" name="password2" class="inputTxt"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td height="40">&nbsp;</td>
                                    <td>
                                        <a href="javascript:void(0)" class="allSubmitBtn" style="color:white;">提交</a>
                                    </td>
                                </tr>
                                </tbody>
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
        $('.allSubmitBtn').click(function (e) {
            //e.preventDefault();
            var password = $('.loginWrap input[name="password"]');
            if ($.trim(password.val()) == '') {
                alert('新密码不能为空!');
                return false;
            }

            var password2 = $('.loginWrap input[name="password2"]');
            if ($.trim(password2.val()) == '') {
                alert('密码不能为空!');
                password2.parent().next().html('密码不能为空!').css('color', 'red');
                return false;
            }

            if (password2.val() != password.val()) {
                alert('两次密码不一致！');
                return false;
            }

            $.ajax({
                type: 'get',
                url: '/site/editpass',
                data: $('form').serialize(),
                dataType: 'json',
                success: function (data) {
                    if (data['error'] == 0) {
                        alert(data['error_msg']);
                        window.location.href = '/index/index';
                    } else {
                        alert(data['error_msg']);
                        return false;
                    }
                }
            });
        });
    });
</script>
