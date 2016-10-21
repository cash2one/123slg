$(function () {
    showTips();
});

$(".doubt").hover(function () {
    showTips();
});
function showTips() {
    try {
        var winW = $(window).width() / 2 - 600;
        var _ofLeft = $(".doubt").offset().left - winW + 20;
        $(".exp-explain").show().css("left", _ofLeft);
        $(".doubt").addClass("hover");
        setTimeout(function () {
            $(".exp-explain").hide();
            $(".doubt").removeClass("hover");
        }, 3000);
    } catch (e) {
    }
    ;
}

$('img').imglazyload({event: 'scroll', attr: 'lazy-src', fadeIn: false});

//全部游戏展开
$(".all-game").hover(function () {
    $(".ag-list").show();
}, function () {
    $(".ag-list").hide();
});

//游戏开服
try {
    $("#lista1").als({
        visible_items: 1,
        scrolling_items: 1,
        orientation: "horizontal",
        circular: "yes",
        autoscroll: "no",
        interval: 3000,
        speed: 500,
        easing: "linear",
        direction: "left",
        start_from: 0
    });
} catch (e) {
}
//侧边栏
$(function () {
    if ($(window).height() < 825) {
        $(".rside").css({"bottom": "0", "top": "auto"});
    }
});
$(window).on("resize", function () {
    if ($(window).height() < 825) {
        $(".rside").css({"bottom": "0", "top": "auto"});
    } else {
        $(".rside").css({"bottom": "auto", "top": "595px"});
    }
});
$(".rside li").hover(function () {
    var $arrA = $(this).children("a");
    $arrA.eq(1).show().siblings("a").hide();
}, function () {
    var $arrA = $(this).children("a");
    $arrA.eq(0).show().siblings("a").hide();
});
$(".go-top-hover").click(function () {
    $("body,html").animate({scrollTop: 0}, 600);
    return false;
});

setTimeout(function () {
    $(".banner ul li").each(function () {
        $(this).css("background", "url(" + $(this).attr("lazy-src") + ")");
    });
}, 200);


$(function () {
    setNavigation();
    sethover();
});

function setNavigation() {
    var path = window.location.pathname;
    if (document.domain == 'pay.265g.com') {
        $('.site-nav a:eq(3)').addClass('hover');
        return;
    }
    if (path == '/index.html') {
        $('.site-nav a:eq(0)').addClass('hover');
        return;
    }
    if (path != '/') {
        var parm = path.split('/');
        $('.site-nav a').each(function () {
            if ($(this).attr('data') == parm[1]) {
                $(this).addClass('hover').siblings().removeClass('hover');
            }
        });
        //console.log(parm[1]);
    } else {
        $('.site-nav a:eq(0)').addClass('hover');
    }
}

function sethover() {
    try {
        var path = window.location.pathname;
        if (document.domain == 'pay.265g.com') return;
        if (path != '/') {
            var reg = /^\/(ucenter)[\/]{0,1}([\w]{0,})[\/]{0,1}$/;
            var r = path.match(reg);
            $('.center-nav ul li a').removeClass('hover');
            if (r[2] != '') {
                $('.center-nav ul li[data=' + r[2] + '] a').addClass('hover');
            } else {
                $('.center-nav ul li[data=account] a').addClass('hover');
            }
        }
    } catch (e) {
    }
}

function get_start_url(gid) {
    if (gid && !isNaN(gid)) {
        $.ajax({
            type: "POST",
            url: "/game/center/gameurl",
            data: {gid: gid},
            success: function (data) {
                if (data) {
                    window.open(data);
                }
            }
        });
    }
}

$("form [data='edit']").click(function () {
    $('.dataform').eq(0).hide().end().eq(1).show();
});

if ($('input[name="data[birthday]"]').length > 0) {
    $('input[name="data[birthday]"]').datepicker({
        changeMonth: true,
        changeYear: true,
        inline: true,
        dateFormat: 'yy-mm-dd'
    });
    jQuery(function ($) {
        $.datepicker.regional['zh-CN'] = {
            closeText: '关闭',
            prevText: '<上月',
            nextText: '下月>',
            currentText: '今天',
            monthNames: ['一月', '二月', '三月', '四月', '五月', '六月',
                '七月', '八月', '九月', '十月', '十一月', '十二月'],
            monthNamesShort: ['1', '2', '3', '4', '5', '6',
                '7', '8', '9', '10', '11', '12'],
            dayNames: ['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'],
            dayNamesShort: ['周日', '周一', '周二', '周三', '周四', '周五', '周六'],
            dayNamesMin: ['日', '一', '二', '三', '四', '五', '六'],
            weekHeader: '周',
            dateFormat: 'yy-mm-dd',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: true,
            /*yearSuffix: '年'*/
        };
        $.datepicker.setDefaults($.datepicker.regional['zh-CN']);
    });
}

$(".setting").on("click", function () {
    var $li = $(this).parent("li");
    if ($li.hasClass("open")) {
        $li.removeClass("open");
    } else {
        $li.addClass("open");
    }
});


function shownewslist(p) {
    $.ajax({
        type: "POST",
        url: '/ucenter/news/getUserNewsList',
        data: 'p=' + p + '',
        success: function (result) {
            if (result != '') {
                $('.news-list').html(result);
                openNews();
            } else {
                $('.news-list').attr('class', 'no-message').text('您没有任何消息!');
            }
        }
    });
}