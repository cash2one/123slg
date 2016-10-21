$(function () {
    loadServerList();
    if (checkLogin()) {
        $("#login").show();
        $(".logn_info").hide();
    } else {
        $("#login").hide();
        $(".logn_info").show();
        var html = '<h3>您好<i>'+$.cookie("username")+'，</i><span></span><i>，</i><a target="_blank" href="/user/index">完善资料</a><i>，</i><a href="javascript:logout();">注销</a></h3>';
        var $last_game = $.parseJSON($.cookie('last_game'));
        var $html = '';
        if ($last_game != null) {
            for (var $i in $last_game) {
                html += '<p>最近登录：<a href="/game/enter?game_id=' + $last_game[$i]['game_id'] + '&server_id=' + $last_game[$i]['server_id'] + '" class="gameRecently"><span class="re_lszb sp1">' + $last_game[$i]['gamename'] + '</span><span>' + $last_game[$i]['server_name'] + '</span></a></p>';
            }
        }else{
            html+='<p></p>'
        }
        $(".logn_info").html(html);
    }
});

function loadServerList() {
    var serls = [];
    var tempser = [];
    var now = Date.parse(new Date()) / 1000;
    $.each(servers, function (index, item) {
        var dateline = item.start_time;
        var attr = 'target="_blank" href="http://www.123slg.com/game/enter?game_id=3&server_id=' + item.server_id + '"';
        var status = dateline > now && (attr = 'href="javascript:getPrompt(\'' + item.server_name + '\', \'' + dateFormat(dateline) + '\');"') ? '暂未开启' : (tempser.push(servers[index]) ? '已开启' : '');
        serls.push('<li><a ' + attr + '>' + item.server_name + '<span>' + status + '</span></a></li>');
    });
    if (tempser.length > 0) {
        $('.server_title').html('<span>最新区服推荐</span><a target="_blank" href="http://www.123slg.com/game/enter?game_id=3&server_id=' + tempser[0].server_id + '">' + tempser[0].server_name + '&nbsp;&nbsp;&nbsp;&nbsp;火爆开启</a>');
    } else {
        $('.server_title').hide();
    }
    $('.server_list').html(serls.join(''));
}

function dateFormat(s) {
    var dt = new Date(parseInt(s + 300) * 1000);
    var y = dt.getYear();
    var m = dt.getMonth() + 1;
    var d = dt.getDate();
    var h = dt.getHours();
    var mt = dt.getMinutes();
    if (mt < 10) {
        mt = '0' + mt;
    }
    return (y < 1900 ? y + 1900 : y) + '-' + m + '-' + d + ' ' + h + ':' + mt;
}

function checkLogin() {
    if ($.cookie('username') == undefined) {
        return true;
    } else {
        return false;
    }
}
function logout() {
    $.ajax({
        type: 'get',
        url: '/site/logout',
        data: {},
        dataType: 'json',
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(textStatus);
            return false;
        },
        success: function (data) {
            if (data['error'] == 2003) {
                alert(data['error_msg']);
                window.location.reload();
            } else {
                alert(data['error_msg']);
                return false;
            }
        }
    })
}
function getPrompt(areaname, dataline) {
    alert("123SLG《" + gname + "》" + areaname + "将于" + dataline + "准时开启，敬请期待！");
}

function showloginheader(data) {
    console.log(data);
    var dataObj = $(data);
    if (dataObj.attr('class') == 'after') {
        loginserverlist();
        $('.logn_state').find('a:eq(0)').hide().end().find('.logn_info').show().find('h3 span').text(dataObj.find('a:eq(0)').text());
        return false;
    }
    $('.logn_state').find('a:eq(0)').show().end().find('.logn_info').hide().find('h3 span').text('');
}

function showloginstatus(data) {
}

function loginserverlist() {
    var server = [];
    $.post('/ucenter/ajax/', {'a': 'loginServer', 'gid': gid}, function (data) {
        $.each(data, function (index, item) {
            server.push('<a target="_blank" href="http://pay.265g.com/?tp=go&areaid=' + item.sid + '">' + item.areaname + '</a>');
        });
        $('.logn_info p').html('最近登录：' + server.join('<i>，</i>'));
    }, 'json');
}