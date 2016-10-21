$(function () {
    // $("#loginBtn").click(function (e) {
    //     //e.preventDefault();
    //     if (checkLogin()) {
    //         var $username = $("#username");
    //         var $password = $("#password");
    //         if ($username.val() == '请输入账号' || $username.val() == null) {
    //             alert('用户名不能为空');
    //             $username.focus();
    //             return false;
    //         }
    //         if ($password.val() == '' || $password.val() == null) {
    //             alert('密码不能为空');
    //             $password.focus();
    //             return false;
    //         }
    //         $.ajax({
    //             type: 'get',
    //             url: '/site/login',
    //             data: {
    //                 'username': $username.val(),
    //                 'password': $password.val(),
    //             },
    //             dataType: 'jsonp',
    //             error: function (XMLHttpRequest, textStatus, errorThrown) {
    //                 alert(textStatus);
    //                 return false;
    //             },
    //             success: function (data) {
    //                 if (data['error'] == 2002) {
    //                     window.location.reload();
    //                 } else {
    //                     alert(data['error_msg']);
    //                     return false;
    //                 }
    //             }
    //         });
    //     }
    // });

    if (!checkLogin()) {
        $("#login_before").hide();
        $("#login_after").show();
        $("#welcome").html('欢迎您 ：<span class="_username">' + $.cookie('username') + '</span>');
        var $last_game = $.parseJSON($.cookie('last_game'));
        var $html = '';
        if ($last_game != null) {
            for (var $i in $last_game) {
                $html += '<a href="/game/enter?game_id=' + $last_game[$i]['game_id'] + '&server_id=' + $last_game[$i]['server_id'] + '" class="gameRecently"><span class="re_lszb sp1">' + $last_game[$i]['gamename'] + '</span><span>' + $last_game[$i]['server_name'] + '</span></a>';
            }
            $("#last_game").html($html);
        }
    } else {
        $("#login_before").show();
        $("#login_after").hide();
    }

});

function login() {
    var $username = $("#username");
    var $password = $("#password");
    if ($username.val() == '请输入账号' || $username.val() == null) {
        alert('用户名不能为空');
        $username.focus();
        return false;
    }
    if ($password.val() == '' || $password.val() == null) {
        alert('密码不能为空');
        $password.focus();
        return false;
    }
    $.ajax({
        type: 'get',
        url: '/site/login',
        data: {
            'username': $username.val(),
            'password': $password.val(),
        },
        dataType: 'jsonp',
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(textStatus);
            return false;
        },
        success: function (data) {
            if (data['error'] == 2002) {
                window.location.reload();
            } else {
                alert(data['error_msg']);
                return false;
            }
        }
    });
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