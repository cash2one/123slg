<?php
use yii\helpers\Url;

?>
<link rel="stylesheet" href="/static/css/amazeui.datetimepicker.css"/>
<script src="/static/js/amazeui.datetimepicker.min.js"></script>
<script src="/static/js/locales/amazeui.datetimepicker.zh-CN.js"></script>
<!-- content start -->
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf">
                <strong class="am-text-primary am-text-lg">运营管理</strong> /
                <small>游戏管理</small>
            </div>
        </div>
        <hr>
        <form class="am-form">
            <fieldset>
                <legend>编辑服务器</legend>
                <div class="am-form-group">
                    <label for="server_id">服务器id</label>
                    <input type="text" class="form-control" name="server_id" id="server_id" value="<?php echo $server['server_id'];?>" placeholder="输入服务器id">
                </div>
                <div class="am-form-group">
                    <label for="server_name">服务器名称</label>
                    <input type="text" class="form-control" name="server_name" id="server_name" value="<?php echo $server['server_name'];?>" placeholder="输入服务器名称">
                </div>
                <div class="am-form-group">
                    <label for="start_time">开服时间</label>
                    <input type="text" name="start_time" value="<?php echo date("Y-m-d H:i:s",$server['start_time']);?>" id="datetimepicker" class="am-form-field">
                </div>
                <div class="am-form-group">
                    <label for="state">服务器状态</label>
                    <label class="am-radio-inline">
                        <input type="radio" value="1" name="state" id="state" <?php if($server['state']==1) echo "checked";?>>开启
                    </label>
                    <label class="am-radio-inline">
                        <input type="radio" value="0" name="state" id="state" <?php if($server['state']==0) echo "checked";?>>关闭
                    </label>
                </div>
                <div class="am-form-group">
                    <label for="ip">服务器ip</label>
                    <input type="text" name="ip" value="<?php echo $server['ip'];?>" id="ip" class="am-form-field">
                </div>
                <div class="am-form-group">
                    <label for="domain">服务器域名</label>
                    <input type="text" name="domain" value="<?php echo $server['domain'];?>" id="domain" class="am-form-field">
                </div>
                <div class="am-form-group">
                    <label for="server_key">服务器密匙</label>
                    <input type="text" name="server_key" value="<?php echo $server['server_key'];?>" id="server_key" class="am-form-field">
                </div>
                <p>
                    <input type="hidden" name="_csrf-backend" value="<?php echo \Yii::$app->request->getCsrfToken(); ?>">
                    <input type="hidden" name="game_id" value="<?php echo $game_id;?>">
                    <input type="hidden" name="server_id" value="<?php echo $server_id;?>">
                    <button type="button" class="am-btn am-btn-default" id="btnsub">提交</button>
                </p>
            </fieldset>
        </form>
    </div>
</div>
<!-- content end -->
<script type="text/javascript">
    $(function(){
        $('#datetimepicker').datetimepicker({
            format: 'yyyy-mm-dd hh:ii',
            autoclose:true,
            todayBtn:true,
            language:'zh-CN'
        });


        $("#btnsub").click(function(){
            var $data = $('form').serialize();
            var $url = "<?php echo Url::to(['server/edit','game_id'=>$game_id,'server_id'=>$server_id]); ?>";
            $.ajax({
                type: 'post',
                url: $url,
                data: $data,
                dataType: 'json',
                success: function (data) {
                    if (data['error'] == 3002) {
                        $("#content").html(data['msg']);
                        $("#my-alert").modal('toggle');
                        window.location.href="<?php echo Url::to(['server/index','game_id'=>$game_id])?>";
                    }else{
                        $("#content").html(data['msg']);
                        $("#my-alert").modal('toggle');
                        return false;
                    }
                }
            });
        });
    });
</script>


