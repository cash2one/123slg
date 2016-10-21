<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">链接管理</strong> /
                <small>提取链接</small>
            </div>
            <hr>
            <?php if ($_SESSION['cps']['pid'] == 0) { ?>
                <div class="am-g">
                    <form class="am-form-inline" role="form" method="get">
                        <div class="am-form-group">
                            <select data-am-selected="{btnSize: 'sm'}" id="cps">
                                <option value="0">下属渠道</option>
                                <?php
                                if ($cpsList) {
                                    foreach ($cpsList as $key => $val) {
                                        echo '<option value="' . $val['id'] . '">' . $val['username'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
        <hr>
        <div class="am-g">
            <div class="am-u-sm-12">
                <form class="am-form">
                    <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th class="table-title">游戏名</th>
                            <th class="table-type">区服名</th>
                            <th class="table-title">开服时间</th>
                            <th class="table-title">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($serverList as $key => $val) {
                            echo "<tr>";
                            echo "<td>" . $val->game->gamename . "</td>";
                            echo "<td>" . $val->server_name . "</td>";
                            echo "<td>" . date("Y-m-d H:i:s", $val->start_time) . "</td>";
                            echo "<td><a href='javascript:void(0)' onclick='createLink(" . $val->game_id . "," . $val->server_id . ")'>单服链接</a>
                            &nbsp;|&nbsp;<a href='javascript:void(0)' onclick='createLink(" . $val->game_id . ",0)'>通服链接</a></td>";
                            echo "</tr>";
                        } ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var $cps_id = 0;
    $(function () {
        $("#cps").change(function () {
            $cps_id = $(this).val();
        });
    });
    function createLink(game_id, server_id) {
        <?php if($_SESSION['cps']['pid']==0){?>
        if ($cps_id == 0) {
            $("#content").html('请选择要生成链接的渠道');
            $("#my-alert").modal('toggle');
            return false;
        }
        <?php }?>
        $.ajax({
            type: 'get',
            url: '/cps/create-link',
            data: {
                'game_id': game_id,
                'server_id': server_id,
                'cps_id': $cps_id
            },
            dataType: 'json',
            success: function (data) {
                if (data['error'] == 0) {
                    $("#content").html(data['msg']);
                    $("#my-alert").modal('toggle');
                    window.location.href = "<?php echo Url::to(['cps/link'])?>";
                } else {
                    $("#content").html(data['msg']);
                    $("#my-alert").modal('toggle');
                    return false;
                }
            }
        });
    }
</script>