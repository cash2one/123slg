<?php
use yii\helpers\Url;

?>
<script type="text/javascript" src="/static/js/plupload/plupload.full.min.js"></script>
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf">
                <strong class="am-text-primary am-text-lg">游戏管理</strong> /
                <small>游戏图片上传</small>
            </div>
        </div>
        <hr>
        <form class="am-form" style="width: 400px" method="post"
              action="<?php echo Url::to(['game/upload', 'game_id' => $game['id']]) ?>">
            <fieldset>
                <legend><?php echo $game['gamename']; ?></legend>
                <div class="am-form-group">
                    <label for="orders">热门游戏</label>
                    <div id="container">
                        <a id="pickfiles1" class="am-btn am-btn-danger am-btn-sm" href="javascript:;"> <i
                                class="am-icon-cloud-upload"></i>选择要上传的文件</a>
                        <a id="uploadfiles1" class="am-btn am-btn-danger am-btn-sm" href="javascript:;"><i
                                class="am-icon-cloud-upload"></i>上传</a>
                    </div>
                    <div id="filelist1">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
                    <pre id="console1" style="display:none"></pre>
                    <img src="<?php echo $pic['hot_game'];?>" id="preview_hot_game" style="width: 234px;height: 164px">
                    <input type="hidden" id="hot_game" name="hot_game" value="<?php echo $pic['hot_game'];?>">
                </div>

                <div class="am-form-group">
                    <label for="orders">新服推荐</label>
                    <div id="container">
                        <a id="pickfiles2" class="am-btn am-btn-danger am-btn-sm" href="javascript:;"> <i
                                class="am-icon-cloud-upload"></i>选择要上传的文件</a>
                        <a id="uploadfiles2" class="am-btn am-btn-danger am-btn-sm" href="javascript:;"><i
                                class="am-icon-cloud-upload"></i>上传</a>
                    </div>
                    <div id="filelist2">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
                    <pre id="console2" style="display:none"></pre>
                    <img src="<?php echo $pic['new_server'];?>" id="preview_new_server" style="width: 60px;height: 60px">
                    <input type="hidden" id="new_server" name="new_server" value="<?php echo $pic['new_server'];?>">
                </div>

                <div class="am-form-group">
                    <label for="orders">游戏中心</label>
                    <div id="container">
                        <a id="pickfiles3" class="am-btn am-btn-danger am-btn-sm" href="javascript:;"> <i
                                class="am-icon-cloud-upload"></i>选择要上传的文件</a>
                        <a id="uploadfiles3" class="am-btn am-btn-danger am-btn-sm" href="javascript:;"><i
                                class="am-icon-cloud-upload"></i>上传</a>
                    </div>
                    <div id="filelist3">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
                    <pre id="console3" style="display:none"></pre>
                    <img src="<?php echo $pic['game_center'];?>" id="preview_game_center" style="width: 200px;height: 150px">
                    <input type="hidden" id="game_center" name="game_center" value="<?php echo $pic['game_center'];?>">
                </div>
                <div class="am-form-group">
                    <input type="hidden" name="game_id" value="<?php echo $game['id']; ?>">
                    <input type="hidden" name="_csrf-backend"
                           value="<?php echo \Yii::$app->request->getCsrfToken(); ?>">
                    <input type="button" name="" class="am-btn am-btn-default" value="保存" onclick="up()">
                </div>
            </fieldset>
        </form>
    </div>
</div>
<script type="text/javascript">
    var uploader = new plupload.Uploader({
        runtimes: 'html5,flash,silverlight,html4',
        browse_button: 'pickfiles1', // you can pass an id...
        url: '/upload/ajax-upload?type=game',
        flash_swf_url: '../js/Moxie.swf',
        silverlight_xap_url: '../js/Moxie.xap',
        filters: {
            max_file_size: '10mb',
            mime_types: [
                {title: "Image files", extensions: "jpg,gif,png"},
            ]
        },
        init: {
            PostInit: function () {
                document.getElementById('filelist1').innerHTML = '图片大小234*164';
                document.getElementById('uploadfiles1').onclick = function () {
                    uploader.start();
                    return false;
                };
            },
            FilesAdded: function (up, files) {
                plupload.each(files, function (file) {
                    document.getElementById('filelist1').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                });
            },
            UploadProgress: function (up, file) {
                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
            },
            Error: function (up, err) {
                $("#console1").show();
                document.getElementById('console1').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
            },
            FileUploaded: function (up, files, response) {
                var $data = $.parseJSON(response.response)
                document.getElementById('preview_hot_game').src = $data.result;
                document.getElementById('hot_game').value = $data.result;
            }
        }
    });
    uploader.init();

    var uploader1 = new plupload.Uploader({
        runtimes: 'html5,flash,silverlight,html4',
        browse_button: 'pickfiles2', // you can pass an id...
        url: '/upload/ajax-upload?type=game',
        flash_swf_url: '../js/Moxie.swf',
        silverlight_xap_url: '../js/Moxie.xap',
        filters: {
            max_file_size: '10mb',
            mime_types: [
                {title: "Image files", extensions: "jpg,gif,png"},
            ]
        },
        init: {
            PostInit: function () {
                document.getElementById('filelist2').innerHTML = '图片大小60*60';
                document.getElementById('uploadfiles2').onclick = function () {
                    uploader1.start();
                    return false;
                };
            },
            FilesAdded: function (up, files) {
                plupload.each(files, function (file) {
                    document.getElementById('filelist2').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                });
            },
            UploadProgress: function (up, file) {
                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
            },
            Error: function (up, err) {
                $("#console2").show();
                document.getElementById('console2').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
            },
            FileUploaded: function (up, files, response) {
                var $data = $.parseJSON(response.response)
                document.getElementById('preview_new_server').src = $data.result;
                document.getElementById('new_server').value = $data.result;
            }
        }
    });
    uploader1.init();


    var uploader2 = new plupload.Uploader({
        runtimes: 'html5,flash,silverlight,html4',
        browse_button: 'pickfiles3', // you can pass an id...
        url: '/upload/ajax-upload?type=game',
        flash_swf_url: '../js/Moxie.swf',
        silverlight_xap_url: '../js/Moxie.xap',
        filters: {
            max_file_size: '10mb',
            mime_types: [
                {title: "Image files", extensions: "jpg,gif,png"},
            ]
        },
        init: {
            PostInit: function () {
                document.getElementById('filelist3').innerHTML = '图片大小200*150';
                document.getElementById('uploadfiles3').onclick = function () {
                    uploader2.start();
                    return false;
                };
            },
            FilesAdded: function (up, files) {
                plupload.each(files, function (file) {
                    document.getElementById('filelist3').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                });
            },
            UploadProgress: function (up, file) {
                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
            },
            Error: function (up, err) {
                $("#console3").show();
                document.getElementById('console3').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
            },
            FileUploaded: function (up, files, response) {
                var $data = $.parseJSON(response.response)
                document.getElementById('preview_game_center').src = $data.result;
                document.getElementById('game_center').value = $data.result;
            }
        }
    });
    uploader2.init();

    function up() {
        $.ajax({
            type: 'post',
            url: '<?php echo Url::to(['game/upload', 'game_id' => $game['id']])?>',
            data: $('form').serialize(),
            dataType: 'json',
            success: function (data) {
                if (data['error'] == 3002) {
                    $("#content").html(data['msg']);
                    $("#my-alert").modal('toggle');
                    window.location.href = "<?php echo Url::to(['game/index'])?>";
                } else {
                    $("#content").html(data['msg']);
                    $("#my-alert").modal('toggle');
                    return false;
                }
            }
        });
    }
</script>