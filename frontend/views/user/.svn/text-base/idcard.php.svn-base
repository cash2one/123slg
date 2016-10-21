<?php
use yii\helpers\Url;

?>
<div class="centerContent">
    <div id="tabs" class=" hallTab tabs1">
        <ul class="svrttl">
            <li><a class="size14 firstLi tabA tabBorderRight" href="#tabs-1">身份认证</a></li>
        </ul>
        <div id="tabs-5" class="halllist" style="height:280px;">
            <div>
                <form class="loginWrap loginUserWrap" action="" method="post" autocomplete="off">
                    <fieldset>
                        <table class="update" width="55%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="tr" width="84" height="40"><span class="rd">*</span>真实姓名:</td>
                                <td width="230"><input type="text" name="real_name" class="inputTxt _changeIdName"/>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="tr" height="40"><span class="rd">*</span>身份证号:</td>
                                <td><input type="text" name="idCard" class="inputTxt _changeIdidNum"/></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td height="40">&nbsp;</td>
                                <td>
                                    <input type="button" value="提交修改"
                                           class=" ChangeCode ml5 allSubmitBtn" onclick="changeIdNum()"/>
                                    <a class="allSubmitBtn2" href="<?php echo Url::to(['user/index']) ?>"
                                       style="float:left;color:white;">返回</a>
                                </td>

                            </tr>
                        </table>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <div id="tabs" class=" hallTab tabs2" style="display: none">
        <div id="tabs-5" class="halllist" style="height:280px;">
            <div>
                <form class="loginWrap loginUserWrap" action="" method="post" autocomplete="off">
                    <fieldset>
                        <table class="update" width="55%" border="0" cellspacing="0" cellpadding="0">
                            <tr>

                                <th class="congTitle" colspan="3" height="60">
                                    <b>恭喜你，身份认证成功，<?php if ($_SESSION['user']['isAuth'] == 0 && $_SESSION['user']['consistency'] == 1) {
                                            echo '通过防沉迷认证';
                                        } else {
                                            echo '没有通过防沉迷认证';
                                        } ?></b>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                <td class="mailBtn" align="center">
                                    <a class="allSubmitBtn congSubmit" style="color:white;width:100%;margin-top:21px;"
                                       href="<?php echo Url::to(['user/index']) ?>">立即返回</a>
                                </td>
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

