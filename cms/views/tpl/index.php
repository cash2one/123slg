<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $seo['title']; ?></title>
    <meta name="keywords" content="<?php echo $seo['keywords']; ?>"/>
    <meta name="description" content="<?php echo $seo['description']; ?>"/>
    <link rel="stylesheet" href="/game/css/wan_top.css">
    <link href="/game/css/style.css" type="text/css" rel="stylesheet">
</head>

<body>


<script type="text/javascript" src="http://www.123slg.com/js/jquery.min.js"></script>
<div class="wrap">
    <div class="header">
        <div class="area">
            <div class="nav">
                <a href="" target="_blank" class="hover">官网首页</a>
                <a href="" target="_blank">游戏攻略</a>
                <a href="" target="_blank">新闻公告</a>
                <a href="" target="_blank" class="logo"></a>
                <a href="" target="_blank">充值官网</a>
                <a href="" target="_blank">客服中心</a>
                <a href="" target="_blank">游戏截图</a>
            </div>
        </div>
    </div>
    <style type="text/css">
        .wrap {
            background: url("http://<?php echo $game['enname'];?>.web.com/images/b_<?php echo $game['enname']?>.jpg") center top no-repeat;
        }
    </style>
    <!--<script>-->
    <!--function nav_trace(obj, clas) {-->
    <!--var spl_url = window.location.pathname.split('/'),-->
    <!--nav_len = $(obj).length,-->
    <!--flag = true;-->
    <!--var same_index = new Array();-->
    <!--spl_url[spl_url.length - 1] == "" ? current_url = spl_url[spl_url.length - 2] : current_url = spl_url[spl_url.length - 1];-->
    <!--for (i = 0; i < nav_len; i++) {-->
    <!--var a_href = $(obj).eq(i).attr("href").split('/');-->
    <!--a_href[a_href.length - 1] == "" ? a_url = a_href[a_href.length - 2] : a_url = a_href[a_href.length - 1];-->
    <!--if (a_url == current_url) {-->
    <!--flag = false;-->
    <!--same_index.push($(obj).eq(i));-->
    <!--}-->
    <!--}-->
    <!--same_index[0].addClass(clas).siblings().removeClass(clas);-->
    <!--}-->
    <!--nav_trace('.nav a', 'hover');-->
    <!--</script>-->

    <div class="main">
        <div class="topbox area">
            <div class="server-box">
                <div class="btns">
                    <a href="javascript:void(0)" target="_blank" class="btn-start" onclick="get_start_url(126)"><i
                            class="start-txt"></i></a>
                    <a href="" target="_blank" class="btn-download">客服中心</a>
                    <a href="" target="_blank" class="btn-recharge">游戏充值</a>
                </div>
                <!-- 服务器列表 -->
                <div class="server-list">

                    <dl>
                        <dt id="qf">
                        <h3>游戏服务器</h3>
                        <a href="" target="_blank">更多</a>
                        </dt>

                    </dl>
                    <script type="text/javascript" src="http://www.web.com/data/<?php echo $game_id; ?>.json"></script>

                    <script type="text/javascript">
                        var object = qfarr<?php echo $game_id; ?>;
                        var length = object.length;
                        if (length > 4) length = 4;

                        var j = 0;
                        var allqf = '';
                        for (var i = 0; i < length; i++) {
                            var timesnow = Date.parse(new Date()) / 1000;
                            if (object[i].start_time > timesnow) {
                                allqf += '<dd> <span>' + object[i].server_name + '（' + object[i].S + '）</span> <em class="new_game"> 即将开启 <s></s> </em> <a href="javascript:void(0)" >进入</a>';
                            }
                            else {
                                var cls = '';
                                if (j < 1) {
                                    cls = 'hot_game';
                                }
                                allqf += ' <dd> <span>' + object[i].server_name + '（' + object[i].S + '）</span> <em class="' + cls + '"> 火爆开启 <s></s> </em> <a href="http://pay.265g.com?tp=go&areaid=' + object[i].id + '" target="_blank">进入</a> </dd> ';

                                j++;
                            }
                        }
                        $("#qf").after(allqf);
                    </script>
                </div>
            </div>
            <div class="focusImg">
                <i class="btn-prev"></i>
                <i class="btn-next"></i>
                <ul>
                    <li><a href="" target="_blank"><img src=""></a></li>
                    <li><a href="" target="_blank"><img src=""></a></li>
                </ul>
                <div class="handle"><!-- 根据图片数量动态生成按钮绑定事件 --></div>
                <div class="activ-link">
                    <a href="" target="_blank" title="新手礼包">
                        <img src="/game/images/gift.jpg" width="186" height="80">
                    </a>
                    <a href="" target="_blank" title="新手礼包">
                        <img src="/game/images/vip.jpg" width="186" height="80">
                    </a>
                    <a href="" target="_blank" title="新手礼包">
                        <img src="/game/images/hd.jpg" width="186" height="80">
                    </a>
                </div>
            </div>
            <div class="topNews">
                <div class="news-nav">
                    <ul>
                        <li class="hover">最新</li>
                        <li>公告</li>
                        <li>活动</li>
                        <li>攻略</li>
                    </ul>
                </div>
                <div class="news-tab">
                    <div class="tab-list">
                        <h3><a href="" target="_blank" title=""></a></h3>
                        <ul>
                            <!--<li><i class="square"></i><a href="" target="_blank"></a><em></em></li>-->
                        </ul>
                    </div>
                    <div class="tab-list" style="display:none">
                        <h3><a href="" target="_blank" title=""></a></h3>
                        <ul>
                            <li><i class="square"></i><a href="" target="_blank"></a><em></em></li>
                            <!--<li><i class="square"></i><a href="" target="_blank"></a><em>09.06</em></li>-->
                            <!--<li><i class="square"></i><a href="" target="_blank"></a><em>08.29</em></li>-->
                            <!--<li><i class="square"></i><a href="" target="_blank">265G 斗三国 8月26日合服公告</a><em>08.25</em></li>-->
                            <!--<li><i class="square"></i><a href="" target="_blank">265G 斗三国 8月19日合服公告</a><em>08.18</em></li>-->
                            <!--<li><i class="square"></i><a href="http://wan.265g.com/dousg/yxgg/15997.html" target="_blank">265G 斗三国 8月5日更新维护公告</a><em>08.05</em></li>-->
                            <!--<li><i class="square"></i><a href="http://wan.265g.com/dousg/yxgg/15916.html" target="_blank">265G七月二十二日晚服务器故障后续修复说明</a><em>07.22</em></li>-->
                        </ul>
                    </div>
                    <div class="tab-list" style="display:none">
                        <h3><a href="" target="_blank" title=""></a></h3>
                        <ul>
                            <!--<li><i class="square"></i><a href="" target="_blank"></a><em></em></li>-->
                        </ul>
                    </div>
                    <div class="tab-list" style="display:none">
                        <h3><a href="" target="_blank" title=""></a></h3>
                        <ul>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="complex center-wrap">

            <div class="game-data">
                <div class="title">
                    <i class="icon-game-data"></i>
                    <span>游戏资料</span>
                </div>
                <div class="data-list">
                    <h4>新手指南</h4>
                    <p>
                        <a href="http://wan.265g.com/dousg/yxzl/15689.html" target="_blank"></a><span>|</span>
                        <a href="http://wan.265g.com/dousg/yxzl/15688.html" target="_blank"></a><span>|</span>
                        <a href="http://wan.265g.com/dousg/yxzl/15687.html" target="_blank"></a><span>|</span>
                        <a href="http://wan.265g.com/dousg/yxzl/15685.html" target="_blank"></a><span>|</span>
                        <a href="http://wan.265g.com/dousg/yxzl/15684.html" target="_blank"></a><span>|</span>
                        <a href="http://wan.265g.com/dousg/yxzl/15682.html" target="_blank"></a><span>|</span>
                    </p>
                    <h4>高手进阶</h4>
                    <p>
                        <a href="http://wan.265g.com/dousg/yxzl/15697.html" target="_blank"></a><span>|</span>
                        <a href="http://wan.265g.com/dousg/yxzl/15696.html" target="_blank"></a><span>|</span>
                        <a href="http://wan.265g.com/dousg/yxzl/15695.html" target="_blank"></a><span>|</span>
                        <a href="http://wan.265g.com/dousg/yxzl/15693.html" target="_blank"></a><span>|</span>
                        <a href="http://wan.265g.com/dousg/yxzl/15691.html" target="_blank"></a><span>|</span>
                        <a href="http://wan.265g.com/dousg/yxzl/15690.html" target="_blank"></a><span>|</span>
                    </p>
                    <h4>特色玩法</h4>
                    <p>
                        <a href="http://wan.265g.com/dousg/yxzl/15703.html" target="_blank"></a><span>|</span>
                        <a href="http://wan.265g.com/dousg/yxzl/15702.html" target="_blank"></a><span>|</span>
                        <a href="http://wan.265g.com/dousg/yxzl/15701.html" target="_blank"></a><span>|</span>
                        <a href="http://wan.265g.com/dousg/yxzl/15700.html" target="_blank"></a><span>|</span>
                        <a href="http://wan.265g.com/dousg/yxzl/15699.html" target="_blank"></a><span>|</span>
                        <a href="http://wan.265g.com/dousg/yxzl/15698.html" target="_blank"></a><span>|</span>
                    </p>
                </div>
            </div>
            <div class="job-introduction">
                <div class="title"><i class="icon-job-introduction"></i><span>职业介绍</span></div>
                <div class="job-detail">
                    <div class="job-tab">
                        <a href="javascript:void(0)" class="hover"></a>
                        <a href="javascript:void(0)"></a>
                    </div>
                    <div class="job-content">
                        <img src="">
                        <p></p>
                        <a href="" target="_blank">查看详情</a>
                    </div>
                    <div class="job-content" style='display:none'>
                        <img src="">
                        <p></p>
                        <a href="" target="_blank">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="special-system">
                <div class="title"><i class="icon-special-system"></i><span>特色系统</span></div>

                <div class="quick-links">
                    <ul>
                        <li><a href="" target="_blank" class="ql1"><img src="" width="185px"
                                                                        height="107px"><span></span><i> GO</i></a></li>
                        <li><a href="" target="_blank" class="ql1"><img src="" width="185px"
                                                                        height="107px"><span></span><i> GO</i></a></li>
                        <li><a href="" target="_blank" class="ql1"><img src="" width="185px"
                                                                        height="107px"><span></span><i> GO</i></a></li>
                        <li><a href="" target="_blank" class="ql1"><img src="" width="185px"
                                                                        height="107px"><span></span><i> GO</i></a></li>
                        <li><a href="" target="_blank" class="ql1"><img src="" width="185px"
                                                                        height="107px"><span></span><i> GO</i></a></li>
                        <li><a href="" target="_blank" class="ql1"><img src="" width="185px"
                                                                        height="107px"><span></span><i> GO</i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="media-box center-wrap">
            <!--图片鉴赏区域-->
            <div class="image-appreciation">
                <div class="title">
                    <i class="icon-image-appreciation"></i>
                    <span>图片鉴赏</span>
                    <div class="image-kind">
                        <em class="hover">玩家靓照<s></s></em>
                        <em>游戏美图<s></s></em>

                    </div>
                    <a href="/dousg/yxjt/" target="_blank">更多>></a>
                </div>
                <div class="image-list">
                    <ul>
                        <li><a href="" target="_blank"><img src="" width="258px" height="178px"></a></li>
                        <li><a href="" target="_blank"><img src="" width="258px" height="178px"></a></li>
                        <li><a href="" target="_blank"><img src="" width="258px" height="178px"></a></li>
                    </ul>
                </div>
                <div class="image-list" style="display:none">
                    <ul>
                        <li><a href="" target="_blank"><img src="" width="258px" height="178px"></a></li>
                        <li><a href="" target="_blank"><img src="" width="258px" height="178px"></a></li>
                        <li><a href="" target="_blank"><img src="" width="258px" height="178px"></a></li>
                    </ul>
                </div>
            </div>
            <!--  视频播放区域 -->
            <div class="video-box">
                <div class="title">
                    <i class="icon-game-video"></i>
                    <span>精彩视频</span>
                </div>
                <div class="video-slide">
                    <ul>
                        <li>
                            <a href="" target="_blank">
                                <img src="" width="370px" height="178px">
                                <i class="video-circle"></i>
                                <s class="video-tran"></s>
                                <p class="vidoe_tit"></p>
                            </a>
                        </li>
                        <li>
                            <a href="" target="_blank">
                                <img src="" width="370px" height="178px">
                                <i class="video-circle"></i>
                                <s class="video-tran"></s>
                                <p class="vidoe_tit"></p>
                            </a>
                        </li>

                    </ul>
                    <a href="javascript:;" class="prev-video"></a>
                    <a href="javascript:;" class="next-video"></a>
                </div>
            </div>
        </div>
        <!-- 侧边栏 -->
        <div class="slide-bar">
            <a href="javascript:;" class="slide-back-top">
                <i></i>
            </a>
        </div>
        <!--友情链接-->
        <div class="f-links center-wrap">
            <em>友情链接：</em>
            <a href="http://www.123slg.com" target="_blank">123slg</a>
            <?php foreach ($link as $key => $val) { ?>
                <span>|</span>        <a href="<?php echo $val['link_url'] ?>"
                                         target="_blank"><?php echo $val['link_name']; ?></a>
            <?php } ?>
        </div>
    </div>
</div>
<script type="text/javascript" src="/game/js/lazyload.js"></script>
<script type="text/javascript" src="/game/js/index.js"></script>
<div class="footer">
    <div class="area">
        <div class="fl">
            <a href="">玩页游就上www.123slg.com</a>
        </div>
        <div class="fc">
            <p>网站备案：xxxxxxxxxxxxxxx</p>
            <p>Copyright xxxxxxxxxxxxxxx</p>
            <p>健康游戏忠告：抵制不良游戏 拒绝盗版游戏 注意自我保护 谨防受骗上当 适度游戏益脑 沉迷游戏伤身 合理安排时间 享受健康生活</p>
        </div>
        <div class="fr">
            <p>客服电话<br><i></i></p>
            <p>客服QQ<br><i></i></p>
        </div>
    </div>
</div>
<script type="text/javascript" src="/game/js/banner.js"></script>
<script type="text/javascript" src="/game/js/video_slide.js"></script>
<script type="text/javascript">

    $(function () {
        $(".focusImg").banner();
        var tabArr = new Array(["news-nav li", "tab-list"], ["job-tab a", "job-content"], ["image-kind em", "image-list"]);
        doTab(tabArr);

    });
    function tabHover(tabBtn, tabBox) {
        $("." + tabBtn).on("hover", function () {
            var cur = $(this).index();
            $(this).addClass("hover").siblings().removeClass("hover");
            $("." + tabBox).eq(cur).show().siblings("." + tabBox).hide();
        });
    }
    function doTab(arr) {
        for (var i = 0; i < arr.length; i++) {
            tabHover(arr[i][0], arr[i][1]);
        }
    }

    function toTop(obj) {

    }

    $(".slide-back-top").click(function () {
        var timer = null;
        clearInterval(timer);
        timer = setInterval(function () {
            var scroll_val = $(window).scrollTop();
            var top_val = scroll_val;
            var speed = (0 - top_val) / 8;
            if (speed > 0) {
                speed = Math.ceil(speed);
            } else {
                speed = Math.floor(speed);
            }
            if (scroll_val <= 0) {
                clearInterval(timer);
            } else {
                scroll_val += speed;
                $(window).scrollTop(scroll_val);
            }
        }, 30);
    })

    $(".slide-bar a").hover(function () {
        $(this).children("i").fadeIn(300);
    }, function () {
        $(this).children("i").fadeOut(300);
    })
</script>
</body>
</html>