<?php
use yii\helpers\Url;

?>
<script type="text/javascript" src="/static/js/plupload/plupload.full.min.js"></script>
<div class="admin-content">
    <div class="admin-content-body">
        <form class="am-form">
            <fieldset>
                <legend>友情链接</legend>
                <div class="am-form-group">
                    <label for="doc-ipt-name-1">网站名称</label>
                    <input type="text" class="" id="doc-ipt-name-1" name="link_name" placeholder="网站名称" style="width: 300px">
                </div>
                <div class="am-form-group">
                    <label for="doc-ipt-url-1">网站URL</label>
                    <input type="text" class="" id="doc-ipt-url-1" name="link_url" placeholder="网站URL" style="width: 300px">
                </div>
                <input type="hidden" name="_csrf-backend"
                       value="<?php echo \Yii::$app->request->getCsrfToken(); ?>">
                <p><button type="button" class="am-btn am-btn-default" id="btnsub">提交</button></p>
            </fieldset>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $("#btnsub").click(function(){
            $.ajax({
                type:'post',
                url:'<?php echo Url::to(['link/add']);?>',
                data:$('form').serialize(),
                dataType:'json',
                success:function (data) {
                    if (data['error'] == 3002) {
                        $("#content").html(data['msg']);
                        $("#my-alert").modal('toggle');
                        window.location.href = "<?php echo Url::to(['link/index'])?>";
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