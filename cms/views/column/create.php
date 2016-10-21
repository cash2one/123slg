<?php
use yii\helpers\Url;

?>
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">栏目管理</strong> /
                <small>添加栏目</small>
            </div>
        </div>
        <form class="am-form" method="post" action="/column/create?game_id=<?php echo $game['id']; ?>">
            <fieldset>
                <div class="am-form-group">
                    <label for="username">游戏名</label>
                    <input type="text" class="" name="" id="" value="<?php echo $game['gamename']; ?>" readonly>
                </div>
                <div class="am-form-group">
                    <label for="password">栏目名</label>
                    <input type="text" class="" name="columnName" placeholder="栏目名" value="" required>
                </div>
                <div class="am-form-group">
                    <label for="password">栏目短名</label>
                    <input type="text" class="" name="sName" placeholder="" value="" required>
                </div>
                <div class="am-form-group">
                    <label for="password">栏目英文名</label>
                    <input type="text" class="" name="directory" placeholder="" value="" required>
                </div>
                <div class="am-form-group">
                    <label for="password">栏目图片</label>
                    <input type="text" class="" name="img" placeholder="" value="">
                </div>
                <p>
                    <input type="hidden" name="_csrf-cms"
                           value="<?php echo \Yii::$app->request->getCsrfToken(); ?>">
                    <button type="submit" class="am-btn am-btn-default" id="">提交</button>
                </p>
            </fieldset>
        </form>
    </div>
</div>

