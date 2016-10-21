<div class="gameCenterContent">
    <div id="gcTabs" class=" hallTab gameCenterTab">
        <div id="tabs-1" class="halllist gchalllist" style="padding: 0px">
            <ul class="mrgt31">
                <?php foreach($list as $key=>$val){?>
                <li>
                    <a class="gameImg" href="<?php echo $val->main_site;?>" target="_blank"><img src="<?php echo $val->gamePic->game_center;?>"/>
                        <div class="shadow"></div>
                    </a>
                    <div class="description">
                        <p class="p1"><?php echo $val->gamename;?></p>
                        <p class="p2">
                            <?php echo $val->descript;?>
                        </p>
                        <p class="p3">
                            <a href="<?php echo $val->main_site;?>" target="_blank" class="gc_official">官网</a>
                            <a href="<?php echo $val->main_site;?>" target="_blank" class="gc_bbs">论坛</a>
                            <a href="<?php echo $val->main_site.'/card';?>" class="gc_fresher" target="_blank">新手卡</a>
                            <a href="<?php echo $val->main_site.'/server';?>" target="_blank" class="gc_enter">进入游戏</a>
                        </p>
                    </div>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</div>

</div>
</div>
<?php echo $this->render('../layouts/link.php'); ?>
