<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">链接管理</strong> /
                <small>链接列表</small>
            </div>
        </div>
        <hr>
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <a href="<?php echo Url::to(['cps/tqlink']) ?>" class="am-btn am-btn-default"><span
                                class="am-icon-plus"></span> 提取链接
                        </a>
                    </div>
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
                            <th class="table-title">渠道名称</th>
                            <th class="table-title">游戏区服</th>
                            <th class="table-type">地址</th>
                            <th class="table-title">短地址</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (!empty($tgGame)) {
                            foreach ($tgGame as $key => $val) {
                                echo "<tr>";
                                if($pid==0){
                                    echo "<td>" . $val['id'] . "</td>";
                                    echo "<td>" . $val['refname'] . "</td>";
                                    if (empty($val->server->game)) {
                                        echo "<td>" . $val->game->gamename . "</td>";
                                    } else {
                                        echo "<td>" . $val->server->game->gamename . '-' . $val->server->server_name . "</td>";
                                    }
                                    echo "<td>" . $val['refurl'] . "</td>";
                                    if ($val['shorturl'] != '') {
                                        echo "<td>" . $val['shorturl'] . "</td>";
                                    } else {
                                        echo "<td><a href='javascript:void(0)' onclick='shortUrl(\"" . $val['id'] . "\",\"" . $val['refurl'] . "\")'>生成短链接</a> </td>";
                                    }
                                }else{
                                    echo "<td>" . $val->tgGameInfo->id . "</td>";
                                    echo "<td>" . $val->tgGameInfo->refname . "</td>";
                                    if (empty($val->tgGameInfo->server->game)) {
                                        echo "<td>" . $val->tgGameInfo->game->gamename . "</td>";
                                    } else {
                                        echo "<td>" . $val->tgGameInfo->server->game->gamename . '-' . $val->tgGameInfo->server->server_name . "</td>";
                                    }

                                    echo "<td>" . $val->tgGameInfo->refurl . "</td>";
                                    if ($val->tgGameInfo->shorturl != '') {
                                        echo "<td>" . $val->tgGameInfo->shorturl . "</td>";
                                    } else {
                                        echo "<td><a href='javascript:void(0)' onclick='shortUrl(\"" . $val->tgGameInfo->id . "\",\"" . $val->tgGameInfo->refurl . "\")'>生成短链接</a> </td>";
                                    }
                                }

                                echo "</tr>";
                            }
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
    function shortUrl(id, url) {
        $.ajax({
            type: 'get',
            url: '/cps/create-short',
            data: {
                'id': id,
                'url': url
            },
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
    }
</script>
