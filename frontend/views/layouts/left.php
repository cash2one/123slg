<?php
use yii\helpers\Url;
$server = \common\service\ServerService::serverList(['*'], 0, ['start_time' => SORT_DESC], 10);
$i = 1;
$dependency = [
    'class' => 'yii\caching\DbDependency',
    'sql' => 'SELECT MAX(updated_at) FROM server',
];
?>
<div class="newLeft">
    <div class="centerSvrList" id="centerSvrList">
        <div class="svrttl">
            <a class="now">最新开服列表</a>
            <a class="">新服推荐</a>
        </div>
        <div class="svrlist ">
            <div class="newSvrlist" style="display: block;">
                <ul>
                    <li class="noHoverLi"><span class="td1">开服时间</span><span class="td2">游戏</span><span
                            class="td3">服务器</span></li>
                    <?php if ($this->beginCache('serverList', ['dependency' => $dependency, 'duration' => 86400])) { ?>
                        <?php foreach ($server as $key => $val) { ?>
                            <li <?php if (strtotime(date("Y-m-d", $val['start_time'])) == strtotime(date("Y-m-d"))){ ?>class="firstThreeGame"<?php } ?>>
                                <a href="<?php echo Url::to(['game/enter','game_id'=>$val['game_id'],'server_id'=>$val['server_id']])?>">
                                    <span class="td1"><?php echo date("m-d H:i:s", $val['start_time']) ?></span>
                                    <span class="td2"><?php echo $val->game->gamename ?></span>
                                    <span class="td3"><?php echo $val['server_name']; ?></span></a>
                            </li>
                        <?php } ?>
                        <?php $this->endCache();
                    } ?>
                </ul>
            </div>
            <div class="recomSvr" style="display: none;">
                <ul>
                    <?php
                    if ($this->beginCache('serverTJ', ['dependency' => $dependency, 'duration' => 86400])) {
                        foreach ($server as $key => $val) {
                            if ($val->game->ishot == 1) {
                                ?>
                                <li>
                                    <img class="avatar" src="<?php echo $val->game->gamePic->new_server; ?>"
                                         alt="<?php echo $val->game->gamename; ?>"/>
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td class="td1"><?php echo $val->game->gamename; ?></td>
                                            <td class="td2">时间</td>
                                        </tr>
                                        <tr class="tr2">
                                            <td class="td1"><?php echo $val->server_name; ?></td>
                                            <td class="td2"><?php echo date("m-d", $val->start_time); ?></td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0);" class="enter odd"
                                                   onclick="centerLoginGame('http://nhfy.123slg.com','nhfy','989')">进入游戏</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </li>
                                <?php
                            }
                        }
                        $this->endCache();
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="notice">
        <div class="ttl size14">健康游戏公告</div>
        <ul>
            <li class="mgr28">抵制不良游戏</li>
            <li>拒绝盗版游戏</li>
            <li class="mgr28">注意自我保护</li>
            <li>谨防上当受骗</li>
            <li class="mgr28">适度游戏益脑</li>
            <li>沉迷游戏伤身</li>
            <li style="margin-bottom:0;" class="mgr28">合理安排时间</li>
            <li style="margin-bottom:0;">享受健康生活</li>
        </ul>
    </div>
</div>