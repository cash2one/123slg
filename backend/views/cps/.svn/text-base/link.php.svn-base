<?php
?>
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">推广链接</strong> /
                <small>列表</small>
            </div>
        </div>
        <hr>
        <div class="am-g">
            <form class="am-form-inline" role="form" method="get">
                <div class="am-form-group">
                    <select data-am-selected="{btnSize: 'sm'}" name="game_id" id="game">
                        <option value="0">所有游戏</option>
                        <?php
                        foreach ($gameList as $key => $val) {
                            if ($val['id'] == $game_id) {
                                echo '<option value="' . $val['id'] . '" selected>' . $val['gamename'] . '</option>';
                            } else {
                                echo '<option value="' . $val['id'] . '">' . $val['gamename'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="am-form-group">
                    <select data-am-selected="{btnSize: 'sm'}" name="server_id" id="server">
                        <option value="0">游戏区服</option>
                        <?php
                        if ($serverList) {
                            foreach ($serverList as $key => $val) {
                                if ($val['server_id'] == $server->server_id) {
                                    echo '<option value="' . $val['server_id'] . '" selected>' . $val['server_name'] . '</option>';
                                } else {
                                    echo '<option value="' . $val['server_id'] . '">' . $val['server_name'] . '</option>';
                                }

                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="am-form-group">
                    <select data-am-selected="{btnSize: 'sm'}" name="cps_id" id="cps_id">
                        <option value="0">推广渠道</option>
                        <?php
                        if ($cpsList) {
                            foreach ($cpsList as $key => $val) {
                                if ($val['id'] == $cps_id) {
                                    echo '<option value="' . $val['id'] . '" selected>' . $val['username'] . '</option>';
                                } else {
                                    echo '<option value="' . $val['id'] . '">' . $val['username'] . '</option>';
                                }

                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="am-form-group">
                    <input type="text" name="username" placeholder="渠道名">
                </div>
                <input type="hidden" name="_csrf-backend" value="<?php echo \Yii::$app->request->getCsrfToken(); ?>">
                <button type="submit" class="am-btn am-btn-default">搜索</button>
            </form>
        </div>

        <div class="am-g">
            <div class="am-u-sm-12">
                <form class="am-form">
                    <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th class="table-type">ID</th>
                            <th class="table-type">渠道名</th>
                            <th class="table-type">链接地址</th>
                            <th class="table-type">短链接地址</th>
                            <th class="table-type">游戏</th>
                            <th class="table-type am-hide-sm-only">区服</th>
                            <th class="table-set">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($result['list'] as $key => $val) {
                            echo "<tr>";
                            echo "<td>" . $val['id'] . "</td>";
                            echo "<td>" . $val['refname'] . "</td>";
                            echo "<td>" . $val['refurl'] . "</td>";
                            echo "<td>" . $val['shorturl'] . "</td>";
                            echo "<td>" . $val->server->game->gamename . "</td>";
                            echo "<td>" . $val->server->server_name . "</td>";
                            echo "<td><a href='" . \yii\helpers\Url::to(['cps/first-pay', 'key' => \common\utils\Encryption::encrypt($val['id'] . '&' . $val['game_id'] . '&' . $val['area_num'])]) . "'>首充发放</a> </td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <div class="am-cf">
                        共 <?php echo $result['totalCount']; ?> 条记录
                        <div class="am-fr">
                            <?php
                            echo \yii\widgets\LinkPager::widget([
                                'pagination' => $result['pagination'],
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
<!-- content end -->
<script type="text/javascript">
    $(function () {
        $("#game").change(function () {
            var $game_id = $(this).val();
            $.ajax({
                type: 'get',
                url: '/server/server-list',
                data: {'game_id': $game_id},
                dataType: 'json',
                success: function (data) {
                    var $html = '';
                    for (var $i = 0; $i < data.length; $i++) {
                        $html += '<option value="' + data[$i]['server_id'] + '">' + data[$i]['server_name'] + '</option>';
                    }
                    $("#server").html($html);
                }
            });
        });
    });
</script>