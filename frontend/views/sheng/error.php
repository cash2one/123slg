<div class="centerContent">
    <div class="gameCenterContent">
        <div id="tabs" class=" hallTab">
            <div id="tabs-1" class="halllist">
                <div style="height:277px;text-align: center;">
                    <p style="font-size: 24px"><?php echo $msg; ?></p>
                    <br>
                    <br>
                    <p style="text-align: center;font-size: 16px"><b>页面将在<span id="showtimes"></span>秒后跳转</b></p>
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
            window.location.href = '/pay/index';
        }
        //每秒执行一次,showTime()
        setTimeout("showTime()", 1000);
    }
    //执行showTime()
    showTime();
</script>