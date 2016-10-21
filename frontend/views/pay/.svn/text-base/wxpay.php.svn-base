<div class="centerContent">
    <div style="width:370px;height: 370px;margin: 0 auto">
        <p style="text-align: center;font-size: 16px"><b>深圳策略一二三网络有限公司</b></p>
        <p style="text-align: left;font-size: 16px">游戏区服：<?php echo $descript; ?></p>
        <p style="text-align: left;font-size: 16px">充值金额：<?php echo $money; ?></p>
        <img src="<?php echo \yii\helpers\Url::to(['site/qrcode', 'url' => $url]) ?>"/>
        <br>
        <br>
        <p style="text-align: center;font-size: 16px"><b>页面将在<span id="showtimes"></span>秒后关闭，请尽快完成支付</b></p>
    </div>
</div>
<br>
<script type="text/javascript">
    //设定倒数秒数
    var t = 120;
    //显示倒数秒数
    function showTime() {
        t -= 1;
        document.getElementById('showtimes').innerHTML = t;
        if (t == 0) {
            window.opener = null;
            window.open('', '_self');
            window.close();
        }
        //每秒执行一次,showTime()
        setTimeout("showTime()", 1000);
    }
    //执行showTime()
    showTime();
</script>