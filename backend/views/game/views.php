<?php
use yii\helpers\Url;

?>
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
                <legend>添加游戏</legend>
                <div class="am-form-group">
                    <label for="gamename">游戏名</label>
                    <input type="text" class="form-control" name="gamename" id="gamename" value="<?php echo $game['gamename'];?>" placeholder="输入游戏名">
                </div>
                <div class="am-form-group">
                    <label for="tag">游戏标签</label>
                    <input type="text" class="" name="tag" id="tag" value="<?php echo $game['enname'];?>" placeholder="游戏标签">
                </div>
                <div class="am-form-group">
                    <label for="orders">游戏排序</label>
                    <input type="text" class="" name="orders" id="orders" value="<?php echo $game['orders'];?>" placeholder="游戏排序">
                </div>
                <div class="am-form-group">
                    <label for="orders">游戏官网</label>
                    <input type="url" class="" name="main_site" id="main_site" value="<?php echo $game['main_site'];?>" placeholder="游戏官网">
                </div>
                <div class="am-form-group">
                    <label for="orders">游戏论坛</label>
                    <input type="url" class="" name="bbs_site" id="bbs_site" value="<?php echo $game['bbs_site'];?>" placeholder="游戏论坛">
                </div>
                <div class="am-form-group">
                    <label for="orders">游戏币名</label>
                    <input type="text" class="" name="gold_name" id="gold_name" value="<?php echo $game['gold_name'];?>" placeholder="游戏币名">
                </div>
                <div class="am-form-group">
                    <label for="orders">兑换比例</label>
                    <input type="text" class="" name="cny_rate" id="cny_rate" value="<?php echo $game['cny_rate'];?>" placeholder="兑换比例">
                </div>
                <div class="am-form-group">
                    <label for="orders">分成比例</label>
                    <input type="text" class="" name="percent" id="percent" value="<?php echo $game['percent'];?>" placeholder="分成比例">
                </div>
                <div class="am-form-group">
                    <label for="orders">游戏描述</label>
                    <textarea class="" rows="5" name="descript" id="descript"><?php echo $game['descript'];?></textarea>
                </div>
                <div class="am-form-group">
                    <label class="am-radio-inline">
                        <input type="radio" value="1" name="display" <?php if($game['display']==1) echo 'checked'?> >显示
                    </label>
                    <label class="am-radio-inline">
                        <input type="radio" value="0" name="display" <?php if($game['display']==0) echo 'checked'?>>不显示
                    </label>
                </div>
            </fieldset>
        </form>
    </div>
</div>


