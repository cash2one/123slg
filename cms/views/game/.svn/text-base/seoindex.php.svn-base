<?php
use yii\helpers\Url;

?>
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">官网管理</strong> /
                <small>官网首页SEO</small>
            </div>
        </div>
        <hr>
        <form class="am-form" method="post" action="/game/seo-index?game_id=<?php echo $game_id; ?>">
            <fieldset>
                <div class="am-form-group">
                    <label for="password">META Title（栏目标题） 针对搜索引擎设置的标题 </label>
                    <input type="text" class="" name="title" placeholder="标题" value="<?php echo $seo['title'];?>" required>
                </div>
                <div class="am-form-group">
                    <label for="password">META Keywords（栏目关键词）关键字中间用半角逗号隔开</label>
                    <input type="text" class="" name="keywords" placeholder="关键词" value="<?php echo $seo['keywords'];?>" required>
                </div>
                <div class="am-form-group">
                    <label for="password">META Description（栏目描述）针对搜索引擎设置的网页描述</label>
                    <input type="text" class="" name="description" placeholder="描述" value="<?php echo $seo['description'];?>" required>
                </div>
                <p>
                    <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
                    <input type="hidden" name="_csrf-cms"
                           value="<?php echo \Yii::$app->request->getCsrfToken(); ?>">
                    <button type="button" class="am-btn am-btn-default" id="btnsub">提交</button>
                </p>
            </fieldset>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $("#btnsub").click(function () {
            $.ajax({
                type: 'post',
                url: '/game/seo-index?game_id=<?php echo $game_id; ?>',
                data: $('form').serialize(),
                dataType: 'json',
                success: function (data) {
                    if (data['error'] == 0) {
                        $("#content").html(data['msg']);
                        $("#my-alert").modal('toggle');
                        window.location.href = "<?php echo Url::to(['game/index'])?>";
                    } else {
                        $("#content").html(data['msg']);
                        $("#my-alert").modal('toggle');
                        return false;
                    }
                }
            })
            ;
        });
    });
</script>