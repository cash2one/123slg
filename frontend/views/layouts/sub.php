<?php
use yii\helpers\Url;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="123，123官网，网页游戏，策略游戏，123游戏"/>
    <title>123slg_一起来战斗_SLG从这里开始</title>
    <link rel="stylesheet" href="/css/jquery-ui-1.10.3.css"/>
    <link rel="stylesheet" href="/css/newCenter.css?20150602"/>
    <script type="text/javascript" src="/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="/js/jquery-ui-1.10.3.js"></script>
    <script type="text/javascript" src="/js/jquery.smallslider.js"></script>
    <script type="text/javascript" src="/js/common.js"></script>
    <script type="text/javascript" src="/js/center.js"></script>
</head>
<body>
<div class="newWrap">
    <!--[if IE 6]>
    <script type="text/javascript" src="/js/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>
        DD_belatedPNG.fix(".head,.head .123slg_logo,.head .headtxt,.centerLog .a1,.centerLog .a2");
    </script>
    <![endif]-->
    <div class="head">
        <a href="/"><span class="123slg_logo"></span></a>
        <span class="headtxt"></span>
    </div>

    <?php echo $this->render('topnav.php'); ?>

    <?php echo $content;?>
<script type="text/javascript">
    $(function () {
        jQuery('#tabs').tabs({});
    })
</script>
<?php echo $this->render('link.php'); ?>
<?php echo $this->render('footer.php'); ?>
</body>
</html>
