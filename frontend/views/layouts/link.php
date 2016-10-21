<?php
use common\models\Link;

$list = Link::find()->asArray()->all();

$dependency = [
    'class' => 'yii\caching\DbDependency',
    'sql' => 'SELECT MAX(updated_at) FROM link',
];
?>
<div class="newFooter">
    <a>友情链接:</a>
    <?php if ($this->beginCache('link', ['dependency'=>$dependency,'duration' => 86400])) { ?>
    <?php foreach($list as $key=>$val){?>
    <a href="<?php echo $val['link_url'];?>" target="_blank"><?php echo $val['link_name'];?></a>
    <?php }?>
        <?php $this->endCache();
    } ?>
</div>