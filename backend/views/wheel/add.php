<?php
use yii\helpers\Url;

?>
<script type="text/javascript" src="/static/js/plupload/plupload.full.min.js"></script>
<div class="admin-content">
    <div class="admin-content-body">
        <form class="am-form">
            <fieldset>
                <legend>首页轮播图</legend>
                <select data-am-selected="{btnSize: 'sm'}" name="game_id">
                    <option value="">所有游戏</option>
                    <?php
                    foreach ($gameList as $key => $val) {
                        echo '<option value="' . $val['id'] . '">' . $val['gamename'] . '</option>';
                    }
                    ?>
                </select>

                <div class="am-form-group">
                    <label for="orders">游戏图片</label>
                    <div id="container">
                        <a id="pickfiles" class="am-btn am-btn-danger am-btn-sm" href="javascript:;"> <i
                                class="am-icon-cloud-upload"></i>选择要上传的文件</a>
                        <a id="uploadfiles" class="am-btn am-btn-danger am-btn-sm" href="javascript:;"><i
                                class="am-icon-cloud-upload"></i>上传</a>
                    </div>
                    <div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
                    <pre id="console" style="display:none"></pre>
                    <img src="" id="preview">
                    <input type="hidden" id="image_url" name="image_url" value="">
                </div>

                <p>
                    <input type="hidden" name="_csrf-backend"
                           value="<?php echo \Yii::$app->request->getCsrfToken(); ?>">
                    <button type="button" class="am-btn am-btn-default" id="btnsub">提交</button>
                </p>
            </fieldset>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $("#btnsub").click(function (e) {
            e.preventDefault();
            var $data = $('form').serialize();
            var $url = "<?php echo Url::to(['wheel/add']); ?>";
            $.ajax({
                type: 'post',
                url: $url,
                data: $data,
                dataType: 'json',
                success: function (data) {
                    if (data['error'] == 3002) {
                        $("#content").html(data['msg']);
                        $("#my-alert").modal('toggle');
                        window.location.href = "<?php echo Url::to(['wheel/index'])?>";
                    } else {
                        $("#content").html(data['msg']);
                        $("#my-alert").modal('toggle');
                        return false;
                    }
                }
            });
        });
    });
    var uploader = new plupload.Uploader({
        runtimes: 'html5,flash,silverlight,html4',
        browse_button: 'pickfiles', // you can pass an id...
        container: document.getElementById('container'), // ... or DOM Element itself
        url: '/upload/ajax-upload?type=dyj',
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
                document.getElementById('filelist').innerHTML = '';
                document.getElementById('uploadfiles').onclick = function () {
                    uploader.start();
                    return false;
                };
            },
            FilesAdded: function (up, files) {
                plupload.each(files, function (file) {
                    document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                });
            },
            UploadProgress: function (up, file) {
                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
            },
            Error: function (up, err) {
                $("#console").show();
                document.getElementById('console').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
            },
            FileUploaded: function (up, files, response) {
                var $data = $.parseJSON(response.response)
                document.getElementById('preview').src = $data.result;
                console.log($data.result);
                document.getElementById('image_url').value = $data.result;
            }
        }
    });
    uploader.init();
</script>
