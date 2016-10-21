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
        <form class="am-form" method="post" action="/cms/column/edit?id=<?php echo $column['id']; ?>">
            <fieldset>
                <div class="am-form-group">
                    <label for="password">栏目名</label>
                    <input type="text" class="" name="columnName" placeholder="栏目名" value="<?php echo $column['c_name'];?>" required>
                </div>
                <div class="am-form-group">
                    <label for="password">栏目短名</label>
                    <input type="text" class="" name="sName" placeholder="" value="" required>
                </div>
                <p>
                    <input type="hidden" name="game_id" value="<?php echo $column['game_id'];?>">
                    <input type="hidden" name="_csrf-cms"
                           value="<?php echo \Yii::$app->request->getCsrfToken(); ?>">
                    <button type="submit" class="am-btn am-btn-default" id="">提交</button>
                </p>
            </fieldset>
        </form>
    </div>
</div>

