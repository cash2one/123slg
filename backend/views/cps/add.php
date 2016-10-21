<?php
use yii\helpers\Url;
?>
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">渠道管理</strong> /
                <small>添加渠道</small>
            </div>
        </div>
        <form class="am-form">
            <fieldset>
                <div class="am-form-group">
                    <label for="username">用户名</label>
                    <input type="text" class="" name="username" id="username" placeholder="输入用户名">
                </div>

                <div class="am-form-group">
                    <label for="password">密码</label>
                    <input type="password" class="" name="password" id="password" placeholder="设置个密码吧">
                </div>

                <p>
                    <input type="hidden" name="_csrf-backend"
                           value="<?php echo \Yii::$app->request->getCsrfToken(); ?>">
                    <button type="button" class="am-btn am-btn-default" id="addCps">提交</button>
                </p>
            </fieldset>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $("#addCps").click(function () {
            var $data = $('form').serialize();
            $.ajax({
                type:'post',
                url:'/cps/add',
                data:$data,
                dataType:'json',
                success:function(data){
                    if (data['error'] == 3002) {
                        $("#content").html(data['msg']);
                        $("#my-alert").modal('toggle');
                        window.location.href = "<?php echo Url::to(['cps/index'])?>";
                    } else {
                        $("#content").html(data['msg']);
                        $("#my-alert").modal('toggle');
                        return false;
                    }
                }
            })
        });
    });
</script>
