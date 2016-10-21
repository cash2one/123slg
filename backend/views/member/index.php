<?php
use yii\helpers\Url;

?>
<link rel="stylesheet" href="/static/css/amazeui.datetimepicker.css"/>
<script src="/static/js/amazeui.datetimepicker.min.js"></script>
<script src="/static/js/locales/amazeui.datetimepicker.zh-CN.js"></script>
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">会员管理</strong> /
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
                    <label for="username">用户名</label>
                    <input type="text" name="username" id="username" value="<?php echo $username; ?>">
                </div>
                <div class="am-form-group">
                    <label for="start_time">开始时间</label>
                    <input type="text" class="am-form-field" name="dt1" value="<?php echo date('Y-m-d', $dt1); ?>"
                           data-am-datepicker required/>
                </div>
                <div class="am-form-group">
                    <label for="start_time">结束时间</label>
                    <input type="text" class="am-form-field" name="dt2" value="<?php echo date('Y-m-d', $dt2); ?>"
                           data-am-datepicker required/>
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
                            <th class="table-type">UID</th>
                            <th class="table-type">用户名</th>
                            <th class="table-type">游戏区服</th>
                            <th class="table-type">注册来源</th>
                            <th class="table-type">注册时间</th>
                            <th class="table-type">注册IP</th>
                            <th class="table-type am-hide-sm-only">最后登录时间</th>
                            <th class="table-date am-hide-sm-only">最后登录IP</th>
                            <th class="table-set">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($result['list'] as $key => $val) {
                            echo "<tr>";
                            echo "<td>" . $val['uid'] . "</td>";
                            echo "<td>" . $val['username'] . "</td>";
                            echo "<td>" . $val->game->gamename . '-' . $val->server->server_name . "</td>";
                            echo "<td>" . $val->cpsLog->cpsMember->username . "</td>";
                            echo "<td>" . date("Y-m-d H:i:s", $val['first_time']) . "</td>";
                            echo "<td>" . $val['first_ip'] . "</td>";
                            echo "<td>" . date("Y-m-d H:i:s", $val['last_time']) . "</td>";
                            echo "<td>" . $val['last_ip'] . "</td>";
                            echo "<td>" .
                                '<div class="am-dropdown" data-am-dropdown="">
                  <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle=""><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
                  <ul class="am-dropdown-content">
                    <li><a href="' . Url::to(['member/edit', 'uid' => $val['uid']]) . '">1. 编辑</a></li>
                    <li><a href="' . Url::to(['member/togame', 'uid' => $val['uid'], 'game_id' => $val['game_id'], 'server_id' => $val['server_id']]) . '">2. 进入游戏</a></li>                   
                  </ul>
                </div>'
                                . "</td>";
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
    $('#dt1').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        autoclose: true,
        todayBtn: true,
        language: 'zh-CN'
    });
    $('#dt2').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        autoclose: true,
        todayBtn: true,
        language: 'zh-CN'
    });
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