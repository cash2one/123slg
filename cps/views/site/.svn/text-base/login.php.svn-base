<?php
use yii\helpers\Url;

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>123SLG--CPS后台</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="alternate icon" type="image/png" href="/static/i/favicon.png">
    <link rel="stylesheet" href="/static/css/amazeui.min.css"/>
    <script type="text/javascript" src="/static/js/jquery.min.js"></script>
    <style>
        .header {
            text-align: center;
        }

        .header h1 {
            font-size: 200%;
            color: #333;
            margin-top: 30px;
        }

        .header p {
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="am-g">
        <h1>123SLG-CPS后台</h1>
    </div>
    <hr/>
</div>
<div class="am-g">
    <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
        <br>
        <form method="post" class="am-form" action="">
            <label for="username">用户名:</label>
            <input type="text" name="username" id="username" value="">
            <br>
            <label for="password">密码:</label>
            <input type="password" name="password" id="password" value="">
            <br/>
            <div class="am-cf">
                <input type="button" id="btnsub" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm am-fl">
<!--                <input type="submit" name="" value="忘记密码 ^_^? " class="am-btn am-btn-default am-btn-sm am-fr">-->
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $("#password").keydown(function (e) {
            if (e.keyCode == 13) {
                login();
            }
        });
        $("#btnsub").click(function () {
            login();
        });
    });

    function login() {
        $.ajax({
            type: 'post',
            url: 'login',
            data: $('form').serialize(),
            dataType: 'json',
            success: function (data) {
                if (data['error'] == 2002) {
                    window.location.href = "<?php echo Url::to(['index/index']) ?>";
                } else {
                    alert(data['msg']);
                }
            }
        });
    }
</script>
</body>
</html>
