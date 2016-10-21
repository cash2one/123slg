<?php
use yii\helpers\Url;

?>
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">官网管理</strong> /
                <small>官网列表</small>
            </div>
        </div>
        <hr>
        <div class="am-g">
            <div class="am-u-sm-12">
                <form class="am-form">
                    <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th class="table-id">ID</th>
                            <th class="table-title">游戏名</th>
                            <th class="table-type">官网地址</th>
                            <th class="table-type">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($gameList as $key => $val) {
                            echo '<tr>';
                            echo '<td>' . $val['id'] . '</td>';
                            echo '<td>' . $val['gamename'] . '</td>';
                            echo '<td><a href="' . $val['main_site'] . '" target="_blank">' . $val['main_site'] . '</a></td>';
                            if ($val['state'] == 1) {
                                echo '<td><a href="javascript:void(0)" onclick="create(' . $val['id'] . ')">生成</a>&nbsp;|&nbsp;<a href="' . Url::to(['game/view-index', 'game_id' => $val['id']]) . '" target="_blank">预览</a>&nbsp;|&nbsp;<a href="' . Url::to(['game/seo-index', 'game_id' => $val['id']]) . '">SEO</a></td>';
                            } else {
                                echo '<td><a href="javascript:void(0)" onclick="create(' . $val['id'] . ')">创建官网</a> </td>';
                            }
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function create(game_id) {
        $.ajax({
            type: 'get',
            url: '/game/create',
            data: {
                'game_id': game_id
            },
            dataType: 'json',
            success: function (data) {
                if (data['error'] == 0) {
                    alert('创建成功');
                    window.location.reload();
                } else {
                    alert(data['msg']);
                    return false
                }
            }
        });
    }
</script>