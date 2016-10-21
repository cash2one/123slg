<?php
use yii\helpers\Url;

?>
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">友情链接</strong> /
                <small>列表</small>
            </div>
        </div>
        <hr>
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <a href="<?php echo Url::to(['link/add']); ?>" class="am-btn am-btn-default"><span
                                class="am-icon-plus"></span> 新增
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
            <tr>
                <th>ID</th>
                <th>网站名称</th>
                <th>网址</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $key => $val) { ?>
                <tr>
                    <td><?php echo $val['id']; ?></td>
                    <td><?php echo $val['link_name']; ?></td>
                    <td><?php echo $val['link_url']; ?></td>
                    <td>
                        <div class="am-btn-toolbar">
                            <div class="am-btn-group am-btn-group-xs">
                                <button type="button"
                                        class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                        class="am-icon-pencil-square-o"></span>
                                    编辑
                                </button>
                                <button type="button"
                                        class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span
                                        class="am-icon-copy"></span> 修改状态
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>