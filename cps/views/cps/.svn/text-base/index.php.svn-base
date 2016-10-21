<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">渠道管理</strong> /
                <small>下属渠道</small>
            </div>
        </div>
        <hr>
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <a href="<?php echo Url::to(['cps/add']) ?>" class="am-btn am-btn-default"><span
                                class="am-icon-plus"></span> 新增渠道
                        </a>
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
                            <th class="table-title">渠道名称</th>
                            <th class="table-type">游戏区服</th>
                            <th class="table-id">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($cpsList as $key=>$val){?>
                            <tr>
                                <td><?php echo $val['id'];?></td>
                                <td><?php echo $val['username'];?></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
