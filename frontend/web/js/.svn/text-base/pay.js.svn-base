var $payTag = '';
var $payTag_name = '';
var $payId = 0;
var $game_id = 0;
var $server_id = 0;
var $server_name = 0;
var $cny_rate = 10;
var $fee = 0;
var $money = 0;
var $gold = 0;
var $gold_name = '';
var $pay_name = '';
var $game_name = '';
var $bankCode = '';

function checkedVal(a) {
    a.prop("checked", true)
}
function unCheckedVal(a) {
    a.prop("checked", false)
}

function pop(a) {
    showLayer($("." + a.attr("id")));
    tabs(a)
}
function tabs(a) {
    $.each(a.siblings("li"), function (b, c) {
        hideLayer($("." + $(c).attr("id")))
    })
}
function hideLayer(a) {
    a.css("display", "none")
}
function showLayer(a) {
    a.css("display", "block")
}

function addCls(a) {
    a.parent("li").addClass("current");
    $("#tipPayWay span").text(a.text());
    showLayer($("#" + $(this).attr("class")))
}
function removeCls(a) {
    $.each(a.parent("li").siblings("li"), function (b, c) {
        $(c).removeClass("current")
    });
    hideLayer($("#" + a.attr("class")).siblings("div"));
    showLayer($("#" + a.attr("class")))
}

$(function () {

    var c = {
        playerId: "请先确定充值帐号！",
        noPlayerId: "该帐户名不存在！",
        gameId: "请选择游戏！",
        serverId: "请选择游戏服务器！",
        roleId: "请选择角色！",
        money: "请选择充值金额！",
        bankCode: "请选择银行！",
        role: '角色不存在！'
    };

    /*默认充值方式*/
    $first = $("#payWay li").eq(0);
    $first.addClass('current');
    $fee = $first.find('span').attr('data-fee');
    $payTag = $first.find('span').attr('id');
    $payTag_name = $first.find('span').text();
    $payId = $first.find('span').attr('data-id');

    $("#tipPayWay span").text($("#payWay li").eq(0).find('span').text());
    $("#payWay li span").click(function () {
        removeCls($(this));
        addCls($(this));
        $payTag = $(this).attr('id');
        $fee = $(this).attr('data-fee');
        $payTag_name = $(this).text();
        $payId = $(this).attr('data-id');
        $("." + $payTag).show();
        $("." + $payTag).siblings().hide();
    });

    $(".gameSerRole").delegate("li#game", "click", function (f) {
        var g = $(this);
        $pay_name = $.trim($("#userName").val());
        if ($pay_name != "") {
            $.ajax({
                url: "/pay/checkplayer",
                type: "get",
                dataType: "json",
                data: {playerId: $pay_name},
                success: function (data) {
                    if (data.error == 0) {
                        $("#checkName").html('<em style="color:green;">此帐号可用！</em>');
                        pop(g)
                    } else {
                        $("#checkName").text(c.noPlayerId)
                    }
                }
            })
        } else {
            $("#checkName").text(c.playerId)
        }
    });

    $(".gameSerRole").delegate("li#server", "click", function (f) {
        if ($("#userName").val() != "") {
            pop($(this))
        } else {
            $("#checkName").text(c.playerId)
        }
    });

    $(".game").delegate("div.close", "click", function (f) {
        hideLayer($(this).parent())
    });
    $(".game").delegate("input[name=game]", "click", function (f) {
        hideLayer($(".game"));
        $("#game").text($(this).parent().text());
        $game_id = $("input[name=game]:checked").val();
        $game_name = $("input[name=game]:checked").siblings().text();
        showLayer($(".server"));
        $.ajax({
            type: "get",
            url: "/pay/servers",
            dataType: "json",
            data: {game_id: $game_id},
            success: function (h) {
                $cny_rate = h['game']['cny_rate'];
                $gold_name = h['game']['gold_name'];
                var g = "";
                h = h['server'];
                for (k in h) {
                    g += '<li><label for="s' + h[k].server_id + '"><input id="s' + h[k].server_id + '" type="radio" name="server" value="' + h[k].server_id + '"><span>' + h[k].server_name + "</span></label></li>"
                }
                $(".allSer").html(g)
            }
        })
    });
    $(".server").delegate("div.close", "click", function (f) {
        hideLayer($(this).parent())
    });
    $(".server").delegate("input[name=server]", "click", function (f) {
        hideLayer($(".server"));
        $("#server").text($(this).parent().text())
        $server_id = $(this).val();
		$server_name = $(this).siblings().text();
    });

    $(".money input").click(function (f) {
        $money = $(this).val();
        if ($fee != 0) {
            $gold = Math.floor($money * (1 - $fee / 100)) * $cny_rate;
        } else {
            $gold = $money * $cny_rate;
        }
    });

    $(".bank input").click(function () {
        $bankCode = $(this).val();
    });

    $(".payBtn").delegate("input.submit", "click", function (l) {
        $.ajax({
            type: 'get',
            url: '/pay/checkrole',
            data: {'username': $pay_name, 'game_id': $game_id, 'server_id': $server_id},
            dataType: 'json',
            success: function (data) {
				if (0==$game_id)
				{
					$("#checkName").text(c.gameId)
					return false;
				}
				else if (0==$server_id)
				{
					$("#checkName").text(c.serverId)
					return false;
				}
				else if (0==$money)
				{
					$("#checkName").text(c.money)
					return false;
				}
				else if (data['error'] != 0) 
				{
                    $("#checkName").text(c.role)
                    return false;
                } 
				else 
				{
                    showLayer($(".maskLayer"));
                    var t = "";
                    t += '<li><span class="w1">您的充值方式：</span><span>' + $payTag_name + '</span></li><li><span class="w1">您的充值帐号：</span><span>' + $pay_name + '</span></li><li><span class="w1">您的充值游戏：</span><span>' + $game_name + '</span></li><li><span class="w1">您的充值区服：</span><span>' + $server_name + '</span></li>';
                    t += '<li><span class="w1">您的充值金额：</span><span>' + $money + '元</span></li><li><span class="w1">您获得的' + $gold_name + '数量：</span><span>' + $gold + "</span></li>";
                    $(".payInfo ul").html(t);
                    showLayer($(".payInfo"));
                }
            }
        })

        // $("#orderId").val(u.order.orderId);
        // $("#ticket").val(u.ticket)
    });

    $(".payInfo").delegate("div.close", "click", function (f) {
        hideLayer($(this).parent());
        hideLayer($(".maskLayer"))
    });
    $(".payInfo").delegate("input#back", "click", function (f) {
        hideLayer($(".maskLayer"));
        hideLayer($(this).parent().parent().parent())
    });
    $(".payInfo").delegate("input#togateway", "click", function (f) {
        $url = '/pay/cifpay?game_id=' + $game_id + '&server_id=' + $server_id + '&username=' + $pay_name + '&payTag=' + $payTag + '&payTag_name=' + $payTag_name + '&payId=' + $payId + '&money=' + $money;
        if ($payTag == 'sheng') {
            $url = '/pay/cifpay?game_id=' + $game_id + '&server_id=' + $server_id + '&username=' + $pay_name + '&payTag=' + $payTag + '&payTag_name=' + $payTag_name + '&payId=' + $payId + '&money=' + $money + '&bankCode=' + $bankCode;
        }
        //window.location.href = '/pay/cifpay?game_id=' + $game_id + '&server_id=' + $server_id + '&username=' + $pay_name + '&payTag=' + $payTag + '&payTag_name=' + $payTag_name + '&payId=' + $payId + '&money=' + $money;
        window.open($url);
        // hideLayer($(this).parent().parent().parent());
        // $("#result").attr("href", "paygateway/showorder.xhtml?orderId=" + $("#orderId").val() + "&ticket=" + $("#ticket").val());
        // $("#help").attr("href", "paygateway/help.xhtml#" + $("#payType").val());
        // showLayer($(".maskLayer"));
        // showLayer($(".payResult"));
    });
    $(".payResult").delegate("input#back", "click", function (f) {
        hideLayer($(".maskLayer"));
        hideLayer($(this).parent().parent())
    })
    $(".payResult").delegate("div.close", "click", function (f) {
        hideLayer($(".maskLayer"));
        hideLayer($(this).parent());
    })
});

