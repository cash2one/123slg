<?php
?>
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">自助充值</strong> /
                <small>充值</small>
            </div>
        </div>
        <br>
        <div class="am-u-sm-4">
            <form class="am-form">
                <fieldset>
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
                        <input type="text" class="" name="money" value="0" placeholder="请输入充值金额" style="width: 400px">
                    </div>
                    <div class="am-form-group">
                        <label for="users">用户名</label>
                        <textarea class="" rows="20" cols="5" id="users" name="users"></textarea>
                    </div>
                    <div class="am-form-group">
                        <label for="users">备注</label>
                        <textarea class="" rows="5" cols="5" id="remark" name="remark"></textarea>
                    </div>
                    <p>
                        <input type="hidden" name="_csrf-backend"
                               value="<?php echo \Yii::$app->request->getCsrfToken(); ?>">
                        <button type="button" class="am-btn am-btn-default" id="selfPay">提交</button>
                    </p>
                </fieldset>
            </form>
        </div>
    </div>
</div>
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

        $("#selfPay").click(function () {
            var $data = $('form').serialize();
            $.ajax({
                type: 'post',
                url: '/self/pay',
                data: $data,
                dataType: 'json',
                success: function (data) {
                    if (data['error'] == 0) {
                        $("#content").html(data['msg']);
                        $("#my-alert").modal('toggle');
                        window.location.reload();
                    } else {
                        $("#content").html(data['msg']);
                        $("#my-alert").modal('toggle');
                        return false;
                    }
                }
            });
        });
    });
</script>
