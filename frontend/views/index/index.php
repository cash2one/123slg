<?php
use yii\helpers\Url;
?>
<div class="newRight">
    <div class="hotG">
        <div class="ttl size14"><span>热门游戏</span><a href="<?php echo Url::to(['game/index'])?>" class="size14">更多></a></div>
        <div class="hotGCon">
            <ul>
                <?php foreach($hotGame as $key=>$val){?>
                <li <?php if($key==2){?> style="margin-right:0;"<?php }?>>
                    <a href="<?php echo $val->main_site;?>" target="_blank"><img src="<?php echo $val->gamePic->hot_game;?>" alt="<?php echo $val->gamename;?>"/></a>
                    <p class="funA">
                        <a href="<?php echo Url::to(['server/list','game_id'=>$val->id])?>" class="a1 a1Br" target="_blank">开始游戏</a>
                        <a href="javascript:void(0);" class="a2 a2Bl"
                           onclick="centerLoginGame()">进入新服</a>
                    </p>
                </li>
                <?php }?>
            </ul>

        </div>
    </div>
    <div class="newGameInfo">
        <div class="newGameInfoL">
            <div class="ttl size14">游戏资讯</div>
            <ul class="">
                <li><a href="" target="_blank">
                        <span class="sp1">【活动】8月22日百炼钢大酬宾、广结名士、雄黄酒宴、宝石矿脉、犒赏三军</span>
                        <span class="sp2">2016-08-21</span>
                    </a>
                </li>
                <li><a href="" target="_blank">
                        <span class="sp1">【公告】8月22日10点傲世堂989服火爆开启</span>
                        <span class="sp2">2016-08-21</span>
                    </a>
                </li>
                <li><a href="" target="_blank">
                        <span class="sp1">【活动】8月20日银币倾销，限时甩卖！</span>
                        <span class="sp2">2016-08-20</span>
                    </a>
                </li>
                <li><a href="" target="_blank">
                        <span class="sp1">【资料】武将忠诚</span>
                        <span class="sp2">2016-08-18</span>
                    </a>
                </li>
                <li><a href="" target="_blank">
                        <span class="sp1">【公告】《》7月29日合服公告</span>
                        <span class="sp2">2016-07-28</span>
                    </a>
                </li>
                <li><a href="" target="_blank">
                        <span class="sp1">【公告】7月20日合服公告</span>
                        <span class="sp2">2016-07-19</span>
                    </a>
                </li>
                <li><a href="" target="_blank">
                        <span class="sp1">【公告】7月20日合服公告</span>
                        <span class="sp2">2016-07-19</span>
                    </a>
                </li>
                <li><a href="" target="_blank">
                        <span class="sp1">【公告】《》7月19日合服公告</span>
                        <span class="sp2">2016-07-18</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="newGameInfoR">
            <ul>
                <li><a href="/jianhu/main" target="_blank"><img src="/images/guard.jpg"/></a></li>
                <li><a href="" target="_blank"><img src="/images/ccenter.jpg"/></a></li>
<!--                <li><a href="" target="_blank"><img src="/images/bindPhone.jpg"/></a></li>-->
<!--                <li class="mrgb0"><a href="" target="_blank"><img src="/images/authen.jpg"/></a></li>-->
            </ul>
        </div>
    </div>
</div>
</div>
</div>
<?php echo $this->render('../layouts/link.php');?>