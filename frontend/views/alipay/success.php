<div class="centerContent">
    <div class="gameCenterContent">
        <div id="tabs" class=" hallTab">
            <div id="tabs-1" class="halllist">
                <div style="height:277px;text-align: center;">
                    <p style="font-size: 24px">充值成功</p>
                    <P><span id="showtimes"></span></P>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    //设定倒数秒数
    var t = 10;
    //显示倒数秒数
    function showTime(){
        t -= 1;
        document.getElementById('showtimes').innerHTML= t;
        if(t==0){
            location.href='/pay/index';
        }
        //每秒执行一次,showTime()
        setTimeout("showTime()",1000);
    }
    //执行showTime()
    showTime();
</script>