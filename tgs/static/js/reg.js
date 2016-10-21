var $game_id = getQueryString("game_id");
var $server_id = getQueryString("server_id");
var $refer = getQueryString("refer");

// 这样调用：
// alert(getQueryString("game_id"));
// alert(getQueryString("server_id"));
// alert(getQueryString("refer"));
if ($refer == '') {
    $refer = 0;
}

function Login() {
    var username = $("#txtUserName").val();
    var pwd = $("#txtPwd").val();

    if (chkUserName2()) {
        $.ajax({
            type: "get",
            url: 'http://www.123slg.com/site/tg-reg',
            data: {
                'username': username,
                'pwd': pwd,
                'refer': $refer
            },
            dataType: 'jsonp',
            success: function (result) {
                console.log(result);
                if (result['error'] == 0) {
                    if ($server_id == '' || $server_id == 0) {
                        window.top.location.href = "http://www.123slg.com/server/list?game_id=" + $game_id;
                    } else {
                        window.top.location.href = "http://www.123slg.com/game/enter?game_id=" + $game_id + "&server_id=" + $server_id;
                    }
                } else {
                    $("#chk_username").html("账号已存在");
                    $("#chk_username").attr("class", "error");
                }
                // if (result.length <= 1) {
                //     //$('#span_pas').html("密码错误！");
                //     $("#chk_username").html("账号已存在，密码不符！");
                //     $("#chk_username").attr("class", "error");
                // } else if (result == 33) {
                //     alert("密码不能为空！");
                //     return false;
                // } else {
                //     window.top.location.href = "http://pay.265g.com/?tp=go&areaid=" + sid + "&refer=" + rid + '&username=' + username;
                // }
            },
            error: function () {
            }
        });
    }
}


$(function () {
    $('body').keydown(function (e) {
        if (e.keyCode == 13) {
            Login();
        }
    });

    $('#click_flash').click(function () {
        //OpenDiv();
        $(".mask").show();
    });
    $('.close').click(function () {
        $(".mask").hide();
    });
})

function chkUserName2() {
    var re = /\W/g;
    if ($('#txtUserName').val().length > 12 || $('#txtUserName').val().length < 6 || re.test($('#txtUserName').val()) || $('#txtUserName').val().indexOf('_') != -1) {
        $("#chk_username").html("<font color=\"red\">请输入6-12位数字+字母组合！</font>");
        $("#chk_username").attr("class", "error");
        return false;
    } else {
        $("#chk_username").html("<font color=\"green\">账号合法！</font>");
        $("#chk_username").attr("class", "right");
    }
    return true;
}
function show() {
    $(".mask").show();
}
function chkpas() {
    var reg = /^[A-Za-z0-9]+$/;
    if ($('#txtPwd').val().length > 12 || $('#txtPwd').val().length < 6) {
        $("#chk_pwd").html("<font color=\"red\">密码长度6-12位字符!</font>");
        $("#chk_pwd").attr("class", "error");
        return false;
    }
    else if (!reg.test($('#txtPwd').val())) {
        $("#chk_pwd").html("<font color=\"red\">密码必须为数字和字母!</font>");
        $("#chk_pwd").attr("class", "error");
        return false;
    }
    else {
        $("#chk_pwd").html("<font color=\"green\">密码合法！</font>");
        $("#chk_pwd").attr("class", "right");
        return true;
    }
}
function chkrepwd() {
    if ($('#txtPwd').val() != $('#txtRePwd').val()) {
        $("#chk_repwd").html("<font color=\"red\">密码两次输入不一致!</font>");
        $("#chk_repwd").attr("class", "error");
        return false;
    }
    else {
        $("#chk_repwd").html("<font color=\"green\">输入正确！</font>");
        $("#chk_repwd").attr("class", "right");
        return true;
    }
}

//----新加js，验证用户名是否存在------
