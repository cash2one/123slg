<?php
echo $this->render('header.php');
?>
<body>
<div class="newWrap">
    <!--[if IE 6]>
    <script type="text/javascript" src="/js/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>
        DD_belatedPNG.fix(".head,.head .123slg_logo,.head .headtxt,.centerLog .a1,.centerLog .a2");
    </script>
    <![endif]-->
    <div class="head">
        <a href=""><span class="123slg_logo"></span></a>
        <span class="headtxt"></span>
    </div>
    <?php echo $this->render('topnav.php');?>
    <div class="centerContent">
        <span
            style="position:absolute; top:8px; width:248px; text-align:right; font-size:12px; font-weight:normal; left:0;">适合18岁以上年龄玩家</span>
        <!--        <script type="text/javascript"  src="js/common.js"></script>-->
        <!--[if IE]>
        <script type="text/javascript" src="/js/DD_belatedPNG_0.0.8a-min.js"></script>
        <script>
            DD_belatedPNG.fix(".belowRoll");
        </script>
        <![endif]-->
<?php echo $this->render('login.php');
//大眼睛
echo $this->render('wheel.php');
?>


<div class="rlSplit"></div>
<div style="clear:both;"></div>
<?php echo $this->render('left.php');?>
<?php echo $content;?>
<?php //echo $this->render('link.php'); ?>
<?php echo $this->render('footer.php'); ?>
</body>
</html>