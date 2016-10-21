<?php
use yii\helpers\Url;

?>
<div class="centerContent">
    <div id="tabs" class=" hallTab">
        <div id="tabs-1" class="halllist">
            <div style="height:280px;">

                <form class="" action="" method="post" autocomplete="off">
                    <fieldset>

                        <table width="50%" style="margin:0 auto;" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <th class="congTitle" colspan="3" height="60"><b><?php echo $title; ?></b></th>
                            </tr>
                            <tr>
                                <td class="congTitle" colspan="3" height="60"><b><span
                                            id="showtimes"></span><?php echo $content; ?></b></td>
                            </tr>
                            <tr>
                                <td class="mailBtn" align="center">
                                    <a class="allSubmitBtn congSubmit" style="color:white;width:100%;margin-top:21px;"
                                       href="<?php echo $url ?>">点此跳转</a>
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
    //设定倒数秒数
    var t = 5;
    //显示倒数秒数
    function showTime() {
        t -= 1;
        document.getElementById('showtimes').innerHTML = t;
        if (t == 0) {
            window.location.href = '<?php echo $url?>';
        }
        //每秒执行一次,showTime()
        setTimeout("showTime()", 1000);
    }
    //执行showTime()
    showTime();
</script>
