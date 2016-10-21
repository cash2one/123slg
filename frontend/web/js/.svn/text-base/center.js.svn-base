function getLastLoginServers() {
    $.getJSON("get-last-login-server.action", function (data) {
//		alert(data);
        if (data != null && data.success == true) {
            $(".welcomeWrapper img").remove();
            var array = data.root;
            var length = array.length;
            for (var i = 0; i < length; i++) {
                if (i < 3) {
//					alert(array[i].gameId + "   " + array[i].server);
                    var gameId = array[i].gameId;
                    var server = array[i].server;
                    var description = array[i].description;
                    var html = "";
                    if (gameId == 'dsg') {
                        html = '<a href="javascript:void(0);" class="gameRecently" onclick="centerLoginGame(\'http://dsg.123slg.com\',\'dsg\',\'' + server + '\')">'
                            + '<span class="re_dsg sp1">斗三国</span>'
                            + '<span>' + description + '</span>'
                            + '</a>';
                    } else if (gameId == 'nhfy') {
                        html = '<a href="javascript:void(0);" class="gameRecently" onclick="centerLoginGame(\'http://nhfy.123slg.com\',\'nhfy\',\'' + server + '\')">'
                            + '<span class="re_nhfy sp1">怒海风云</span>'
                            + '<span>' + description + '</span>'
                            + '</a>';
                    } else if (gameId == 'xjdg') {
                        html = '<a href="javascript:void(0);" class="gameRecently" onclick="centerLoginGame(\'http://xjdg.123slg.com\',\'xjdg\',\'' + server + '\')">'
                            + '<span class="re_xjdg sp1">星级帝国</span>'
                            + '<span>' + description + '</span>'
                            + '</a>';
                    }
//					alert(html);
                    $(".welcomeWrapper").append(html);
                }
            }
        }
    });
}


function emailNext(sid, hid) {
    $("#" + sid).show()
    $("#" + hid).hide();
}

function unbind() {
    $.ajax({
        type: 'get',
        url: '/user/unbind',
        data: {},
        dataType: 'html',
        success: function (data) {
            $('#tabs-2 div').text('').append(data);
        }
    });
}

function bindEmail(email) {
    if (email != '' || email != null) {
        $.get("/user/change-email", {email: email}, function (html) {
            $('#tabs-2 div').text('').append(html);
        });
    }
}

function mobileNext(path) {
    $.get(path, function (html) {
        $('#tabs-3 div').text('').append(html);
    });
}

function changeEmail() {
    var em = $("._newEmail");
    var emailReg = /^([a-zA-Z0-9_\-.])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
    if ($.trim(em.val()) == '') {
        em.parent().next().html('邮箱不能为空!').css('color', 'red');
        return;
    } else if (!emailReg.test(em.val())) {
        em.parent().next().html('例:"user@example.com"').css('color', 'red');
        return;
    } else {
        em.parent().next().html('√').css('color', 'green');
    }

    $.get("/user/change-email", {email: em.val()}, function (html) {
        $('#tabs-2 div').text('').append(html);
    });
}

function changeEmail() {
    var em = $("._newEmail");
    var emailReg = /^([a-zA-Z0-9_\-.])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
    if ($.trim(em.val()) == '') {
        em.parent().next().html('邮箱不能为空!').css('color', 'red');
        return;
    } else if (!emailReg.test(em.val())) {
        em.parent().next().html('例:"user@example.com"').css('color', 'red');
        return;
    } else {
        em.parent().next().html('√').css('color', 'green');
    }

    $.get("/user/change-email", {email: em.val()}, function (html) {
        $('#tabs-2 div').text('').append(html);
    });
}

// function bindMobile(){
// 	var mobileNum = $("._mobileNum");
// 	var vailCode = $("._vailCode");
// 	var messageCode = $("._messageCode");
//
// 	if($.trim(mobileNum.val()) =='' ){
// 		mobileNum.parent().next().html('手机号不能为空!').css('color','red');
// 		return;
// 	}else if(isNaN(mobileNum.val())){
// 		mobileNum.parent().next().html('请正确填写手机号码!').css('color','red');
// 		return;
// 	}else if(!isNaN(mobileNum.val())&&((mobileNum.val()).length!=11)){
// 		mobileNum.parent().next().html('请正确填写手机号码!').css('color','red');
// 		return;
// 	}else{
// 		mobileNum.parent().next().html('√').css('color','green');
// 	}
//
// 	$.post("user!bindMobile.action",{mobile:mobileNum.val(),checkCode:vailCode.val(),yzm:messageCode.val()},function(html){
// 		$('#tabs-3 div').text('').append(html);
// 	});
// }
//
// function unbindMobile(){
// 	var vailCode = $("._unbindMobileVailCode");
// 	var messageCode = $("._unbindMobileMsgCode");
// 	$.post("user!unbindMobile.action",{checkCode:vailCode.val(),yzm:messageCode.val()},function(html){
//
// 		if(html.indexOf("login.action")>-1){
// 			window.location.href=html;
// 		}else{
// 			$.get(html,function(data){
// 				$('#tabs-3 div').text('').append(data);
// 			});
// 		}
// 	});
// }

function changeIdNum() {
    var name = $("._changeIdName");
    var idNum = $("._changeIdidNum");
    var chineseReg = /[\u4E00-\u9FA5]|[\uFE30-\uFFA0]/gi;
    if ($.trim(idNum.val()) == '') {
        idNum.parent().next().html('身份证号不能为空!').css('color', 'red');
        return false;
    } else if (!/(^\d{15}$)|(^\d{17}([0-9]|X)$)/.test(idNum.val())) {
        idNum.parent().next().html('身份证号码不正确!').css('color', 'red');
        return false;
    } else if (!IdCardValidate(idNum.val())) {
        idNum.parent().next().html('请输入正确的身份证号码!').css('color', 'red');
        return false;
    } else {
        idNum.parent().next().html('&nbsp;').css('color', 'red');
    }
    if ($.trim(name.val()) == '') {
        name.parent().next().html('姓名不能为空!').css('color', 'red');
        return false;
    } else if (!chineseReg.test(name.val())) {
        name.parent().next().html('请输入正确的姓名!').css('color', 'red');
        return false;
    } else {
        name.parent().next().html('&nbsp;').css('color', 'red');
    }

    $.get("/user/idcard", {name: name.val(), idNum: idNum.val()}, function (data) {
        if (data['error'] == 0) {
            alert(data['error_msg']);
            $(".tabs1").hide();
            $(".tabs2").show();
        }else{
            alert(data['error_msg']);
            return false;
        }
    },'json');
}
//手机
//获取验证码
function getCheckCode() {
    var checkCode1 = $('._unbindMobileVailCode').val();
    var _this = $('._getYZM');
    if (checkCode1.length == 4) {
        $.post('sendUnbindMobileCode.action', {checkCode: checkCode1}, function (data) {
            if (data.result.success == true) {
                if (_this.val() == '获取短信码') {
                    var yzm = $('#yzm').val();
                    if (isNaN(yzm)) {
                        countDown(60);
                        $('#yzmResult').html("");
                        $('#robotCode').attr("style", "display:none");
                    } else {
                        $('#yzmResult').html("");
                        $('#robotCode').attr("style", "display:none");
                        return;
                    }
                    $('#yzmResult').html("");
                    $('#robotCode').attr("style", "display:none");
                }
            } else {
                $('#yzmResult').html(data.result.msg);
                changeimg('codeimg');
                $('#robotCode').attr("style", "");
                //$('#robotCode').attr("style","display:block");

            }
        }, 'json');

    } else {
        alert('填写信息有误！');
    }
}
function changeimg(id) {
    var vadi = document.getElementById(id);
    vadi.src = "code.action?x=" + Math.random();
}
function countDown(i) {
    if (i >= 0) {
        $('._getYZM').attr("disabled", true);
        $('#yzm').css('background', '#ccc');
        $('#yzm').val(i);
        i--;
    } else {
        $('._getYZM').attr("disabled", false);
        $('#yzm').removeAttr('style');
        $('#yzm').addClass('allSubmitBtn');
        $('#yzm').val('获取短信码');
        return;
    }
    setTimeout(function () {
        countDown(i);
    }, 1000);
}

//验证身份证
var Wi = [7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2, 1];    // 加权因子
var ValideCode = [1, 0, 10, 9, 8, 7, 6, 5, 4, 3, 2];            // 身份证验证位值.10代表X
function IdCardValidate(idCard) {
    idCard = trim(idCard.replace(/ /g, ""));               //去掉字符串头尾空格                     
    if (idCard.length == 15) {
        return isValidityBrithBy15IdCard(idCard);       //进行15位身份证的验证    
    } else if (idCard.length == 18) {
        var a_idCard = idCard.split("");                // 得到身份证数组   
        if (isValidityBrithBy18IdCard(idCard) && isTrueValidateCodeBy18IdCard(a_idCard)) {   //进行18位身份证的基本验证和第18位的验证
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
/**
 * 判断身份证号码为18位时最后的验证位是否正确
 * @param a_idCard 身份证号码数组
 * @return
 */
function isTrueValidateCodeBy18IdCard(a_idCard) {
    var sum = 0;                             // 声明加权求和变量   
    if (a_idCard[17].toLowerCase() == 'x') {
        a_idCard[17] = 10;                    // 将最后位为x的验证码替换为10方便后续操作   
    }
    for (var i = 0; i < 17; i++) {
        sum += Wi[i] * a_idCard[i];            // 加权求和   
    }
    valCodePosition = sum % 11;                // 得到验证码所位置   
    if (a_idCard[17] == ValideCode[valCodePosition]) {
        return true;
    } else {
        return false;
    }
}
/**
 * 验证18位数身份证号码中的生日是否是有效生日
 * @param idCard 18位书身份证字符串
 * @return
 */
function isValidityBrithBy18IdCard(idCard18) {
    var year = idCard18.substring(6, 10);
    var month = idCard18.substring(10, 12);
    var day = idCard18.substring(12, 14);
    var temp_date = new Date(year, parseFloat(month) - 1, parseFloat(day));
    // 这里用getFullYear()获取年份，避免千年虫问题   
    if (temp_date.getFullYear() != parseFloat(year)
        || temp_date.getMonth() != parseFloat(month) - 1
        || temp_date.getDate() != parseFloat(day)) {
        return false;
    } else {
        return true;
    }
}
/**
 * 验证15位数身份证号码中的生日是否是有效生日
 * @param idCard15 15位书身份证字符串
 * @return
 */
function isValidityBrithBy15IdCard(idCard15) {
    var year = idCard15.substring(6, 8);
    var month = idCard15.substring(8, 10);
    var day = idCard15.substring(10, 12);
    var temp_date = new Date(year, parseFloat(month) - 1, parseFloat(day));
    // 对于老身份证中的你年龄则不需考虑千年虫问题而使用getYear()方法
    if (temp_date.getYear() != parseFloat(year)
        || temp_date.getMonth() != parseFloat(month) - 1
        || temp_date.getDate() != parseFloat(day)) {
        return false;
    } else {
        return true;
    }
}
//去掉字符串头尾空格   
function trim(str) {
    return str.replace(/(^\s*)|(\s*$)/g, "");
}
// 验证身份证是否成年
function isAdout(idCard) {
    if (idCard.length == 18) {
        var birthday = new Date(idCard.substring(6, 10) + "/"
            + idCard.substring(10, 12) + "/" + idCard.substring(12, 14));// 秒
    } else if (idCard.length == 15) {
        var birthday = new Date("19" + idCard.substring(6, 8) + "/"
            + idCard.substring(8, 10) + "/" + idCard.substring(10, 12));// 秒
    } else {
        return "-1";// 无效
    }
    var n1 = new Date().getFullYear();
    var n2;
    if (new Date().getMonth() < 10) {
        n2 = "0" + (new Date().getMonth() + 1);
    } else {
        n2 = new Date().getMonth() + 1;
    }
    var n3;
    if (new Date().getDate() < 10) {
        n3 = "0" + new Date().getDate();
    } else {
        n3 = new Date().getDate();
    }
    var nowday = new Date(n1 + "/" + n2 + "/" + n3);
    if ((nowday - birthday) / 1000 / 60 / 60 / 24 / 365 > 17) {
        return "0";// 成年
    } else {
        return "1";// 未成年
    }
}
