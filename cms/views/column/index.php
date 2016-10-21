<?php
use yii\helpers\Url;

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
                <button type="submit" class="am-btn am-btn-default">搜索</button>
                <button type="button" class="am-btn am-btn-default am-radius" onclick="addCol()">添加栏目</button>
            </form>
        </div>
        <div class="am-g">
            <div class="am-u-sm-12">
                <form class="am-form">
                    <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th class="table-id">ID</th>
                            <th class="table-type">栏目名</th>
                            <th class="table-type">栏目短名</th>
                            <th class="table-set">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($result) {
                            foreach ($result as $key => $val) {
                                echo '<tr>';
                                echo '<td>' . $val['id'] . '</td>';
                                echo '<td>' . $val['c_name'] . '</td>';
                                echo '<td>' . $val['s_name'] . '</td>';
                                echo '<td><a href="' . Url::to(['/cms/column/edit', 'id' => $val['id']]) . '">编辑</a>&nbsp;|&nbsp;<a href="javascript:void(0)" onclick="delColumn(' . $val['id'] . ')">删除</a> </td>';
                                echo '</tr>';
                            }
                            echo '<tr><td colspan="2" align="right"><button type="button" class="am-btn am-btn-default am-radius" onclick="viewIndex()">预览首页</button></td>';
                            echo '<td colspan="2" align=""><button type="button" class="am-btn am-btn-default am-radius" onclick="initIndex()">生成首页</button></td></tr>';
                        } elseif ($game_id != 0) {
                            echo '<tr><td colspan="3" align="center">该游戏下面没有栏目</td></tr>';
                            echo '<td colspan="3" align="center"><a href="/cms/column/create?game_id=' . $game_id . '">创建栏目</a></td>';
                        } else {
                            echo '<tr><td colspan="3" align="center">请选择游戏创建栏目</td></tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                    <hr/>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var game_id = 0;
    function delColumn(id) {
        var r = confirm("你确定要删除这个栏目吗？")
        if (r == true) {
            $.ajax({
                type: 'get',
                url: 'del-column',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function (data) {
                    if (data['error'] == 0) {
                        alert('删除成功');
                        window.location.reload();
                    } else {
                        alert(data['msg']);
                        return false;
                    }
                }
            });
        }
        else {
            return false
        }
    }

    function addCol() {
        game_id = document.getElementById('game').value;
        if (game_id == 0) {
            alert("请选择游戏");
        } else {
            window.location.href = 'create?game_id=' + game_id;
        }
    }

    function viewIndex() {
        game_id = document.getElementById('game').value;
        if (game_id == 0) {
            alert("请选择游戏");
        } else {
            //window.location.href = 'view-index?game_id=' + game_id;
            window.open('view-index?game_id=' + game_id);
        }
    }
</script>
