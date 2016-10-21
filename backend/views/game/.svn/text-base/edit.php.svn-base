<?php
use yii\helpers\Url;

?>
<!--<script type="text/javascript" src="/static/js/plupload/plupload.full.min.js"></script>-->
<!-- content start -->
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf">
                <strong class="am-text-primary am-text-lg">运营管理</strong> /
                <small>游戏管理</small>
            </div>
        </div>
        <hr>
        <form class="am-form" style="width: 400px">
            <fieldset>
                <legend>添加游戏</legend>
                <div class="am-form-group">
                    <label for="gamename">游戏名</label>
                    <input type="text" class="" name="gamename" id="gamename"
                           value="<?php echo $game['gamename']; ?>" placeholder="输入游戏名">
                </div>
                <div class="am-form-group">
                    <label for="tag">游戏标签</label>
                    <input type="text" class="" name="tag" id="tag" value="<?php echo $game['enname']; ?>"
                           placeholder="游戏标签">
                </div>
                <div class="am-form-group">
                    <label for="orders">游戏排序</label>
                    <input type="text" class="" name="orders" id="orders" value="<?php echo $game['orders']; ?>"
                           placeholder="游戏排序">
                </div>
                <div class="am-form-group">
                    <label for="orders">游戏官网</label>
                    <input type="url" class="" name="main_site" id="main_site" value="<?php echo $game['main_site']; ?>"
                           placeholder="游戏官网">
                </div>
                <div class="am-form-group">
                    <label for="orders">游戏论坛</label>
                    <input type="url" class="" name="bbs_site" id="bbs_site" value="<?php echo $game['bbs_site']; ?>"
                           placeholder="游戏论坛">
                </div>
                <div class="am-form-group">
                    <label for="orders">游戏币名</label>
                    <input type="text" class="" name="gold_name" id="gold_name"
                           value="<?php echo $game['gold_name']; ?>" placeholder="游戏币名">
                </div>
                <div class="am-form-group">
                    <label for="orders">兑换比例</label>
                    <input type="text" class="" name="cny_rate" id="cny_rate" value="<?php echo $game['cny_rate']; ?>"
                           placeholder="兑换比例">
                </div>
                <div class="am-form-group">
                    <label for="orders">分成比例</label>
                    <input type="text" class="" name="percent" id="percent" value="<?php echo $game['percent']; ?>"
                           placeholder="分成比例">
                </div>
<!--                <div class="am-form-group">-->
<!--                    <label for="orders">游戏图片</label>-->
<!--                    <div id="container">-->
<!--                        <a id="pickfiles" class="am-btn am-btn-danger am-btn-sm" href="javascript:;"> <i-->
<!--                                class="am-icon-cloud-upload"></i>选择要上传的文件</a>-->
<!--                        <a id="uploadfiles" class="am-btn am-btn-danger am-btn-sm" href="javascript:;"><i-->
<!--                                class="am-icon-cloud-upload"></i>上传</a>-->
<!--                    </div>-->
<!--                    <div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>-->
<!--                    <pre id="console" style="display:none"></pre>-->
<!--                    <img src="" id="preview">-->
<!--                    <input type="hidden" id="image_url" name="image_url" value="">-->
<!--                </div>-->
                <div class="am-form-group">
                    <label for="orders">游戏描述</label>
                    <textarea class="" rows="5" name="descript"
                              id="descript"><?php echo $game['descript']; ?></textarea>
                </div>
                <div class="am-form-group">
                    <label class="am-radio-inline">
                        <input type="radio" value="1"
                               name="display" <?php if ($game['display'] == 1) echo 'checked' ?> >显示
                    </label>
                    <label class="am-radio-inline">
                        <input type="radio" value="0" name="display" <?php if ($game['display'] == 0) echo 'checked' ?>>不显示
                    </label>
                </div>
                <div class="am-form-group">
                    <label class="am-radio-inline">
                        <input type="radio" value="1"
                               name="ishot" <?php if ($game['ishot'] == 1) echo 'checked' ?> >是热门
                    </label>
                    <label class="am-radio-inline">
                        <input type="radio" value="0" name="ishot" <?php if ($game['ishot'] == 0) echo 'checked' ?>>不是热门
                    </label>
                </div>
                <p>
                    <input type="hidden" name="_csrf-backend"
                           value="<?php echo \Yii::$app->request->getCsrfToken(); ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button type="button" class="am-btn am-btn-default" id="btnsub">提交</button>
                </p>
            </fieldset>
        </form>
    </div>
</div>
<!-- content end -->
<script type="text/javascript">
    $(function () {
        $("#btnsub").click(function () {
            var $data = $('form').serialize();
            var $url = "<?php echo Url::to(['game/edit']); ?>";
            $.ajax({
                type: 'post',
                url: $url,
                data: $data,
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
        });
    });

//    var uploader = new plupload.Uploader({
//        runtimes: 'html5,flash,silverlight,html4',
//        browse_button: 'pickfiles', // you can pass an id...
//        container: document.getElementById('container'), // ... or DOM Element itself
//        url: '/upload/ajax-upload',
//        flash_swf_url: '../js/Moxie.swf',
//        silverlight_xap_url: '../js/Moxie.xap',
//        filters: {
//            max_file_size: '10mb',
//            mime_types: [
//                {title: "Image files", extensions: "jpg,gif,png"},
//            ]
//        },
//        init: {
//            PostInit: function () {
//                document.getElementById('filelist').innerHTML = '';
//                document.getElementById('uploadfiles').onclick = function () {
//                    uploader.start();
//                    return false;
//                };
//            },
//            FilesAdded: function (up, files) {
//                plupload.each(files, function (file) {
//                    document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
//                });
//            },
//            UploadProgress: function (up, file) {
//                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
//            },
//            Error: function (up, err) {
//                $("#console").show();
//                document.getElementById('console').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
//            },
//            FileUploaded: function (up, files, response) {
//                var $data = $.parseJSON(response.response)
//                document.getElementById('preview').src = $data.result;
//                console.log($data.result);
//                document.getElementById('image_url').value = $data.result;
//            }
//        }
//    });
//    uploader.init();
</script>


