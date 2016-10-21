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
                <legend>添加服务器</legend>
                <div class="am-form-group">
                    <label for="server_id">服务器id</label>
                    <input type="text" class="form-control" name="server_id" id="server_id" value=""
                           placeholder="输入服务器id">
                </div>
                <div class="am-form-group">
                    <label for="server_name">服务器名称</label>
                    <input type="text" class="form-control" name="server_name" id="server_name" value=""
                           placeholder="输入服务器名称">
                </div>
                <div class="am-form-group">
                    <label for="start_time">开服时间</label>
                    <input type="text" name="start_time" value="<?php echo $date; ?>" id="datetimepicker"
                           class="am-form-field">
                </div>
                <div class="am-form-group">
                    <label for="state">服务器状态</label>
                    <label class="am-radio-inline">
                        <input type="radio" value="1" name="state" id="state">开启
                    </label>
                    <label class="am-radio-inline">
                        <input type="radio" value="0" name="state" id="state">关闭
                    </label>
                </div>
                <div class="am-form-group">
                    <label for="ip">服务器ip</label>
                    <input type="text" name="ip" value="" id="ip" class="am-form-field">
                </div>
                <div class="am-form-group">
                    <label for="domain">服务器域名</label>
                    <input type="text" name="domain" value="" id="domain" class="am-form-field">
                </div>
                <div class="am-form-group">
                    <label for="server_key">服务器密匙</label>
                    <input type="text" name="server_key" value="" id="server_key" class="am-form-field">
                </div>
                <p>
                    <input type="hidden" name="_csrf-backend"
                           value="<?php echo \Yii::$app->request->getCsrfToken(); ?>">
                    <input type="hidden" name="game_id" value="<?php echo $game_id ?>">
                    <button type="button" class="am-btn am-btn-default" id="btnsub">提交</button>
                </p>
            </fieldset>
        </form>
    </div>
</div>
<!-- content end -->
<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
            format: 'yyyy-mm-dd hh:ii',
            autoclose: true,
            todayBtn: true,
            language: 'zh-CN'
        });


        $("#btnsub").click(function () {
            var $data = $('form').serialize();
            var $url = "<?php echo Url::to(['server/add']); ?>";
            $.ajax({
                type: 'post',
                url: $url,
                data: $data,
                dataType: 'json',
                success: function (data) {
                    if (data['error'] == 3002) {
                        $("#content").html(data['msg']);
                        $("#my-alert").modal('toggle');
                        window.location.href = "<?php echo Url::to(['server/index', 'game_id' => $game_id])?>";
                    } else {
                        $("#content").html(data['msg']);
                        $("#my-alert").modal('toggle');
                        return false;
                    }
                }
            });
        });
    });
</script>


