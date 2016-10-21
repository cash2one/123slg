<?php
use yii\helpers\Url;

?>
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">游戏管理</strong> /
                <small>服务器列表</small>
            </div>
        </div>
        <hr>
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <button type="button" class="am-btn am-btn-default" id="addServer"><span
                                class="am-icon-plus"></span> 新增
                        </button>
                    </div>
                </div>
            </div>
            <div class="am-u-sm-12 am-u-md-3">
                <div class="am-input-group am-input-group-sm">
                    <input type="text" class="am-form-field">
                        <span class="am-input-group-btn">
                           <button class="am-btn am-btn-default" type="button">搜索</button>
                    </span>
                </div>
            </div>
        </div>

        <div class="am-g">
            <div class="am-u-sm-12">
                <form class="am-form">
                    <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th class="table-id">ID</th>
                            <th class="table-title">游戏名称</th>
                            <th class="table-title">服务器名称</th>
                            <th class="table-title">开服时间</th>
                            <th class="table-title">状态</th>
                            <th class="table-type">充值金额</th>
                            <th class="table-author am-hide-sm-only">今日充值</th>
                            <th class="table-date am-hide-sm-only">注册人数(总)</th>
                            <th class="table-set">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($list as $key => $val) { ?>
                            <tr>
                                <td><?php echo $val['server_id']; ?></td>
                                <td><?php echo $val->game->gamename; ?></td>
                                <td><?php echo $val['server_name']; ?></td>
                                <td class="am-hide-sm-only"><?php echo date("Y-m-d H:i:s", $val['start_time']); ?></td>
                                <td class="am-hide-sm-only"><?php if($val['state']==1){ echo '开启';}else{ echo '关闭'; }?></td>
                                <td class="am-hide-sm-only"></td>
                                <td class="am-hide-sm-only"></td>
                                <td class="am-hide-sm-only"></td>
                                <td>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-xs am-text-secondary"
                                                    onclick="editServer('<?php echo Url::to(['server/edit', 'server_id' => $val['server_id'], 'game_id' => $val['game_id']]) ?>')"><span
                                                    class="am-icon-pencil-square-o"></span>
                                                编辑
                                            </button>
                                            <button type="button"
                                                    class="am-btn am-btn-default am-btn-xs am-hide-sm-only"
                                                    onclick="serverList('<?php echo Url::to(['server/index', 'game_id' => $val['game_id']]) ?>')"><span
                                                    class="am-icon-copy"></span> 修改状态
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <div class="am-cf">
                        共 <?php echo $totalCount;?> 条记录
                        <div class="am-fr">
                            <?php
                            echo \yii\widgets\LinkPager::widget([
                                'pagination' => $pagination,
                                'options' => ['class' => 'am-pagination'],
                            ]);
                            ?>
                        </div>
                    </div>
                    <hr/>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $("#addServer").click(function (e) {
            e.preventDefault();
            window.location.href = '<?php echo Url::to(['server/add', 'game_id' => $game_id])?>';
        });
    })

    function editServer($url) {
        window.location.href = $url;
    }
</script>