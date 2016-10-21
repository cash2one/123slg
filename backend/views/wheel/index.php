<?php
use yii\helpers\Url;

?>
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页轮播图</strong> /
                <small>列表</small>
            </div>
        </div>
        <hr>
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <a href="<?php echo Url::to(['wheel/add']); ?>" class="am-btn am-btn-default"><span
                                class="am-icon-plus"></span> 新增
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <table class="am-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>游戏名</th>
                <th>网址</th>
                <th>图片地址</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($wheel as $key => $val) {
                echo '<tr>';
                echo '<td>' . $val['id'] . '</td>';
                echo '<td>' . $val->game->gamename . '</td>';
                echo '<td>' . $val->game->main_site . '</td>';
                echo '<td>' . $val['img_url'] . '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

