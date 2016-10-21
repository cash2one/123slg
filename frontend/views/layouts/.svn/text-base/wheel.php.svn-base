<?php
use common\models\Wheel;

$dependency = [
    'class' => 'yii\caching\DbDependency',
    'sql' => 'SELECT MAX(updated_at) FROM wheel',
];

$wheel = Wheel::find()->orderBy(['game_id' => SORT_DESC])->limit(6)->all();
?>
<div class="newRight">
    <div class="rollGame">
        <div class="picSlider" id="picSlider">
            <ul class="picSliderUl">
                <?php if ($this->beginCache('wheel', ['dependency'=>$dependency,'duration' => 86400])) { ?>
                    <?php foreach ($wheel as $key => $val) { ?>
                        <li>
                            <a href="<?php echo $val->game->main_site; ?>" target="_blank"><img
                                    src="<?php echo $val->img_url ?>"/></a>
                        </li>
                    <?php } ?>
                    <?php $this->endCache();
                } ?>
            </ul>
        </div>
    </div>
    <div class="belowRoll"></div>
</div>
